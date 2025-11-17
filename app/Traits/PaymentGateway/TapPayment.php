<?php

namespace App\Traits\PaymentGateway;

use Exception;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\TemporaryData;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Constants\PaymentGatewayConst;
use App\Models\Admin\PaymentGatewayCurrency;
use Illuminate\Http\Client\RequestException;

trait TapPayment{

    public function tapPaymentInit($output = null){
        if(!$output) $output    = $this->output;
        $credentials            = $this->getTapPaymentCredentials($output);
        $redirection            = $this->getRedirection();
        $url_parameter          = $this->getUrlParams();
        $user                   = auth()->guard(get_auth_guard())->user();
        $base_url               = $credentials->base_url;

        $request_data           = [
            'amount'            => $output['amount']->total_amount ? number_format($output['amount']->total_amount,2,'.','') : 0,
            'currency'          => $output['amount']->sender_cur_code ?? '',
            'customer'          => [
                'first_name'    => $user->firstname ?? '',
                'last_name'     => $user->lastname ?? '',
                'email'         => $user->email ?? '',
            ],
            'source'            => [
                'id'            => 'src_card',
            ],
            'post'              => [
                'url'           => $this->setGatewayRoute($redirection['callback_url'], PaymentGatewayConst::TAP_PAYMENT,$url_parameter),
            ],
            'redirect'          => [
                'url'           => $this->setGatewayRoute($redirection['return_url'], PaymentGatewayConst::TAP_PAYMENT,$url_parameter)
            ]
        ];

        $response               = Http::withHeaders([
            'Authorization'     => 'Bearer ' . $credentials->secret_key,
            'Content-Type'      => 'application/json',
        ])->post($base_url, $request_data)->throw(function(Response $response, RequestException $exception) {
            $response_array = $response->json();
            $message = $response_array['errors'][0]['description'] ?? false;
            throw new Exception($message ?? $exception->getMessage());
        })->json();

        if(isset($response) && $response['status'] == 'INITIATED'){
            $this->tapPaymentJunkInsert($response);
            if(request()->expectsJson()) {
                $this->output['redirection_response']   = $response;
                $this->output['redirect_url']           = $response['transaction']['url'];
                $this->output['redirect_links']         = $response['redirect']['url'];
                return $this->get();
            }
            return redirect()->away($response['transaction']['url']);
        }

    }

    public function getTapPaymentCredentials($output){
        $gateway = $output['gateway'] ?? null;
        if(!$gateway) throw new Exception("Payment gateway not available");
        $secret_key_sample = ['secret key','secret_key'];
        $base_url_sample = ['_sample','base url'];

        $secret_key = '';
        $outer_break = false;
        foreach($secret_key_sample as $item) {
            if($outer_break == true) {
                break;
            }
            $modify_item = $this->paypalPlainText($item);
            foreach($gateway->credentials ?? [] as $gatewayInput) {
                $label = $gatewayInput->label ?? "";
                $label = $this->paypalPlainText($label);

                if($label == $modify_item) {
                    $secret_key = $gatewayInput->value ?? "";
                    $outer_break = true;
                    break;
                }
            }
        }

        $base_url = '';
        $outer_break = false;
        foreach($base_url_sample as $item) {
            if($outer_break == true) {
                break;
            }
            $modify_item = $this->paypalPlainText($item);
            foreach($gateway->credentials ?? [] as $gatewayInput) {
                $label = $gatewayInput->label ?? "";
                $label = $this->paypalPlainText($label);

                if($label == $modify_item) {
                    $base_url = $gatewayInput->value ?? "";
                    $outer_break = true;
                    break;
                }
            }
        }

        $mode = $gateway->env;

        $paypal_register_mode = [
            PaymentGatewayConst::ENV_SANDBOX => "sandbox",
            PaymentGatewayConst::ENV_PRODUCTION => "live",
        ];

        if(array_key_exists($mode,$paypal_register_mode)) {
            $mode = $paypal_register_mode[$mode];
        }else {
            $mode = "sandbox";
        }

        return (object) [
            'secret_key'    => $secret_key,
            'base_url'      => $base_url,
            'mode'          => $mode,
        ];
    }

    public function tapPaymentJunkInsert($response){
        $output = $this->output;

        $data = [
            'gateway'       => $output['gateway']->id,
            'currency'      => $output['currency']->id,
            'amount'        => json_decode(json_encode($output['amount']),true),
            'response'      => $response,
            'wallet_table'  => $output['wallet']->getTable(),
            'wallet_id'     => $output['wallet']->id,
            'creator_table' => auth()->guard(get_auth_guard())->user()->getTable(),
            'creator_id'    => auth()->guard(get_auth_guard())->user()->id,
            'creator_guard' => get_auth_guard(),
        ];

        return TemporaryData::create([
            'type'          => PaymentGatewayConst::TYPEADDMONEY,
            'identifier'    => $response['id'],
            'data'          => $data,
        ]);
    }

    public function tappaymentSuccess($output = null){
        if(!$output) $output    = $this->output;
        $credentials            = $this->getTapPaymentCredentials($output);
        $token                  = $this->output['tempData']['identifier'] ?? "";

        $base_url               = $credentials->base_url . $token;

        $response               = Http::withHeaders([
            'Authorization'     => 'Bearer ' . $credentials->secret_key,
            'Content-Type'      => 'application/json',
        ])->get($base_url)->throw(function(Response $response, RequestException $exception) {
            $response_array     = $response->json();
            $message            = $response_array['errors'][0]['description'] ?? false;
            throw new Exception($message ?? $exception->getMessage());
        })->json();



        if(isset($response['status']) && $response['status'] == 'CAPTURED') {
            return $this->tapPaymentPaymentCaptured($response,$output);
        }else {
            throw new Exception('Transaction failed. Payment captured failed.');
        }

        if(empty($token)) throw new Exception('Transaction failed. Record didn\'t saved properly. Please try again.');

    }

    public function tapPaymentPaymentCaptured($response,$output) {
        $output['capture'] = $response;
        $output['callback_ref'] = $response['id'];
        try{
            $transaction            = Transaction::where('callback_ref',$response['id'])->first();
            if(!$transaction){
                $this->createTransaction($output);
            }else{
                if($transaction->status != PaymentGatewayConst::STATUSSUCCESS){
                    $transaction->update([
                        'status'    => PaymentGatewayConst::STATUSSUCCESS,
                    ]);
                    $this->updateWalletBalance($output);
                }
            }
        }catch(Exception $e) {
            throw new Exception($e->getMessage());
        }

        return true;
    }

    public static function isTapPayment($gateway) {
        $search_keyword = ['tap payment','tap payment gateway','tap payment payment gateway','gateway tap payment','tap payment automatic gateway','tap payment automatic'];
        $gateway_name = $gateway->name;

        $search_text = Str::lower($gateway_name);
        $search_text = preg_replace("/[^A-Za-z0-9]/","",$search_text);
        foreach($search_keyword as $keyword) {
            $keyword = Str::lower($keyword);
            $keyword = preg_replace("/[^A-Za-z0-9]/","",$keyword);
            if($keyword == $search_text) {
                return true;
                break;
            }
        }
        return false;
    }

    // tab payment callback response
    public function tappaymentCallbackResponse($response_data, $gateway){

        $token = $response_data ?? "";

        if($gateway['status'] == 'CAPTURED'){

            $temp_data = TemporaryData::where('identifier', $token)->first();

            // if transaction is already exists need to update status, balance & response data

            $transaction = Transaction::where('callback_ref', $token)->first();

            $status = PaymentGatewayConst::STATUSSUCCESS;

            if($temp_data) {
                $gateway_currency_id = $temp_data->data->currency ?? null;
                $gateway_currency = PaymentGatewayCurrency::find($gateway_currency_id);
                if($gateway_currency) {

                    $requested_amount = $temp_data['data']->amount->requested_amount ?? 0;
                    $validator_data = [
                        $this->currency_input_name  => $gateway_currency->alias,
                        $this->amount_input         => $requested_amount
                    ];

                    $get_wallet_model = PaymentGatewayConst::registerWallet()[$temp_data->data->creator_guard];
                    $user_wallet = $get_wallet_model::find($temp_data->data->wallet_id);
                    $this->predefined_user_wallet = $user_wallet;
                    $this->predefined_guard = $user_wallet->user->modelGuardName();
                    $this->predefined_user = $user_wallet->user;

                    $this->output['tempData'] = $temp_data;
                }

                $this->request_data = $validator_data;
                $this->gateway();
            }

            $output                     = $this->output;
            $output['callback_ref']     = $token;
            $output['capture']          = $response_data;

            if($transaction && $transaction->status != PaymentGatewayConst::STATUSSUCCESS) {

                $update_data                        = json_decode(json_encode($transaction->details), true);
                $update_data['gateway_response']    = $response_data;

                // update information
                $transaction->update([
                    'status'    => $status,
                    'details'   => $update_data
                ]);

                logger("payment successful and update wallet balance using callback");
                // update balance
                $this->updateWalletBalance($output);
            }else {
                // create new transaction with success
                $this->createTransaction($output, $status, false);
                logger("payment successful.");
            }
        }
    }


}

?>

<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\UserWallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\UserNotification;
use App\Constants\NotificationConst;
use App\Http\Controllers\Controller;
use App\Constants\PaymentGatewayConst;
use App\Events\User\NotificationEvent;
use Illuminate\Support\Facades\Validator;
use App\Notifications\User\Withdraw\ApprovedByAdminMail;

class WithdrawMoneyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "All Logs";
        $transactions = Transaction::where('type', 'WITHDRAW')->latest()->paginate(20);
        // return $transactions;
        return view('admin.sections.withdraw-money.index',compact(
            'page_title',
            'transactions'
        ));
    } 
    /**
     * Display All Pending Logs
     * @return view 
     */
    public function pending() {
        $page_title = "Pending Logs";
        $transactions = Transaction::with(
            'user:id,firstname,email,username,mobile',
            'gateway_currency:id,name',
        )->where('type', 'WITHDRAW')->where('status', 2)->latest()->paginate(20);
        
        return view('admin.sections.withdraw-money.index',compact(
            'page_title',
            'transactions'
        ));
    } 
    /**
     * Display All Complete Logs
     * @return view
     */
    public function complete() {
        $page_title = "Complete Logs";
        $transactions = Transaction::with(
            'user:id,firstname,email,username,mobile',
            'gateway_currency:id,name',
        )->where('type', 'WITHDRAW')->where('status', 1)->latest()->paginate(20);
        return view('admin.sections.withdraw-money.index',compact(
            'page_title',
            'transactions'
        ));
    } 
    /**
     * Display All Canceled Logs
     * @return view
     */
    public function canceled() {
        $page_title = "Canceled Logs";
        $transactions = Transaction::with(
            'user:id,firstname,email,username,mobile',
            'gateway_currency:id,name',
        )->where('type', 'WITHDRAW')->where('status', 4)->latest()->paginate(20);
        return view('admin.sections.withdraw-money.index',compact(
            'page_title',
            'transactions'
        ));
    } 
    public function moneyOutDetails($id){

        $data = Transaction::where('id',$id)->with(
          'user:id,firstname,lastname,email,username,full_mobile',
            'gateway_currency:id,name,alias,payment_gateway_id,currency_code,rate',
        )->where('type', 'WITHDRAW')->first();
        $page_title = "Withdraw Money Details For".'  '.$data->trx_id;
        return view('admin.sections.withdraw-money.details', compact(
            'page_title',
            'data'
        ));
    }
    public function approved(Request $request){
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $transaction = Transaction::where('id',$request->id)->where('status',2)->where('type', PaymentGatewayConst::TYPEWITHDRAW)->first();
        $transaction->status = 1;
        try{
           $approved = $transaction->save();
           if( $approved){
            $notification_content = [
                'title'         => "Money Out",
                'message'       => "Your Money Out request approved by admin " .get_amount(@$transaction->total_payable,@$transaction->gateway_currency->currency_code)." successful.",
                'image'         => files_asset_path('profile-default'),
            ];
             
            $this->sendUserNotification($transaction,$notification_content);
           }
            return redirect()->back()->with(['success' => ['Money Out request approved successfully']]);
        }catch(Exception $e){
            return back()->with(['error' => [$e->getMessage()]]);
        }
    }
    public function rejected(Request $request){ 
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
            'reject_reason' => 'required|string|max:200',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $transaction = Transaction::where('id',$request->id)->where('status',2)->where('type', PaymentGatewayConst::TYPEWITHDRAW)->first();
        $transaction->status = 4;
        $transaction->reject_reason = $request->reject_reason;
        try{
            $rejected =  $transaction->save();
            if( $rejected){
                //base_cur_charge
                if($transaction->user_id != null) {
                    $userWallet = UserWallet::find($transaction->wallet_id);
                    $userWallet->balance +=  $transaction->request_amount;
                    $userWallet->save();
                }

            // notification
            $notification_content = [
                'title'         => "Money Out",
                'message'       => "Your Money Out request rejected by admin " .get_amount(@$transaction->total_payable,@$transaction->gateway_currency->currency_code),
                'image'         => files_asset_path('profile-default'),
            ];
            $this->sendUserNotification($transaction,$notification_content);
            }
            return redirect()->back()->with(['success' => ['Money Out request rejected successfully']]);
        }catch(Exception $e){
            return back()->with(['error' => [$e->getMessage()]]);
        }
    }

    public function sendUserNotification($transaction,$notification_content) {
            $user =$transaction->user;
            UserNotification::create([
                'type'      => NotificationConst::WITHDRAW_MONEY,
                'user_id'   => $transaction->creator->id,
                'message'   =>  $notification_content,
            ]);
            try {
                $user->notify(new ApprovedByAdminMail($user,$transaction)); 

                event(new NotificationEvent($notification_content,$transaction->creator)); 
                send_push_notification(["user-".$transaction->creator->id],[
                    'title'     => $notification_content['title'],
                    'body'      => $notification_content['message'],
                    'icon'      => get_fav(),
                ]);
            } catch (\Throwable $th) {
                //throw $th;
            }
    }
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'text'  => 'required|string',
        ]);

        if($validator->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error,null,400);
        }
        $validated = $validator->validate();

        $transactions = Transaction::with(
            'user:id,firstname,email,username,mobile',
            'gateway_currency:id,name',
        )->where('type', 'WITHDRAW')->where("trx_id","like","%".$validated['text']."%")->latest()->paginate(20);
        return view('admin.components.data-table.money-out-transaction-log', compact( 
            'transactions'
        ));
    }
}

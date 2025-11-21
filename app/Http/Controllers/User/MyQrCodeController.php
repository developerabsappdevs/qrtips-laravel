<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyQrCodeController extends Controller
{
    public function index()
    {
        $encrypted = encrypt(auth()->user()->username);
        $share_link = url('/').'/share/tips/payment/'.urlencode($encrypted);
        $qr_image = 'https://qrcode.tec-it.com/API/QRCode?data='.$share_link;
        return view('user.sections.my-qr-code.index', compact('share_link', 'qr_image'));
    }
}

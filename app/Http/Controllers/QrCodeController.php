<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function index()
    {
        $message='tesxttt';
      return view('qrcode',compact('message'));
    }
}

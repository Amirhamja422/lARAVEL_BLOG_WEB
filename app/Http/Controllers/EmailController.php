<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function emailView(){
        return view('admin.email');
    }

    public function emailSend(Request $request){
        $user_name = $request->user_name;
        $send_email ="amirhamja422@gmail.com";
    //    return $send_email;
        Mail::to($send_email)->send(new SendMail($user_name));
        return 'Email sent successfully';
    }
}

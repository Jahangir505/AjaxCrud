<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailSendController extends Controller
{
    public function index(){
        return view('mailSend.form');
    }


    public function sendMail(Request $r){

        $inputs = [
            'name'=>$r->input('name'),
            'email'=>$r->input('email'),
            'phone'=>$r->input('phone'),
            'subject'=>$r->input('subject'),
            'description'=>$r->input('description'),
        ];

        Mail::send('mailSend.view',$inputs, function($mail) use ($inputs) {
            $mail->from($inputs['email'],$inputs['name'])
                ->to('jahangir147441@gmail.com','Jahangir')
                ->subject('TestMail');
        });

        return redirect()->back()->with('success','Wereciev your mail. Thank You for contact with us');

    }
}

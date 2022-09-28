<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Mail;

class ContactUsController extends Controller
{
    public function contact_us(Request $request){
        $controlls = $request->all();
        $email=$request->email;
        Mail::send('email_template.send_quick_email',['contact_info'=>$controlls],function ($message) use ($email) {
            $message->from(env('MAIL_FROM_ADDRESS'),'Gta Rental');
            $message->to($email);
            //$message->to('submit@newontariohomes.ca');
            //$message->to('samarhussain1@gmail.com');
            $message->subject('Contact Email');
        });
        return redirect()->back()->withSuccess('Contact Us Delete Successfully');
   }
}

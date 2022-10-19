<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Property};
use Validator;
use Mail;

class ContactUsController extends Controller
{
    public function contact_us(Request $request){
        $controlls = $request->all();
        //dd($controlls);
        $rules = array(
            "name" => "required|max:100",
            "address" => "required|max:200",
            "phone_number" => "required|min:10|max:20",
            "email" => "required",
            "price" => "required",
            "property_type" => "required|max:200",
            "message" => "nullable|max:5000",
            "property_id"=>"required"
            //"file" => "nullable",
        );
        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Inputs Errors', 'errors' => $validator->errors()]);
        }
        $property=Property::with('user')->where("id",$request->property_id)->first();
        if(!empty($property->user)){
            $email=$property->user->email;
        }else{
          $email="hassanqazi146@gmail.com";
        }
        Mail::send('email_template.contact_us',['contact_info'=>$controlls],function ($message) use ($email) {
            $message->from(env('MAIL_FROM_ADDRESS'),'Gta Rental');
            $message->to($email);
            //$message->to('submit@newontariohomes.ca');
            $message->to('samarhussain1@gmail.com');
            $message->subject('Contact Email');
        });
        return response(["status"=>true,"success" => "Contact Us Email Send Successfully"], 200);
   }
}

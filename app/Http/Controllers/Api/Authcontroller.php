<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class Authcontroller extends Controller
{
    public function register(Request $request){

        $controlls = $request->all();
        // $response = ['status'=>false,"message" => "Landlord Not Register Successfully"];
        // return response($response, 200);
        //dd($controlls);
        $rules = array(
            //"first_name" => "required|max:100",
            //"last_name" => "required|max:100",
            "phone_number" => "required|min:10|max:20",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6|confirmed",
            'password_confirmation' => 'required|min:6',
            "role"=>"required"

        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $verify_code=rand(1000, 9999);
        $user = new User;
        if($request->role=="rental"){
          $user->role_id = 3;
        }elseif($request->role=="landlord"){
            $user->role_id = 2; 
        }
        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);	
        //$user->verify_code =$verify_code;
        if($user->save()){
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['status'=>true,"message" => "Landlord Register Successfully",'token' => $token];
             return response($response, 200);
            //return redirect()->back()->withSuccess('Borrower Added Successfully');
            //return redirect()->route('user.login');
            // Mail::send('user.email.verify_code', ['verify_code' =>$verify_code], function ($message) use($request) {
            //     $message->from('emailforhnh@gmail.com', 'Confirmation');
            //     $message->to($request->email);
            //     $message->subject('Verify Code');
            // });
            // return redirect()->route('user.verify',$user->id);
        }
        $response = ['status'=>false,"message" => "Landlord Not Register Successfully"];
        return response($response, 200);  

   }

   public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                //dd("ok");
                $response = ['status'=>true,"message" => "Login Successfully",'token' => $token,'user'=>$user];
                return response($response, 200);
            } else {
                $response = ['status'=>false,"message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ['status'=>false,"message" =>'User does not exist'];
            return response($response, 422);
        }
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['status'=>true,'message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
   
}

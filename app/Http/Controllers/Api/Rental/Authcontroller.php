<?php

namespace App\Http\Controllers\Api\Rental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class Authcontroller extends Controller
{
    // public function profile_view($id)
    // {
    //   $admin_profile = User::where('id',$id)->first();

    //   return response()->json(['admin_profile'=>$admin_profile],200);
    // }

    public function profile_view(Request $request)
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/storage/profile/";
        $user=auth('api')->user();
        return response()->json(['rental'=>$user,'imagepath'=>$actual_link],200);
    }

    public function profile_update(Request $request){

        $controlls = $request->all();
        //dd($controlls);
        $id=$request->id;
        $rules = array(
            "first_name" => "required|max:100",
            "last_name" => "required|max:100",
            "phone_number" => "required|min:10|max:20",
            "email" => "required|email|unique:users,email,$id,id",
            //"password" => "nullable|min:6|confirmed",
            //'password_confirmation' => 'nullable|min:6',
            "image"=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
            //"role"=>"required"

        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $verify_code=rand(1000, 9999);
        $user =User::find($request->id);
        $user->role_id = 3;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        //$user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        //$user->password = bcrypt($request->password);	
        //$user->verify_code =$verify_code;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileType = "image-";
            $filename = $fileType.time()."-".rand().".".$file->getClientOriginalExtension();
            $file->storeAs("/public/profile", $filename);
            $user->image = $filename;
        }
        $user->is_active = 1;
        if($user->save()){
            $response = ['status'=>true,"message" => "Rental Profile Updated Successfully"];
             return response($response, 200);
            //return redirect()->back()->withSuccess('Rental Updated Successfully');
            //return redirect()->route('user.login');
            // Mail::send('user.email.verify_code', ['verify_code' =>$verify_code], function ($message) use($request) {
            //     $message->from('emailforhnh@gmail.com', 'Confirmation');
            //     $message->to($request->email);
            //     $message->subject('Verify Code');
            // });
            // return redirect()->route('user.verify',$user->id);
        }
        $response = ['status'=>false,"message" => "Rental Profile Not Updated Successfully"];
        return response($response, 422);  

    }

    public function passwordChange(Request $request){
        $controlls = $request->all();
        $id=$request->id;
        $rules = array(
            "old_password" => "required",
            "new_password" => "required|required_with:confirm_password|same:confirm_password",
            "confirm_password" => "required"
        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            //return redirect()->back()->withErrors($validator)->withInput($controlls);
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('id',$request->id)->first();
        $hashedPassword = $user->password;
 
        if(Hash::check($request->old_password , $hashedPassword )) {
 
            if (!Hash::check($request->new_password , $hashedPassword)) {
                $users =User::find($request->id);
                $users->password = bcrypt($request->new_password);
                $users->save();
                $response = ['status'=>true,"message" => "Password Changed Successfully"];
                return response($response, 200);
            }else{
                $response = ['status'=>false,"message" => "new password can not be the old password!"];
                return response($response, 422);
            }
 
        }else{
            $response = ['status'=>true,"message" => "old password does not matched"];
            return response($response, 422);
        }

    }
}

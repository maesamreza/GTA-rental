<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\{User,PasswordReset};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{DB,Mail,Auth,Hash};

class AuthController extends Controller
{
    public function login(){
        //return view('user.auth.login.login');
     }
 
    public function login_process(Request $request){
         $controlls=$request->all();
         $rules=array(
             "email"=>"required|exists:users,email",
             "password"=>"required");
             $messages=array(
                 "email.exists"=>"Email Does Not Exists",
             );
             $validator=Validator::make($controlls,$rules,$messages);
             if ($validator->fails()) {
 
                 return redirect()->back()->withErrors($validator)->withInput($controlls);
             }
             else{
                 //$credientials=['email'=>$request->email,'password'=>$request->password];
                 if (Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password,'role_id'=>3,'is_active'=>1])) {
                    // dd('admin');
                     //return redirect()->route('user.dashboard');

                 }elseif(Auth::guard('landlord')->attempt(['email'=>$request->email,'password'=>$request->password,'role_id'=>2,'is_active'=>1])) {  
                      // dd('admin');
                     //return redirect()->route('user.dashboard');
                 }else{
                    // return redirect()->route('user.login')->withErrors(['error'=>"Invalid Credientials"]);
                 }
             }
     }
     
     public function register(){
       //  return view('user.auth.register.register');
     }
 
     public function forgotPage(){
         //return view('user.auth.forgot.forgot');
     }
 
     public function forgot(Request $request){
        $validate = validator($request->all(),[
            'email' => 'required|email|exists:users',
        ],['email.exists' => 'Email not found']);
         
        if ($validate->fails()) {
             return back()->withErrors($validate->errors())->withInput();  
         }
 
         $token = Str::random(16);
         $password = PasswordReset::firstOrCreate([
             'email' => $request->email
         ]);
         $hashToken = bcrypt($token);
         $createdAt = now()->format('Y-m-d h:i:s');
         DB::table('password_resets')
         ->where(['email' => $request->email])  // find your user by their email
         ->update([
             'token' => bcrypt($token),
             'created_at' => now()->format('Y-m-d h:i:s')
         ]);
 
        //  Mail::send('email.password-reset', ['link' => route('password.reset', ['token' => $token, 'email' => $request->email])], function ($message) use($request) {
        //      $message->from('emailforhnh@gmail.com', 'Confirmation');
        //      $message->to($request->email);
        //      $message->subject('Password Reset Link');
        //  });
 
        //return redirect()->route('user.login')->withSuccess('Password Reset Link Send on your email');
     }
 
     function resetPage(Request $request){
         $password = PasswordReset::where(['email' => $request->email])->first();
         if(is_object($password)){
             if(Hash::check($request->token, $password->token)){
                // return view('user.auth.forgot.createNewPassword')->with($request->only('email', 'token'));
             }
            // return redirect()->route('user.login')->withErrors(['errors'=>'Link has been expired.']);
         }
        // return redirect()->route('user.login')->withErrors(['errors'=>'Invalid Link']);
     }
 
     
     function resetpass(Request $request){
         // return $request;
 
         $password = PasswordReset::where(['email' => $request->email])->first();
         if(is_object($password)){
             if(Hash::check($request->token, $password->token)){
                 $validate = Validator::make($request->all(), [
                     "password" => "required|min:5|required_with:confirm_password|same:confirm_password",
                     "confirm_password" => "required|min:5",
                     //'password' => 'required',
                     //'confirm_password' => 'required|same:password'
                 ], ['confirm_password.same' => 'Password not matched']);
 
                 if($validate->fails()){
                     return back()->withErrors($validate->errors());
                 }
                 $admin = User::where($request->only('email'))->first();
                 if(is_object($admin)){
                     $admin->password = bcrypt($request->password);
                     $admin->save();
                     $password = PasswordReset::where(['email' => $request->only('email')])->delete();
                     //return redirect()->route('user.login')->withSuccess('Password has been successfully reset');
                 }
                // return redirect()->route('user.login')->withErrors(['errors' => 'User does not exists']);
             }
           // return redirect()->route('user.login')->withErrors(['errors'=>'Link has been expired.']);
         }
        // return redirect()->route('user.login')->withErrors(['errors'=>'Invalid Link']);
     }

    public function store(Request $request){

        $controlls = $request->all();
        //dd($controlls);
        $rules = array(
            //"first_name" => "required|max:100",
            //"last_name" => "required|max:100",
            "phone_number" => "required|min:10|max:20",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:5",
            "role"=>"required"

        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        $verify_code=rand(1000, 9999);
        $user = new User;
        $user->role_id = $request->role;
        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);	
        //$user->verify_code =$verify_code;
        if($user->save()){
            //return redirect()->back()->withSuccess('Borrower Added Successfully');
            //return redirect()->route('user.login');
            // Mail::send('user.email.verify_code', ['verify_code' =>$verify_code], function ($message) use($request) {
            //     $message->from('emailforhnh@gmail.com', 'Confirmation');
            //     $message->to($request->email);
            //     $message->subject('Verify Code');
            // });
            // return redirect()->route('user.verify',$user->id);
        }
        $request->session()->put('alert', 'danger');
        return redirect()->back()->withErrors(['errors'=>'User Not Added']);  

   }

    // public function logout(){
    //     Auth::guard('customer')->logout();
    //     // return redirect()->route('user.login');
    // }
}

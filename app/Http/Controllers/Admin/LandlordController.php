<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandlordController extends Controller
{
    public function index(){
        $landlord=User::where("role_id",2)->get();
        //return view('',compact('landlord'));
    }

    public function store(Request $request){

        $controlls = $request->all();
        //dd($controlls);
        $rules = array(
            //"first_name" => "required|max:100",
            "name" => "required|max:100",
            "phone_number" => "required|min:10|max:20",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:5",
            //"role"=>"required"

        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        $verify_code=rand(1000, 9999);
        $user = new User;
        $user->role_id = 2;
        // $user->first_name = $request->first_name;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_active = $request->is_active;	
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

    public function edit($id){
        $landlord=User::where("role_id",2)->where('id',$id)->first();
        //return view('',compact('landlord'));
    }

    public function update(Request $request){

        $controlls = $request->all();
        //dd($controlls);
        $rules = array(
            //"first_name" => "required|max:100",
            "name" => "required|max:100",
            "phone_number" => "required|min:10|max:20",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:5",
            //"role"=>"required"

        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        $verify_code=rand(1000, 9999);
        $user =User::find($request->id);
        $user->role_id = 2;
        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);	
        //$user->verify_code =$verify_code;
        $user->is_active = $request->is_active;
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

    public function delete($id){
        $landlord=User::where("role_id",2)->where('id',$id)->delete();
        //return view('',compact('landlord'));
    }

    public function permission(Request $request){
    
        $user =User::find($request->id);
        $status="";
        if($user->is_active==1){
          $user->is_active =0;
          $status="Deactive";
        }else{
          $user->is_active =1;
          $status="Active"; 
        }
        if($user->save()){
            return redirect()->back()->withSuccess("User $status Successfully");
            //return redirect()->route('user.login');
            // Mail::send('user.email.verify_code', ['verify_code' =>$verify_code], function ($message) use($request) {
            //     $message->from('emailforhnh@gmail.com', 'Confirmation');
            //     $message->to($request->email);
            //     $message->subject('Verify Code');
            // });
            // return redirect()->route('user.verify',$user->id);
        }
        $request->session()->put('alert', 'danger');
        return redirect()->back()->withErrors(['errors'=>'User Permission  Not Changed']);  

    }
}

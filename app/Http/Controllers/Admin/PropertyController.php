<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\{Property};
use Illuminate\Support\Facades\{DB,Mail,Auth,Hash};

class PropertyController extends Controller
{
    public function index(){
        Property::where("is_updated",false)->delete();
        $property=Property::get();
        return view('Admin.pages.property.property',compact('property'));
    }

    public function addView(){
        // $landlord=User::where("role_id",2)->get();
        $property=new Property;
        $property->user_id=Auth::guard('admin')->user()->id;
        $property->save();
        return view('Admin.pages.property.addproperty');
    }

    // public function store(Request $request){

    //     $controlls = $request->all();
    //     //dd($controlls);
    //     $rules = array(
    //         "first_name" => "required|max:100",
    //         "last_name" => "required|max:100",
    //         "phone_number" => "required|min:10|max:20",
    //         "email" => "required|email|unique:users,email",
    //         "password" => "required|min:6|confirmed",
    //         'password_confirmation' => 'required|min:6',
    //         "image"=>'required|image|mimes:jpeg,png,jpg|max:2048'
    //         //"role"=>"required"

    //     );

    //     $validator = Validator::make($controlls, $rules);
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput($controlls);
    //     }
    // }

    public function edit($id){
        //$customer=User::where("role_id",3)->where('id',$id)->first();
        $property=Property::where('id',$id)->get();
        return view('Admin.pages.property.edit',compact('property'));
    }

    public function update(Request $request){

        $controlls = $request->all();
        //dd($controlls);
        $id=$request->id;
        $rules = array(
            "property_type" => "required|max:150",
            "sub_property_type" => "required|max:150",
            "address" => "required|min:10|max:20",
            "email" => "required|email|unique:users,email,$id,id",
            "password" => "nullable|min:6|confirmed",
            'password_confirmation' => 'nullable|min:6',
            "image"=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
            //"role"=>"required"

        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        $verify_code=rand(1000, 9999);
        $user =User::find($request->id);
        $user->role_id = 3;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        //$user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);	
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
            return redirect()->back()->withSuccess('Rental Updated Successfully');
            //return redirect()->route('user.login');
            // Mail::send('user.email.verify_code', ['verify_code' =>$verify_code], function ($message) use($request) {
            //     $message->from('emailforhnh@gmail.com', 'Confirmation');
            //     $message->to($request->email);
            //     $message->subject('Verify Code');
            // });
            // return redirect()->route('user.verify',$user->id);
        }
        $request->session()->put('alert', 'danger');
        return redirect()->back()->withErrors(['errors'=>'Rental Not Added']);  

    }

    public function delete($id){
        $customer=User::where("role_id",3)->where('id',$id)->delete();
        return redirect()->back()->withSuccess('Rental Delete Successfully');
        //return view('',compact('customer'));
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

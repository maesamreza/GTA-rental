<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\{Auth};

class ProfileController extends Controller
{
    public function index()
    {
       $profile = User::where('id',auth('admin')->user()->id)->first();

        return view("Admin.pages.profile",compact('profile'));
    }

    public function update(Request $request)
    {
        $controlls = $request->all();
        $id = $request->id;
        $rules = array(
            "first_name" => "required|max:100",
            "last_name" => "required|max:100",
            "phone_number" => "required|min:10|max:18",
            "email" => "required|email|unique:users,email,$id,id",
            "image"=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
       $update_profile = User::where('id',$request->id)->first();
       $update_profile->first_name = $request->first_name;
       $update_profile->last_name = $request->last_name;
       $update_profile->phone_number = $request->phone_number;
       $update_profile->email = $request->email;
       if($request->hasFile('image')){
            $file = $request->file('image');
            $fileType = "image-";
            $filename = $fileType.time()."-".rand().".".$file->getClientOriginalExtension();
            $file->storeAs("/public/profile", $filename);
            $update_profile->image = $filename;
        }
       $update_profile->save();

       return redirect()->back()->with('success','Profile updated Successfully!');
    }

    public function change_password(Request $request)
    {
        $change_password = User::where('id',$request->id)->first();
        if(Hash::check($request->old_password , $change_password->password ))
        {
            $change_password->password = Hash::make($request->new_password);
            $change_password->save();
            return redirect()->back()->withSuccess('Password Changed Successfully');

        }
        else
        {
            return redirect()->back()->withErrors(['errors'=>'your new password is not matching with old password!']);

        }


    }
}

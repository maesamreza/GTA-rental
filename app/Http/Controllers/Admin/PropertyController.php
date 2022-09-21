<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\{Property,UtilityInclude,Category,Floor,BuildingFeature,CommercialBuilding};
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

    public function store(Request $request){

        $controlls = $request->all();
        //dd($controlls);
        $id=$request->id;
        $rules = array(
            "property_type" => "required|max:150",
            "sub_property_type" => "nullable|max:150",
            "address" => "required|min:10|max:20",
            "lat" => "required",
            "lng" => "required",
            'unit' => "required|max:150",
            "year_build"=>"required|max:4",
            "pet_friendly"=>"required",
            "furnished"=>"required",
            "lease_term"=>"required",
            "parking_type"=>"required",
            "parking_spots"=>"required",
            "description"=>"required|max:5000",
            "untility_name"=>"required",
            "category_name"=>"required",
            "bedroom.*"=>"required",
            "bathroom.*"=>"required",
            "rent.*"=>"required",
            "unit_size.*"=>"required",
            "availability.*"=>"required",
            "commercial_building_name"=>"nullable",
            "building_feature_name"=>"nullable",
            "unit_feature_name"=>"nullable",
            "near_by_name"=>"nullable",
            "date"=>"required",
            "start_time"=>"required",
            "end_time"=>"required",
        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        $property =Property::find($request->id);
        $property->property_type = $request->property_type;
        $property->sub_property_type = $request->sub_property_type;
        $property->address = $request->address;
        $property->lat = $request->lat;
        $property->lng = $request->lng;
        $property->unit = $request->unit;
        $property->year_build = $request->year_build;
        $property->pet_friendly = $request->pet_friendly;
        $property->furnished = $request->furnished;
        $property->lease_term = $request->lease_term;
        $property->parking_type = $request->parking_type;
        $property->parking_spots = $request->parking_spots;
        $property->description = $request->description;

        //$property->verify_code =$verify_code;
        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $fileType = "image-";
        //     $filename = $fileType.time()."-".rand().".".$file->getClientOriginalExtension();
        //     $file->storeAs("/public/profile", $filename);
        //     $property->image = $filename;
        // }
        $property->is_active = 1;
        $property->is_updated = 1;
        if($property->save()){

            for ($i=0; $i <count($request->untility_name) ; $i++) { 
                $utilityInclude=new UtilityInclude;
                $utilityInclude->property_id=$property->id;
                $utilityInclude->name=$request->untility_name[$i];
                $utilityInclude->save();
            }

            for ($i=0; $i <count($request->category_name) ; $i++) { 
                $category=new Category;
                $category->property_id=$property->id;
                $category->name=$request->category_name[$i];
                $category->save();
            }

            for ($i=0; $i <count($request->bedroom) ; $i++) { 
                $floor=new Floor;
                $floor->property_id=$property->id;
                $floor->bedroom=$request->bedroom[$i];
                $floor->bathroom=$request->bathroom[$i];
                $floor->rent=$request->rent[$i];
                $floor->unit_size=$request->unit_size[$i];
                $floor->availability=$request->availability[$i];
                $floor->save();
            }
            return redirect()->back()->withSuccess('Property Added Successfully');
        }
        $request->session()->put('alert', 'danger');
        return redirect()->back()->withErrors(['errors'=>'Property Not Added Successfully']);  

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

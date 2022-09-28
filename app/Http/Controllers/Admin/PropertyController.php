<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\{Property,UtilityInclude,Category,Floor,BuildingFeature,CommercialBuilding,NearBy,UnitFeature,OpenHouseDate,PropertyImage};
use Illuminate\Support\Facades\{DB,Mail,Auth,Hash};

class PropertyController extends Controller
{
    public function index(){
        Property::where("is_updated",false)->delete();
        $property=Property::where("is_updated2","!=",false)->get();
        session()->forget('propertyId');
        return view('Admin.pages.property.property',compact('property'));
    }

    public function addView(){
        // $landlord=User::where("role_id",2)->get();
        if(!session()->has('propertyId')){
            $property=new Property;
            $property->user_id=Auth::guard('admin')->user()->id;
            $property->is_updated2 = 1;
            if($property->save()){
                session()->put('propertyId', $property->id);
            }
            $id=session()->get('propertyId');
            $property =Property::with('propertyImage')->where("id",$id)->first();
        }else{
            $id=session()->get('propertyId');
            $property =Property::with('propertyImage')->where("id",$id)->first();
        }
        //dd($property);
        //return session()->get('propertyId');
        return view('Admin.pages.property.addproperty',compact('property'));
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
        $property=Property::with('propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate')->where('id',$id)->first();
        //dd($property);
        session()->put('propertyId', $id);
        return view('Admin.pages.property.edit',compact('property'));
    }

    public function store(Request $request){

        $controlls = $request->all();
        //dd($controlls);
        $id=session()->get('propertyId');
        //dd($id);
        $rules = array(
            "property_type" => "required|max:150",
            "sub_property_type" => "nullable|max:150",
            "address" => "required|min:10|max:20",
            "lat" => "required",
            "lng" => "required",
            'unit' => "nullable|max:150",
            "year_build"=>"nullable|max:4",
            "pet_friendly"=>"nullable",
            "furnished"=>"nullable",
            "short_term"=>"nullable",
            "lease_term"=>"required",
            "parking_type"=>"nullable",
            //"parking_spots"=>"required",
            "description"=>"nullable|max:5000",
            "untility_name"=>"nullable",
            "category_name"=>"nullable",
            "bedroom.*"=>"required",
            "bathroom.*"=>"required",
            "rent.*"=>"required",
            "unit_size.*"=>"nullable",
            "availability.*"=>"required",
            "commercial_building_name"=>"nullable",
            "building_feature_name"=>"nullable",
            "unit_feature_name"=>"nullable",
            "near_by_name"=>"nullable",
            "date"=>"nullable",
            "start_time"=>"nullable",
            "end_time"=>"nullable",
        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        $property =Property::find($id);
        //dd($property);
        $property->property_type = $request->property_type;
        if(!empty($request->sub_property_type)){
            $property->sub_property_type = $request->sub_property_type;
        }else{
            $property->sub_property_type =null;
        }
        $property->address = $request->address;
        $property->lat = $request->lat;
        $property->lng = $request->lng;
        $property->unit = $request->unit;
        $property->year_build = $request->year_build;
        $property->pet_friendly = $request->pet_friendly;
        $property->furnished = $request->furnished;
        $property->lease_term = $request->lease_term;
        $property->parking_type = $request->parking_type;
        $property->short_term = $request->short_term;
        $property->description = $request->description;
        $property->is_active = 1;
        $property->is_updated = 1;
        if($property->save()){
            if(!empty($request->untility_name)){
                for ($i=0; $i <count($request->untility_name) ; $i++) { 
                    $utilityInclude=new UtilityInclude;
                    $utilityInclude->property_id=$property->id;
                    $utilityInclude->name=$request->untility_name[$i];
                    $utilityInclude->save();
                }
            }
            if(!empty($request->category_name)){
                for ($i=0; $i <count($request->category_name) ; $i++) { 
                    $category=new Category;
                    $category->property_id=$property->id;
                    $category->name=$request->category_name[$i];
                    $category->save();
                }
            }
            if(!empty($request->bedroom)){
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
            }
            if(!empty($request->commercial_building_name)){
                for ($i=0; $i <count($request->commercial_building_name) ; $i++) { 
                    $commercialBuilding=new CommercialBuilding;
                    $commercialBuilding->property_id=$property->id;
                    $commercialBuilding->name=$request->commercial_building_name[$i];
                    $commercialBuilding->save();
                }
            }
            if(!empty($request->building_feature_name)){
                for ($i=0; $i <count($request->building_feature_name) ; $i++) { 
                    $buildingFeature=new BuildingFeature;
                    $buildingFeature->property_id=$property->id;
                    $buildingFeature->name=$request->building_feature_name[$i];
                    $buildingFeature->save();
                }
            }
            if(!empty($request->unit_feature_name)){
                for ($i=0; $i <count($request->unit_feature_name) ; $i++) { 
                    $unitFeature=new UnitFeature;
                    $unitFeature->property_id=$property->id;
                    $unitFeature->name=$request->unit_feature_name[$i];
                    $unitFeature->save();
                }
            }
            if(!empty($request->near_by_name)){
                for ($i=0; $i <count($request->near_by_name) ; $i++) { 
                    $nearBy=new NearBy;
                    $nearBy->property_id=$property->id;
                    $nearBy->name=$request->near_by_name[$i];
                    $nearBy->save();
                }
            }
            if(!empty($request->date) && $request->date[0]!=null){
                //dd($request->date);
                for ($i=0; $i <count($request->date) ; $i++) { 
                    $openHouseDate=new OpenHouseDate;
                    $openHouseDate->property_id=$property->id;
                    $openHouseDate->date=$request->date[$i];
                    $openHouseDate->start_time=$request->start_time[$i];
                    $openHouseDate->end_time=$request->end_time[$i];
                    $openHouseDate->save();
                }
            }
            session()->forget('propertyId');
            return redirect()->back()->withSuccess('Property Added Successfully');
        }
        $request->session()->put('alert', 'danger');
        return redirect()->back()->withErrors(['errors'=>'Property Not Added Successfully']);  

    }

    public function update(Request $request){

        $controlls = $request->all();
        //dd($controlls);
        $id=$request->id;
        $rules = array(
            "property_type" => "required|max:150",
            "sub_property_type" => "nullable|max:150",
            "address" => "required|min:10|max:20",
            "lat" => "required",
            "lng" => "required",
            'unit' => "nullable|max:150",
            "year_build"=>"nullable|max:4",
            "pet_friendly"=>"nullable",
            "furnished"=>"nullable",
            "short_term"=>"nullable",
            "lease_term"=>"required",
            "parking_type"=>"nullable",
            //"parking_spots"=>"required",
            "description"=>"nullable|max:5000",
            "untility_name"=>"nullable",
            "category_name"=>"nullable",
            "bedroom.*"=>"required",
            "bathroom.*"=>"required",
            "rent.*"=>"required",
            "unit_size.*"=>"nullable",
            "availability.*"=>"required",
            "commercial_building_name"=>"nullable",
            "building_feature_name"=>"nullable",
            "unit_feature_name"=>"nullable",
            "near_by_name"=>"nullable",
            "date"=>"nullable",
            "start_time"=>"nullable",
            "end_time"=>"nullable",
        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        $property =Property::find($id);
        //dd($property);
        $property->property_type = $request->property_type;
        //$property->sub_property_type = $request->sub_property_type;
        if(!empty($request->sub_property_type)){
            $property->sub_property_type = $request->sub_property_type;
        }else{
            $property->sub_property_type =null;
        }
        $property->address = $request->address;
        $property->lat = $request->lat;
        $property->lng = $request->lng;
        $property->unit = $request->unit;
        $property->year_build = $request->year_build;
        $property->pet_friendly = $request->pet_friendly;
        $property->furnished = $request->furnished;
        $property->lease_term = $request->lease_term;
        $property->parking_type = $request->parking_type;
        $property->short_term = $request->short_term;
        $property->description = $request->description;
        $property->is_active = 1;
        $property->is_updated = 1;
        if($property->save()){
            UtilityInclude::where("property_id",$property->id)->delete();
            for ($i=0; $i <count($request->untility_name) ; $i++) { 
                $utilityInclude=new UtilityInclude;
                $utilityInclude->property_id=$property->id;
                $utilityInclude->name=$request->untility_name[$i];
                $utilityInclude->save();
            }
            Category::where("property_id",$property->id)->delete();
            for ($i=0; $i <count($request->category_name) ; $i++) { 
                $category=new Category;
                $category->property_id=$property->id;
                $category->name=$request->category_name[$i];
                $category->save();
            }
            Floor::where("property_id",$property->id)->whereNotIn('id',$request->floor_id)->delete();
            for ($i=0; $i <count($request->bedroom) ; $i++) { 

                if($request->floor_id[$i]!=null){
                    $floor=Floor::where('id',$request->floor_id[$i])->first();
                }else{
                    $floor=new Floor;
                    $floor->property_id=$property->id;
                }
                $floor->bedroom=$request->bedroom[$i];
                $floor->bathroom=$request->bathroom[$i];
                $floor->rent=$request->rent[$i];
                $floor->unit_size=$request->unit_size[$i];
                $floor->availability=$request->availability[$i];
                $floor->save();
            }
            CommercialBuilding::where("property_id",$property->id)->delete();
            for ($i=0; $i <count($request->commercial_building_name) ; $i++) { 
                $commercialBuilding=new CommercialBuilding;
                $commercialBuilding->property_id=$property->id;
                $commercialBuilding->name=$request->commercial_building_name[$i];
                $commercialBuilding->save();
            }
            BuildingFeature::where("property_id",$property->id)->delete();
            for ($i=0; $i <count($request->building_feature_name) ; $i++) { 
                $buildingFeature=new BuildingFeature;
                $buildingFeature->property_id=$property->id;
                $buildingFeature->name=$request->building_feature_name[$i];
                $buildingFeature->save();
            }
            UnitFeature::where("property_id",$property->id)->delete();
            for ($i=0; $i <count($request->unit_feature_name) ; $i++) { 
                $unitFeature=new UnitFeature;
                $unitFeature->property_id=$property->id;
                $unitFeature->name=$request->unit_feature_name[$i];
                $unitFeature->save();
            }
            NearBy::where("property_id",$property->id)->delete();
            for ($i=0; $i <count($request->near_by_name) ; $i++) { 
                $nearBy=new NearBy;
                $nearBy->property_id=$property->id;
                $nearBy->name=$request->near_by_name[$i];
                $nearBy->save();
            }
            if(!empty($request->date) && $request->date[0]!=null){
                OpenHouseDate::where("property_id",$property->id)->whereNotIn('id',$request->open_house_id)->delete();
                for ($i=0; $i <count($request->date) ; $i++) { 
                    if($request->open_house_id[$i]!=null){
                        $openHouseDate=OpenHouseDate::where('id',$request->open_house_id[$i])->first();
                    }else{
                        $openHouseDate=new OpenHouseDate;
                        $openHouseDate->property_id=$property->id;
                    }
                    
                    $openHouseDate->date=$request->date[$i];
                    $openHouseDate->start_time=$request->start_time[$i];
                    $openHouseDate->end_time=$request->end_time[$i];
                    $openHouseDate->save();
                }
            }
            session()->forget('propertyId');
            return redirect()->back()->withSuccess('Property Updated Successfully');
        }
        $request->session()->put('alert', 'danger');
        return redirect()->back()->withErrors(['errors'=>'Property Not Updated Successfully']);  

    }

    public function delete($id){
        $property=Property::where('id',$id)->delete();
        return redirect()->back()->withSuccess('Property Delete Successfully');
        //return view('',compact('customer'));
    }

    public function permission(Request $request){
    
        $user =Property::find($request->id);
        $status="";
        if($user->is_active==1){
          $user->is_active =0;
          $status="Deactive";
        }else{
          $user->is_active =1;
          $status="Active"; 
        }
        if($user->save()){
            return redirect()->back()->withSuccess("Property $status Successfully");
            //return redirect()->route('user.login');
            // Mail::send('user.email.verify_code', ['verify_code' =>$verify_code], function ($message) use($request) {
            //     $message->from('emailforhnh@gmail.com', 'Confirmation');
            //     $message->to($request->email);
            //     $message->subject('Verify Code');
            // });
            // return redirect()->route('user.verify',$user->id);
        }
        $request->session()->put('alert', 'danger');
        return redirect()->back()->withErrors(['errors'=>'Property Permission  Not Changed']);  

    }

    public function statusChange(Request $request){
        $property = Property::where('id',$request->id)->first();
        $property->is_active=$request->status;
        $property->save();
        return response(["status"=>true,"success" => "status updated"], 200);
    }

    public function fileStore(Request $request)
    {
        // $image = $request->file('file');
        // $imageName = $image->getClientOriginalName();
        // $image->move(public_path('images'),$imageName);
        if ($request->file('file')) {
            $file = $request->file('file');
            $fileType = "image-";
            //$filename = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            //$filename = $fileType.time()."-".rand().".".$file->getClientOriginalExtension();
            $file->storeAs("/public/propertyimage", $filename);
        }
        $propertyImage = new PropertyImage();
        $propertyImage->property_id=session()->get('propertyId');
        $propertyImage->image = $filename;
        $propertyImage->save();
        return response()->json(['success'=>$filename]);
    }

    public function remvoeFile(Request $request)
    {
        $name =  $request->get('name');
        $property_id=session()->get('propertyId');
        PropertyImage::where(['image' => $name])->where(['property_id' => $property_id])->delete();
        return $name;
    }

    public function remvoeImageByid(Request $request)
    {
        $id =  $request->get('id');
        PropertyImage::where(['id' => $id])->delete();
        return $id;
    }
}

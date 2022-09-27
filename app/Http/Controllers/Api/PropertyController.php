<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\{Property,UtilityInclude,Category,Floor,BuildingFeature,CommercialBuilding,NearBy,UnitFeature,OpenHouseDate,PropertyImage};
use Illuminate\Support\Facades\{DB,Mail,Auth,Hash};

class PropertyController extends Controller
{
    public function index(){
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/storage/propertyimage/";
        $property=Property::with('propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate')->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
        return response()->json(['property'=>$property,'imagepath'=>$actual_link],200);
    }
    
    public function edit($id){
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/storage/propertyimage/";
        $property=Property::with('propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate')->where('id',$id)->first();
        session()->put('propertyId', $id);
        return response()->json(['property'=>$property,'imagepath'=>$actual_link],200);
    }
    public function searchPropertyByAddress(Request $req)
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/storage/propertyimage/";
       
        $latitude=50.000000;
        $langitude=-85.000000;

        $property=Property::with('propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate')->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->where('address','LIKE',"%".$req->address."%")->get();
        $popertyid=Property::where('address','LIKE',"%".$req->address."%")->first();
        if(!empty($popertyid)){
            $latitude  = $popertyid->lat;
            $langitude  = $popertyid->lng;
        }
        //dd($develops);
        $total = count($property);
        if(!empty($property)){
            return response(["status"=>true,"success" => "Property Get Successfully",'property'=>$property,'latitude'=>$latitude,'langitude'=>$langitude,'total'=>$total,'imagepath'=>$actual_link], 200);
        }
        return response(["status"=>false,"success" => "Property Not Get Successfully",'property'=>$property,'latitude'=>$latitude,'langitude'=>$langitude,'total'=>$total,'imagepath'=>$actual_link], 422);

    }

    public function searchPropertyByAdvanceFilter(Request $req)
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/storage/propertyimage/";
       
        $latitude=50.000000;
        $langitude=-85.000000;
        $startRent=0;
        $endRent=0;
        $bedroom=0;
        $property_type=[];

        if(!empty($req->startRent)){
            $startRent =$req->startRent; 
        }

        if(!empty($req->endRent)){
            $endRent =$req->endRent; 
        }

        if(!empty($req->bedroom)){
            $bedroom =$req->bedroom; 
        }

        if(!empty($req->property_type)){
            $property_type =$req->property_type; 
        }
        

        if ( strstr( $bedroom, '+' ) ) {
            $bedroom=4;
            if(!empty($req->property_type)){
                if(!empty($req->startRent) && !empty($req->bedroom)){
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereHas('floor', function ($query) use ($startRent,$endRent,$bedroom) {
                        $query->whereBetween('rent',array($startRent,$endRent))
                        ->where('bedroom','>=', $bedroom);
                    })->whereIn("property_type",$property_type)->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
               }elseif(!empty($req->startRent)){
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereHas('floor', function ($query) use ($startRent,$endRent) {
                        $query->whereBetween('rent',array($startRent,$endRent));
                        //->where('bedroom','>=', $bedroom);
                    })->whereIn("property_type",$property_type)->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
               }elseif(!empty($req->bedroom)){
                        $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                        ])->whereHas('floor', function ($query) use ($bedroom) {
                            $query->where('bedroom','>=', $bedroom);
                        })->whereIn("property_type",$property_type)->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
                }else{
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereIn("property_type",$property_type)->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
                }

            }else{
                if(!empty($req->startRent) && !empty($req->bedroom)){
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereHas('floor', function ($query) use ($startRent,$endRent,$bedroom) {
                        $query->whereBetween('rent',array($startRent,$endRent))
                        ->where('bedroom','>=', $bedroom);
                    })->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
               }elseif(!empty($req->startRent)){
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereHas('floor', function ($query) use ($startRent,$endRent) {
                        $query->whereBetween('rent',array($startRent,$endRent));
                        //->where('bedroom','>=', $bedroom);
                    })->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
               }elseif(!empty($req->bedroom)){
                        $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                        ])->whereHas('floor', function ($query) use ($bedroom) {
                            $query->where('bedroom','>=', $bedroom);
                        })->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
                }else{
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
                }
            }
            
        }else{

            if(!empty($req->property_type)){
                if(!empty($req->startRent) && !empty($req->bedroom)){
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereHas('floor', function ($query) use ($startRent,$endRent,$bedroom) {
                        $query->whereBetween('rent',array($startRent,$endRent))
                        ->where('bedroom', $bedroom);
                    })->whereIn("property_type",$property_type)->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
               }elseif(!empty($req->startRent)){
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereHas('floor', function ($query) use ($startRent,$endRent) {
                        $query->whereBetween('rent',array($startRent,$endRent));
                        //->where('bedroom','>=', $bedroom);
                    })->whereIn("property_type",$property_type)->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
               }elseif(!empty($req->bedroom)){
                        $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                        ])->whereHas('floor', function ($query) use ($bedroom) {
                            $query->where('bedroom', $bedroom);
                        })->whereIn("property_type",$property_type)->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
                }else{
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereIn("property_type",$property_type)->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
                }

            }else{
                if(!empty($req->startRent) && !empty($req->bedroom)){
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereHas('floor', function ($query) use ($startRent,$endRent,$bedroom) {
                        $query->whereBetween('rent',array($startRent,$endRent))
                        ->where('bedroom', $bedroom);
                    })->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
               }elseif(!empty($req->startRent)){
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->whereHas('floor', function ($query) use ($startRent,$endRent) {
                        $query->whereBetween('rent',array($startRent,$endRent));
                        //->where('bedroom','>=', $bedroom);
                    })->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
               }elseif(!empty($req->bedroom)){
                        $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                        ])->whereHas('floor', function ($query) use ($bedroom) {
                            $query->where('bedroom', $bedroom);
                        })->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
                }else{
                    $property=Property::with(['propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate','floor'
                    ])->where("is_updated2","!=",false)->where("is_updated","!=",false)->where("is_active","!=",0)->get();
                }
            }
        }
        $popertyid=Property::first();
        if(!empty($popertyid)){
            $latitude  = $popertyid->lat;
            $langitude  = $popertyid->lng;
        }
        //dd($develops);
        $total = count($property);
        if(!empty($property)){
            return response(["status"=>true,"success" => "Property Get Successfully",'property'=>$property,'latitude'=>$latitude,'langitude'=>$langitude,'total'=>$total,'imagepath'=>$actual_link], 200);
        }
        return response(["status"=>false,"success" => "Property Not Get Successfully",'property'=>$property,'latitude'=>$latitude,'langitude'=>$langitude,'total'=>$total,'imagepath'=>$actual_link], 422);

    }
}

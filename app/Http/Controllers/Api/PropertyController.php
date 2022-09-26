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
        $property=Property::with('propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate')->where("is_updated2","!=",false)->where("is_updated","!=",false)->get();
        return response()->json(['property'=>$property],200);
    }
    
    public function edit($id){
        $property=Property::with('propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate')->where('id',$id)->first();
        session()->put('propertyId', $id);
        return response()->json(['property'=>$property],200);
    }
    public function searchPropertyByAddress(Request $req)
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/storage/propertyimage/";
       
        $latitude=50.000000;
        $langitude=-85.000000;

        $property=Property::with('propertyImage','buildingFeature','category','commercialBuilding','floor','nearBy','unitFeature','utilityInclude','openHouseDate')->where("is_updated2","!=",false)->where("is_updated","!=",false)->where('address','LIKE',"%".$req->address."%")->get();
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
}

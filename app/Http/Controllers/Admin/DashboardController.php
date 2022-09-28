<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Property};

class DashboardController extends Controller
{
    public function index(){
        $landlord=User::where("role_id",2)->count();
        $rental=User::where("role_id",3)->count();
        $property=Property::where("is_updated2","!=",false)->where("is_updated","!=",false)->count();
        return view('Admin.pages.dashboard',compact('landlord','rental','property'));
    }
}

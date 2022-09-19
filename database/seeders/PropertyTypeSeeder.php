<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyType;
use App\Models\SubPropertyType;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $apartment_arr=["Apartment","Studio","Backlor","Basement","Duplex","Loft"];
        $house_arr=["House","Town House","Multi-Unit","Cabin","Cottage"];
        $room_arr=["Private Room","Shared Room"];

        $propertyType=new PropertyType;
        $propertyType->name="Condo";
        $propertyType->save();


        $propertyType2=new PropertyType;
        $propertyType2->name="Apartment";
        $propertyType2->save();

        foreach($apartment_arr as $apartment_arr_val){
          $subPropertyType=new SubPropertyType;
          $subPropertyType->property_type_id=$propertyType2->id;
          $subPropertyType->name=$apartment_arr_val;
          $subPropertyType->save();
        }


        $propertyType3=new PropertyType;
        $propertyType3->name="House";
        $propertyType3->save();

        foreach($house_arr as $house_arr_val){
            $subPropertyType2=new SubPropertyType;
            $subPropertyType2->property_type_id=$propertyType3->id;
            $subPropertyType2->name=$house_arr_val;
            $subPropertyType2->save();
        }


        $propertyType4=new PropertyType;
        $propertyType4->name="Room";
        $propertyType4->save();

        foreach($room_arr as $room_arr_val){
            $subPropertyType3=new SubPropertyType;
            $subPropertyType3->property_type_id=$propertyType4->id;
            $subPropertyType3->name=$room_arr_val;
            $subPropertyType3->save();
        }

    }
}

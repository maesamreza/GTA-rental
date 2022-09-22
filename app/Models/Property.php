<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function propertyImage()
    {
        return $this->hasMany(PropertyImage::class, 'property_id','id');
    }

    public function buildingFeature()
    {
        return $this->hasMany(BuildingFeature::class, 'property_id','id');
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'property_id','id');
    }

    public function commercialBuilding()
    {
        return $this->hasMany(CommercialBuilding::class, 'property_id','id');
    }

    public function floor()
    {
        return $this->hasMany(Floor::class, 'property_id','id');
    }

    public function nearBy()
    {
        return $this->hasMany(NearBy::class, 'property_id','id');
    }

    public function openHouseDate()
    {
        return $this->hasMany(OpenHouseDate::class, 'property_id','id');
    }

    public function unitFeature()
    {
        return $this->hasMany(UnitFeature::class, 'property_id','id');
    }

    public function utilityInclude()
    {
        return $this->hasMany(UtilityInclude::class, 'property_id','id');
    }
}

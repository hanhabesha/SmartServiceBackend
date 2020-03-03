<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCatagories extends Model
{
    protected $primaryKey = "serviceCatagoryId";
    public $incrementing = false;
    protected $fillable = [
        'serviceCatagoryId', 'name', 'description',
    ];

    public function serviceProviders()
    {
        return $this->hasMany('App\CHRLServiceProviders', 'serviceCatagoryId', 'serviceCatagoryId');
    }
    
}

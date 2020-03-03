<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CHRLServiceProviders extends Model
{
    protected $primaryKey = "serviceProviderId";
    public $incrementing = false;
    //
    protected $fillable = [
        'serviceProviderId', 'serviceCatagoryId', 'name', 'isOpen', 'email', 'phone', 'description', 'webLink', 'logo', 'openningHour', 'closingHour',
    ];
    public function location()
    {
        return $this->hasOne('App\Location', 'serviceProviderId', 'serviceProviderId');
    }
    public function user()
    {
        return $this->hasMany('App\User', 'serviceProviderId', 'serviceProviderId');
    }
    public function serviceCatagory()
    {
        return $this->belongsTo('App\ServiceCatagories', 'serviceCatagoryId', 'serviceCatagoryId');
    }
    public function menuItems()
    {
        return $this->hasMany('App\MenuItems', 'serviceProviderId', 'serviceProviderId');
    }
    public function happyHourItem()
    {
        return $this->hasMany('App\HappyHourItem', 'serviceProviderId', 'serviceProviderId');
    }
    public function happyHourGroup()
    {
        return $this->hasMany('App\HappyHourItemGroup', 'serviceProviderId', 'serviceProviderId');
    }
    public function happyHourMenu()
    {
        return $this->hasMany('App\HappyHourMenu', 'serviceProviderId', 'serviceProviderId');
    }
    public function tables()
    {
        return $this->hasMany('App\Tables', 'serviceProviderId', 'serviceProviderId');
    }
    public function customerOrders()
    {
        return $this->hasMany('App\CustomerOrders', 'serviceProviderId', 'serviceProviderId');
    }
    public function rate()
    {
        return $this->hasMany('App\SPRating', 'serviceProviderId', 'serviceProviderId');
    }
    public function isOpen()
    {
        $openningHour = Carbon::parse($this->openningHour);
        $closingHour = Carbon::parse($this->closingHour);
        $now = Carbon::now();
        if ($now->gte($openningHour) && $now->lte($closingHour)) {
            $data = [
                'isOpen' => true,
            ];
            return response()->json($data, 200);
        }
        $data = [
            'isOpen' => false,
        ];

        return response()->json($data, 200);
    }
}

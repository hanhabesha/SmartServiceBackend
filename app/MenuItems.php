<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    protected $primaryKey = "itemId";
    public $incrementing = false;
    protected $fillable = [
        'itemId', 'itemsGroupId', 'picture', 'availability', 'name', 'price', 'description', 'serviceProviderId',
    ];
    public function serviceProvider()
    {
        return $this->belongsTo('App\CHRLServiceProviders', 'serviceProviderId', 'serviceProviderId');
    }
    public function itemsGroup()
    {
        return $this->belongsTo('App\MenuItemGroup', 'itemsGroupId', 'itemsGroupId');
    }
    public function happyHourItem()
    {
        return $this->hasOne('App\HappyHourItem', 'itemId', 'itemId');
    }
}

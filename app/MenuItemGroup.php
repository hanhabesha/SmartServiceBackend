<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItemGroup extends Model
{
    protected $primaryKey = "ItemsGroupId";
    public $incrementing = false;
    protected $fillable = [
        'ItemsGroupId', 'picture', 'name', 'description',
    ];
    public function menuItems()
    {
        return $this->hasMany('App\MenuItems', 'itemsGroupId', 'itemsGroupId');
    }
    public function happyHourGroup()
    {
        return $this->hasMany('App\HappyHourItemGroup', 'itemsGroupId', 'itemsGroupId');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficialPartners extends Model
{
    protected $primaryKey = "partnerId";
    public $incrementing = false;
    protected $fillable = [
        'name', 'phone', 'email', 'description', 'partnerId','webLink','address'
    ];
    public function OfficialAds()
    {
        return $this->hasMany('App\OfficialAds', 'partnerId', 'partnerId');
    }
}

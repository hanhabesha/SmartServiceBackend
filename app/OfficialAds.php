<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficialAds extends Model
{
    protected $primaryKey = "adsId";
    public $incrementing = false;
    protected $fillable = [
        'adsId', 'link', 'poster', 'title', 'description', 'partnerId','status'
    ];
    public function OfficialPartner()
    {
        return $this->hasOne('App\OfficialPartners', 'partnerId', 'partnerId');
    }
}

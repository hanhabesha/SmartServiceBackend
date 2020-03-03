<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingSPRequest extends Model
{
    protected $primaryKey = "serviceProviderId";
    public $incrementing = false;
    //
    protected $fillable = [
        'serviceProviderId', 'serviceCatagoryId', 'name', 'isOpen', 'email', 'phone', 'description', 'webLink', 'logo', 'openningHour', 'closingHour', 'statusId',
    ];
    public function status()
    {
        return $this->hasOne('App\RequeStstatus', 'statusId', 'statusId');
    }
    public function serviceCatagory()
    {
        return $this->belongsTo('App\ServiceCatagories', 'serviceCatagoryId', 'serviceCatagoryId');
    }
      public function location()
    {
        return $this->hasOne('App\Location', 'serviceProviderId', 'serviceProviderId');
    }
}

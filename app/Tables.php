<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    //serviceProviderId
    protected $primaryKey = "tableId";
    public $incrementing = false;
    protected $fillable = [
        'tableId', 'serviceProviderId', 'tableNumber',
    ];
    public function serviceProvider()
    {
        return $this->belongsTo('App\CHRLServiceProviders', 'serviceProviderId', 'serviceProviderId');
    }
}

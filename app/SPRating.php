<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPRating extends Model
{
    protected $fillable = [
        'serviceProviderId', 'userId', 'rating',
    ];

    protected $casts = array(
        "rating" => "integer",
    );
    public function serviceProvider()
    {
        return $this->belongsTo('App\CHRLServiceProviders', 'serviceProviderId', 'serviceProviderId');
    }
}

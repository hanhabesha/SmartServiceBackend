<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MIRating extends Model
{
     protected $fillable = [
        'itemId', 'userId', 'rating',
    ];
    public function menuItem()
    {
        return $this->belongsTo('App\MenuItems', 'itemId', 'itemId');
    }
}

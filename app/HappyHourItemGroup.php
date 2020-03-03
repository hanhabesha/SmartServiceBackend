<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class HappyHourItemGroup extends Model
{
    protected $primaryKey = "happyHourId";
    public $incrementing = false;
    protected $appends = ['isValid'];

    protected $fillable = [
        'happyHourId', 'itemsGroupId', 'serviceProviderId', 'discountPercent', 'description', 'start', 'end',
    ];
    public function menuItemsGroup()
    {
        return $this->belongsTo('App\MenuItemGroup', 'itemsGroupId', 'itemsGroupId');
    }
    public function serviceProvider()
    {
        return $this->belongsTo('App\CHRLServiceProviders', 'serviceProviderId', 'serviceProviderId');
    }
     public function getIsValidAttribute()
    {
        $start = Carbon::parse($this->start);
        $end = Carbon::parse($this->end);
        $now = Carbon::now();
        // return ' start:' . $start . ' now:' . $now . ' end:' . $end;
        if ($now->gte($start) && $now->lte($end) && $this->recent) {
            return true;
        }return false;
    }
}

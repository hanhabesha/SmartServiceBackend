<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class HappyHourMenu extends Model
{
    protected $primaryKey = "happyHourId";
    public $incrementing = false;
    protected $appends = ['isValid'];
    protected $fillable = [
        'happyHourId', 'serviceProviderId', 'discountPercent', 'description', 'start', 'end', 'isValid',
    ];
    public function serviceProviderMenu()
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

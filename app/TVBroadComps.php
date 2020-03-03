<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TVBroadComps extends Model
{
    protected $primaryKey = "companyId";
    public $incrementing = false;
    protected $fillable = [
        'companyId', 'name', 'email', 'phone', 'description', 'webLink', 'logo',
    ];
    public function location()
    {
        return $this->hasOne('App\TVBroadComps', 'companyId', 'companyId');
    }
}

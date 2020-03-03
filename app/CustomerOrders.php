<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrders extends Model
{
    protected $primaryKey = "orderId";
    public $incrementing = false;
    //
    protected $keyType = 'string';

    public function table()
    {
        return $this->belongsTo('App\Tables', 'tableId', 'tableId');
    }
    public function item()
    {
        return $this->belongsTo('App\MenuItems', 'itemId', 'itemId');
    }
    protected $fillable = [
        'orderId', 'quantity', 'itemId', 'userId', 'description', 'tableId', 'serviceProviderId',
    ];
}

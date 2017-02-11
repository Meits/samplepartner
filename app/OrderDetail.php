<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'order_detail';
    protected $primaryKey = 'id_order';
    
    public function product()
    {
        return $this->hasOne('App\Product','id_product','product_id');
    }
    
}

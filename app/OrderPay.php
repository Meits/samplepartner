<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPay extends Model
{
    //
    
    protected $table = 'order_pay';
    protected $primaryKey = 'id_order';
    
    protected $fillable = ['order_pay'];
    
    
}

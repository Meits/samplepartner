<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $primaryKey = 'id_order';
    
     public function ruleName()
    {
        return $this->hasOne('App\CartRuleLang','id_cart_rule','id_cart_rule');
    }
    
    public function customer()
    {
        return $this->hasOne('App\Customer','id_customer','id_customer');
    }
    
    public function orderPay()
    {
        return $this->hasOne('App\OrderPay','id_order','id_order');
    }
    
    public function orderDetail()
    {
        return $this->hasMany('App\OrderDetail','id_order','id_order');
    }
    
    public function orderState()
    {
        return $this->belongsToMany('App\OrderState', 'order_history', 'id_order', 'id_order_state');
    }
    
    
    

}

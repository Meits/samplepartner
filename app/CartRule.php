<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartRule extends Model
{
    //
    //Сервер: 127.0.0.1:3306

    protected $table = 'cart_rule';
    protected $primaryKey = 'id_cart_rule';
    
    public function orders() {
		return $this->belongsToMany('App\Order','order_cart_rule','id_cart_rule','id_order' );
	}
	
	 public function ruleName()
    {
        return $this->hasOne('App\CartRuleLang','id_cart_rule','id_cart_rule');
    }
	
	
	
    

}

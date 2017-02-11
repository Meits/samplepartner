<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    //
    protected $table = 'order_state';
    protected $primaryKey = 'id_order_state';
    
    public function stateLang()
    {
        return $this->hasOne('App\OrderStateLang','id_order_state','id_order_state');
    }
}

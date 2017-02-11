<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $primaryKey = 'id_customer';
    protected $table = 'customer';
    
    
     public function address()
    {
        return $this->hasMany('App\Address','id_customer','id_customer');
    }
}

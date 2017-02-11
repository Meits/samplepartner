<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    
    protected $table = 'product';
    protected $primaryKey = 'id_product';
    
    public function category()
    {
        return $this->hasOne('App\ProductCategory','id_category','id_category_default');
    }
}

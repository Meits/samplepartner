<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table = 'category_lang';
    protected $primaryKey = 'id_category';
    
    public function discount()
    {
        return $this->hasOne('App\CategoryDiscount','id_category','id_category');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    
    protected $fillable = ['name','text','site','user_id','parent_id','email'];
    
	
	public function user() {
		return $this->belongsTo('App\User');
	}
	
	public function child()
    {
        return $this->hasMany('App\Comment','parent_id');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class IndexController  extends SiteController
{
    //
    public function __construct() {
    	parent::__construct();
    	$this->template = config('settings.theme').'.index';
	}
    
    
    public function index() {
    	
    	
    	//$sideBar = view(config('settings.theme').'.sideBar')->with(['users'=>$users,'cyties'=>$citys])->render();
		
		$comments = Comment::where('parent_id',0)->paginate(5);
		
		//dd($comments->load('child'));
	
		$content = view(config('settings.theme').'.content-index')->with(['comments'=>$comments])->render();
		$this->vars = array_add($this->vars,'content', $content);

    	
		return $this->renderOutput();
	}
}

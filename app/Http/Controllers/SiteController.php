<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Menu;
use Auth;
use Gate;

class SiteController extends Controller
{
    protected $vars = array();
    protected $title = FALSE;
    
    //
    public function __construct() {
		return TRUE;
	}
	
	protected function renderOutput() {
		
		$menu = $this->getMenu();
		$navigation = view(config('settings.theme').'.navigation')->with('menu',$menu)->render();
		$this->vars = array_add($this->vars,'navigation',$navigation);
		
		$footer = view(config('settings.theme').'.footer')->render();
		$this->vars = array_add($this->vars,'footer',$footer);
		
		$this->vars = array_add($this->vars,'title',$this->title);
		
		return view($this->template)->with($this->vars);
	}
	
	protected function getMenu() {	
		
		$menu = Menu::make('MyNavBar', function($menu){

				  $menu->add('Home',array('route'  => 'home'));
				  
				  if(Auth::check()) {
				  	if(Gate::allows('VIEW_ALL')) {
				  		$menu->add('Users',array('route'  => 'users'));
				  		$menu->add('Partner',array('route'  => 'partner'));
					}
				  }
				  

				});
		
		return $menu;
	}
}

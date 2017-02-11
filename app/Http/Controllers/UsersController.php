<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\User;

class UsersController extends SiteController
{
    
    public function __construct() {
    	parent::__construct();
    	
    	$this->template = config('settings.theme').'.users';
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        if(Gate::denies('VIEW_ALL')) {
    		return abort(403);
			//return redirect('/')->with('message','У Вас нет прав для просмотра данного разхдела');
		}
		
		$users = User::all();
		$rules = array();
		foreach($users as $user) {
			$user->rules->load('orders','ruleName');
		}
		//dd($users);
		$content = view(config('settings.theme').'.content-users')->with(['users'=>$users])->render();
		$this->vars = array_add($this->vars,'content', $content);

    	
		return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

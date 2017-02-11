<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('set',function($exp) {
        	list($name,$val) = explode(',',$exp);
        	return "<?php $name = $val; ?>";
        	
        });
        
        DB::listen(function ($query) {
        // echo '<h1>'.$query->sql.'</h1>';
            // dump($query->bindings);
            // $query->time
        });
    
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

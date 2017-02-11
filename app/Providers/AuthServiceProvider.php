<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Policies\UserPolicy;
use App\User;
//use App\Article;
use App\Comment;
use App\Policies\ArticlePolicy;
use App\Policies\CommentPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       User::class => UserPolicy::class,
       Comment::class => CommentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();
        
        $gate->define('VIEW_PARTNER', function ($user) {
            return $user->canDo('VIEW_PARTNER');
        });
        
        $gate->define('VIEW_ALL', function ($user) {
            return $user->canDo('VIEW_ALL');
        });
    }
}

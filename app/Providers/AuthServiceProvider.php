<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Article;
use App\Permission;
use App\Menu;
use App\User;
use App\Policies\ArticlePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\MenusPolicy;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Permission::class => PermissionPolicy::class,
        Menu::class => MenusPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
        $gate->define('VIEW_ADMIN', function ($user) {
        	return $user->canDo('VIEW_ADMIN', FALSE);
        });
        
        $gate->define('VIEW_ADMIN_ARTICLES', function ($user) {
        	return $user->canDo('VIEW_ADMIN_ARTICLES', FALSE);
        });
        
        $gate->define('EDIT_USERS', function ($user) {
        	return $user->canDo('EDIT_USERS', FALSE);
        });
        
        $gate->define('VIEW_ADMIN_MENU', function ($user) {
        	return $user->canDo('VIEW_ADMIN_MENU', FALSE);
        });

        //
    }
}

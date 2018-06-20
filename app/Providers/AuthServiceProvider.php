<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Policies\UserPolicy;
use App\Post;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        //システム開発者only
        Gate::define('system-only', function ($user) {
          return ($user->role == 1);
        });
        //管理者
        Gate::define('admin-higher', function ($user) {
        return ($user->role > 0 && $user->role <= 5);
      });
    //   //一般ユーザ
        Gate::define ('user-higher', function ($user) {
          return ($user->role > 0 && $user->role <= 10);
        });
    }
}

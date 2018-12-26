<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Interfaces\UserRepository::class, \App\Repositories\Eloquents\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\MenuRepository::class, \App\Repositories\Eloquents\MenuRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\RecursiveRelationRepository::class, \App\Repositories\Eloquents\RecursiveRelationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\PermissionRepository::class, \App\Repositories\Eloquents\PermissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\WechatRepository::class, \App\Repositories\Eloquents\WechatRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\PageViewRepository::class, \App\Repositories\Eloquents\PageViewRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\CardViewRepository::class, \App\Repositories\Eloquents\CardViewRepositoryEloquent::class);
        //:end-bindings:
    }
}

<?php

namespace Lthaihv\Book2CRUD\Providers;

use Illuminate\Support\ServiceProvider;
use Lthaihv\Book2CRUD\Providers\RouteServiceProvider;
use Lthaihv\Book2CRUD\Repositories\IBookRepositoryContract;
use Lthaihv\Book2CRUD\Repositories\BookRepository;
use Lthaihv\Book2CRUD\Services\IBookServiceContract;
use Lthaihv\Book2CRUD\Services\BookService;

class Book2CRUDServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $packageName = 'book2-crud';
        
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
 
        //view
        $this->loadViewsFrom(__DIR__.'/../resources/views', $packageName);
        $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/' . $packageName),
            ]);
 
        //migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
 
        /*
        |--------------------------------------------------------------------------
        | Route Providers need on boot() method, others can be in register() method
        |--------------------------------------------------------------------------
        */
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBookRepositoryContract::class, BookRepository::class);
        $this->app->bind(IBookServiceContract::class, BookService::class);
    }
}
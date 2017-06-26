<?php
namespace Lthaihv\Book2CRUD\Providers;

use Illuminate\Surport\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

    protected $namespace = 'Lthaihv\Book2CRUD\Controllers';

    public function boot()
    {
        parrent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
        // $this->mapApiRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(__DIR__ . '/../routes/web.php');
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../routes/api.php');
    }
}
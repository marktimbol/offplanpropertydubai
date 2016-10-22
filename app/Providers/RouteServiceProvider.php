<?php

namespace App\Providers;

use App\Category;
use App\Developer;
use App\Payment;
use App\Photo;
use App\Project;
use App\Type;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->bind('developer',function($key) {
            if ($this->getCurrentRoute()->getPrefix() === '/dashboard') {
                return Developer::findOrFail($key);
            }
            return Developer::whereSlug($key)->first();
        });

        $this->bind('project',function($key) {
            if ($this->getCurrentRoute()->getPrefix() === '/dashboard') {
                return Project::findOrFail($key);
            }
            return Project::whereSlug($key)->first();
        });

        $this->bind('photo', function($key) {
            return Photo::findOrFail($key);
        });

        $this->bind('category', function($id) {
            return Category::findOrFail($id);
        });

        $this->bind('type', function($id) {
            return Type::findOrFail($id);
        });

        $this->bind('payment', function($id) {
            return Payment::findOrFail($id);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}

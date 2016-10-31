<?php

namespace App\Providers;

use App\Brochure;
use App\Category;
use App\City;
use App\Community;
use App\Country;
use App\Developer;
use App\Floorplan;
use App\Payment;
use App\Photo;
use App\Project;
use App\Type;
use App\Video;

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

        $this->bind('developer',function($id) {
            if ($this->getCurrentRoute()->getPrefix() === '/dashboard') {
                return Developer::findOrFail($id);
            }
            return Developer::whereSlug($id)->first();
        });

        $this->bind('project',function($id) {
            if ($this->getCurrentRoute()->getPrefix() === '/dashboard') {
                return Project::findOrFail($id);
            }
            return Project::whereSlug($id)->first();
        });

        $this->bind('community',function($id) {
            if ($this->getCurrentRoute()->getPrefix() === '/dashboard') {
                return Community::findOrFail($id);
            }
            return Community::whereSlug($id)->first();
        });

        $this->bind('photo', function($id) {
            return Photo::findOrFail($id);
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

        $this->bind('brochure', function($id) {
            return Brochure::findOrFail($id);
        });

        $this->bind('video', function($id) {
            return Video::findOrFail($id);
        });

        $this->bind('country', function($id) {
            return Country::findOrFail($id);
        });

        $this->bind('city', function($id) {
            return City::findOrFail($id);
        });
        
        $this->bind('floorplan', function($id) {
            return Floorplan::findOrFail($id);
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

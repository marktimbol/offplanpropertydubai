<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    protected $user;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function signIn()
    {
        $this->user = factory(App\User::class)->create();
        $this->actingAs($this->user);
    }

    public function createDeveloper($attributes = [])
    {
        return factory(App\Developer::class)->create($attributes);
    }

    public function createProject($attributes = [])
    {
        return factory(App\Project::class)->create($attributes);
    }

    public function createFloorplan($attributes = [])
    {
        return factory(App\Floorplan::class)->create($attributes);
    }
}

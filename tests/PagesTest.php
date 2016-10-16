<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_visitor_can_visit_homepage()
    {
    	$this->visit('/')
    		->see('Off Plan Properties');
    }

    public function test_view_projects_on_the_homepage()
    {
    	$developer = factory(App\Developer::class)->create();
    	$project = factory(App\Project::class)->make([
    		'name'	=> 'Villa Nova'
    	]);
    	$developer->projects()->save($project);

    	$this->visit('/')
    		->see('Villa Nova');
    }
}

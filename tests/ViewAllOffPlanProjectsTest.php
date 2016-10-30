<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewAllOffPlanProjectsTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_displays_all_the_offplan_projects()
    {
    	$project = factory(App\Project::class)->create([
    		'name'	=> 'Villanova'
    	]);
    	
    	$this->visit('/projects')
    		->see('Villanova');
    }
}

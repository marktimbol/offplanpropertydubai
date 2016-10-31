<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageProjectFloorplansTest extends TestCase
{
	use DatabaseMigrations;

	public function setUp()
	{
		parent::setUp();

		$this->signIn();
	}

    public function test_an_admin_can_view_all_the_floorplans_of_the_project()
    {
    	$developer = $this->createDeveloper([
    		'name'	=> 'Emaar'
    	]);

    	$project = $this->createProject([
    		'developer_id'	=> $developer->id,
    		'name'	=> 'Emaar Park Point'
    	]);

    	$floorplan = $this->createFloorplan([
    		'project_id'	=> $project->id,
    		'title'	=> 'Floorplan Side View'
    	]);

    	$url = sprintf('/dashboard/developers/%s/projects/%s', $developer->id, $project->id);
    	$this->visit($url)
    		->see('Floorplan Side View');
    }

    public function test_an_admin_can_update_floorplan_information_of_the_project()
    {
    	$developer = $this->createDeveloper([
    		'name'	=> 'Emaar'
    	]);

    	$project = $this->createProject([
    		'developer_id'	=> $developer->id,
    		'name'	=> 'Emaar Park Point'
    	]);

    	$floorplan = $this->createFloorplan([
    		'project_id'	=> $project->id,
    		'title'	=> 'Floorplan Side View'
    	]);

    	$endpoint = sprintf('/dashboard/developers/%s/projects/%s/floorplans/%s', $developer->id, $project->id, $floorplan->id);
    	
    	$response = $this->put($endpoint, [
    		'title'	=> 'Floorplan Sideview'
    	]);

		$this->seeInDatabase('floorplans', [
			'id'	=> $floorplan->id,
			'project_id'	=> $project->id,
			'title'	=> 'Floorplan Sideview'
		]);
    }
}

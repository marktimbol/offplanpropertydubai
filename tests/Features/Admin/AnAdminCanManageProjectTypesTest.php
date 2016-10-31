<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageProjectTypesTest extends TestCase
{
	use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }
    
    public function test_an_admin_can_attach_type_to_a_project()
    {
    	$developer = factory(App\Developer::class)->create();
    	$project = factory(App\Project::class)->make([
    		'developer_id'	=> $developer->id
    	]);
    	$developer->projects()->save($project);

    	$url = sprintf('/dashboard/developers/%s/projects/%s/types', $developer->id, $project->id);

		$response = $this->post($url, [
			'type_id'	=> 1
		]);

		$this->seeInDatabase('project_types', [
			'project_id'	=> $project->id,
			'type_id'	=> '1'
		]);
    }

    public function test_an_admin_can_detach_type_to_a_project()
    {
    	$developer = factory(App\Developer::class)->create();
    	$project = factory(App\Project::class)->make([
    		'developer_id'	=> $developer->id
    	]);
    	$developer->projects()->save($project);

    	$type = factory(App\Type::class)->make();
    	$project->types()->attach($type);

    	$url = sprintf('/dashboard/developers/%s/projects/%s/types/%s', $developer->id, $project->id, $type->id);
		$this->delete($url);

		$this->dontSeeInDatabase('project_types', [
			'project_id'	=> $project->id,
			'type_id'	=> $type->id
		]);
    }
}

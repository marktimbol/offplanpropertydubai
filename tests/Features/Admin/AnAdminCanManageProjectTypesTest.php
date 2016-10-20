<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageProjectTypesTest extends TestCase
{
	use DatabaseMigrations;

	protected $user;

	protected function signIn()
	{
    	$this->user = factory(App\User::class)->create();
    	$this->actingAs($this->user);
	}

    public function test_an_admin_can_attach_type_to_a_project()
    {
    	$this->signIn();

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
}

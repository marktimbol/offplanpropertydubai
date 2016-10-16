<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageDeveloperProjectsTest extends TestCase
{
	use DatabaseMigrations;

	protected $user;

	protected function signIn()
	{
    	$this->user = factory(App\User::class)->create();
    	$this->actingAs($this->user);
	}

    public function test_an_admin_can_view_all_the_projects_of_the_developer()
    {
    	$this->signIn();

    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar'
    	]);
    	$project = factory(App\Project::class)->make([
    		'name'	=> 'Emaar Park Point'
    	]);

    	$developer->projects()->save($project);

    	$this->visit('/dashboard/developers/'.$project->id)
    		->see($developer->name)
    		->see($project->name);
    }

    public function test_an_admin_can_add_a_project_to_a_developer()
    {
    	$this->signIn();

    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar'
    	]);

    	$this->visit('/dashboard/developers/'.$developer->id.'/projects/create')
    		->type('Emaar Park Point', 'name')
    		->press('Save')

    		->seeInDatabase('projects', [
    			'developer_id'	=> $developer->id,
    			'name'	=> 'Emaar Park Point'
    		]);
    }

    public function test_an_admin_can_update_a_project_information()
    {
    	$this->signIn();

    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar'
    	]);

    	$project = factory(App\Project::class)->make([
    		'name'	=> 'Emaar Park Points'
    	]);

    	$developer->projects()->save($project);

    	$this->visit(sprintf('/dashboard/developers/%s/projects/%s/edit', $developer->id, $project->id))
    		->type('Emaar Park Point', 'name')
    		->press('Update')

    		->seeInDatabase('projects', [
    			'id'	=> $project->id,
    			'name'	=> 'Emaar Park Point'
    		]);	
    }

    public function test_an_admin_can_remove_a_project_from_a_developer()
    {
    	$this->signIn();

    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar'
    	]);

    	$project = factory(App\Project::class)->make([
    		'name'	=> 'Emaar Park Point'
    	]);

    	$developer->projects()->save($project);

    	$this->visit(sprintf('/dashboard/developers/%s/projects/%s', $developer->id, $project->id))
    		->see($project->name)
    		->press('Delete')

    		->dontSeeInDatabase('projects', [
    			'id'	=> $project->id
    		]);	
    }
}

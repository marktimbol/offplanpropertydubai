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

    	$this->visit('/dashboard/developers/'.$developer->id)
    		->see($developer->name)
    		->see($project->name);
    }

    public function test_an_admin_can_add_a_project_to_a_developer()
    {
    	$this->signIn();

        $community = factory(App\Community::class)->create();

    	$developer = factory(App\Developer::class)->create([
            'country_id'    => $community->city->country->id,
            'name'  => 'Emaar',
    	]);

        $url = '/dashboard/developers/'.$developer->id.'/projects/';
        $this->post($url, [
            'community_id'  => $community->id,
            'name'  => 'Emaar Park Point',
            'title' => 'The Famous Emaar Park Point',
            'country'   => 'UAE',
            'city'  => 'Dubai',
            'community' => 'Dubai Marina',
            'latitude'  => '3.1415',
            'longitude' => '3.1416',
            'expected_completion_date' => 'February 2019',
            'dld_project_completion_link' => 'http://google.com',
            'project_escrow_account_details_link' => 'http://gmail.com',
            'description'   => 'The description'
        ]);

		$this->seeInDatabase('projects', [
            'developer_id'  => $developer->id,
			'community_id'	=> $community->id,
            'name'  => 'Emaar Park Point',
            'title'  => 'The Famous Emaar Park Point',
            'slug'  => 'the-famous-emaar-park-point',

            'country'   => 'UAE',
            'city'      => 'Dubai',
            'community' => 'Dubai Marina',

            'latitude'  => '3.1415',
            'longitude' => '3.1416',
            
            'expected_completion_date' => 'February 2019',

            'dld_project_completion_link' => 'http://google.com',
            'project_escrow_account_details_link'   => 'http://gmail.com',

			'description'	=> 'The description'
		]);
    }

    public function test_an_admin_can_update_a_project_information()
    {
    	$this->signIn();

        $community = factory(App\Community::class)->create();

        $developer = factory(App\Developer::class)->create([
            'country_id'    => $community->city->country->id,
            'name'  => 'Emaar',
            'slug'  => 'emaar'
        ]);

    	$project = factory(App\Project::class)->make([
    		'name'	=> 'Emaar Park Points',
            'title' => 'Famous Emaar'
    	]);

    	$developer->projects()->save($project);
        
        $url = sprintf('/dashboard/developers/%s/projects/%s', $developer->id, $project->id);
        $this->put($url, [
            'name'  => 'Emaar Park Point',
            'title' => 'The Famous Emaar Park Point',
            'country'   => 'UAE',
            'city'  => 'Dubai',
            'community' => 'Dubai Marina',
            'latitude'  => '3.1415',
            'longitude' => '3.1416',
            'expected_completion_date' => 'February 2019',
            'dld_project_completion_link' => 'http://google.com',
            'project_escrow_account_details_link' => 'http://gmail.com',
            'description'   => 'The description'
        ]);

		$this->seeInDatabase('projects', [
			'id'	=> $project->id,
            'name'  => 'Emaar Park Point',
            'title'  => 'The Famous Emaar Park Point',
            'slug'  => 'the-famous-emaar-park-point',

            'country'   => 'UAE',
            'city'      => 'Dubai',
            'community' => 'Dubai Marina',

            'latitude'  => '3.1415',
            'longitude' => '3.1416',
            
            'expected_completion_date' => 'February 2019',

            'dld_project_completion_link' => 'http://google.com',
            'project_escrow_account_details_link'   => 'http://gmail.com',

            'description'   => 'The description'
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

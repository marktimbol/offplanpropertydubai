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

    	$developer = factory(App\Developer::class)->create([
            'name'  => 'Emaar',
    	]);

    	$this->visit('/dashboard/developers/'.$developer->id.'/projects/create')
            ->see(sprintf('Add Project to %s', $developer->name))
            ->type('Emaar Park Point', 'name')
            ->type('The Famous Emaar Park Point', 'title')
            
            ->type('UAE', 'country')
            ->type('Dubai', 'city')
            ->type('Dubai Marina', 'community')

            ->type('3.1415', 'latitude')
            ->type('3.1416', 'longitude')

            // ->select('Residential', 'type')
            ->type('*February 2019', 'expected_completion_date')
            ->type('http://google.com', 'dld_project_completion_link')
            ->type('http://gmail.com', 'project_escrow_account_details_link')
    		->type('The description', 'description')
    		->press('Save')

    		->seeInDatabase('projects', [
    			'developer_id'	=> $developer->id,
                'name'  => 'Emaar Park Point',
                'title'  => 'The Famous Emaar Park Point',
                'slug'  => 'the-famous-emaar-park-point',

                'country'   => 'UAE',
                'city'      => 'Dubai',
                'community' => 'Dubai Marina',

                'latitude'  => '3.1415',
                'longitude' => '3.1416',
                
                'expected_completion_date' => '*February 2019',

                // 'type'  => 'Residential',

                'dld_project_completion_link' => 'http://google.com',
                'project_escrow_account_details_link'   => 'http://gmail.com',

    			'description'	=> 'The description'
    		]);
    }

    public function test_an_admin_can_update_a_project_information()
    {
    	$this->signIn();

    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar',
            'slug'  => 'emaar'
    	]);

    	$project = factory(App\Project::class)->make([
    		'name'	=> 'Emaar Park Points',
            'title' => 'Famous Emaar'
    	]);

    	$developer->projects()->save($project);
        
    	$this->visit(sprintf('/dashboard/developers/%s/projects/%s/edit', $developer->id, $project->id))
            ->type('Emaar Park Point', 'name')
            ->type('New Title', 'title')
            ->type('New Country', 'country')
            ->type('New City', 'city')
            ->type('New Community', 'community')
            ->type('3.1', 'latitude')
            ->type('3.2', 'longitude')
            ->type('http://google.com', 'dld_project_completion_link')
            ->type('http://gmail.com', 'project_escrow_account_details_link')
            ->type('New Description', 'description')
    		->press('Update')

    		->seeInDatabase('projects', [
    			'id'	=> $project->id,
                'name'  => 'Emaar Park Point',
                'title' => 'New Title',
                'slug'  => 'new-title',
                'country'   => 'New Country',
                'city'   => 'New City',
                'community' => 'New Community',
                'latitude'  => '3.1',
    			'longitude'	=> '3.2',
                'dld_project_completion_link'   => 'http://google.com',
                'project_escrow_account_details_link'   => 'http://gmail.com',
                'description'   => 'New Description'
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

<?php

use App\Project;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTranslationsTest extends TestCase
{
	use DatabaseMigrations;

	public function setUp()
	{
		parent::setUp();

		$this->signIn();
	}

    public function test_create_project_details_translations()
    {
        $project = factory(App\Project::class)->create([
            'name'  => 'The name',
            'title' => 'The title',
            'price' => 'AED 2,000,000',
            'expected_completion_date'  => 'January 2019',
            'description'   => 'The description'
        ]);

        $this->seeInDatabase('project_translations', [
            'project_id'    => $project->id,
            'locale'    => 'en',
            'name'  => 'The name',
            'title' => 'The title',
            'price' => 'AED 2,000,000',
            'expected_completion_date'  => 'January 2019',
            'description'   => 'The description'
        ]);

    	$endpoint = '/dashboard/projects/'.$project->id.'/translations';
    	$response = $this->post($endpoint, [
            'locale'    => 'ar',
    		'name'	=> 'Arabic Name',
    		'title'	=> 'Arabic Title',
            'price' => 'AED 20,000',
    		'expected_completion_date'	=> 'January 2019',
    		'description'	=> 'Arabic Description'
    	]);

    	$this->seeInDatabase('project_translations', [
            'project_id'    => 1,
            'locale'    => 'ar',
            'name'  => 'Arabic Name',
            'title' => 'Arabic Title',
            'price' => 'AED 20,000',
            'expected_completion_date'  => 'January 2019',
            'description'   => 'Arabic Description' 
    	]);

        $this->seeInDatabase('project_translations', [
            'project_id'    => $project->id,
            'locale'    => 'en',
            'name'  => 'The name',
            'title' => 'The title',
            'price' => 'AED 2,000,000',
            'expected_completion_date'  => 'January 2019',
            'description'   => 'The description'
        ]);        
    }
}

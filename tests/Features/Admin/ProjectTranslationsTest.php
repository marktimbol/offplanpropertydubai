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
        app()->setLocale('en');

        $project = factory(App\Project::class)->create();
    	// $project = new Project;

        dd($project);

    	// $endpoint = '/dashboard/projects/'.$project->id.'/translations';
    	// $this->post($endpoint, [
    	// 	'locale'	=> 'ar',
    	// 	'name'	=> 'Arabic Name',
    	// 	'title'	=> 'Arabic Title',
    	// 	'expected_completion_date'	=> 'Arabic Expected Completion Date',
    	// 	'description'	=> 'Arabic Description'
    	// ]);

    	// $this->seeInDatabase('project_translations', [
    	// 	'project_id'	=> $project->id,
    	// 	'locale'	=> 'ar',
    	// 	'name'	=> 'Arabic Name',
    	// 	'title'	=> 'Arabic Title',
    	// 	'expected_completion_date'	=> 'Arabic Expected Completion Date',
    	// 	'description'	=> 'Arabic Description'
    	// ]);
    }
}

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

    public function test_update_en_project_that_has_already_en_and_ar_translation()
    {
        $developer = factory(App\Developer::class)->create([
            'name'  => 'The name',
        ]);

        $project = factory(App\Project::class)->create([
            'developer_id'  => $developer->id,
            'name'  => 'The name',
            'slug'  => 'the-name'
        ]);

        $this->seeInDatabase('projects', [
            'id'    => $project->id,
            'slug'  => 'the-name',
        ]);

        $this->seeInDatabase('project_translations', [
            'project_id'    => $project->id,
            'locale'    => 'en',
            'name'  => 'The name',
        ]);

        // Let's add now an Arabic translation
        $endpoint = sprintf('/dashboard/developers/%s/projects/%s', $developer->id, $project->id);
        $response = $this->put($endpoint, [
            'slug'  => 'emaar-park-point',
            'en'    => [
                'project_id'    => $project->id,
                'name'  => 'Emaar Park Point',
                'title' => 'The Famous Emaar Park Point',
                'price' => 'AED 2,000,000',
                'expected_completion_date' => 'February 2019',
                'description'   => 'The description'
            ],
            'ar'    => [
                'project_id'    => $project->id,
                'name'  => 'Emaar Park Point - AR',
                'title' => 'The Famous Emaar Park Point - AR',
                'price' => 'AED 2,000,000 - AR',
                'expected_completion_date' => 'February 2019 - AR',
                'description'   => 'The description - AR'
            ],
        ]);    

        // dd($response);

        $this->seeInDatabase('projects', [
            'id'    => $project->id,
            'slug'  => 'emaar-park-point',
        ])
            ->seeInDatabase('project_translations', [
                'project_id'    => $project->id,
                'locale'    => 'en',
                'name'  => 'Emaar Park Point',
                'title' => 'The Famous Emaar Park Point',
                'price' => 'AED 2,000,000',
                'expected_completion_date' => 'February 2019',
                'description'   => 'The description'
            ])
            ->seeInDatabase('project_translations', [
                'project_id'    => $project->id,
                'locale'    => 'ar',
                'name'  => 'Emaar Park Point - AR',
                'title' => 'The Famous Emaar Park Point - AR',
                'price' => 'AED 2,000,000 - AR',
                'expected_completion_date' => 'February 2019 - AR',
                'description'   => 'The description - AR'
            ]);    
    }

    public function test_create_project_details_with_default_locale()
    {
        app()->setLocale('ar');
        config(['translatable.locale' => 'ar']);

        $project = factory(App\Project::class)->create([
            'name'  => 'The name',
            'slug'  => 'the-name',
            'title' => 'The title',
            'price' => 'AED 2,000,000',
            'expected_completion_date'  => 'January 2019',
            'description'   => 'The description'
        ]);

        $this->seeInDatabase('projects', [
            'id'    => $project->id,
            'slug'  => 'the-name'
        ]);

        $this->seeInDatabase('project_translations', [
            'project_id'    => $project->id,
            'locale'    => 'ar',
            'name'  => 'The name'
        ]);
    }

    public function test_create_project_details_arabic_translations()
    {
        $project = factory(App\Project::class)->create([
            'name'  => 'The name',
            'slug'  => 'the-name',
            'title' => 'The title',
            'price' => 'AED 2,000,000',
            'expected_completion_date'  => 'January 2019',
            'description'   => 'The description'
        ]);

        $this->seeInDatabase('projects', [
            'id'    => $project->id,
            'slug'  => 'the-name'
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

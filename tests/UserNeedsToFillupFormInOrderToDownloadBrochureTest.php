<?php

use App\Events\UserDownloadedAProjectBrochure;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserNeedsToFillupFormInOrderToDownloadBrochureTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_user_needs_to_fillup_a_form_before_downloading_project_brochure()
    {
        $this->expectsEvents(UserDownloadedAProjectBrochure::class);

    	$project = factory(App\Project::class)->create([
    		'name'	=> 'Villanova'
    	]);

        $brochure = factory(App\Brochure::class)->make([
            'project_id'    => $project->id
        ]);
        $project->brochure()->save($brochure);

        $endpoint = sprintf('/projects/%s/brochures', $project->slug);

        $this->post($endpoint, [
            'name'  => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '0563759865'
        ])

		->seeInDatabase('downloads', [
			'name'	=> 'John Doe',
			'email'	=> 'john@example.com',
			'phone'	=> '0563759865',
            'project'   => 'Villanova',
		]);
    }
}

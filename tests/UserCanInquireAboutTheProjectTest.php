<?php

use App\Events\UserInquiresAboutTheProject;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserCanInquireAboutTheProjectTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_user_can_inquire_about_a_project()
    {
        $this->expectsEvents(UserInquiresAboutTheProject::class);

    	$project = factory(App\Project::class)->create([
    		'name'	=> 'Villanova',
            'slug'  => 'villanova'
    	]);

        $endpoint = sprintf('/projects/%s/inquiries', $project->slug);

        $this->post($endpoint, [
            'name'  => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '0563759865',
            'iam'   => 'Investor',
            'country'   => 'United Arab Emirates',
            'message'   => 'The Message'
        ])

		->seeInDatabase('inquiries', [
			'name'	=> 'John Doe',
			'email'	=> 'john@example.com',
			'phone'	=> '0563759865',
            'iam'   => 'Investor',
            'project'   => 'Villanova',
			'country'	=> 'United Arab Emirates',
			'message'	=> 'The Message'
		]);
    }

    public function test_a_user_cannot_submit_inquiry_without_filling_up_all_the_required_fields()
    {
    	$project = factory(App\Project::class)->create([
    		'name'	=> 'Villa Nova'
    	]);

    	$this->visit(sprintf('/projects/%s', $project->slug))
            ->press('Send Inquiry')
            ->see('The name field is required.')
            ->see('The email field is required.')
            ->see('The phone field is required.')

            ->dontSeeInDatabase('inquiries', [
                'name'  => 'John Doe',
            ]); 
    }
}

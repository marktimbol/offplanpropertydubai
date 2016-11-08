<?php

use App\Events\UserInquiresAboutTheProject;
use App\Events\UserSubmitsAGeneralInquiry;
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

    public function test_a_user_can_send_general_inquiry_on_the_register_your_intest_form()
    {
        $this->expectsEvents(UserSubmitsAGeneralInquiry::class);

        $response = $this->post('/inquiries', [
            'name'  => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '0563759865',
            'iam'   => 'Investor',
            'project'   => '',
            'country'   => 'United Arab Emirates',
            'message'   => 'The Message'
        ]);

        $this->seeInDatabase('inquiries', [
            'name'  => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '0563759865',
            'iam'   => 'Investor',
            'project'   => 'General Inquiry',
            'country'   => 'United Arab Emirates',
            'message'   => 'The Message'
        ]);
    }

    public function test_a_user_cannot_submit_inquiry_without_filling_up_all_the_required_fields()
    {
        $developer = factory(App\Developer::class)->create([
            'name'  => 'Emaar',
            'slug'  => 'emaar',
        ]);

    	$project = factory(App\Project::class)->create([
            'developer_id'  => $developer->id,
    		'name'	=> 'Villa Nova',
            'slug'  => 'villanova'
    	]);

    	$this->visit('/emaar/villanova')
            ->press('Send Inquiry')
            ->see('The name field is required.')
            ->see('The email field is required.')
            ->see('The phone field is required.')

            ->dontSeeInDatabase('inquiries', [
                'name'  => 'John Doe',
            ]); 
    }
}

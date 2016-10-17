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
    		'name'	=> 'Villa Nova'
    	]);

    	$this->visit(sprintf('/projects/%s', $project->slug))
    		->type('John Doe', 'name')
    		->type('john@example.com', 'email')
    		->type('0563759865', 'phone')
    		->type('EB6159498', 'passport')
    		->type('The Message', 'message')

    		->press('Send Message')

    		->seeInDatabase('inquiries', [
    			'name'	=> 'John Doe',
    			'email'	=> 'john@example.com',
    			'phone'	=> '0563759865',
    			'passport'	=> 'EB6159498',
    			'message'	=> 'The Message'
    		]);
    }

    public function test_a_user_cannot_submit_inquiry_without_filling_up_all_the_required_fields()
    {
    	$project = factory(App\Project::class)->create([
    		'name'	=> 'Villa Nova'
    	]);

    	$this->visit(sprintf('/projects/%s', $project->slug))
            ->press('Send Message')

            ->see('The name field is required.')
            ->see('The email field is required.')
            ->see('The phone field is required.')

            ->dontSeeInDatabase('inquiries', [
                'name'  => 'John Doe',
            ]); 
    }
}

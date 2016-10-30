<?php

use App\Events\UserSendsMessageThroughContactForm;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserCanSendMessageViaContactFormToAdminTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_visitor_can_send_message_to_admin_via_contact_form()
    {
    	$this->expectsEvents(UserSendsMessageThroughContactForm::class);
    	
    	$this->visit('/contact')
    		->type('John Doe', 'name')
    		->type('john@example.com', 'email')
    		->type('0563759865', 'phone')
    		->type('The message', 'message')
    		->press('Send Message')

    		->seeInDatabase('contacts', [
    			'name'	=> 'John Doe',
    			'email'	=> 'john@example.com',
    			'phone'	=> '0563759865',
    			'message'	=> 'The message'
    		]);
    }

    public function test_a_visitor_cannot_send_message_to_admin_via_contact_form_if_the_form_is_not_populated()
    {
    	$this->visit('/contact')
    		->press('Send Message')
    		->see('The name field is required.')
    		->see('The email field is required.');
    }
}

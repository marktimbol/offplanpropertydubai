<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageDevelopersTest extends TestCase
{
	use DatabaseMigrations;

	protected $user;

	protected function signIn()
	{
    	$this->user = factory(App\User::class)->create();
    	$this->actingAs($this->user);
	}

    public function test_an_admin_can_view_all_the_developers()
    {
    	$this->signIn();
    	$developer = factory(App\Developer::class)->create();

    	$this->visit('/dashboard/developers')
    		->see($developer->name);
    }

    public function test_an_admin_can_add_a_developer()
    {
    	$this->signIn();

    	$this->visit('/dashboard/developers/create')
            ->type('Emaar', 'name')
            ->select('UAE', 'country')
            ->type('The profile', 'profile')
    		->type('http://google.com', 'website')
    		->press('Save')

    		->seeInDatabase('developers', [
                'name'  => 'Emaar',
    			'country'	=> 'UAE',
                'website'   => 'http://google.com',
                'profile'   => 'The profile',
    		]);
    }

    public function test_an_admin_can_update_a_developer_information()
    {
        $this->signIn();

        $developer = factory(App\Developer::class)->create([
            'name'  => 'Emaars',
            'website'   => 'http://googles.com'
        ]);

        $this->visit(sprintf('/dashboard/developers/%s/edit', $developer->id))
            ->type('Emaar', 'name')
            ->type('Saudi Arabia', 'country')
            ->type('New Profile', 'profile')
            ->type('http://google.com', 'website')
            ->press('Update')

            ->seeInDatabase('developers', [
                'id'    => $developer->id,
                'name'  => 'Emaar',
                'country'   => 'Saudi Arabia',
                'website'   => 'http://google.com',
                'profile'   => 'New Profile',
            ]);
    }

    public function test_an_admin_can_delete_a_developer()
    {
        $this->signIn();

        $developer = factory(App\Developer::class)->create();

        $this->visit(sprintf('/dashboard/developers/%s', $developer->id))
            ->see($developer->name)
            ->press('Delete')

            ->dontSeeInDatabase('developers', [
                'id'    => $developer->id
            ]);
    }

}

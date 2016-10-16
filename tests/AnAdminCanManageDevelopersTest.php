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
    		->press('Save')

    		->seeInDatabase('developers', [
    			'name'	=> 'Emaar'
    		]);
    }

    public function test_an_admin_can_update_a_developer_information()
    {
        $this->signIn();

        $developer = factory(App\Developer::class)->create([
            'name'  => 'Emaars'
        ]);

        $this->visit(sprintf('/dashboard/developers/%s/edit', $developer->id))
            ->type('Emaar', 'name')
            ->press('Update')

            ->seeInDatabase('developers', [
                'id'    => $developer->id,
                'name'  => 'Emaar'
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

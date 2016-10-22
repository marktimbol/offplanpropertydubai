<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageProjectsPaymentPlanTest extends TestCase
{
	use DatabaseMigrations;

	protected $user;

	protected function signIn()
	{
    	$this->user = factory(App\User::class)->create();
    	$this->actingAs($this->user);
	}

    public function test_an_authenticated_user_can_manage_projects_payment_plan()
    {
    	$this->signIn();

    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar',
    	]);

    	$project = factory(App\Project::class)->make([
    		'name'	=> 'Emaar Project'
    	]);
    	$developer->projects()->save($project);

        $payment = factory(App\Payment::class)->make();
        $project->payments()->save($payment);
    	
    	$this->visit(sprintf('/dashboard/developers/%s/projects/%s', $developer->id, $project->id))
            ->see($payment->title)
            ->see($payment->percentage)
            ->see($payment->date)
            
    		->type('1st Installment', 'title')
    		->type('10%', 'percentage')
    		->type('Purchase Date', 'date')
    		->press('Save')

    		->seeInDatabase('payments', [
    			'project_id'	=> $project->id,
    			'title'	=> '1st Installment',
    			'percentage'	=> '10%',
    			'date'	=> 'Purchase Date'
    		]);
    }

    public function test_an_authenticated_user_can_delete_payment_plan_from_project()
    {
        $this->signIn();

        $developer = factory(App\Developer::class)->create([
            'name'  => 'Emaar',
        ]);

        $project = factory(App\Project::class)->make([
            'name'  => 'Emaar Project'
        ]);
        $developer->projects()->save($project);

        $payment = factory(App\Payment::class)->make();
        $project->payments()->save($payment);   

        $url = '/dashboard/developers/'.$developer->id.'/projects/'.$project->id.'/payments/'.$payment->id;
        $response = $this->delete($url);

        $this->dontSeeInDatabase('payments', [
            'id'    => $payment->id,
        ]);
    }
}

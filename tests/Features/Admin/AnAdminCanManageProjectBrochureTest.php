<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageProjectBrochureTest extends TestCase
{
	use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }
    
    public function test_an_admin_can_add_project_brochure()
    {
    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar'
    	]);
    	$project = factory(App\Project::class)->make([
    		'developer_id'	=> $developer->id,
    		'name'	=> 'The Project'
    	]);
    	$developer->projects()->save($project);

    	$endpoint = sprintf('/dashboard/developers/%s/projects/%s/brochures', $developer->id, $project->id);
    	$this->post($endpoint, [
    		'file' => 'http://google.com/brochure.pdf'
    	]);

    	$this->seeInDatabase('brochures', [
    		'project_id'	=> $project->id,
    		'file'	=> 'http://google.com/brochure.pdf'
    	]);
    }

    public function test_an_admin_can_update_project_brochure_file()
    {
    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar'
    	]);
    	$project = factory(App\Project::class)->make([
    		'developer_id'	=> $developer->id,
    		'name'	=> 'The Project'
    	]);
    	$developer->projects()->save($project);

    	$brochure = factory(App\Brochure::class)->make([
    		'file'	=> 'http://googles.com/brochure.pdf'
    	]);
    	$project->brochure()->save($brochure);

    	$endpoint = sprintf('/dashboard/developers/%s/projects/%s/brochures/%s', $developer->id, $project->id, $brochure->id);
    	$this->put($endpoint, [
    		'file' => 'http://google.com/brochure.pdf'
    	]);

    	$this->seeInDatabase('brochures', [
    		'id'	=> $brochure->id,
    		'file'	=> 'http://google.com/brochure.pdf'
    	]);
    }

    public function test_an_admin_can_delete_project_brochure_file()
    {
    	$developer = factory(App\Developer::class)->create([
    		'name'	=> 'Emaar'
    	]);
    	$project = factory(App\Project::class)->make([
    		'developer_id'	=> $developer->id,
    		'name'	=> 'The Project'
    	]);
    	$developer->projects()->save($project);

    	$brochure = factory(App\Brochure::class)->make([
    		'file'	=> 'http://googles.com/brochure.pdf'
    	]);
    	$project->brochure()->save($brochure);

    	$endpoint = sprintf('/dashboard/developers/%s/projects/%s/brochures/%s', $developer->id, $project->id, $brochure->id);
    	$this->delete($endpoint);

    	$this->dontSeeInDatabase('brochures', [
    		'id'	=> $brochure->id,
    	]);	
    }
}

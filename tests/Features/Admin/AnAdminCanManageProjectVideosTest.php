<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnAdminCanManageProjectVideosTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_admin_can_add_video_link_to_a_project()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user);

    	$project = factory(App\Project::class)->create();

    	$endpoint = sprintf('/dashboard/developers/%s/projects/%s/videos', $project->developer->id, $project->id);
    	$response = $this->post($endpoint, [
    		'cover'	=> 'http://offplanpropertydubai.dev/images/header-bg.jpg',
    		'link'	=> 'http://vjs.zencdn.net/v/oceans.mp4',
    	]);

    	$this->seeInDatabase('videos', [
    		'project_id'	=> $project->id,
            'cover' => 'http://offplanpropertydubai.dev/images/header-bg.jpg',
    		'link'	=> 'http://vjs.zencdn.net/v/oceans.mp4',
    	]);
    }

    public function test_an_admin_can_remove_video_link_from_a_project()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);

        $project = factory(App\Project::class)->create();
        $video = factory(App\Video::class)->create([
            'project_id'    => $project->id,
            'cover' => 'http://google.com/header-bg.jpg',
            'link'  => 'http://google.com/header-bg.mp4'
        ]);

        $endpoint = sprintf('/dashboard/developers/%s/projects/%s/videos/%s', $project->developer->id, $project->id, $video->id);
        $this->delete($endpoint);

        $this->dontSeeInDatabase('videos', [
            'project_id'    => $project->id,
            'cover' => 'http://google.com/header-bg.jpg',
            'link'  => 'http://google.com/header-bg.mp4',
        ]);
    }
}

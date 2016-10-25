<?php

use App\Type;
use Illuminate\Database\Seeder;

class DeveloperProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $community  = factory(App\Community::class)->create();

        $developer = factory(App\Developer::class)->create([
            'country_id'   => $community->city->country->id,
            'name'  => 'Dubai Properties',
            'slug'  => 'dubai-properties'
        ]);

        $project = factory(App\Project::class)->make([
            'developer_id'  => $developer->id,
            'community_id'  => $community->id,
            'name'  => 'Villanova',
            'title' => 'First time Mediterranean styled "Cluster Homes" in Dubailand',
            'slug'  => 'first-time-mediterranean-styled-cluster-homes-in-dubailand'
        ]);
        $developer->projects()->save($project);

        $this->addProjectType($project);
	    $this->addPaymentPlans($project);
        //
    }

    protected function addProjectType($project)
    {
    	$type = Type::findOrFail(1);
    	$project->types()->attach($type);
    }

    protected function addPaymentPlans($project)
    {
    	$payment = factory(App\Payment::class)->make([
	        'project_id'	=> $project->id,
	        'title'	=> '1st Installment',
	        'percentage'	=> '10%',
	        'date'	=> 'Purchase Date'
        ]);

	    $project->payments()->save($payment);

        $payment = factory(App\Payment::class)->make([
	        'project_id'	=> $project->id,
	        'title'	=> '2nd Installment',
	        'percentage'	=> '5%',
	        'date'	=> '15th April 2017',
       	]);

        $project->payments()->save($payment);

        $payment = factory(App\Payment::class)->make([
 	    	'project_id'	=> $project->id,
 	    	'title'	=> '3rd Installment',
 	        'percentage'	=> '5%',
 	        'date'	=> '15th October 2017',
        ]);
        
        $project->payments()->save($payment);

        $payment = factory(App\Payment::class)->make([
 	        'project_id'	=> $project->id,
 	        'title'	=> '4th Installment',
 	        'percentage'	=> '5%',
 	        'date'	=> '15th April 2018',
        ]);
        
        $project->payments()->save($payment);
    }

}

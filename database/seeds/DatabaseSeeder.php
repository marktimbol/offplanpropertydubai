<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Mark Timbol',
            'email' => 'mark@timbol.com',
            'password'  => bcrypt('marktimbol')
        ]);

        $developer = factory(App\Developer::class)->create([
            'name'  => 'Dubai Properties',
            'slug'  => 'dubai-properties'
        ]);
        $project = factory(App\Project::class)->make([
            'developer_id'  => $developer->id,
            'name'  => 'Villanova',
            'title' => 'The Villanova',
            'slug'  => 'the-villanova'
        ]);
        $developer->projects()->save($project);
    }
}

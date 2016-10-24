<?php

use App\Category;
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

        $this->call(CategoriesTableSeeder::class);
        $this->call(DeveloperProjectsTableSeeder::class);
        
        factory(App\Project::class, 20)->create();
    }
}

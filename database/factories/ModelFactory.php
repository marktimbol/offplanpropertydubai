<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    $name = $faker->country;
    $slug = str_slug($name);

    return [
        'name' => $name,
        'slug'  => $slug,
    ];
});

$factory->define(App\City::class, function (Faker\Generator $faker) {
    return [
        'country_id'    => function() {
            return factory(App\Country::class)->create()->id;
        },
        'name' => $faker->city,
        'slug'  => $faker->slug,
    ];
});

$factory->define(App\Community::class, function (Faker\Generator $faker) {
    return [
        'city_id'    => function() {
            return factory(App\City::class)->create()->id;
        },
        'name' => $faker->city,
        'slug'  => $faker->slug,
        'description'  => $faker->paragraph,
    ];
});

$factory->define(App\Developer::class, function (Faker\Generator $faker) {
    return [
        'country_id'    => function() {
            return factory(App\Country::class)->create()->id;
        },
        'name' => $faker->word,
        'slug' => $faker->slug,
        'website' => $faker->url,
        'photo' => '',
        'profile' => $faker->realText,
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'developer_id'  => function() {
            return factory(App\Developer::class)->create()->id;
        },
        'name' => $faker->sentence,
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'price' => 'AED 2,000',
        'latitude'  => $faker->latitude,
        'longitude' => $faker->longitude,
        'expected_completion_date'   => 'February 2019',
        'dld_project_completion_link'   => $faker->url,
        'project_escrow_account_details_link'   => $faker->url,
        'description'   => $faker->realText,       
    ];
});

$factory->define(App\Payment::class, function (Faker\Generator $faker) {
    return [
        'project_id'  => function() {
            return factory(App\Project::class)->create()->id;
        },
        'title' => $faker->sentence,
        'percentage' => '10%',
        'date' => 'Purchase Date',
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description'   => $faker->paragraph
    ];
});

$factory->define(App\Type::class, function (Faker\Generator $faker) {
    return [
        'category_id'  => function() {
            return factory(App\Category::class)->create()->id;
        },
        'name' => $faker->word,
    ];
});

$factory->define(App\Brochure::class, function (Faker\Generator $faker) {
    return [
        'project_id'  => function() {
            return factory(App\Project::class)->create()->id;
        },
        'file' => $faker->url,
    ];
});

$factory->define(App\Video::class, function (Faker\Generator $faker) {
    return [
        'project_id'  => function() {
            return factory(App\Project::class)->create()->id;
        },
        'cover' => $faker->url,
        'link' => $faker->url,
    ];
});

$factory->define(App\Floorplan::class, function (Faker\Generator $faker) {
    return [
        'project_id'  => function() {
            return factory(App\Project::class)->create()->id;
        },
        'title' => $faker->sentence,
        'photo' => $faker->url,
    ];
});
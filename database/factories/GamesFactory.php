<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Admin\Models\Game::class, function (Faker $faker) {
    return [
        'game_name' => substr($faker->name,0,10),
        'game_type'=>1,
        'is_host'=>1,
        'game_details'=>$faker->name,
        'game_logo'=>'/storage/app/public/images/a88fac6cc3356b56.jpeg',
        'game_initial'=>'A',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
    ];
});

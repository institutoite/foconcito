<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'foto'=>'galerias/hAwoy8Qv823i9ZVuiYmaA5y4KOZn2bpCpLYa4YZA.jpeg',
        'titulo'=>$faker->realText(80),
        'descripcion'=> $faker->realText(250),
        'costo'=>$faker->randomFloat(2, 0, 1000),
        'empresa_id'=>1,
    ];
});

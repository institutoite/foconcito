<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->firstNameFemale,
        'apellidos'=>$faker->lastName. ' '.$faker->lastName,
        
        'fechanacimiento'=>'2000-12-05',
        'tipo'=>'empresario',
        'genero'=>'MUJER',
        'persona_id'=>2,
        'pais_id'=>2,
        'ciudad_id'=>7,
        'zona_id'=>2,
    ];
});

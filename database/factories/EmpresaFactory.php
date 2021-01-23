<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        
         'empresa'=>$faker->company,
        'direccion'=>$faker->address,
        'votos'=> 0,
        'detalle'=>$faker->text,
        'pais_id'=>2,
        'ciudad_id'=>7  ,
        'zona_id'=>2,
        'empresario_id'=>1,
        'categoria_id'=>1
    ];
});

<?php

use Illuminate\Database\Seeder;
use App\Persona;
use App\Cliente;
use App\Empresario;
class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'nombre'=>'DAVID EDUARDO',
            'apellidos'=>'FLORES BELTRAN',
            
            'fechanacimiento'=>'2000-05-01',
            'tipo'=>'empresario',
            'genero'=>'HOMBRE',
            'pais_id'=>'2',
            'ciudad_id'=>'7',
            'zona_id'=>'2',
            
        ]);
         Persona::create([
            'nombre'=>'LIDIA',
            'apellidos'=>'CONTRERAS CATARI',
            'fechanacimiento'=>'1980-07-26',
            'tipo'=>'empresario',
            'genero'=>'MUJER',
            'pais_id'=>'2',
            'ciudad_id'=>'7',
            'zona_id'=>'2',

        ]);
        Persona::create([
            'nombre'=>'JOSE EDUARDO',
            'apellidos'=>'FLORES CONTRERAS',
            'genero'=>'HOMBRE',
            'fechanacimiento'=>'2010-04-10',
            'tipo'=>'cliente',
            'pais_id'=>'2',
            'ciudad_id'=>'7',
            'zona_id'=>'4',
            'persona_id'=>'1',
        ]);
         Persona::create([
            'nombre'=>'DAVID ADONIAS',
            'apellidos'=>'FLORES CONTRERAS',
            'genero'=>'HOMBRE',
            'fechanacimiento'=>'2015-02-20',
            'tipo'=>'cliente',
            'pais_id'=>'2',
            'ciudad_id'=>'7',
            'zona_id'=>'3',
            'persona_id'=>'1',
        ]);
         Persona::create([
            'nombre'=>'TANY SARAI',
            'apellidos'=>'FLORES CONTRERAS',
            'genero'=>'MUJER',
            'fechanacimiento'=>'2018-01-26',
            'tipo'=>'cliente',
            'pais_id'=>'2',
            'ciudad_id'=>'7',
            'zona_id'=>'5',
            'persona_id'=>'2',
        ]);

        Persona::create([
            'nombre'=>'CIRILO',
            'apellidos'=>'FLORES ROCHA',
            'genero'=>'HOMBRE',
            'fechanacimiento'=>'1953-01-26',
            'tipo'=>'cliente',
            'pais_id'=>'7',
            'ciudad_id'=>'129',
            'zona_id'=>'8',
            'persona_id'=>'1',
        ]);
    
        Empresario::create(['persona_id'=>1]);
        Empresario::create(['persona_id'=>2]);
        Cliente::create(['persona_id'=>3]);
        Cliente::create(['persona_id'=>4]);
        Cliente::create(['persona_id'=>5]);
        Cliente::create(['persona_id'=>6]);

    }
}

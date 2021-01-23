<?php

use Illuminate\Database\Seeder;
use App\Telefono;
class TelefonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Telefono::create([
            'prefijo'=>'591',
            'numero'=>'71039910',
            'detalle'=>'PERSONAL',
            'persona_id'=>'1'
        ]);
        Telefono::create([
            'prefijo'=>'591',
            'numero'=>'71324941',
            'detalle'=>'PERSONAL',
            'persona_id'=>'2'
        ]);
        Telefono::create([
            'prefijo'=>'591',
            'numero'=>'71039910',
            'detalle'=>'PAPA',
            'persona_id'=>'3'
        ]);
        Telefono::create([
            'prefijo'=>'591',
            'numero'=>'71324941',
            'detalle'=>'MAMA',
            'persona_id'=>'3'
        ]);
        Telefono::create([
            'prefijo'=>'591',
            'numero'=>'71039910',
            'detalle'=>'PAPA',
            'persona_id'=>'4'
        ]);
        Telefono::create([
            'prefijo'=>'591',
            'numero'=>'71324941',
            'detalle'=>'MAMA',
            'persona_id'=>'4'
        ]);
        Telefono::create([
            'prefijo'=>'591',
            'numero'=>'71039910',
            'detalle'=>'PAPA',
            'persona_id'=>'5'
        ]);
        Telefono::create([
            'prefijo'=>'591',
            'numero'=>'71324941',
            'detalle'=>'MAMA',
            'persona_id'=>'5'
        ]);

    }
}

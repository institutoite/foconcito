<?php

use Illuminate\Database\Seeder;

use App\Constante;

class ConstanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Constante::create(['constante'=>'costomensual','valor'=>20]);
    }
}

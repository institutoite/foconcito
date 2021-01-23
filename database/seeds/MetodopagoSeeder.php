<?php

use Illuminate\Database\Seeder;
use App\Metodopago;
class MetodopagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Metodopago::create(['metodo'=>'impaga']);
         Metodopago::create(['metodo'=>'tigomoney']);
         Metodopago::create(['metodo'=>'transferenciabnbdavid']);
         Metodopago::create(['metodo'=>'transferenciabnblilita']);
         Metodopago::create(['metodo'=>'efectivo']);
         Metodopago::create(['metodo'=>'tarjeta']);
         

    }
}

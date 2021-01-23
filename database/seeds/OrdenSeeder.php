<?php

use App\Orden;
use App\Pago;
use Illuminate\Database\Seeder;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orden::create([
              'estado'=>'PORVERIFICAR',
              'empresario_id'=>2,
              ]);
        Orden::create([
              'estado'=>'PORVERIFICAR',
              'empresario_id'=>2,
              ]);
        Orden::create([
              'estado'=>'PORVERIFICAR',
              'empresario_id'=>2,
              ]);
        Orden::create([
            'estado'=>'PORVERIFICAR',
            'empresario_id'=>2,
            ]);
        Orden::create([
            'estado'=>'PORVERIFICAR',
            'empresario_id'=>2,
            ]);
        Orden::create([
            'estado'=>'PORVERIFICAR',
            'empresario_id'=>2,
            ]);
        Orden::create([
            'estado'=>'PORVERIFICAR',
            'empresario_id'=>2,
            ]);
        Orden::create([
            'estado'=>'PORVERIFICAR',
            'empresario_id'=>2,
            ]);
        Orden::create([
            'estado'=>'PORVERIFICAR',
            'empresario_id'=>2,
            ]);
        Orden::create([
            'estado'=>'PORVERIFICAR',
            'empresario_id'=>2,
            ]);
        
       // DB::insert('insert into empresa_orden(ffin,empresa_id,orden_id) values (?, ?,?)', ['2020-07-01',,'Dayle'])    
       
    }
}

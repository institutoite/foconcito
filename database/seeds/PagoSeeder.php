<?php

use Illuminate\Database\Seeder;
use App\Pago;
class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>1,
            'metodopago_id'=>2,
        ]);
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>2,
            'metodopago_id'=>2,
        ]);
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>3,
            'metodopago_id'=>2,
        ]);
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>4,
            'metodopago_id'=>2,
        ]);
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>5,
            'metodopago_id'=>2,
        ]);
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>6,
            'metodopago_id'=>2,
        ]);
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>7,
            'metodopago_id'=>2,
        ]);
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>8,
            'metodopago_id'=>2,
        ]);
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>9,
            'metodopago_id'=>2,
        ]);
        Pago::create([
            'monto'=>0.0,
            'comprobante'=>'comprobantes/B5YfYRGom4xlrvNpspLl1pBjCsTyZomOhgVde7U9.jpeg',
            'orden_id'=>10,
            'metodopago_id'=>2,
        ]);
        
    }
}

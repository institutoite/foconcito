<?php

use Illuminate\Database\Seeder;
use App\Zona;
class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zona::create([ 'zona'=>'sin definir',
                        'ciudad_id'=>'1'
                        ]);
        Zona::create([ 'zona'=>'Plan 3000',
                        'ciudad_id'=>'7'
                        ]);
        Zona::create([ 'zona'=>'Villa 1 de Mayo',
                        'ciudad_id'=>'7'
                        ]);
        Zona::create([ 'zona'=>'Pampa de la Isla',
                        'ciudad_id'=>'7'
                        ]);
        Zona::create([ 'zona'=>'Los Lotes',
                        'ciudad_id'=>'7'
                        ]);
        Zona::create([ 'zona'=>'Mutualista',
                        'ciudad_id'=>'7'
                        ]);
        Zona::create([ 'zona'=>'La colorada',
                        'ciudad_id'=>'7'
                        ]);
        Zona::create([ 'zona'=>'Los Pozos',
                        'ciudad_id'=>'7'
                        ]);
        Zona::create([ 'zona'=>'El tajibo',
                        'ciudad_id'=>'7'
        ]);
        Zona::create([ 'zona'=>'EL PALMAR DEL ORTARIO',
                        'ciudad_id'=>'7'
        ]);
    }
}

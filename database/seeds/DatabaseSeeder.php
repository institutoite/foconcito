<?php

use Illuminate\Database\Seeder;
use App\Empresa;
use App\Persona;
use App\Image;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(ZonaSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(TelefonoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(MetodopagoSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(ConstanteSeeder::class);
        $this->call(OrdenSeeder::class);
        $this->call(PagoSeeder::class);
        factory(Empresa::class, 10)->create();
        factory(Persona::class, 50)->create();
        factory(Image::class, 10)->create();
        
    }   
}

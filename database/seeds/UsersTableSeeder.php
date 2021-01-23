<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'      => 'David Flores',
            'persona_id'=>'1',
            'email'     => 'david@ite.com.bo',
            'password'     => bcrypt('123'),
        ]);

        App\User::create([
            'name'      => 'Lidia',
            'persona_id'=>'2',
            'email'     => 'lilita@ite.com.bo',
            'password'     => bcrypt('123'),
        ]);
    }
}

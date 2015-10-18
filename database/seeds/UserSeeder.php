<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\User;


class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    //'color', 'cilindraje','potencia','peso','fabricante_id'
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i<=3; $i++){
            User::create([
                'email' => $faker->userName.'@cibertec.edu.pe',
                'password' => Hash::make('algo')
            ]);
        }
    }

}

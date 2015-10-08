<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Fabricante;
use App\Vehiculo;
use Faker\Factory as Faker;


class VehiculoSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    //'color', 'cilindraje','potencia','peso','fabricante_id'
    public function run()
    {
        $faker = Faker::create();
        $cantidad = Fabricante::all()->count(); //Para saber cuantos fabricantes tenemos.

        for($i=0; $i<50;$i++){

            Vehiculo::create([
                'color' => $faker->safeColorName,
                'cilindraje' => $faker->randomFloat(),
                'potencia' => $faker->randomNumber(),
                'peso' => $faker->randomFloat(),
                'fabricante_id' => $faker->numberBetween(1,$cantidad)
            ]);
        }
    }

}

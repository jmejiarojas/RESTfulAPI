<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Fabricante;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();


		$this->call('FabricanteSeeder');
		$this->call('VehiculoSeeder');

		User::truncate();
		$this->call('UserSeeder');
	}

}

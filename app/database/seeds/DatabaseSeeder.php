<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('NegocioTableSeeder');
		$this->call('AcaoTableSeeder');
		$this->call('PerfilTableSeeder');
		$this->call('UtilizadorTableSeeder');

	}

}

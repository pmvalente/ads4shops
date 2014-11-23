<?php

class UtilizadorTableSeeder extends Seeder {

    public function run()
    {
        DB::table('utilizadores')->delete();

		Utilizador::create(array(
			'nome' => 'Administrador',
			'negocio_id' => 1,
			'username' => 'admin',
			'email' => 'admin@ads4shops.com',
			'password' => Hash::make('admin2014'),
			'ativo' => 1,
			'perfil_id' => 1,
		));
	}

}
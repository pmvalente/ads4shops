<?php

class PerfilTableSeeder extends Seeder {

    public function run()
    {
        DB::table('perfis')->delete();

		$perfil = Perfil::create(array(
			'nome' => 'Administrador',
		));

		$perfil->acoes()->sync(array(1));
	}

}
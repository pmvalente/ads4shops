<?php

class AcaoTableSeeder extends Seeder {

    public function run()
    {
        DB::table('acoes')->delete();

		Acao::create(array('nome' => 'Acesso total do sistema', 'metodo' => '*'));

		Acao::create(array('nome' => 'Listar anuncios', 'metodo' => 'anuncio.index'));
		Acao::create(array('nome' => 'Detalhar anuncios', 'metodo' => 'anuncio.show'));
		Acao::create(array('nome' => 'Formulário de inclusão de anuncio', 'metodo' => 'anuncio.create'));
		Acao::create(array('nome' => 'Adicionar anuncio', 'metodo' => 'anuncio.store'));
		Acao::create(array('nome' => 'Formulário de alteração de anuncio', 'metodo' => 'anuncio.edit'));
		Acao::create(array('nome' => 'Alterar anuncio', 'metodo' => 'anuncio.update'));
		Acao::create(array('nome' => 'Apagar anuncio', 'metodo' => 'anuncio.destroy'));

		Acao::create(array('nome' => 'Listar utilizadores', 'metodo' => 'utilizador.index'));
		Acao::create(array('nome' => 'Formulário de inclusão de utilizador', 'metodo' => 'utilizador.create'));
		Acao::create(array('nome' => 'Adicionar utilizador', 'metodo' => 'utilizador.store'));
		Acao::create(array('nome' => 'Formulário de alteração de utilizador', 'metodo' => 'utilizador.edit'));
		Acao::create(array('nome' => 'Alterar utilizador', 'metodo' => 'utilizador.update'));
		Acao::create(array('nome' => 'Apagar utilizador', 'metodo' => 'utilizador.destroy'));

		Acao::create(array('nome' => 'Listar negocios', 'metodo' => 'negocio.index'));
		Acao::create(array('nome' => 'Formulário de inclusão de negocio', 'metodo' => 'negocio.create'));
		Acao::create(array('nome' => 'Adicionar negocio', 'metodo' => 'negocio.store'));
		Acao::create(array('nome' => 'Formulário de alteração de negocio', 'metodo' => 'negocio.edit'));
		Acao::create(array('nome' => 'Alterar negocio', 'metodo' => 'negocio.update'));
		Acao::create(array('nome' => 'Apagar negocio', 'metodo' => 'negocio.destroy'));
	}

}
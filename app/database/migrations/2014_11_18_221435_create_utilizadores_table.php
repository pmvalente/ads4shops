<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilizadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utilizadores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome', 120);
			$table->integer('negocio_id')->unsigned();
			$table->string('username', 25);
			$table->string('email',120);
			$table->string('password', 80);
			$table->boolean('ativo');
			$table->integer('perfil_id')->unsigned();

			$table->foreign('negocio_id')->references('id')->on('negocios')->on_delete('restrict');
			$table->foreign('perfil_id')->references('id')->on('perfis')->on_delete('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('utilizadores');
	}

}

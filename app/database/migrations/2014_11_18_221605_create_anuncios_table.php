<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anuncios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome', 120);
			$table->integer('utilizador_id')->unsigned();
			$table->date('inicio');
			$table->date('fim');
			$table->boolean('ativo');
			$table->boolean('autorizado');
			$table->boolean('inibir');
			$table->timestamps();

			$table->foreign('utilizador_id')->references('id')->on('utilizadores')->on_delete('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('anuncios');
	}

}

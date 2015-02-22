<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstBeritaToLampiranTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_berita_to_lampiran', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mst_berita_id');
			$table->integer('mst_lampiran_berita_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mst_berita_to_lampiran');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstLampiranBeritaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_lampiran_berita', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('nama_file_asli');
			$table->string('nama_file_tersimpan');
			$table->string('deskripsi');
			$table->integer('mst_user_id');
			$table->string('size');
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
		Schema::drop('mst_lampiran_berita');
	}

}

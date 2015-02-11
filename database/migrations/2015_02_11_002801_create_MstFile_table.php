<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstFileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_file', function(Blueprint $table)
		{
			$table->increments('id');
			//nama file asli, jika file hendak di download, pakai nama ini
			$table->string('nama_file_asli'); 

			//digunakan untuk menyimpan ke server,
			$table->string('nama_file_tersimpan');

			$table->string('size'); //ukuran dlm byte

			$table->integer('mst_arsip_id');
			$table->integer('mst_user_id'); 
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
		Schema::drop('mst_file');
	}

}

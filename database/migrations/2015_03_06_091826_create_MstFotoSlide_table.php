<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstFotoSlideTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_foto_slide', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('nama_file_asli');
			$table->integer('ref_jabatan_id');
			$table->string('no_induk', 100);
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
		Schema::drop('mst_foto_slide');
	}

}

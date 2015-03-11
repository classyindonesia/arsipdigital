<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstVidioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_vidio', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_file_asli');
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
		Schema::drop('mst_vidio');
	}

}

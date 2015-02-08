<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstDataUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_data_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama', 200);
			$table->string('alamat');
			$table->date('tgl_lahir');
			$table->enum('jenis_kelamin', ['L', 'P']);
			$table->string('no_hp', 20);

   		$table->unsignedInteger('mst_user_id');
		$table->foreign('mst_user_id')->references('id')->on('mst_users')->onDelete('CASCADE');				


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
		Schema::drop('mst_data_user');
	}

}

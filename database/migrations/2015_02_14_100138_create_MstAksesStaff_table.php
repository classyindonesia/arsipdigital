<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstAksesStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_akses_staff', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mst_user_staff_id'); //level staff
			$table->integer('mst_user_id'); //level user
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
		Schema::drop('mst_akses_staff');
	}

}

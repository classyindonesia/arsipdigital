<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstFolderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_folder', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama', 100);
			$table->integer('parent_id');

	   		$table->unsignedInteger('mst_user_id');
			$table->foreign('mst_user_id')->references('id')->on('mst_users')->onDelete('CASCADE');				

	   		$table->unsignedInteger('mst_rak_id');
			$table->foreign('mst_rak_id')->references('id')->on('mst_rak')->onDelete('CASCADE');				

			$table->text('keterangan');


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
		Schema::drop('mst_folder');
	}

}

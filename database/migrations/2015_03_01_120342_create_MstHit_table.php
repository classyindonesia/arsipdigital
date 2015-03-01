<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstHitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_hits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ip', 100);
			$table->date('tgl');
			$table->string('timevisit');
			$table->string('_token');
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
		Schema::drop('mst_hits');
	}

}

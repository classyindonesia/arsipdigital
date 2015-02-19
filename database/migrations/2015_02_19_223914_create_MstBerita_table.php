<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstBeritaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_berita', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('judul');
			$table->string('slug')->unique();
			$table->text('artikel');
			$table->enum('is_published', [1,0]); //jika 0, maka status masih jd draft
			$table->enum('komentar', [1,0]); //jika 0, maka komentar ditutup
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
		Schema::drop('mst_berita');
	}

}

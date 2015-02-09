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
			$table->string('no_induk', 100);
			$table->string('alamat');
			$table->date('tgl_lahir');
			$table->string('tempat_lahir');
			$table->enum('jenis_kelamin', ['L', 'P']);
			$table->string('no_hp', 20);
			$table->string('kode_post', 10);
			$table->string('no_telp', 20);

			$table->string('no_ktp');

			$table->string('nama_ibu_kandung');



/*  START create new*/
   		$table->unsignedInteger('ref_status_ikatan_id');
		$table->foreign('ref_status_ikatan_id')->references('id')->on('ref_status_ikatan')->onDelete('CASCADE');				

   		$table->unsignedInteger('ref_homebase_id');
		$table->foreign('ref_homebase_id')->references('id')->on('ref_homebase')->onDelete('CASCADE');				



   		$table->unsignedInteger('ref_agama_id');
		$table->foreign('ref_agama_id')->references('id')->on('ref_agama')->onDelete('CASCADE');				


   		$table->unsignedInteger('ref_kota_id');
		$table->foreign('ref_kota_id')->references('id')->on('ref_kota')->onDelete('CASCADE');	

   		$table->unsignedInteger('ref_status_pernikahan_id');
		$table->foreign('ref_status_pernikahan_id')->references('id')->on('ref_status_pernikahan')->onDelete('CASCADE');	


/*  END create new*/


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

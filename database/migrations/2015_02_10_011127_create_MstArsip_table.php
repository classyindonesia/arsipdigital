<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstArsipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_arsip', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kode_arsip'); //kode arsip, dibuat otomatis, [ada fungsi tambahan di model]
			$table->string('nama');
			$table->integer('mst_folder_id');
			$table->integer('mst_user_id');
			$table->text('keterangan');

			/* start surat */
			$table->date('tgl_arsip'); //tgl surat diarsipkan
			$table->date('tgl_surat'); // tgl yg tertera pada surat
			$table->string('no_surat'); //nomor yg tertera pada surat / arsip
			$table->string('nama_tujuan'); //nama yg ada pada tujuan surat
			/* end surat */


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
		Schema::drop('mst_arsip');
	}

}

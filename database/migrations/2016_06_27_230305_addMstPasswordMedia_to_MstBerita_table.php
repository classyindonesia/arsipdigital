<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMstPasswordMediaToMstBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_berita', function (Blueprint $table) {
            $table->integer('mst_password_media_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_berita', function (Blueprint $table) {
            $table->dropColumn('mst_password_media_id');
        });
    }
}

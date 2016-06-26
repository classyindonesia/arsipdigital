<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMstPasswordMediaIdToMstAlbumGaleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_album_galery', function (Blueprint $table) {
            $table->integer('mst_password_media_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_album_galery', function (Blueprint $table) {
            $table->dropColumn('mst_password_media_id');
        });
    }
}

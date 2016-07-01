<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescAndKeywordToMstBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_berita', function (Blueprint $table) {
            $table->string('description');
            $table->string('keyword');
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
            $table->dropColumn('description');
            $table->dropColumn('keyword');
        });
    }
}

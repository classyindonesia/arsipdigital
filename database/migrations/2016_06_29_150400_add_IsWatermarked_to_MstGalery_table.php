<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsWatermarkedToMstGaleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_galery', function (Blueprint $table) {
            $table->enum('is_watermarked', [1, 0])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_galery', function (Blueprint $table) {
            $table->dropColumn('is_watermarked');
        });
    }
}

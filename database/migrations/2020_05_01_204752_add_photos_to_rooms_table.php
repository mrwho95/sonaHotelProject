<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotosToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->renameColumn('photo', 'photo_1');
            $table->mediumtext('photo_2')->nullable();
            $table->mediumtext('photo_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            //
            $table->dropColumn('photo_2');
            $table->dropColumn('photo_3');
            $table->renameColumn('photo_1', 'photo');
        });
    }
}

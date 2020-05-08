<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerorders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->string('booking_code')->unique();
            $table->string('room_bed');
            $table->string('personal_request')->nullable();
            $table->string('bed_preference')->nullable();
            $table->string('smoke_preference')->nullable();
            $table->string('check_in');
            $table->string('check_in_time')->nullable();
            $table->string('range');
            $table->string('check_out');
            $table->double('price_amount', 8, 2);
            $table->double('service_charge_amount', 8, 2);
            $table->double('service_tax_amount', 8, 2);
            $table->double('promo_amount', 8, 2)->nullable();
            $table->double('total_amount', 8, 2);
            $table->string('promocode')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('customerorders');
    }
}

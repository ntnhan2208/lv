<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_service', function (Blueprint $table) {
            $table->id();
//            $table->integer('booking_id')->unsigned()->index();
//            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreignId('booking_id')->unsigned()->index()->nullable()->constrained('bookings');

//            $table->integer('service_id')->unsigned()->index();
//            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreignId('service_id')->unsigned()->index()->nullable()->constrained('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_service');
    }
}

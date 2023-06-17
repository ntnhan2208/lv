<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('date_start');
            $table->date('date_end');
            $table->decimal('total_room', 9, 0);
            $table->decimal('deposits', 9, 0)->nullable();
            $table->decimal('total_deposits', 9, 0)->nullable();
            $table->decimal('total_price', 9, 0);
            $table->boolean('paid')->default(false);
            $table->text('request')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('room_id')->unsigned()->nullable()->constrained('rooms');
            $table->foreignId('customer_id')->unsigned()->nullable()->constrained('customers');
            $table->foreignId('admin_id')->unsigned()->nullable()->constrained('admins');
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
        Schema::dropIfExists('bookings');
    }
}

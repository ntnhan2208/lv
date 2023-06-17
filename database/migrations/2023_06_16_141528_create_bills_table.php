<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->date('month');
            $table->date('date');
            $table->date('deadline');
            $table->decimal('total_room',9,0);
            $table->string('service')->nullable();
            $table->decimal('total_service',9,0)->nullable();
            $table->decimal('total',9,0);
            $table->integer('status');
            $table->integer('old_electric');
            $table->integer('new_electric');
            $table->decimal('electric', 9,0);
            $table->integer('old_water');
            $table->integer('new_water');
            $table->decimal('water',9,0);
            $table->foreignId('booking_id')->unsigned()->nullable()->constrained('bookings');
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
        Schema::dropIfExists('bills');
    }
}

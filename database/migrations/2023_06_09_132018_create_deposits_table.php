<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone', 10)->nullable();
            $table->date('date');
            $table->date('date_start');
            $table->decimal('price', 9, 0);
            $table->integer('type');
            $table->string('email');
            $table->text('note')->nullable();
            $table->integer('status');
            $table->foreignId('room_id')->unsigned()->nullable()->constrained('rooms');
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
        Schema::dropIfExists('deposits');
    }
}

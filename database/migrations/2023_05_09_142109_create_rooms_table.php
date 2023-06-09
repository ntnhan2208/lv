<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name');
            $table->text('description');
            $table->integer('amount');
            $table->integer('acreage');
            $table->decimal('price', 9, 0);
            $table->boolean('is_enabled')->default(true);
            $table->string('image')->nullable();
            $table->boolean('booked')->default(false);
            $table->foreignId('type_id')->unsigned()->nullable()->constrained('types');
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
        Schema::dropIfExists('rooms');
    }
}

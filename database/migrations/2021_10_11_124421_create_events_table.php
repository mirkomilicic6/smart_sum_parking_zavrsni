<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('id_parking_space');
            $table->integer('id_parking_lot');
            $table->integer('id_parking_lot_type');
            $table->integer('name');
            $table->string('type');
            $table->boolean('occupied');
            $table->dateTime('created_at');
            $table->integer('normal_available');
            $table->integer('normal_occupied');
            $table->integer('handicap_available');
            $table->integer('handicap_occupied');
            $table->integer('parking_space_name');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

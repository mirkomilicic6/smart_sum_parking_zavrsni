<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_parking_lot');
            $table->integer('id_parking_type');
            $table->boolean('occupied');
            $table->decimal('lat', $precision = 8, $scale = 6);
            $table->decimal('lng', $precision = 9, $scale = 6);
            $table->dateTime('updated_at');
            $table->integer('parking_space_name');
            $table->dateTime('last_event');
            $table->string('type');
            $table->boolean('is_visible');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lots');
    }
}

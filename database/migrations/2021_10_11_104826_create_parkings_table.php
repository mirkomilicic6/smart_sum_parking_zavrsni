<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->integer('id');
            $table->boolean('daily_payment');
            $table->string('name');
            $table->integer('id_type');
            $table->boolean('has_custom_business_hours');
            $table->string('address');
            $table->boolean('is_payment_enabled');
            $table->integer('vendor_parking_lot_id');
            $table->boolean('ppk_only');
            $table->text('description')->nullable();
            $table->integer('capacity');
            $table->integer('capacity_handicap');
            $table->integer('capacity_taxi');
            $table->integer('capacity_reserved');
            $table->integer('capacity_echarge');
            $table->decimal('lat', $precision = 8, $scale = 6);
            $table->decimal('lng', $precision = 9, $scale = 6);
            $table->boolean('is_active');
            $table->integer('zoneId')->nullable();
            $table->string('zone')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_extra')->nullable();
            $table->integer('daily_price')->nullable();
            $table->string('period')->nullable();
            $table->string('sms_number')->nullable();
            $table->string('color_hex')->nullable();
            $table->integer('max_duration')->nullable();
            $table->boolean('has_sensors');
            $table->integer('lot_daily_price')->nullable();
            $table->integer('normal_available');
            $table->integer('normal_occupied');
            $table->integer('handicap_available');
            $table->integer('handicap_occupied');
            $table->string('open_time')->nullable();
            $table->string('close_time')->nullable();
            $table->string('type');
            $table->integer('capacity_normal');

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
        Schema::dropIfExists('parkings');
    }
}

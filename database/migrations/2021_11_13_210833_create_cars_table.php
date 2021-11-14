<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->string('option');
            $table->string('engine_cylinders');
            $table->string('engine_displacement');
            $table->string('engine_power');
            $table->string('engine_torque');
            $table->string('engine_fuel_system');
            $table->string('engine_fuel');
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
        Schema::dropIfExists('cars');
    }
}

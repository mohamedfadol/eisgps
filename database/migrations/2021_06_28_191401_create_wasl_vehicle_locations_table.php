<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaslVehicleLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wasl_vehicle_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('traccar_id');
            $table->integer('traccar_vehicle_id');
            $table->text('wasl_result')->nullable();
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
        Schema::dropIfExists('wasl_vehicle_locations');
    }
}

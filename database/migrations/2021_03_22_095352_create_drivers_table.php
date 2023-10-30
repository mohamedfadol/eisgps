<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('traccar_device_id')->nullable();
            $table->bigInteger('traccar_driver_id');
            $table->bigInteger('owner_id')->nullable();
            $table->date('birthday')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->string('id_number')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('nationality')->nullable()->default(null);
            $table->string('licence_type')->nullable()->default(null);
            $table->date('date_licence')->nullable()->default(null);
            $table->date('exp_date_licence')->nullable()->default(null);
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
        Schema::dropIfExists('drivers');
    }
}

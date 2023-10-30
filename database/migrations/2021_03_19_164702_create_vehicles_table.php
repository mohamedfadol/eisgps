<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('traccar_device_id');
            $table->bigInteger('owner_id')->nullable();
            $table->string('code')->nullable()->default(null);
            $table->string('plate_number')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('manufacture')->nullable()->default(null);
            $table->string('model')->nullable()->default(null);
            $table->string('manufacture_year')->nullable()->default(null);
            $table->string('color')->nullable()->default(null);
            $table->string('counter')->nullable()->default(null);
            $table->string('fuel_type')->nullable()->default(null);
            $table->string('fuel_cost')->nullable()->default(null);
            $table->string('fuel_consumption')->nullable()->default(null);
            $table->string('tank_capacity')->nullable()->default(null);
            $table->integer('plate_type')->nullable()->default(null);
            $table->string('insurance_type')->nullable()->default(null);
            $table->string('serial_number')->nullable()->default(null);
            $table->date('exp_library')->nullable()->default(null);
            $table->date('exam_date')->nullable()->default(null);
            $table->string('structure_number')->nullable()->default(null);
            $table->string('engine_serial_number')->nullable()->default(null);
            $table->date('purchase_date')->nullable()->default(null);
            $table->string('storage_box_capacity')->nullable()->default(null);
            $table->string('doors_number')->nullable()->default(null);
            $table->string('seats_number')->nullable()->default(null);
            $table->string('motion_vector')->nullable()->default(null);
            $table->string('supplier')->nullable()->default(null);
            $table->string('insurance_number')->nullable()->default(null);
            $table->date('start_insurance_date')->nullable()->default(null);
            $table->date('end_insurance_date')->nullable()->default(null);
            $table->integer('command_status')->nullable()->default(null);
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
        Schema::dropIfExists('vehicles');
    }
}

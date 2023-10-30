<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIMEIToVehWasl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wasl_vehicles', function (Blueprint $table) {


            $table->string('imei')->nullable()->after('wasl_vehicle_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('veh_wasl', function (Blueprint $table) {
            //
        });
    }
}

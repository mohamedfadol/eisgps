<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simcards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('iccid');
            $table->boolean('status')->default(true);
            $table->date('activated_date')->nullable();
            $table->date('date_added')->nullable();
            $table->string('device_id')->nullable();
            $table->double('usage')->nullable();
            $table->boolean('in_session')->default(true);
            $table->string('msisdn')->nullable();
            $table->string('rate_plan')->nullable();
            $table->boolean('usage_limit_reached')->default(false);
            $table->string('imsi')->nullable();
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
        Schema::dropIfExists('simcards');
    }
}

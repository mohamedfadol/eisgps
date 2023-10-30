<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('traccar_id');
            $table->bigInteger('owner_id')->nullable();
            $table->string('number_at_ministry');
            $table->string('commercial_register_number')->nullable()->default(null);
            $table->date('commercial_register_start_date')->nullable()->default(null);
            $table->date('commercial_register_end_date')->nullable()->default(null);
            $table->string('full_name_ar')->nullable()->default(null);
            $table->string('full_name_en')->nullable()->default(null);
            $table->string('short_name_ar')->nullable()->default(null);
            $table->string('short_name_en')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('mail_box')->nullable()->default(null);
            $table->string('post_code')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('fax')->nullable()->default(null);
            $table->string('website')->nullable()->default(null);
            $table->string('manager_name')->nullable()->default(null);
            $table->string('manager_phone')->nullable()->default(null);
            $table->string('manager_mobile')->nullable()->default(null);
            $table->string('manager_mail')->nullable()->default(null);
            $table->string('id_number')->nullable()->default(null);
            $table->boolean('veh_rental_management_service')->default(false);
            $table->boolean('veh_maintenance_service')->default(false);
            $table->boolean('veh_tracking_service')->default(false);
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
        Schema::dropIfExists('facilities');
    }
}

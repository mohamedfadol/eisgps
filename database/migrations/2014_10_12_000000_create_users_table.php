<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('traccar_id');
            $table->string('name')->nullable()->default(null);
            $table->string('email')->unique();
            $table->string('gender')->nullable()->default(null);
            $table->string('basicAuth')->nullable()->default(null);
            $table->string('mobile')->nullable()->default(null);
            $table->date('birthday')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('addressNo')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('zipCode')->nullable()->default(null);
            $table->string('mapLayer')->nullable()->default(null);
            $table->string('id_number')->nullable()->default(null);
            $table->boolean('wassel')->default(false);
            $table->integer('authMobileCode')->nullable()->default(null);
            $table->enum('accountType',[1,2,3])->default(2);
            $table->boolean('isAdmin')->default(false);
            $table->date('expiry_date')->nullable();
            $table->date('start_date')->nullable();
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
        Schema::dropIfExists('users');
    }
}

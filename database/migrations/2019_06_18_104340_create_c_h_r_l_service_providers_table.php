<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCHRLServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_h_r_l_service_providers', function (Blueprint $table) {
            $table->string('serviceProviderId')->primary();
            $table->string('serviceCatagoryId');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->boolean('isOpen')->nullable()->default(true);
            $table->string('webLink')->nullable();
            $table->time('openningHour')->nullable();
            $table->time('closingHour')->nullable();
            $table->string('logo')->default(uniqid('SP-') . 'jpg');
            $table->longText('description')->nullable();
            $table->foreign('serviceCatagoryId')->references('serviceCatagoryId')->on('service_catagories')->onDelete('cascade');
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
        Schema::dropIfExists('c_h_r_l_service_providers');
    }
}

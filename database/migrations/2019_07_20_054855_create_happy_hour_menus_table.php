<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHappyHourMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('happy_hour_menus', function (Blueprint $table) {
            $table->string('happyHourId')->primary();
            $table->string('serviceProviderId');
            $table->double('discountPercent', 15, 8)->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('recent')->default(true);
            $table->foreign('serviceProviderId')->references('serviceProviderId')->on('c_h_r_l_service_providers')->onDelete('cascade');
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
        Schema::dropIfExists('happy_hour_menus');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHappyHourItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('happy_hour_items', function (Blueprint $table) {
            $table->string('happyHourId')->primary();
            $table->string('itemId');
            $table->string('serviceProviderId');
            $table->double('discountPercent', 15, 8)->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->boolean('recent')->nullable()->default(true);
            $table->foreign('itemId')->references('itemId')->on('menu_items')->onDelete('cascade');
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
        Schema::dropIfExists('happy_hour_items');
    }
}

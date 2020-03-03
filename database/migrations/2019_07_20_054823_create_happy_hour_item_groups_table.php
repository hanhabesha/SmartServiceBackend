<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHappyHourItemGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('happy_hour_item_groups', function (Blueprint $table) {
            $table->string('happyHourId')->primary();
            $table->string('itemsGroupId', 100);
            $table->double('discountPercent', 15, 8)->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->boolean('recent')->default(true);
            $table->string('serviceProviderId');
            $table->longText('description')->nullable();
            $table->foreign('itemsGroupId')->references('itemsGroupId')->on('menu_item_groups')->onDelete('cascade');
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
        Schema::dropIfExists('happy_hour_item_groups');
    }
}

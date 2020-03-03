<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->string('itemId')->primary();
            $table->string('itemsGroupId');
            $table->string('serviceProviderId');
            $table->string('picture', 1000)->nullable()->default('noimage.jpg');
            $table->boolean('availability')->nullable()->default(true);
            $table->string('name', 100)->nullable()->default('text');
            $table->double('price', 15, 8)->nullable()->default(123.4567);
            $table->longText('description')->nullable();
            $table->foreign('serviceProviderId')->references('serviceProviderId')->on('c_h_r_l_service_providers')->onDelete('cascade');
            $table->foreign('itemsGroupId')->references('itemsGroupId')->on('menu_item_groups')->onDelete('cascade');
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
        Schema::dropIfExists('menu_items');
    }
}

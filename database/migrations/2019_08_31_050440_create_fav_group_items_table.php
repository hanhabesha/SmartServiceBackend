<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavGroupItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fav_group_items', function (Blueprint $table) {
            $table->string('favId', 100)->primary();
            $table->string('userId');
            $table->string('itemsGroupId');
            $table->foreign('userId')->references('userId')->on('end_users')->onDelete('cascade');
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
        Schema::dropIfExists('fav_group_items');
    }
}

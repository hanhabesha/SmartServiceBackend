<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fav_menu_items', function (Blueprint $table) {
            $table->string('favId', 100)->primary();
            $table->string('userId');
            $table->string('itemId');
            $table->foreign('userId')->references('userId')->on('end_users')->onDelete('cascade');
            $table->foreign('itemId')->references('itemId')->on('menu_items')->onDelete('cascade');
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
        Schema::dropIfExists('fav_menu_items');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMIRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_i_ratings', function (Blueprint $table) {
            $table->string('userId');
            $table->string('itemId');
            $table->double('rating');
            $table->primary(['userId', 'itemId']);
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
        Schema::dropIfExists('m_i_ratings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fav_service_providers', function (Blueprint $table) {
            $table->string('favId', 100)->primary();
            $table->string('userId');
            $table->string('serviceProviderId');
            $table->foreign('userId')->references('userId')->on('end_users')->onDelete('cascade');
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
        Schema::dropIfExists('fav_service_providers');
    }
}

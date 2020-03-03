<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSPRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_p_ratings', function (Blueprint $table) {
            $table->string('userId');
            $table->string('serviceProviderId');
            $table->double('rating');
            $table->primary(['userId', 'serviceProviderId']);
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
        Schema::dropIfExists('s_p_ratings');
    }
}

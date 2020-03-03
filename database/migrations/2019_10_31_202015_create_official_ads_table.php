<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('official_ads', function (Blueprint $table) {
            $table->string('adsId')->primary();
            $table->string('link')->nullable();
            $table->string('poster')->nullable();
            $table->string('title')->nullable();
            $table->string('partnerId');
            $table->longText('description')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->foreign('partnerId')->references('partnerId')->on('official_partners')->onDelete('cascade');
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
        Schema::dropIfExists('official_ads');
    }
}

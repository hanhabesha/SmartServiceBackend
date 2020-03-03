<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('official_partners', function (Blueprint $table) {
            $table->string('partnerId')->primary();
            $table->string('name', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('webLink')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('official_partners');
    }
}

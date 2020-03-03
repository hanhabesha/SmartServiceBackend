<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTVBroadCompsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_v_broad_comps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('companyId');
            $table->string('name');

            $table->string('email')->unique();
            $table->string('phone');
            $table->string('webLink');
            $table->string('logo')->default('comp' . uniqid() . 'jpg');
            $table->text('description');
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
        Schema::dropIfExists('t_v_broad_comps');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->string('orderId');
            $table->longText('description')->nullable();
            $table->string('userId');
            $table->string('itemId');
            $table->string('tableId');
            $table->string('status');
            $table->string('serviceProviderId');
            $table->integer('quantity')->default(1);;
            $table->foreign('userId')->references('userId')->on('end_users')->onDelete('cascade');
            $table->foreign('serviceProviderId')->references('serviceProviderId')->on('c_h_r_l_service_providers')->onDelete('cascade');
            $table->foreign('itemId')->references('itemId')->on('menu_items')->onDelete('cascade');
            $table->foreign('tableId')->references('tableId')->on('tables')->onDelete('cascade');
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
        Schema::dropIfExists('customer_orders');
    }
}

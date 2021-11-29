<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id');
            $table->integer('user_id');
            $table->date('date');
            $table->time('time');
            $table->integer('guests')->default(2);
            $table->integer('table')->default(0);
            $table->boolean('confirm_admin')->default(false);
            $table->boolean('cancel_reservation')->default(false);
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
        Schema::dropIfExists('orders');
    }
}

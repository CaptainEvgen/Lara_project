<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone_number')->unique();
            $table->string('email')->unique()->nullable(true);
            $table->string('password');
                //$table->integer('role_id')->default(1);
            $table->foreign('role_id')->references('id')->on('roles')->default(1); //явно указывается привязка к определенному столбцу определенной таблицы. Будет работать, если на момент миграции таблица, на которую идет ссылка, уже создана
                //$table->integer('restaurant_id')->default(0);
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->default(0);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('patronymic');
            $table->string('email', 127)->unique();
            $table->enum('role', ['guest', 'client', 'operator', 'manager', 'administrator']);
            $table->string('password');
            $table->date('birthdate');
            $table->string('phone', 12);
            $table->string('skype');
            $table->string('twitter');
            $table->string('viber');
            $table->string('loyality_card', 32);
            $table->string('options');
            $table->string('last_ip', 16);
            $table->timestamps();            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}

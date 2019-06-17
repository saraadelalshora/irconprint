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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->text('notes')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            // $table->integer('city_id')->unsigned()->index();
            // $table->integer('country_id')->unsigned()->index();
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('city_id')->references('id')->on('cities') ->onDelete('cascade');
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
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

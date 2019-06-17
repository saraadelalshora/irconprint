<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('img1')->nullable();
            $table->string('link1')->nullable();
            $table->text('description1')->nullable();
            $table->enum('status1', ['0', '1'])->default('1');
            // $table->integer('order')->nullable();
            $table->string('img2')->nullable();
            $table->string('link2')->nullable();
            $table->text('description2')->nullable();
            $table->enum('status2', ['0', '1'])->default('1');

            $table->string('img3')->nullable();
            $table->string('link3')->nullable();
            $table->text('description3')->nullable();
            $table->enum('status3', ['0', '1'])->default('1');

            $table->string('img4')->nullable();
            $table->string('link4')->nullable();
            $table->text('description4')->nullable();
            $table->enum('status4', ['0', '1'])->default('1');

            $table->string('img5')->nullable();
            $table->string('link5')->nullable();
            $table->text('description5')->nullable();
            $table->enum('status5', ['0', '1'])->default('1');

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
        Schema::dropIfExists('ads');
    }
}

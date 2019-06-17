<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatergoriesNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catergories_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
            $table->string('slogen_ar');
            $table->string('slogen_en')->nullable();
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
        Schema::dropIfExists('catergories_news');
    }
}

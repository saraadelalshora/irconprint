<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');    
            $table->string('title_ar');
            $table->string('title_en')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar');
            $table->string('img')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
            $table->enum('type', ['0', '1','2','3','4'])->default('4');
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
        Schema::dropIfExists('pages');
    }
}

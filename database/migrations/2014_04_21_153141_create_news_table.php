<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar');
            $table->string('title_en')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar');
            $table->Text('meta_description_en')->nullable();
            $table->Text('meta_description_ar')->nullable();
            $table->string('tags')->nullable();
            $table->string('image');
            $table->enum('status', ['0', '1'])->default('1');
            $table->string('slogen_ar')->nullable();
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
        Schema::dropIfExists('news');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->longText('description_ar');
            $table->longText('description_en')->nullable();
            $table->string('image')->nullable();
            $table->string('slogen_ar');
            $table->string('slogen_en')->nullable();
            $table->integer('order')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
            $table->integer('page_id')->unsigned()->index()->nullable();
            $table->foreign('page_id')
                       ->references('id')->on('pages')
                       ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sections');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtwoCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtwo_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->longText('description_ar');
            $table->longText('description_en')->nullable();
            $table->string('tag_ar')->nullable();
            $table->string('tag_en')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
            $table->integer('subcategory_id')->unsigned()->index();
            $table->string('slogen_ar');
            $table->string('slogen_en')->nullable();
            $table->enum('type', ['product', 'video','training'])->default('product');
            $table->foreign('subcategory_id')
            ->references('id')->on('sub__categories')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subtwo_categories');
    }
}

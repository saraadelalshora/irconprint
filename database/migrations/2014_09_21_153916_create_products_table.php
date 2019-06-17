<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // filter_id
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('tag_ar')->nullable();
            $table->string('tag_en')->nullable();
            $table->string('image')->nullable();
            $table->double('price')->nullable();
            $table->string('code');
            $table->string('slogen_ar');
            $table->string('slogen_en')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
            $table->enum('availbale', ['0', '1'])->default('1');
            $table->integer('manufactor_id')->unsigned()->index()->nullable();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('subcategory_id')->unsigned()->index()->nullable();
            $table->integer('subtwocategory_id')->unsigned()->index()->nullable();
            
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories') ->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub__categories') ->onDelete('cascade');
            $table->foreign('subtwocategory_id')->references('id')->on('subtwo_categories') ->onDelete('cascade');
            $table->foreign('manufactor_id')->references('id')->on('manufactors') ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

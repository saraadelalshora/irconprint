<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('notes')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email');
            $table->string('log_img_en')->nullable();
            $table->string('logo_img')->nullable();
            $table->string('icon_img')->nullable();
            $table->text('head_code')->nullable();
            $table->enum('maintans_status', ['0', '1'])->default('0');
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
        Schema::dropIfExists('settings');
    }
}

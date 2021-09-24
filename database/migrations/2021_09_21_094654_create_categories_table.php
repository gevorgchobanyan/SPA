<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('alias', 255);
            $table->string('full_path', 255)->default(null)->nullable();
            $table->string('id_1c', 255)->default(null)->nullable();
            $table->unsignedInteger('parent_id')->default(0)->nullable();
            $table->unsignedInteger('order')->default(10);
            $table->text('content')->nullable();
            $table->string('seo_description', 1000)->nullable();
            $table->string('seo_keywords', 1000)->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_h1', 255)->nullable();
            $table->unsignedInteger('image_id')->nullable();
            $table->tinyInteger('show_on_main')->default(0);
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('categories');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 400);
            $table->string('alias', 400);
            $table->string('full_path', 255)->nullable();;
            $table->unsignedInteger('category_id')->nullable();
            $table->string('product_code', 255)->nullable();;
            $table->string('id_1c', 255)->nullable();;
            $table->text('description')->nullable();
            $table->unsignedInteger('weight');
            $table->unsignedInteger('length');
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');
            $table->unsignedInteger('volume')->nullable();
            $table->unsignedInteger('order');
            $table->unsignedInteger('price');
            $table->unsignedInteger('old_price')->nullable();
            $table->unsignedInteger('discount_percent')->nullable();
            $table->unsignedInteger('image_id')->nullable();
            $table->tinyInteger('new')->default(0);
            $table->tinyInteger('sale')->default(0);
            $table->tinyInteger('recommended')->default(0);
            $table->boolean('active')->default(1);
            $table->text('seo_text')->nullable();
            $table->string('seo_description', 1000)->nullable();
            $table->string('seo_keywords', 1000)->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_h1', 255)->nullable();
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
        Schema::dropIfExists('products');
    }
}

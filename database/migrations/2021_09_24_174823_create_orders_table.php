<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('status_id')->constrained('order_statuses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('code')->nullable()->default(null);
            $table->string('delivery_method');
            $table->string('delivery_type');
            $table->string('delivery_address')->nullable();
            $table->string('pickup_point')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            $table->unsignedInteger('delivery_price')->nullable();
            $table->unsignedInteger('discount_sum')->nullable();
            $table->unsignedInteger('bonus_used')->nullable();
            $table->unsignedInteger('total')->nullable();
            $table->string('payment_type');
            $table->boolean('paid')->default(false);
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
        Schema::table('orders', function (Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['status_id']);
        });
        Schema::dropIfExists('orders');
    }
}

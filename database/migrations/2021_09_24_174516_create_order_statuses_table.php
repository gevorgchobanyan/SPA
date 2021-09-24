<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 250);
            $table->string('code', 250);
            $table->timestamps();
        });

        DB::table('order_statuses')->insert([
            ['name' => 'Принят', 'code' => 'new'],
            ['name' => 'Оплачен', 'code' => 'paid'],
            ['name' => 'Собирается', 'code' => 'progress'],
            ['name' => 'Отправлен', 'code' => 'delivery'],
            ['name' => 'Доставлен', 'code' => 'delivered'],
            ['name' => 'Завершен', 'code' => 'success'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
}

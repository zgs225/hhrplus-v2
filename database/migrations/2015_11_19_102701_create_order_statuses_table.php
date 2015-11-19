<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('order_id');
            /**
             * 订单状态码
             * 0 - 未付款
             * 1 - 已付款
             * 2 - 已服务
             * 3 - 已取消
             */
            $table->smallInteger('status_code');
            $table->string('status', 45);
            $table->string('description')->nullable();
            $table->boolean('is_current');
            $table->softDeletes();
            $table->timestamps();

            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_statuses');
    }
}

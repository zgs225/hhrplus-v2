<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('order_no', 45);
            $table->timestamp('paid_at');
            $table->string('buyer_name');
            $table->string('buyer_telephone', 45);
            $table->string('buyer_email');
            $table->string('buyer_ip', 45);
            $table->decimal('total_amount', 10, 2);
            $table->decimal('actual_amount', 10, 2);
            $table->decimal('discount_amount', 10, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->index('user_id');
            $table->unique('order_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}

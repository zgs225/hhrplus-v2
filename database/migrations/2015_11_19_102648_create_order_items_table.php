<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('package_good_id');
            $table->string('product_name');
            $table->decimal('list_price', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('actual_amount', 10, 2);
            $table->decimal('discount_amount', 10, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->index('order_id');
            $table->index('package_good_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_items');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_good_id');
            $table->unsignedInteger('sku_id');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->softDeletes();
            $table->timestamps();

            $table->index('package_good_id');
            $table->index('sku_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('good_items');
    }
}

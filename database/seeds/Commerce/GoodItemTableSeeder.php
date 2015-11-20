<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoodItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'good_items';

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if(env('DB_DRIVER') == 'mysql')
            DB::table($table)->truncate();
        elseif(env('DB_DRIVER') == 'sqlite')
            DB::statement("DELETE FROM ".$table);
        else //For PostgreSQL or anything else
            DB::statement("TRUNCATE TABLE ".$table." CASCADE");

        $good_items = array(
            array(
                'package_good_id' => 1,
                'sku_id' => 1,
                'price'  => 59,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 2,
                'sku_id' => 2,
                'price'  => 159,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 3,
                'sku_id' => 3,
                'price'  => 2016,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 4,
                'sku_id' => 4,
                'price'  => 980,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 5,
                'sku_id' => 5,
                'price'  => 1980,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 6,
                'sku_id' => 6,
                'price'  => 4980,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 7,
                'sku_id' => 7,
                'price'  => 480,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 8,
                'sku_id' => 8,
                'price'  => 59800,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 9,
                'sku_id' => 9,
                'price'  => 29800,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 10,
                'sku_id' => 10,
                'price'  => 19800,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
        );

        DB::table($table)->insert($good_items);

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

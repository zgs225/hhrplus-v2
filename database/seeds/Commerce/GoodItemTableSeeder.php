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
                'price'  => 1,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 2,
                'sku_id' => 2,
                'price'  => 2000,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 3,
                'sku_id' => 3,
                'price'  => 3000,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 4,
                'sku_id' => 4,
                'price'  => 18000,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 5,
                'sku_id' => 5,
                'price'  => 18000,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 6,
                'sku_id' => 7,
                'price'  => 60000,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 7,
                'sku_id' => 7,
                'price'  => 150000,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 8,
                'sku_id' => 8,
                'price'  => 100000,
                'quantity' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'package_good_id' => 9,
                'sku_id' => 9,
                'price'  => 80000,
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

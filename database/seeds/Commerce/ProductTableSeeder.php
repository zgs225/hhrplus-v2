<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'products';

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if(env('DB_DRIVER') == 'mysql')
            DB::table($table)->truncate();
        elseif(env('DB_DRIVER') == 'sqlite')
            DB::statement("DELETE FROM ".$table);
        else //For PostgreSQL or anything else
            DB::statement("TRUNCATE TABLE ".$table." CASCADE");

        $products = array(
            array(
                'product_no' => 'A01',
                'name' => '约技术聊',
                'list_price' => 159,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_no' => 'A02',
                'name' => '约导师聊',
                'list_price' => 2000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_no' => 'B01',
                'name' => '产品经理会议',
                'list_price' => 5000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_no' => 'B02',
                'name' => '产品设计',
                'list_price' => 30000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_no' => 'B03',
                'name' => 'UI设计',
                'list_price' => 16980,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_no' => 'B04',
                'name' => 'DEMO开发',
                'list_price' => 4980,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_no' => 'C01',
                'name' => 'APP开发',
                'list_price' => 69800,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_no' => 'C02',
                'name' => '网站开发',
                'list_price' => 59800,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_no' => 'C03',
                'name' => '微信开发',
                'list_price' => 49800,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            )
        );

        DB::table($table)->insert($products);

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

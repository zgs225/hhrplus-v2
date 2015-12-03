<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'skus';

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if(env('DB_DRIVER') == 'mysql')
            DB::table($table)->truncate();
        elseif(env('DB_DRIVER') == 'sqlite')
            DB::statement("DELETE FROM ".$table);
        else //For PostgreSQL or anything else
            DB::statement("TRUNCATE TABLE ".$table." CASCADE");

        $skus = array(
            array(
                'product_id' => 1,
                'stock' => 99,
                'price' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_id' => 2,
                'stock' => 0,
                'price' => 2000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_id' => 3,
                'stock' => 99,
                'price' => 1500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_id' => 4,
                'stock' => 99,
                'price' => 5000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_id' => 5,
                'stock' => 99,
                'price' => 18000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_id' => 6,
                'stock' => 0,
                'price' => 60000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_id' => 7,
                'stock' => 7,
                'price' => 150000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_id' => 8,
                'stock' => 7,
                'price' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'product_id' => 9,
                'stock' => 7,
                'price' => 80000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
        );

        DB::table($table)->insert($skus);

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

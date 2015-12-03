<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageGoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'package_goods';

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if(env('DB_DRIVER') == 'mysql')
            DB::table($table)->truncate();
        elseif(env('DB_DRIVER') == 'sqlite')
            DB::statement("DELETE FROM ".$table);
        else //For PostgreSQL or anything else
            DB::statement("TRUNCATE TABLE ".$table." CASCADE");

        $package_goods = array(
            array(
                'name' => '约技术聊',
                'status' => 1, // 上架
                'is_multiple' => false,
                'body' => '暂无',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => '约导师聊',
                'status' => 3, // 缺货
                'is_multiple' => false,
                'body' => '暂无',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => '产品需求文档会',
                'status' => 1, // 缺货
                'is_multiple' => false,
                'body' => '暂无',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => '产品原型',
                'status' => 1, // 缺货
                'is_multiple' => false,
                'body' => '暂无',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => 'UI设计',
                'status' => 1,
                'is_multiple' => false,
                'body' => '暂无',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => 'MVP开发',
                'status' => 3, // 缺货
                'is_multiple' => false,
                'body' => '暂无',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => 'APP开发',
                'status' => 1,
                'is_multiple' => false,
                'body' => '暂无',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => '网站开发',
                'status' => 1,
                'is_multiple' => false,
                'body' => '暂无',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => '微信开发',
                'status' => 1,
                'is_multiple' => false,
                'body' => '暂无',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            )
        );

        DB::table($table)->insert($package_goods);

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

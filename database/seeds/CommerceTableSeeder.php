<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommerceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('DB_DRIVER')=='mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(ProductTableSeeder::class);
        $this->call(SkuTableSeeder::class);
        $this->call(PackageGoodTableSeeder::class);
        $this->call(GoodItemTableSeeder::class);

        if(env('DB_DRIVER')=='mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

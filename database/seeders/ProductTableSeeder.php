<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('products')->insert([
            [
                'user_id' => 1,
                'category_id' => 1,
                'name' => 'Sendok',
                'price' => 2500,
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'name' => 'Meja',
                'price' => 10000,
            ],
        ]);
    }
}

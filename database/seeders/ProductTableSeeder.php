<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
            'product_name' => 'Mie Goreng',
            'product_price' => '10.000',
            'product_qty' => '12',
            'category_id' => \App\Models\Category::firstOrCreate(['category_name' => 'Makanan'])->id
        ]);

        DB::table('products')->insert([
            'product_name' => 'Susu kental Manis',
            'product_price' => '32.000',
            'product_qty' => '12',
            'category_id' => \App\Models\Category::firstOrCreate(['category_name' => 'Minuman'])->id
        ]);

        DB::table('products')->insert([
            'product_name' => 'Mie Rebus',
            'product_price' => '14.000',
            'product_qty' => '2',
            'category_id' => \App\Models\Category::firstOrCreate(['category_name' => 'Makanan'])->id
        ]);
    }
}

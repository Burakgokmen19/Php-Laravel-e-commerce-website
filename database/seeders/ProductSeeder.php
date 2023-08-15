<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Product::create([

        'name' =>  'Product1',
        'image' => 'images/cloth_1.jpg',
        'category_id'=> 1,
        'short_text' => 'Short İnfo1',
        'price' => 100,
        'size' => 'small',
        'color' => 'white',
        'qyt' => 10,
        'status' => '1',
        'content' => 'Good product1'

       ]);
       Product::create([

        'name' =>  'Product2',
        'image' => 'images/cloth_2.jpg',
        'category_id'=> 2,
        'short_text' => 'Short İnfo2',
        'price' => 100,
        'size' => 'medium',
        'color' => 'black',
        'qyt' => 10,
        'status' => '1',
        'content' => 'Good product2'

       ]);
    }
}

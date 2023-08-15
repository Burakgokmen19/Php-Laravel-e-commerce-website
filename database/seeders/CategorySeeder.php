<?php

namespace Database\Seeders;;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{


    public function run(): void
    {
       $man= Category::create([
            'image' => null,
            'thumnail' => null,
            'cat_ust' => null,
            'name' => 'Men',
            'content' => 'Men clothing',

            'status' => '1',


        ]);
         Category::create([
            'image' => null,
            'thumnail' => null,
            'cat_ust' => $man->id,
            'name' => 'Men sweat',
            'content' => 'Men sweats',

            'status' => '1',


        ]);
        Category::create([
            'image' => null,
            'thumnail' => null,
            'cat_ust' => $man->id,
            'name' => 'Men pant',
            'content' => 'Men pants',

            'status' => '1',


        ]);
        $child=Category::create([
            'image' => null,
            'thumnail' => null,
            'cat_ust' => null,
            'name' => 'Child',
            'content' => 'Child clothing',
            'status' => '1',


        ]);
        Category::create([
            'image' => null,
            'thumnail' => null,
            'cat_ust' => $child->id,
            'name' => 'Child toy',
            'content' => 'Child toys',
            'status' => '1',


        ]);
        Category::create([
            'image' => null,
            'thumnail' => null,
            'cat_ust' => $child->id,
            'name' => 'Child pant',
            'content' => 'Child pants',
            'status' => '1',


        ]);
        $woman=Category::create([
            'image' => null,
            'thumnail' => null,
            'cat_ust' => null,
            'name' => 'Women',
            'content' => 'Women clothing',
            'status' => '1',
        ]);
        Category::create([
            'image' => null,
            'thumnail' => null,
            'cat_ust' => $woman->id,
            'name' => 'Women bag',
            'content' => 'Women bags',
            'status' => '1',
        ]);
        Category::create([
            'image' => null,
            'thumnail' => null,
            'cat_ust' => $woman->id,
            'name' => 'Women pant',
            'content' => 'Women pants',
            'status' => '1',
        ]);

    }
}

<?php

namespace Database\Seeders;
use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'name' =>'Shop',
            'content' =>'Abouts is here!',
            'text_1_icon'=>'iron-truck',
            'text_1' => 'free Cargo',
            'text_1_content' => 'free cargo your products !',
            'text_2_icon' => 'icon-refresh2',
            'text_2' => 'free returns',
            'text_2_content' => 'Free returns within 30 days',
            'text_3_icon' => 'icon-help',
            'text_3' => 'Supports',
            'text_3_content' => ' You can reach us 24/7'
        ]);
    }
}

<?php

namespace Database\Seeders;
use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name' => 'Adress',
            'data' => 'Ankara/Güneşevler',

        ]);

        SiteSetting::create([
            'name' => 'phone',
            'data' => '05386679019',

        ]);

        SiteSetting::create([
            'name' => 'email',
            'data' => 'burak4159@fmail.com',

        ]);

        SiteSetting::create([
            'name' => 'map',
            'data' => null,

        ]);

    }
}

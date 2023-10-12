<?php

namespace Database\Seeders;

use App\Models\Continent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr=[
            (object)[
                'continent_tw' => '臺灣',
                'continent_en' => 'Taiwan',
            ],
            (object)[
                'continent_tw' => '亞洲',
                'continent_en' => 'Asia',
            ],
            (object)[
                'continent_tw' => '歐洲',
                'continent_en' => 'Europe',
            ],
            (object)[
                'continent_tw' => '大洋洲',
                'continent_en' => 'Oceania',
            ],
            (object)[
                'continent_tw' => '美洲',
                'continent_en' => 'Ameriaca',
            ],
        ];

        foreach ($arr as $value) {
            Continent::create([
                'continent_tw' => $value->continent_tw,
                'continent_en' => $value->continent_en,
            ]);
        }
    }
}

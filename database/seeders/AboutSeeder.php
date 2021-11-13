<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run()
    {
        $about = [
            [

                'title_az' => 'example',
                'title_ru' => 'example',
                'title_en' => 'example',
                'content_az' => 'example',
                'content_ru' => 'example',
                'content_en' => 'example',
                'slug_ru' => 'example1',
                'slug_az' => 'example2',
                'slug_en' => 'example3',
                'image' => 'example',
            ],

        ];

        About::insert($about);
    }
}

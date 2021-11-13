<?php

namespace Database\Seeders;

use App\Models\Meta_tags_title_description;
use Illuminate\Database\Seeder;

class MetaTagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            [
                'id'    => 1,
                'title' => 'example',
                'meta_tag' => 'example',
                'description' => 'example',
                'page_az' => 'Əsas Səhifə',
                'page_ru' => '',
                'page_en' => 'Home Page',
            ],
            [
                'id'    => 2,
                'title' => 'example',
                'meta_tag' => 'example',
                'description' => 'example',
                'page_az' => 'Tədbirlər',
                'page_ru' => '',
                'page_en' => 'Events',
            ],
            [
                'id'    => 3,
                'title' => 'example',
                'meta_tag' => 'example',
                'description' => 'example',
                'page_az' => 'Zallar',
                'page_ru' => '',
                'page_en' => 'Halls',
            ],
            [
                'id'    => 4,
                'title' => 'example',
                'meta_tag' => 'example',
                'description' => 'example',
                'page_az' => 'Əlaqə',
                'page_ru' => '',
                'page_en' => 'Contact',
            ],
            [
                'id'    => 5,
                'title' => 'example',
                'meta_tag' => 'example',
                'description' => 'example',
                'page_az' => 'Haqqımızda',
                'page_ru' => '',
                'page_en' => 'About',
            ],
        ];

        Meta_tags_title_description::insert($tags);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Log_type;
use Illuminate\Database\Seeder;

class LogTypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            [
                'id'    => 1,
                'title_az' => 'Düzəliş edildi',
                'title_ru' => 'Исправленo',
                'title_en' => 'Updated',
            ],
            [
                'id'    => 2,
                'title_az' => 'Silindi',
                'title_ru' => 'Yдалено',
                'title_en' => 'Deleted',
            ],
            [
                'id'    => 3,
                'title_az' => 'Əlavə edildi',
                'title_ru' => 'Добавленo',
                'title_en' => 'Added',
            ],

        ];

        Log_type::insert($types);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'news' => [
                'en' => 'News',
                'kk' => 'Jańalıqlar',
                'ru' => 'Новости',
                'uz' => 'Yangiliklar',
            ],
            'eco-active-students' => [
                'en' => 'Eco Active Students',
                'kk' => 'Ekobelsendi talabalar',
                'ru' => 'Экоактивные студенты',
                'uz' => 'Ekofaol talabalar',
            ],
            'anti-corruption' => [
                'en' => 'Anti-Corruption',
                'kk' => 'Korruptsiyaga qarsı kuresiw',
                'ru' => 'Борьба с коррупцией',
                'uz' => 'Korrupsiyaga qarshi kurashish',
            ],
            'events' => [
                'en' => 'Events',
                'kk' => 'Ilajlar',
                'ru' => 'Мероприятия',
                'uz' => 'Tadbirlar',
            ],
        ];

        foreach ($categories as $slug => $translations) {

            $category = Category::firstOrCreate([
                'slug' => $slug,
            ]);

            foreach ($translations as $langCode => $name) {
                CategoryTranslation::firstOrCreate([
                    'category_id' => $category->id,
                    'lang_code'   => $langCode,
                ], [
                    'name'        => $name,
                ]);
            }
        }
    }
}

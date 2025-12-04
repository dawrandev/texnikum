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
            'yangiliklar' => [
                1 => 'News',
                2 => 'Jańalıqlar',
                3 => 'Новости',
                4 => 'Yangiliklar',
            ],
            'ekofaol-talabalar' => [
                1 => 'Eco Active Students',
                2 => 'Ekobelsendi talabalar',
                3 => 'Экоактивные студенты',
                4 => 'Ekofaol talabalar',
            ],
            'korrupciyaga-qarshi-kurashish' => [
                1 => 'Anti-Corruption',
                2 => 'Korruptsiyaga qarsı kuresiw',
                3 => 'Борьба с коррупцией',
                4 => 'Korrupsiyaga qarshi kurashish',
            ],
        ];

        foreach ($categories as $slug => $translations) {

            $category = Category::firstOrCreate([
                'slug' => $slug,
            ]);

            foreach ($translations as $languageId => $name) {

                CategoryTranslation::firstOrCreate([
                    'category_id' => $category->id,
                    'language_id' => $languageId,
                    'name'        => $name,
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['code' => 'en', 'name' => 'Aнглийский'],
            ['code' => 'kk', 'name' => 'Каракалпакский'],
            ['code' => 'ru', 'name' => 'Русский'],
            ['code' => 'uz', 'name' => 'Узбекский'],
        ];

        foreach ($languages as $language) {
            \App\Models\Language::updateOrCreate(
                ['code' => $language['code']],
                ['name' => $language['name']]
            );
        }
    }
}

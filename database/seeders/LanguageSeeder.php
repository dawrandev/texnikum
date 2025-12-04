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
            ['code' => 'en', 'name' => 'English'],
            ['code' => 'kk', 'name' => 'Qaraqalpaqsha'],
            ['code' => 'ru', 'name' => 'Русский'],
            ['code' => 'uz', 'name' => "O'zbekcha"],
        ];

        foreach ($languages as $language) {
            \App\Models\Language::create($language);
        }
    }
}

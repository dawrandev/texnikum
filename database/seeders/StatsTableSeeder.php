<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statsData = [
            [
                'count' => 82,
                'translations' => [
                    'uz' => "Ta'lim yo'nalishlari",
                    'ru' => 'Направления образования',
                    'en' => 'Areas of study',
                    'kk' => 'Bilim beriw baǵdarları',
                ]
            ],
            [
                'count' => 1072,
                'translations' => [
                    'uz' => 'Professor-o‘qituvchilar',
                    'ru' => 'Профессорско-преподавательский состав',
                    'en' => 'Faculty members',
                    'kk' => 'Professor-oqıtıwshılar',
                ]
            ],
            [
                'count' => 27330,
                'translations' => [
                    'uz' => 'Studentlar',
                    'ru' => 'Студенты',
                    'en' => 'Students',
                    'kk' => 'Studentler',
                ]
            ],
            [
                'count' => 53,
                'translations' => [
                    'uz' => 'Auditoriyalar soni',
                    'ru' => 'Количество аудиторий',
                    'en' => 'Number of classrooms',
                    'kk' => 'Auditoriyalar sanı',
                ]
            ],
            [
                'count' => 17,
                'translations' => [
                    'uz' => 'Fakultetlar soni',
                    'ru' => 'Количество факультетов',
                    'en' => 'Number of faculties',
                    'kk' => 'Fakultetler sanı',
                ]
            ],
            [
                'count' => 265,
                'translations' => [
                    'uz' => 'Doktorantlar',
                    'ru' => 'Докторанты',
                    'en' => 'Doctoral students',
                    'kk' => 'Doktorantlar',
                ]
            ],
        ];

        $currentTime = now();

        foreach ($statsData as $data) {
            $statId = DB::table('stats')->insertGetId([
                'count' => $data['count'],
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ]);

            foreach ($data['translations'] as $lang_code => $title) {
                DB::table('stats_translations')->insert([
                    'stats_id' => $statId,
                    'lang_code' => $lang_code,
                    'title' => $title,
                    'created_at' => $currentTime,
                    'updated_at' => $currentTime,
                ]);
            }
        }
    }
}

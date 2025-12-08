<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\VideoTranslation;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $videos = [
            [
                'url' => 'https://www.youtube.com/watch?v=F-ql5OMdMdo&t=136s',
                'translations' => [
                    'en' => 'Karakalpak state university',
                    'kk' => 'Qoraqalpaq memleket universiteti',
                    'ru' => 'Каракалпакский государственный университет',
                    'uz' => "Qoraqalpoq davlat universiteti",
                ],
                'published_at' => now(),
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=wlRMcv_zQew',
                'translations' => [
                    'en' => 'Berdakh Karakalpak State University: Modern Education, Competitive Future!',
                    'kk' => 'Berdax Qoraqalpaq davlat universiteti: Zamana bilim, bäske keleshek!',
                    'ru' => 'Бердах Каракалпакский государственный университет: Современное образование, конкурентное будущее!',
                    'uz' => "Berdakh Qoraqalpoq davlat universiteti: Zamonaviy ta’lim, raqobatbardosh kelajak!",
                ],
                'published_at' => now(),
            ],
        ];

        foreach ($videos as $videoData) {
            $video = Video::updateOrCreate(
                ['url' => $videoData['url']],
                ['published_at' => $videoData['published_at']]
            );

            foreach ($videoData['translations'] as $langCode => $title) {
                VideoTranslation::updateOrCreate(
                    ['video_id' => $video->id, 'lang_code' => $langCode],
                    ['title' => $title]
                );
            }
        }
    }
}

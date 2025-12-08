<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Repositories\PostRepository;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $postRepository = new PostRepository();
        $eventCategoryId = $postRepository->getCategoryIdBySlug('events'); // slug: events

        if (!$eventCategoryId) {
            $this->command->info('Event category not found. Seeder skipped.');
            return;
        }

        $postsData = [
            [
                'slug' => 'diqqat-elon',
                'image' => null,
                'published_at' => Carbon::parse('2025-11-28'),
                'translations' => [
                    [
                        'lang_code' => 'uz',
                        'title' => "DIQQAT E’LON!",
                        'content' => "Berdaq nomidagi Qoraqalpoq davlat universitetida 2026-yil uchun oliy ta’limdan keyingi ta’limning tayanch doktorantura (PhD), doktorantura (DSc), stajyor-tadqiqotchi va mustaqil izlanuvchi (PhD, DSc) mutaxassisliklariga o‘tkazilgan imtihon natijalari.\n\nNatijalar bilan tanishing"
                    ]
                ]
            ],
            [
                'slug' => 'qosimov-xasanboy-phd-himoyasi',
                'image' => 'event1.jpg',
                'published_at' => Carbon::parse('2025-11-17'),
                'translations' => [
                    [
                        'lang_code' => 'uz',
                        'title' => "Qosimov Xasanboy Sirojiddinovichning geografiya fanlari bo‘yicha falsafa doktori (PhD) ilmiy darajasini olish uchun tayyorlagan dissertatsiya ishi himoyasi  to‘g‘risida",
                        'content' => "Andijon davlat universiteti mustaqil izlanuvchisi Qosimov Xasanboy Sirojiddinovichning 11.00.02–Iqtisodiy va ijtimoiy geografiya ixtisosligi bo‘yicha ««Andijon viloyati shaharlari rivojlanishining iqtisodiy-geografik jihatlari»  mavzusidagi geografiya fanlari bo‘yicha falsafa doktori (PhD) dissertatsiya himoyasi  ilmiy darajasini Qoraqalpoq davlat universiteti  huzuridagi PhD.03/31.10.2022.Gr.20.08 raqamli Ilmiy kengash Ilmiy kengashning 2025-yil 22-noyabr kuni soat 10:00dagi majlisi Qoraqalpoq davlat universiteti Axborot resurs markazining 3 qavatidagi konferentsiya xonasida o‘tkaziladi."
                    ]
                ]
            ]
        ];

        foreach ($postsData as $postData) {
            $post = Post::create([
                'category_id' => $eventCategoryId,
                'slug' => $postData['slug'],
                'image' => $postData['image'] ?? null,
                'published_at' => $postData['published_at'],
                'views_count' => 0,
            ]);

            foreach ($postData['translations'] as $trans) {
                PostTranslation::create([
                    'post_id' => $post->id,
                    'lang_code' => $trans['lang_code'],
                    'title' => $trans['title'],
                    'content' => $trans['content'],
                ]);
            }
        }
    }
}

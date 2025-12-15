<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Repositories\API\PostRepository;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $postRepository = new PostRepository();
        $eventCategoryId = $postRepository->getCategoryIdBySlug('events');

        if (!$eventCategoryId) {
            $this->command->info('Event category not found. Seeder skipped.');
            return;
        }

        $postsData = [
            [
                'images' => [],
                'published_at' => Carbon::parse('2025-11-28'),
                'translations' => [
                    [
                        'lang_code' => 'uz',
                        'slug' => 'diqqat-elon',
                        'title' => "DIQQAT E'LON!",
                        'content' => "<h2>DIQQAT E'LON!</h2>
                                      <p>Berdaq nomidagi Qoraqalpoq davlat universitetida <strong>2026-yil uchun oliy ta'limdan keyingi ta'limning</strong> tayanch doktorantura (PhD), doktorantura (DSc), stajyor-tadqiqotchi va mustaqil izlanuvchi (PhD, DSc) mutaxassisliklariga o'tkazilgan imtihon natijalari.</p>
                                      <p><em>Natijalar bilan tanishing</em></p>"
                    ]
                ]
            ],
            [
                'images' => ['event1.jpg'],
                'published_at' => Carbon::parse('2025-11-17'),
                'translations' => [
                    [
                        'lang_code' => 'uz',
                        'slug' => 'qosimov-xasanboy-phd-himoyasi',
                        'title' => "Qosimov Xasanboy Sirojiddinovichning geografiya fanlari bo'yicha falsafa doktori (PhD) ilmiy darajasini olish uchun tayyorlagan dissertatsiya ishi himoyasi to'g'risida",
                        'content' => "<h2>PhD dissertatsiya himoyasi</h2>
                                      <p>Andijon davlat universiteti mustaqil izlanuvchisi <strong>Qosimov Xasanboy Sirojiddinovichning</strong> 11.00.02–Iqtisodiy va ijtimoiy geografiya ixtisosligi bo'yicha «Andijon viloyati shaharlari rivojlanishining iqtisodiy-geografik jihatlari» mavzusidagi geografiya fanlari bo'yicha falsafa doktori (PhD) dissertatsiya himoyasi ilmiy darajasini Qoraqalpoq davlat universiteti huzuridagi PhD.03/31.10.2022.Gr.20.08 raqamli Ilmiy kengash Ilmiy kengashning 2025-yil 22-noyabr kuni soat 10:00dagi majlisi Qoraqalpoq davlat universiteti Axborot resurs markazining 3 qavatidagi konferentsiya xonasida o'tkaziladi.</p>
                                      <h3>Ma'lumotlar:</h3>
                                      <ul>
                                        <li><strong>Sana:</strong> 2025-yil 22-noyabr</li>
                                        <li><strong>Vaqt:</strong> 10:00</li>
                                        <li><strong>Manzil:</strong> Qoraqalpoq davlat universiteti, Axborot resurs markazi, 3-qavat</li>
                                      </ul>"
                    ]
                ]
            ]
        ];

        foreach ($postsData as $postData) {
            $post = Post::create([
                'category_id' => $eventCategoryId,
                'images' => $postData['images'],
                'published_at' => $postData['published_at'],
                'views_count' => 0,
            ]);

            foreach ($postData['translations'] as $trans) {
                PostTranslation::create([
                    'post_id' => $post->id,
                    'lang_code' => $trans['lang_code'],
                    'slug' => $trans['slug'],
                    'title' => $trans['title'],
                    'content' => $trans['content'],
                ]);
            }
        }
    }
}

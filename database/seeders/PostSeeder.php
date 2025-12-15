<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command->warn('No categories found. Please run CategorySeeder first.');
            return;
        }

        $posts = [
            [
                'category' => 'news',
                'images' => ['posts/news1.jpg', 'posts/news2.jpg'],
                'published_at' => now()->subDays(5),
                'translations' => [
                    'uz' => [
                        'slug' => 'yangi-texnologiyalar-2024',
                        'title' => 'Yangi texnologiyalar 2024-yilda',
                        'content' => '<h2>Sun\'iy intellekt va mashina o\'rganish</h2>
                                      <p>2024-yil texnologiya sohasida katta o\'zgarishlar yili bo\'ldi. <strong>Sun\'iy intellekt</strong> va mashina o\'rganish texnologiyalari barcha sohalarni qamrab oldi.</p>
                                      <h3>Asosiy yo\'nalishlar:</h3>
                                      <ul>
                                        <li>Generativ AI modellarining rivojlanishi</li>
                                        <li>Katta til modellari (LLM) ning yangi avlodi</li>
                                        <li>Kompyuter ko\'rishi va tasvir tanish</li>
                                      </ul>
                                      <p>Mutaxassislar fikricha, <em>keyingi yillarda bu texnologiyalar yanada rivojlanadi</em> va inson hayotini tubdan o\'zgartiradi.</p>
                                      <blockquote>
                                        <p>"AI - bu kelajak, va biz bu kelajakni bugun yaratmoqdamiz" - deydi texnologiya bo\'yicha taniqli mutaxassis.</p>
                                      </blockquote>'
                    ],
                    'ru' => [
                        'slug' => 'novye-tekhnologii-2024',
                        'title' => 'Новые технологии в 2024 году',
                        'content' => '<h2>Искусственный интеллект и машинное обучение</h2>
                                      <p>2024 год стал годом больших перемен в области технологий. <strong>Искусственный интеллект</strong> и машинное обучение охватили все сферы деятельности.</p>
                                      <h3>Основные направления:</h3>
                                      <ul>
                                        <li>Развитие генеративных AI моделей</li>
                                        <li>Новое поколение больших языковых моделей (LLM)</li>
                                        <li>Компьютерное зрение и распознавание образов</li>
                                      </ul>
                                      <p>По мнению экспертов, <em>в ближайшие годы эти технологии будут развиваться еще больше</em> и кардинально изменят жизнь человека.</p>
                                      <blockquote>
                                        <p>"AI - это будущее, и мы создаем это будущее сегодня" - говорит известный эксперт в области технологий.</p>
                                      </blockquote>'
                    ],
                    'en' => [
                        'slug' => 'new-technologies-2024',
                        'title' => 'New Technologies in 2024',
                        'content' => '<h2>Artificial Intelligence and Machine Learning</h2>
                                      <p>2024 has been a year of major changes in technology. <strong>Artificial intelligence</strong> and machine learning have covered all areas of activity.</p>
                                      <h3>Main directions:</h3>
                                      <ul>
                                        <li>Development of generative AI models</li>
                                        <li>New generation of large language models (LLM)</li>
                                        <li>Computer vision and image recognition</li>
                                      </ul>
                                      <p>According to experts, <em>these technologies will develop even more in the coming years</em> and will radically change human life.</p>
                                      <blockquote>
                                        <p>"AI is the future, and we are creating this future today" - says a famous technology expert.</p>
                                      </blockquote>'
                    ]
                ]
            ],
            [
                'category' => 'events',
                'images' => ['posts/event1.jpg'],
                'published_at' => now()->subDays(3),
                'translations' => [
                    'uz' => [
                        'slug' => 'texnologiya-konferensiyasi-toshkent',
                        'title' => 'Texnologiya konferensiyasi Toshkentda',
                        'content' => '<h2>Tech Conference Tashkent 2024</h2>
                                      <p>Dekabr oyining 20-kuni Toshkent shahrida <strong>yirik xalqaro texnologiya konferensiyasi</strong> bo\'lib o\'tadi.</p>
                                      <h3>Dastur:</h3>
                                      <ol>
                                        <li>Sun\'iy intellekt va biznes (09:00 - 11:00)</li>
                                        <li>Blockchain texnologiyalari (11:30 - 13:00)</li>
                                        <li>Kiberxavfsizlik (14:00 - 16:00)</li>
                                        <li>Networking sessiyasi (16:30 - 18:00)</li>
                                      </ol>
                                      <p><strong>Manzil:</strong> Hyatt Regency Tashkent, Navoi ko\'chasi 1A</p>
                                      <p><em>Ishtirok etish uchun ro\'yxatdan o\'tish zarur!</em></p>
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Turi</th>
                                            <th>Narxi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Standart</td>
                                            <td>500,000 so\'m</td>
                                          </tr>
                                          <tr>
                                            <td>VIP</td>
                                            <td>1,000,000 so\'m</td>
                                          </tr>
                                        </tbody>
                                      </table>'
                    ],
                    'ru' => [
                        'slug' => 'tekhnologicheskaya-konferentsiya-tashkent',
                        'title' => 'Технологическая конференция в Ташкенте',
                        'content' => '<h2>Tech Conference Tashkent 2024</h2>
                                      <p>20 декабря в городе Ташкент состоится <strong>крупная международная технологическая конференция</strong>.</p>
                                      <h3>Программа:</h3>
                                      <ol>
                                        <li>Искусственный интеллект и бизнес (09:00 - 11:00)</li>
                                        <li>Blockchain технологии (11:30 - 13:00)</li>
                                        <li>Кибербезопасность (14:00 - 16:00)</li>
                                        <li>Networking сессия (16:30 - 18:00)</li>
                                      </ol>
                                      <p><strong>Адрес:</strong> Hyatt Regency Tashkent, ул. Навои 1A</p>
                                      <p><em>Для участия необходима регистрация!</em></p>
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Тип</th>
                                            <th>Цена</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Стандарт</td>
                                            <td>500,000 сум</td>
                                          </tr>
                                          <tr>
                                            <td>VIP</td>
                                            <td>1,000,000 сум</td>
                                          </tr>
                                        </tbody>
                                      </table>'
                    ]
                ]
            ],
            [
                'category' => 'announcements',
                'images' => [],
                'published_at' => now()->subDay(),
                'translations' => [
                    'uz' => [
                        'slug' => 'yangi-dasturiy-ta-minot-versiyasi',
                        'title' => 'Yangi dasturiy ta\'minot versiyasi',
                        'content' => '<h2>Versiya 2.0 chiqdi!</h2>
                                      <p>Hurmatli foydalanuvchilar! Sizlarga <strong>dasturiy ta\'minotimizning yangi 2.0 versiyasi</strong>ni taqdim etamiz.</p>
                                      <h3>Yangi imkoniyatlar:</h3>
                                      <ul>
                                        <li><strong>Tezkor ishlash</strong> - 50% tezroq</li>
                                        <li><strong>Yangi interfeys</strong> - zamonaviy dizayn</li>
                                        <li><strong>Ko\'proq xususiyatlar</strong> - 20+ yangi funksiya</li>
                                        <li><strong>Mobil ilovalar</strong> - iOS va Android uchun</li>
                                      </ul>
                                      <p class="text-center">
                                        <a href="#" class="btn btn-primary">Hozir yuklab oling</a>
                                      </p>
                                      <hr>
                                      <p><small>Yangilanish bepul va avtomatik amalga oshiriladi.</small></p>'
                    ],
                    'ru' => [
                        'slug' => 'novaya-versiya-programmnogo-obespecheniya',
                        'title' => 'Новая версия программного обеспечения',
                        'content' => '<h2>Вышла версия 2.0!</h2>
                                      <p>Уважаемые пользователи! Представляем вам <strong>новую версию 2.0 нашего программного обеспечения</strong>.</p>
                                      <h3>Новые возможности:</h3>
                                      <ul>
                                        <li><strong>Быстрая работа</strong> - на 50% быстрее</li>
                                        <li><strong>Новый интерфейс</strong> - современный дизайн</li>
                                        <li><strong>Больше функций</strong> - 20+ новых возможностей</li>
                                        <li><strong>Мобильные приложения</strong> - для iOS и Android</li>
                                      </ul>
                                      <p class="text-center">
                                        <a href="#" class="btn btn-primary">Скачать сейчас</a>
                                      </p>
                                      <hr>
                                      <p><small>Обновление бесплатно и происходит автоматически.</small></p>'
                    ],
                    'en' => [
                        'slug' => 'new-software-version',
                        'title' => 'New Software Version',
                        'content' => '<h2>Version 2.0 is out!</h2>
                                      <p>Dear users! We present to you <strong>the new version 2.0 of our software</strong>.</p>
                                      <h3>New features:</h3>
                                      <ul>
                                        <li><strong>Fast performance</strong> - 50% faster</li>
                                        <li><strong>New interface</strong> - modern design</li>
                                        <li><strong>More features</strong> - 20+ new functions</li>
                                        <li><strong>Mobile apps</strong> - for iOS and Android</li>
                                      </ul>
                                      <p class="text-center">
                                        <a href="#" class="btn btn-primary">Download now</a>
                                      </p>
                                      <hr>
                                      <p><small>Update is free and happens automatically.</small></p>'
                    ]
                ]
            ]
        ];

        foreach ($posts as $postData) {
            $category = $categories->firstWhere('slug', $postData['category']);

            if (!$category) {
                continue;
            }

            $post = Post::create([
                'category_id' => $category->id,
                'images' => $postData['images'],
                'published_at' => $postData['published_at'],
                'views_count' => rand(10, 500)
            ]);

            foreach ($postData['translations'] as $langCode => $translation) {
                $post->translations()->create([
                    'lang_code' => $langCode,
                    'slug' => $translation['slug'],
                    'title' => $translation['title'],
                    'content' => $translation['content']
                ]);
            }
        }

        $this->command->info('Posts seeded successfully!');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{

    public function run(): void
    {
        $defaultLangCode = 'uz';

        $postsData = [
            [
                'category_id' => 1,
                'title' => 'Qozon federal universiteti vakillari Qoraqalpoq davlat universitetida',
                'content' => 'Avval xabar berganimizdek, shu yilning 29-noyabr kuni Berdaq nomidagi Qoraqalpoq davlat universitetida o‘tkazilgan qoraqalpoq tili va adabiyoti mutaxassisligining 90 yilligiga bag‘ishlangan "Hozirgi qoraqalpoq filologiyasining dolzarb masalalari" mavzusidagi xalqaro ilmiy-nazariy konferensiya ishida bir qator xorijiy mehmonlar ishtirok etdi. Mazkur konferensiya doirasida xorijiy oliy ta’lim muassasalari vakillari tomonidan "Rus tili va adabiyoti" kafedrasida bir qator tadbirlar o‘tkazildi. Jumladan, Rossiya Federatsiyasining Qozon federal universiteti professori, filologiya fanlari doktori Gafiyatova Elzara Vasilovna Chet tillari fakulteti "Filologiya va tillarni o‘qitish (rus tili) " bakalavriat ta’lim yo‘nalishining 4-bosqich talabalariga mahorat darsi (master-klass) o‘tkazdi. Unda "Rus tili va adabiyoti" kafedrasi mudiri N.Sh.Karimxodjayev, kafedra dotsenti L.T.Kabulovalar ishtirok etdi.
Mahorat darsi davomida professor E.V.Gafiyatova rus tili va adabiyotini chuqur o‘zlashtirishda qo‘llaniladigan zamonaviy o‘qitish usullarining xususiyatlarini talaba yoshlarimizga yetkazish bilan birga o‘zi mehnat qilayotgan Qozon federal universiteti filologiya va madaniyatlararo munosabatlar institutining pedagogik, ilmiy-innovatsion va xalqaro faoliyati haqida keng tarzda so‘zlab berdi. Shundan so‘ng, talabalar yoshlarimiz bilan fikr almashuvlar, savol-javoblar bo‘ldi. Mahorat darsi yakunida professor E.V.Gafiyatova O‘zbekistonning ko‘plab oliy o‘quv yurtlarida bo‘lib, rus tili va adabiyoti yo‘nalishida ta’lim olayotgan talaba-yoshlar bilan shunday uchrashuv va suhbatlar o‘tkazganligini aytdi.
Bugungi muloqotlar va savol-javoblar yakunida Berdaq nomidagi Qoraqalpoq davlat universiteti "Filologiya va tillarni o‘qitish (rus tili) " bakalavriat ta’lim yo‘nalishi talabalarining bilim darajasi nisbatan yuqori degan o‘zining ijobiy fikrini bildirdi. Shuningdek, professor E.V.Gafiyatova uchrashuv yakunida qoraqalpoq tili va adabiyoti mutaxassisligining 90 yilligiga bag‘ishlangan xalqaro ilmiy-nazariy konferensiyaning eng yuqori darajada tashkil etilganini alohida ta’kidlab, xorijiy ishtirokchilarga ko‘rsatilgan yuqori darajadagi hurmat-ehtirom va mehmondo‘stlik uchun universitet rektoratiga, konferensiya tashkilotchilariga Qozon federal universiteti nomidan chuqur minnatdorchilik bildirdi.
"Rus tili va adabiyoti"
Kafedra mudiri N.Sh.Karimxodjayev',
                'slug' => 'qozon-federal-universiteti-vakillari-qoraqalpoq-davlat-universitetida',
                'image' => 'posts/post1.jpg',
                'published_at' => now(),
                'views_count' => 12,
            ],
            [
                'category_id' => 1,
                'title' => 'Turkmanistonlik olimlar talabalar bilan uchrashdi',
                'content' => 'O‘zbekiston Respublikasi Oliy ta’lim, fan va innovatsiyalar vazirligining 2024-yil 27-dekabrdagi qarori bilan Qoraqalpoq tili va adabiyoti mutaxassisligining 90 yilligiga bag‘ishlab universitetimizda 2025-yilning 28-29-noyabr kunlari "Hozirgi qoraqalpoq filologiyasining dolzarb masalalari" mavzusida xalqaro ilmiy-nazariy konferensiya o‘tkazildi. Konferensiyada Rossiya Federatsiyasidan, Turkmaniston, Turkiya, Qirg‘iziston, Ozarbayjon, Qozog‘iston Respublikalaridan filolog olimlar o‘zlarining ilmiy ma’ruzalari bilan ishtirok etdi. Konferensiya avvalida olimlar universitet jamoasi bilan uchrashib, bu yerdagi ta’lim jarayoni bilan yaqindan tanishdi.

Turkmaniston Fanlar akademiyasi Maxtumquli nomidagi Til, adabiyot va milliy qo‘lyozmalar institutining katta ilmiy xodimlari filologiya fanlari nomzodlari Ch.Quliyev va B.Jepbarova, shuningdek, Davlatmamat Ozodi nomidagi Jahon tillari instituti katta ilmiy xodimi B.Ataniyazovalar dastlab universitetimiz o‘quv binolari bilan tanishdi, so‘ngra filologiya va tillarni o‘qitish (turkman tili) ta’lim yo‘nalishi talabalari, adabiyotshunoslik (turkman adabiyoti) magistratura mutaxassisligi magistrantlari bilan uchrashdi. Uchrashuv davomida Turkman tili va adabiyoti kafedrasi tomonidan seminar tashkil etilib, unda mehmonlar, kafedra a’zolari, magistrantlar va talaba-yoshlar ishtirok etdi. Seminarni O‘zbek filologiyasi fakulteti dekani f.f.d. M.Qurboniyozov olib bordi.

Seminarda kafedra mudiri filologiya fanlari doktori, professor O.Gayliyeva turkmanistonlik olimlarning turkiy xalqlar adabiyoti, adabiy aloqalar, o‘zbek, qoraqalpoq va turkman adabiy aloqalari bo‘yicha olib borgan tadqiqotlarini talabalarga tanishtirdi.

Mehmon-olimlardan so‘zga chiqqan Ch.Quliyev o‘zbek, qoraqalpoq xalqlarining turkman xalqi bilan qadimdan qo‘shni bo‘lib yashab kelayotganligi, ularning adabiy, madaniy aloqalari, tili, adabiyoti, madaniyati, urf-odatining yaqinligi, Navoiy, Maxtumquli, Ajiniyoz, Berdaq kabi buyuk so‘z ustalarining ustoz-shogirdlik an’anasining davomiyligi, ular yaratgan ma’naviy xazinadan uchala xalqning ham birdek bahramand bo‘lib kelayotganligini alohida ta’kidladi.

U o‘z so‘zida bugungi kunda ham turkiy xalqlar adabiyotlari o‘rtasida adabiy aloqalar keng yo‘lga qo‘yilganligi, Markaziy Osiyo mamlakatlarida o‘tkazilayotgan ilmiy-nazariy konferensiyalar, forumlar, kongresslar bunga misol bo‘la olishini alohida ta’kidlab o‘tdi. Shuningdek, Berdaq nomidagi Qoraqalpoq davlat universitetida "Hozirgi qoraqalpoq filologiyasining dolzarb masalalari" mavzusida xalqaro ilmiy-nazariy konferensiyaning o‘tkazilishi ham buning yaqqol misoli ekanligini bildirdi.

Shundan so‘ng turkmanistonlik olimlardan B.Jepbarova, B.Ataniyazovalar so‘zga chiqib, qardosh turkiy adabiyotning qadimgi tarmoqlari, ularning rivojlanish tendensiyalari, zamonaviy adabiyotshunoslikda adabiy aloqalarning tadqiq etilishi masalalari va bu borada oldinda turgan vazifalar haqida fikrlarini bildirdi. Mehmonlar universitet talabalari bilan esdalik uchun suratga tushdi.',
                'slug' => 'turkmanistonlik-olimlar-talabalar-bilan-uchrashdi',
                'image' => 'posts/post2.jpg',
                'published_at' => now(),
                'views_count' => 8,
            ],
            [
                'category_id' => 1,
                'title' => 'Xalqaro hamkorlik',
                'content' => 'Ayni paytda, Berdaq nomidagi Qoraqalpoq davlat universitetining Xalqaro hamkorlik bo‘yicha prorektori Timur Nurimbetov va Xalqaro reyting faoliyatini monitoring qilish bo‘limi boshlig‘i Shaxmardan Shaniyazov Xitoy Xalq Respublikasining Nankin shahrida xizmat safari bilan bo‘lib turibdi.

Tashrif doirasida delegatsiya a’zolari Nankin instituti tomonidan tashkil etilgan ilmiy loyihalar muhokamasida ishtirok etmoqda. Unda mintaqaviy ilmiy hamkorlikni kuchaytirish, qo‘shma ilmiy platformalar yaratish, akademik almashinuv dasturlarini rivojlantirish, shuningdek, universitetlar o‘rtasida barqaror ilmiy hamkorlik tizimini shakllantirish yuzasidan fikr almashildi.

Uchrashuvlarda Berdaq nomidagi Qoraqalpoq davlat universiteti va Nankin instituti o‘rtasida o‘zaro manfaatli yo‘nalishlarda hamkorlikni yo‘lga qo‘yish, qo‘shma ilmiy loyihalar, talabalar almashinuvi, professor-o‘qituvchilarning malakasini oshirish, konferensiya va seminarlarni birgalikda o‘tkazish imkoniyatlari keng muhokama qilindi.

Ushbu uchrashuvlarning eng muhim jihatlaridan biri shundaki, prorektor T.Nurimbetov ekologik bioxilma-xillikni muhofaza qilishga qaratilgan ilmiy loyihasini xalqaro ekspertlar e’tiboriga taqdim etdi. Taqdim etilgan loyiha mintaqada biologik resurslarni saqlash, ekologik vaziyatni yaxshilash va innovatsion tadqiqotlarni kuchaytirishga xizmat qilishi bilan ahamiyatlidir. Tomonlar ushbu loyihani 2026 yilda amalga oshirish bo‘yicha kelishuvga erishdi.

Nankin shahridagi muzokaralar Qoraqalpoq davlat universitetining xalqaro ilmiy hamkorlikdagi o‘rnini yanada mustahkamlash, uning reyting ko‘rsatkichlarini yuksaltirish va universitetning global ta’lim maydonidagi integratsiyasini kuchaytirishga xizmat qilmoqda.',
                'slug' => 'xalqaro-hamkorlik',
                'image' => 'posts/post3.jpg',
                'published_at' => now(),
                'views_count' => 15,
            ],
            [
                'category_id' => 1,
                'title' => 'QDUda Soha mutaxassislari bilan uchrashuv o‘tkazildi',
                'content' => 'Berdaq nomidagi Qoraqalpoq davlat universitetida O‘zbekiston Respublikasi Prezidentining 2025-yil 3-noyabrdagi "Aholi salomatligi va millat genofondini giyohvandlik va narkojinoyatchilikdan samarali himoya qilish bo‘yicha kompleks chora-tadbirlar to‘g‘risida"gi PF-207-sonli Farmoni ijrosini ta’minlashga qaratilgan navbatdagi ma’rifiy-amaliy uchrashuv bo‘lib o‘tdi. Tadbirning asosiy maqsadi - talaba-yoshlar ongida giyohvandlikning salbiy oqibatlari, narkojinoyatchilikning xavfli ko‘lami, uning yoshlar kelajagiga soladigan real tahdidlarini chuqur anglash, shuningdek, profilaktik ishlar samaradorligini yanada oshirishdan iborat bo‘ldi.

Unda Nukus shahar Ichki ishlar boshqarmasi jinoyat qidiruv bo‘limi tezkor vakili, leytenant Sherzod Urazbayev, Respublika ixtisoslashtirilgan ruhiy salomatlik ilmiy-amaliy tibbiyot markazining narkologiya xizmati bo‘yicha Qoraqalpog‘iston Respublikasi hududiy filiali shifokori, narkolog Azamat Abubakirov, Nukus shahar Ichki ishlar boshqarmasining 3-sonli ichki ishlar bo‘limi, Qoraqalpoq davlat universiteti profilaktika inspektori Inamjon Erejepov va talaba-yoshlar ishtirok etdi. Tadbirni universitetning Yoshlar masalalari va ma’naviy-ma’rifiy bo‘limi boshlig‘i Q.Beknazarov olib bordi. Uchrashuvda soha mutaxassislari giyohvandlik bilan bog‘liq jinoyatlarning bugungi kunda qanday ko‘rinishlarda uchrayotgani, jinoyatchilar qo‘llayotgan yangi usullar, yoshlarning ushbu illatga jalb etilish mexanizmlari va ularning oldini olishda huquqiy javobgarlik masalalari haqida atroflicha tushuntirib berdi.

Uchrashuv davomida talaba-yoshlar o‘zlarini qiziqtirgan savollar bilan murojaat qilishdi. Mutaxassislar har bir savolga amaliy misollar bilan asoslangan batafsil javoblar berdi. Tadbir mazmunida o‘zaro muloqot, ochiq fikr almashish va real hayotiy vaziyatlar asosidagi tushuntirishlar talabalarda giyohvandlikning salbiy oqibatlariga qarshi yanada kuchli immunitetni shakllantirishga xizmat qildi. Tadbir yakunida ishtirokchilarga targ‘ibot materiallari taqdim etildi, ularga sog‘lom turmush tarzi, huquqiy madaniyat va shaxsiy xavfsizlik bo‘yicha tavsiyalar berildi.',
                'slug' => 'qduda-soha-mutaxassislari-bilan-uchrashuv-otkazildi',
                'image' => 'posts/post4.jpg',
                'published_at' => now(),
                'views_count' => 20,
            ],
            [
                'category_id' => 1,
                'title' => '“Fuqarolik va biznes huquqi” kafedrasi vakillarining yuridik klinik ta’lim bo’yicha xalqaro konferensiyada ishtiroki',
                'content' => 'Joriy yilning 26–27-noyabr kunlari Toshkent davlat yuridik universitetida (TDYU) TDYU Yuridik klinikasining 25 yillik faoliyatiga bag’ishlangan «Yuridik klinik ta’lim: amaliyot, texnologiyalar, huquqiy ong» mavzusidagi xalqaro konferensiya bo’lib o’tdi.

Konferensiyada Berdaq nomidagi Qoraqalpoq davlat universiteti Yuridika fakulteti yuridik klinikasi rahbari, “Fuqarolik va biznes huquqi” kafedrasi professori, yuridik fanlar doktori K.Umarova hamda kafedra assistenti J.Panabergenova ishtirok etdilar.

Konferensiya O’zbekiston, Janubiy Koreya, Qozog’iston va Qirg’izistondan yetakchi mutaxassislar va ekspertlarni — yuridik klinikalar rahbarlari, professorlar, kiberhuquq, fuqarolik jamiyati, jinoyat protsessi, xalqaro xususiy huquq sohasidagi tadqiqotchilarni, shuningdek, texnologiyalar va xalqaro arbitraj sohalari vakillarini birlashtirdi.

Konferensiya doirasida yuridik klinik ta’limni rivojlantirishning dolzarb masalalari muhokama qilindi: xorijiy universitetlar yuridik klinikalarining tajribasi, klinik ta’limni o’quv jarayoniga integratsiya qilish, fuqarolik jamiyati institutlari va NNTlar bilan hamkorlik, klinik ta’limda raqamli vositalar va yangi texnologiyalarni qo’llash, yuridik klinikalarning fuqarolarning konstitutsiyaviy huquqlarini himoya qilishdagi roli, yoshlar huquqiy madaniyatini amaliyotga yo’naltirilgan yondashuv orqali rivojlantirish, xalqaro arbitrajda sun’iy intellektdan foydalanish, pro bono mexanizmlarini takomillashtirish, shuningdek, yuridik klinikalar faoliyatida xususiy huquq genezisi masalalari.

Konferensiya davomida Berdaq nomidagi Qoraqalpoq davlat universiteti Yuridika fakulteti yuridik klinikasi va TDYU Yuridik klinikasi o’rtasidagi hamkorlik istiqbollari ham muhokama qilindi.

Konferensiyada ishtirok etish amaliyotga yo’naltirilgan yuridik ta’lim sohasida kasbiy aloqalarni mustahkamlash va tajriba almashishga xizmat qiladi.',
                'slug' => 'fuqarolik-va-biznes-huquqi-kafedrasi-vakillarining-yuridik-klinik-talim-boyicha-xalqaro-konferensiyada-ishtiroki',
                'image' => 'posts/post5.jpg',
                'published_at' => now(),
                'views_count' => 5,
            ],
            [
                'category_id' => 1,
                'title' => 'Biologiya fakultetida "Tabiiy resurslardan oqilona foydalanish" mavzusida ilmiy-amaliy konferensiya o‘tkazildi.',
                'content' => ' Joriy yilning 28-noyabr kuni Qoraqalpoq davlat universiteti Biologiya fakultetida "Janubiy Orolbo‘yi tabiiy resurslaridan oqilona foydalanish" mavzusida XII respublika ilmiy-amaliy konferensiyasi bo‘lib o‘tdi. Konferensiyada respublikamiz oliy o‘quv yurtlarining professor-o‘qituvchilari, doktorantlar, magistrantlar, tabiatni muhofaza qilish va ilmiy-tadqiqot muassasalaridan mehmonlar ishtirok etdi. Konferensiyada Janubiy Orolbo‘yining ekologik barqarorligini ta’minlash, tabiiy resurslardan oqilona foydalanish, innovatsion yondashuvlar va ilmiy hamkorlikni mustahkamlash bo‘yicha ma’ruzalar tinglandi, muhim tashabbuslar ilgari surildi.

Konferensiya ikki yo‘nalishda olib borilib, Yalpi majlisda Janubiy Orolbo‘yi ekologik muammolari va ularni bartaraf etish bo‘yicha strategik yondashuvlar muhokama qilindi. Seksiya ishlarida esa suv resurslari, tuproq unumdorligi, biologik xilma-xillik, ekologik monitoring va innovatsion yechimlar bo‘yicha ilmiy ma’ruzalar tinglandi. Ishtirokchilar tomonidan hududning ekologik tiklanishiga hissa qo‘shadigan ilmiy tashabbuslar va amaliy yechimlar taqdim etildi. Ushbu konferensiya Janubiy Orolbo‘yi tabiiy resurslaridan oqilona foydalanish bo‘yicha muhim ilmiy maydon bo‘lib xizmat qiladi.',
                'slug' => 'biologiya-fakultetida-tabiiy-resurslardan-oqilona-foydalanish-mavzusida-ilmiy-amaliy-konferensiya-otkazildi',
                'image' => 'posts/post6.jpg',
                'published_at' => now(),
                'views_count' => 7,
            ]
        ];

        foreach ($postsData as $data) {
            $translationData = [
                'title' => $data['title'],
                'content' => $data['content'],
            ];

            $postData = [
                'category_id' => $data['category_id'],
                'slug' => $data['slug'],
                'image' => $data['image'],
                'published_at' => $data['published_at'],
                'views_count' => $data['views_count'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $postId = DB::table('posts')->insertGetId($postData);

            DB::table('post_translations')->insert([
                'post_id' => $postId,
                'lang_code' => $defaultLangCode, // 'uz'
                'title' => $translationData['title'],
                'content' => $translationData['content'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

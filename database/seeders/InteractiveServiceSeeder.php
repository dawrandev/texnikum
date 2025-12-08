<?php

namespace Database\Seeders;

use App\Models\InteractiveService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Attribute\Interact;

class InteractiveServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Подача заявлений на выход из академического отпуска',
                'url'  => '#',
            ],
            [
                'title' => 'Вакансии рабочих мест в Университета',
                'url'  => '#',
            ],
            [
                'title' => 'Получение данных об успеваемости студентов',
                'url'  => '#',
            ],
            [
                'title' => 'Подача заявлений на проживание в студенческом общежитии',
                'url'  => '#',
            ],
            [
                'title' => 'Получение справки об обучении',
                'url'  => '#',
            ],
            [
                'title' => 'Система подачи заявлений по совместной образовательной программе',
                'url'  => '#',
            ],
        ];

        foreach ($services as $service) {
            InteractiveService::updateOrCreate(
                ['title' => $service['title']],
                ['url' => $service['url']]
            );
        }
    }
}

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
                'link'  => '#',
            ],
            [
                'title' => 'Вакансии рабочих мест в Университета',
                'link'  => '#',
            ],
            [
                'title' => 'Получение данных об успеваемости студентов',
                'link'  => '#',
            ],
            [
                'title' => 'Подача заявлений на проживание в студенческом общежитии',
                'link'  => '#',
            ],
            [
                'title' => 'Получение справки об обучении',
                'link'  => '#',
            ],
            [
                'title' => 'Система подачи заявлений по совместной образовательной программе',
                'link'  => '#',
            ],
        ];

        foreach ($services as $service) {
            InteractiveService::updateOrCreate(
                ['title' => $service['title']],
                ['link' => $service['link']]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'name' => 'KARSU',
                'logo' => 'partners/karsu.png',
                'url' => 'https://karsu.uz/uz/',
            ],
            [
                'name' => 'TATU',
                'logo' => 'partners/tatu.png',
                'url' => 'https://tuit.uz/',
            ],
            [
                'name' => 'NMTU',
                'logo' => 'partners/nmtu.png',
                'url' => 'https://nmtu.uz/',
            ]
        ];

        foreach ($partners as $partnerData) {
            \App\Models\Partner::firstOrCreate([
                'name' => $partnerData['name'],
            ], [
                'logo' => $partnerData['logo'],
                'url' => $partnerData['url'],
            ]);
        }
    }
}

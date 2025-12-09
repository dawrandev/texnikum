<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

try {
    $categoryService = app(\App\Services\CategoryService::class);

    $testData = [
        'slug' => 'test-category-' . time(),
        'translations' => [
            [
                'name' => 'Test EN',
                'lang_code' => 'en',
            ],
            [
                'name' => 'Test UZ',
                'lang_code' => 'uz',
            ],
            [
                'name' => 'Test RU',
                'lang_code' => 'ru',
            ],
            [
                'name' => 'Test KK',
                'lang_code' => 'kk',
            ],
        ],
    ];

    echo "Creating category with data:\n";
    echo json_encode($testData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n\n";

    $category = $categoryService->create($testData);

    echo "✓ Category created successfully\n";
    echo "✓ Category ID: " . $category->id . "\n";
    echo "✓ Slug: " . $category->slug . "\n";
    echo "✓ Translations count: " . $category->translations->count() . "\n";

    foreach ($category->translations as $trans) {
        echo "  - {$trans->lang_code}: {$trans->name}\n";
    }
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "✗ File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}

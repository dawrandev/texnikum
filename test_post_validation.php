<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Test the validation rules
$request = \App\Http\Requests\PostStoreRequest::create('/', 'POST', [
    'category_id' => 1,
    'slug' => 'test-post',
    'translations' => [
        'uz' => [
            'title' => 'Test Title',
            'content' => 'Test content',
            'lang_code' => 'uz',
        ],
        'en' => [
            'title' => 'Test Title EN',
            'content' => 'Test content EN',
            'lang_code' => 'en',
        ],
    ],
]);

try {
    $validated = $request->validate($request->rules());
    echo "✓ Validation passed!\n";
    echo "Validated data:\n";
    echo json_encode($validated, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
} catch (\Illuminate\Validation\ValidationException $e) {
    echo "✗ Validation failed!\n";
    echo "Errors:\n";
    echo json_encode($e->errors(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Get post ID from route parameter {id}
        $postId = $this->route('id');

        return [
            'category_id' => 'required|exists:categories,id',
            'slug' => [
                'required',
                'string',
                'max:255',
                $postId ? 'unique:posts,slug,' . $postId : 'unique:posts,slug'
            ],
            'images' => 'nullable|array',
            'images.*' => 'string',
            'published_at' => 'nullable|date',
            'translations' => 'required|array|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Выберите категорию',
            'category_id.exists' => 'Выбранная категория не существует',
            'slug.required' => 'Slug обязателен для заполнения',
            'slug.unique' => 'Этот slug уже используется',
            'images.array' => 'Изображения должны быть массивом',
            'published_at.date' => 'Неверный формат даты',
            'translations.required' => 'Необходимо добавить хотя бы один перевод',
            'translations.min' => 'Необходимо добавить хотя бы один перевод',
        ];
    }

    /**
     * Prepare data for validation - remove empty translations
     */
    protected function prepareForValidation()
    {
        if ($this->has('translations')) {
            $translations = [];

            foreach ($this->translations as $langCode => $translation) {
                $title = $translation['title'] ?? null;
                $content = $translation['content'] ?? '';

                // Clean HTML tags and check if content is really empty
                $cleanContent = trim(strip_tags($content));

                // Only keep translations that have both title AND content
                if (!empty($title) && !empty($cleanContent)) {
                    $translations[$langCode] = [
                        'title' => $title,
                        'content' => $content,
                        'lang_code' => $langCode
                    ];
                }
            }

            $this->merge(['translations' => $translations]);
        }
    }

    /**
     * Custom validation - check at least one valid translation exists
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $translations = $this->input('translations', []);

            if (empty($translations)) {
                $validator->errors()->add(
                    'translations',
                    'Необходимо заполнить хотя бы один перевод полностью (заголовок и содержание)'
                );
            }
        });
    }
}

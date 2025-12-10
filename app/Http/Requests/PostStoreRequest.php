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
        $postId = $this->route('post');

        return [
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $postId,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_at' => 'nullable|date',
            'translations' => 'required|array|min:1',
            'translations.*.title' => 'required|string|max:255',
            'translations.*.content' => 'required|string',
            'translations.*.lang_code' => 'required|string|in:en,uz,ru,kk',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Выберите категорию',
            'category_id.exists' => 'Выбранная категория не существует',
            'slug.required' => 'Slug обязателен для заполнения',
            'slug.unique' => 'Этот slug уже используется',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Поддерживаемые форматы: jpeg, png, jpg, webp',
            'image.max' => 'Максимальный размер изображения: 2MB',
            'published_at.date' => 'Неверный формат даты',
            'translations.required' => 'Необходимо добавить хотя бы один перевод',
            'translations.*.title.required' => 'Заголовок обязателен для заполнения',
            'translations.*.content.required' => 'Содержание обязательно для заполнения',
            'translations.*.lang_code.exists' => 'Неверный код языка',
        ];
    }
}

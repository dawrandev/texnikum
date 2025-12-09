<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slug' => 'required|string|max:255|unique:categories,slug',
            'translations' => 'required|array|min:1',
            'translations.*.name' => 'required|string|max:255',
            'translations.*.lang_code' => 'required|string|in:en,uz,ru,kk',
        ];
    }

    public function messages(): array
    {
        return [
            'slug.required' => 'Поле slug обязательно для заполнения.',
            'slug.unique' => 'Такой slug уже существует.',

            'translations.required' => 'Необходимо добавить хотя бы один перевод.',

            'translations.*.name.required' => 'Название категории обязательно для заполнения.',

            'translations.*.lang_code.required' => 'Код языка обязателен для заполнения.',
            'translations.*.lang_code.in' => 'Выбран неверный код языка.',
        ];
    }
}

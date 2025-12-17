<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'url' => ['nullable', 'url', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно для заполнения',
            'name.max' => 'Название не должно превышать 255 символов',
            'logo.required' => 'Логотип обязателен для загрузки',
            'logo.image' => 'Файл должен быть изображением',
            'logo.mimes' => 'Допустимые форматы: jpeg, png, jpg, gif, svg, webp',
            'logo.max' => 'Размер файла не должен превышать 2MB',
            'url.url' => 'Введите корректный URL адрес',
            'url.max' => 'URL не должен превышать 255 символов',
        ];
    }
}

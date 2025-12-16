<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $postId = $this->route('id');

        $rules = [
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable|array',
            'images.*' => 'string',
            'published_at' => 'nullable|date',
            'translations' => 'required|array|min:1',
            'translations.*.title' => 'required|string|max:255',
            'translations.*.content' => 'required|string',
            'translations.*.lang_code' => 'required|string|exists:languages,code',
        ];

        // Slug unique validation for each translation
        if ($postId) {
            $rules['translations.*.slug'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('post_translations', 'slug')->ignore($postId, 'post_id')->where(function ($query) {
                    return $query->where('lang_code', $this->input('translations.*.lang_code'));
                })
            ];
        } else {
            $rules['translations.*.slug'] = 'required|string|max:255|unique:post_translations,slug';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Выберите категорию',
            'category_id.exists' => 'Выбранная категория не существует',
            'images.array' => 'Изображения должны быть массивом',
            'published_at.date' => 'Неверный формат даты',
            'translations.required' => 'Необходимо добавить хотя бы один перевод',
            'translations.min' => 'Необходимо добавить хотя бы один перевод',
            'translations.*.title.required' => 'Заголовок обязателен для заполнения',
            'translations.*.content.required' => 'Содержание обязательно для заполнения',
            'translations.*.slug.required' => 'Slug обязателен для заполнения',
            'translations.*.slug.unique' => 'Этот slug уже используется для данного языка',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('translations')) {
            $translations = [];

            foreach ($this->translations as $langCode => $translation) {
                $title = $translation['title'] ?? null;
                $content = $translation['content'] ?? '';
                $cleanContent = trim(strip_tags($content));

                if (!empty($title) && !empty($cleanContent)) {
                    // Generate slug from title
                    $slug = $this->generateSlug($title);

                    $translations[$langCode] = [
                        'title' => $title,
                        'content' => $content,
                        'lang_code' => $langCode,
                        'slug' => $slug
                    ];
                }
            }

            $this->merge(['translations' => $translations]);
        }
    }

    protected function generateSlug(string $text): string
    {
        $translitMap = [
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'yo',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'y',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'ts',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ъ' => '',
            'ы' => 'y',
            'ь' => '',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',
            'А' => 'A',
            'Б' => 'B',
            'В' => 'V',
            'Г' => 'G',
            'Д' => 'D',
            'Е' => 'E',
            'Ё' => 'Yo',
            'Ж' => 'Zh',
            'З' => 'Z',
            'И' => 'I',
            'Й' => 'Y',
            'К' => 'K',
            'Л' => 'L',
            'М' => 'M',
            'Н' => 'N',
            'О' => 'O',
            'П' => 'P',
            'Р' => 'R',
            'С' => 'S',
            'Т' => 'T',
            'У' => 'U',
            'Ф' => 'F',
            'Х' => 'H',
            'Ц' => 'Ts',
            'Ч' => 'Ch',
            'Ш' => 'Sh',
            'Щ' => 'Shch',
            'Ъ' => '',
            'Ы' => 'Y',
            'Ь' => '',
            'Э' => 'E',
            'Ю' => 'Yu',
            'Я' => 'Ya',

            // Uzbek specific
            'ў' => 'o',
            'қ' => 'q',
            'ғ' => 'g',
            'ҳ' => 'h',
            'Ў' => 'O',
            'Қ' => 'Q',
            'Ғ' => 'G',
            'Ҳ' => 'H',
            'ʻ' => '',
            '\'' => ''
        ];


        // Convert to lowercase
        $slug = mb_strtolower($text, 'UTF-8');

        // Transliterate Cyrillic characters
        $slug = strtr($slug, $translitMap);

        // Remove special characters except letters, numbers, spaces and hyphens
        $slug = preg_replace('/[^a-z0-9\s-]/u', '', $slug);

        // Replace spaces with hyphens
        $slug = preg_replace('/\s+/', '-', $slug);

        // Remove multiple consecutive hyphens
        $slug = preg_replace('/-+/', '-', $slug);

        // Trim hyphens from start and end
        $slug = trim($slug, '-');

        return $slug;
    }

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

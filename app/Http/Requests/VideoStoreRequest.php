<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request
     */
    public function rules(): array
    {
        $videoId = $this->route('id') ?? $this->input('video_id');

        return [
            'url' => [
                'required',
                'url',
                'max:500',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)[a-zA-Z0-9_-]{11}.*$/',
                $videoId ? 'unique:videos,url,' . $videoId : 'unique:videos,url'
            ],
            'published_at' => 'nullable|date',
            'translations' => 'required|array|min:1',
            'translations.*.title' => 'nullable|string|max:255',
            'translations.*.lang_code' => 'nullable|string|exists:languages,code',
        ];
    }

    /**
     * Get custom messages for validator errors
     */
    public function messages(): array
    {
        return [
            'url.required' => 'URL видео обязателен для заполнения',
            'url.url' => 'Введите корректный URL адрес',
            'url.max' => 'URL не должен превышать 500 символов',
            'url.regex' => 'URL должен быть ссылкой на YouTube видео (youtube.com/watch?v=... или youtu.be/...)',
            'url.unique' => 'Видео с таким URL уже существует',

            'published_at.date' => 'Неверный формат даты публикации',

            'translations.required' => 'Необходимо добавить хотя бы один перевод',
            'translations.min' => 'Необходимо добавить хотя бы один перевод',
            'translations.array' => 'Переводы должны быть массивом',

            'translations.*.title.string' => 'Заголовок должен быть текстом',
            'translations.*.title.max' => 'Заголовок не должен превышать 255 символов',

            'translations.*.lang_code.string' => 'Код языка должен быть текстом',
            'translations.*.lang_code.exists' => 'Выбранный язык не существует',
        ];
    }

    /**
     * Get custom attributes for validator errors
     */
    public function attributes(): array
    {
        return [
            'url' => 'URL видео',
            'published_at' => 'дата публикации',
            'translations' => 'переводы',
            'translations.*.title' => 'заголовок',
            'translations.*.lang_code' => 'код языка',
        ];
    }

    /**
     * Prepare the data for validation
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('translations')) {
            $translations = [];

            foreach ($this->translations as $langCode => $translation) {
                $title = $translation['title'] ?? null;

                if (!empty(trim($title))) {
                    $translations[$langCode] = [
                        'title' => trim($title),
                        'lang_code' => $langCode
                    ];
                }
            }

            $this->merge(['translations' => $translations]);
        }

        if ($this->has('url')) {
            $url = trim($this->url);

            $url = preg_replace('/[?&](feature|t|list|index)=[^&]*/', '', $url);

            $this->merge(['url' => $url]);
        }
    }

    /**
     * Configure the validator instance
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $translations = $this->input('translations', []);

            if (empty($translations)) {
                $validator->errors()->add(
                    'translations',
                    'Необходимо заполнить хотя бы один заголовок для видео'
                );
            }

            $url = $this->input('url');
            if ($url && !$this->isValidYouTubeUrl($url)) {
                $validator->errors()->add(
                    'url',
                    'Неверный формат YouTube URL. Используйте: youtube.com/watch?v=ID или youtu.be/ID'
                );
            }
        });
    }

    /**
     * Check if URL is a valid YouTube URL
     */
    private function isValidYouTubeUrl(string $url): bool
    {
        preg_match(
            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i',
            $url,
            $matches
        );

        return isset($matches[1]) && strlen($matches[1]) === 11;
    }
}

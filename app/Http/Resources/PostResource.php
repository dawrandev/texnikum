<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $categoryData = $this->whenLoaded('category', function () {
            return [
                'id' => $this->category->id,
                'slug' => $this->category->slug,
            ];
        });

        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'content' => $this->content,

            'slug' => $this->slug,
            'image' => is_array($this->images) && count($this->images) ? $this->images[0] : null,
            'published_at' => $this->published_at,
            'views_count' => $this->views_count,
            'created_at' => $this->created_at,

            'category' => $categoryData,
        ];
    }
}

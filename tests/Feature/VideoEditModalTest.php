<?php

namespace Tests\Feature;

use App\Models\Video;
use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideoEditModalTest extends TestCase
{
    use RefreshDatabase;

    public function test_edit_modal_endpoint_returns_modal_html()
    {
        $lang = Language::create(['code' => 'en', 'name' => 'English']);

        $video = Video::create([
            'url' => 'https://www.youtube.com/watch?v=F-ql5OMdMdo',
            'published_at' => now(),
        ]);

        $response = $this->get(route('videos.edit-modal', $video->id));

        $response->assertStatus(200);
        $response->assertSee('editVideoModal');
    }
}

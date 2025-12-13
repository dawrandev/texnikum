<?php

namespace Tests\Feature;

use App\Models\Video;
use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideoUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_video_uses_video_store_request_and_updates()
    {
        $this->withoutMiddleware();

        $lang = Language::create(['code' => 'en', 'name' => 'English']);

        $video = Video::create([
            'url' => 'https://www.youtube.com/watch?v=F-ql5OMdMdo',
            'published_at' => now(),
        ]);

        $response = $this->put(route('videos.update', $video->id), [
            'url' => 'https://www.youtube.com/watch?v=wlRMcv_zQew',
            'published_at' => now()->toDateTimeString(),
            'translations' => [
                'en' => ['title' => 'Updated title']
            ]
        ]);

        $response->assertRedirect(route('videos.index'));

        $this->assertDatabaseHas('videos', ['id' => $video->id, 'url' => 'https://www.youtube.com/watch?v=wlRMcv_zQew']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoStoreRequest;
use App\Services\Admin\VideoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VideoController extends Controller
{
    public function __construct(
        protected VideoService $videoService
    ) {}

    /**
     * Display a listing of videos
     */
    public function index(Request $request): View
    {
        $filters = [];

        if ($request->filled('lang')) {
            $filters['lang_code'] = $request->lang;
        }

        $videos = $this->videoService->getVideos($filters);

        return view('pages.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new video
     */
    public function create(): View
    {
        $languages = \App\Models\Language::all();
        return view('pages.videos.create', compact('languages'));
    }

    /**
     * Store a newly created video
     */
    public function store(VideoStoreRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $this->videoService->create($data);

            alert_success('Видео успешно добавлено!');

            return redirect()->route('videos.index');
        } catch (\Exception $e) {
            \Log::error('Video creation error: ' . $e->getMessage());

            alert_error('Ошибка при добавлении видео: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified video (modal)
     */
    public function editModal(int $id): View
    {
        $video = $this->videoService->getVideoById($id);
        $languages = \App\Models\Language::all();

        // Return the edit modal partial (the file is `pages.videos.edit`)
        return view('pages.videos.edit', compact('video', 'languages'));
    }

    /**
     * Update the specified video
     */
    public function update(VideoStoreRequest $request, int $id): RedirectResponse
    {
        try {
            $request->merge(['video_id' => $id]);
            $data = $request->validated();

            $this->videoService->update($id, $data);

            alert_success('Видео успешно обновлено!');

            return redirect()->route('videos.index');
        } catch (\Exception $e) {
            \Log::error('Video update error: ' . $e->getMessage());

            alert_error('Ошибка при обновлении видео: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified video
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->videoService->delete($id);

            alert_success('Видео успешно удалено!');

            return redirect()->route('videos.index');
        } catch (\Exception $e) {
            \Log::error('Video deletion error: ' . $e->getMessage());

            alert_error('Ошибка при удалении видео: ' . $e->getMessage());

            return redirect()->back();
        }
    }
}

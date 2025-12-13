<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stats;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StatsController extends Controller
{
    /**
     * Display a listing of stats
     */
    public function index(Request $request): View
    {
        $query = Stats::with(['translations']);

        // Filter by language
        if ($request->filled('lang')) {
            $query->whereHas('translations', function ($q) use ($request) {
                $q->where('lang_code', $request->lang);
            });
        }

        $stats = $query->orderBy('created_at', 'desc')->get();

        return view('pages.stats.index', compact('stats'));
    }

    /**
     * Show the form for creating a new stat
     */
    public function create(): View
    {
        $languages = \App\Models\Language::all();
        return view('pages.stats.create', compact('languages'));
    }

    /**
     * Store a newly created stat
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'count' => 'required|integer|min:0',
            'translations' => 'required|array|min:1',
        ], [
            'count.required' => 'Количество обязательно для заполнения',
            'count.integer' => 'Количество должно быть целым числом',
            'count.min' => 'Количество не может быть отрицательным',
            'translations.required' => 'Необходимо добавить хотя бы один перевод',
        ]);

        try {
            DB::transaction(function () use ($request) {
                // Create stat
                $stat = Stats::create([
                    'count' => $request->count,
                ]);

                // Create translations
                if ($request->has('translations')) {
                    foreach ($request->translations as $langCode => $translation) {
                        $title = $translation['title'] ?? null;

                        if (!empty(trim($title))) {
                            $stat->translations()->create([
                                'lang_code' => $langCode,
                                'title' => trim($title),
                            ]);
                        }
                    }
                }
            });

            alert_success('Статистика успешно добавлена!');

            return redirect()->route('stats.index');
        } catch (\Exception $e) {
            \Log::error('Stats creation error: ' . $e->getMessage());

            alert_error('Ошибка при добавлении статистики: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified stat (modal)
     */
    public function editModal(int $id): View
    {
        $stat = Stats::with(['translations'])->findOrFail($id);
        $languages = \App\Models\Language::all();

        return view('pages.stats.edit-modal', compact('stat', 'languages'));
    }

    /**
     * Update the specified stat
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'count' => 'required|integer|min:0',
            'translations' => 'required|array|min:1',
        ], [
            'count.required' => 'Количество обязательно для заполнения',
            'count.integer' => 'Количество должно быть целым числом',
            'count.min' => 'Количество не может быть отрицательным',
            'translations.required' => 'Необходимо добавить хотя бы один перевод',
        ]);

        try {
            DB::transaction(function () use ($request, $id) {
                $stat = Stats::findOrFail($id);

                // Update stat
                $stat->update([
                    'count' => $request->count,
                ]);

                // Delete existing translations
                $stat->translations()->delete();

                // Create new translations
                if ($request->has('translations')) {
                    foreach ($request->translations as $langCode => $translation) {
                        $title = $translation['title'] ?? null;

                        if (!empty(trim($title))) {
                            $stat->translations()->create([
                                'lang_code' => $langCode,
                                'title' => trim($title),
                            ]);
                        }
                    }
                }
            });

            alert_success('Статистика успешно обновлена!');

            return redirect()->route('stats.index');
        } catch (\Exception $e) {
            \Log::error('Stats update error: ' . $e->getMessage());

            alert_error('Ошибка при обновлении статистики: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified stat
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            DB::transaction(function () use ($id) {
                $stat = Stats::findOrFail($id);
                $stat->translations()->delete();
                $stat->delete();
            });

            alert_success('Статистика успешно удалена!');

            return redirect()->route('stats.index');
        } catch (\Exception $e) {
            \Log::error('Stats deletion error: ' . $e->getMessage());

            alert_error('Ошибка при удалении статистики: ' . $e->getMessage());

            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InteractiveService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InteractiveServiceController extends Controller
{
    /**
     * Display a listing of interactive services
     */
    public function index(): View
    {
        $services = InteractiveService::orderBy('created_at', 'desc')->get();

        return view('pages.interactive-services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service
     */
    public function create(): View
    {
        return view('pages.interactive-services.create');
    }

    /**
     * Store a newly created service
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:500',
        ], [
            'title.required' => 'Название услуги обязательно для заполнения',
            'title.max' => 'Название не должно превышать 255 символов',
            'url.required' => 'URL адрес обязателен для заполнения',
            'url.max' => 'URL не должен превышать 500 символов',
        ]);

        try {
            InteractiveService::create($validated);

            alert_success('Интерактивная услуга успешно добавлена!');

            return redirect()->route('interactive-services.index');
        } catch (\Exception $e) {
            \Log::error('Interactive service creation error: ' . $e->getMessage());

            alert_error('Ошибка при добавлении услуги: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified service (modal)
     */
    public function editModal(int $id): View
    {
        $service = InteractiveService::findOrFail($id);

        return view('pages.interactive-services.edit-modal', compact('service'));
    }

    /**
     * Update the specified service
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:500',
        ], [
            'title.required' => 'Название услуги обязательно для заполнения',
            'title.max' => 'Название не должно превышать 255 символов',
            'url.required' => 'URL адрес обязателен для заполнения',
            'url.max' => 'URL не должен превышать 500 символов',
        ]);

        try {
            $service = InteractiveService::findOrFail($id);
            $service->update($validated);

            alert_success('Интерактивная услуга успешно обновлена!');

            return redirect()->route('interactive-services.index');
        } catch (\Exception $e) {
            \Log::error('Interactive service update error: ' . $e->getMessage());

            alert_error('Ошибка при обновлении услуги: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified service
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $service = InteractiveService::findOrFail($id);
            $service->delete();

            alert_success('Интерактивная услуга успешно удалена!');

            return redirect()->route('interactive-services.index');
        } catch (\Exception $e) {
            \Log::error('Interactive service deletion error: ' . $e->getMessage());

            alert_error('Ошибка при удалении услуги: ' . $e->getMessage());

            return redirect()->back();
        }
    }
}

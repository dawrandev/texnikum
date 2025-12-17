<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Services\Admin\PartnerService;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function __construct(
        protected PartnerService $service
    ) {}

    public function index()
    {
        $partners = $this->service->getAllPaginated(10);

        return view('pages.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('pages.partners.create');
    }

    public function store(StorePartnerRequest $request)
    {
        try {
            $this->service->create($request->validated());

            return redirect()
                ->route('partners.index')
                ->with('success', 'Партнер успешно создан');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Ошибка при создании: ' . $e->getMessage());
        }
    }

    public function showModal($id)
    {
        $partner = $this->service->findById($id);
        return view('pages.partners.show', compact('partner'));
    }

    public function editModal($id)
    {
        $partner = $this->service->findById($id);
        return view('pages.partners.edit', compact('partner'));
    }

    public function update(UpdatePartnerRequest $request, $id)
    {
        try {
            $this->service->update($id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Партнер успешно обновлен'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при обновлении: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->delete($id);

            return response()->json([
                'success' => true,
                'message' => 'Партнер успешно удален'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при удалении: ' . $e->getMessage()
            ], 500);
        }
    }
}

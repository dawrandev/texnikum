<?php

namespace App\Repositories\Admin;

use App\Models\Partner;
use Illuminate\Pagination\LengthAwarePaginator;

class PartnerRepository
{
    public function __construct(
        protected Partner $model
    ) {}

    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function findById(int $id): ?Partner
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Partner
    {
        return $this->model->create($data);
    }

    public function update(Partner $partner, array $data): bool
    {
        return $partner->update($data);
    }

    public function delete(Partner $partner): bool
    {
        return $partner->delete();
    }

    public function getAll()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }
}

<?php

namespace App\Services\Admin;

use App\Models\Partner;
use App\Repositories\Admin\PartnerRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PartnerService
{
    public function __construct(
        protected PartnerRepository $repository
    ) {}

    public function getAllPaginated(int $perPage = 10)
    {
        return $this->repository->getAllPaginated($perPage);
    }

    public function findById(int $id): ?Partner
    {
        return $this->repository->findById($id);
    }

    public function create(array $data): Partner
    {
        if (isset($data['logo']) && $data['logo'] instanceof UploadedFile) {
            $data['logo'] = $this->uploadLogo($data['logo']);
        }

        return $this->repository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $partner = $this->repository->findById($id);

        if (isset($data['logo']) && $data['logo'] instanceof UploadedFile) {
            // Delete old logo
            if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
                Storage::disk('public')->delete($partner->logo);
            }

            $data['logo'] = $this->uploadLogo($data['logo']);
        } else {
            // Keep existing logo if no new one uploaded
            unset($data['logo']);
        }

        return $this->repository->update($partner, $data);
    }

    public function delete(int $id): bool
    {
        $partner = $this->repository->findById($id);

        // Delete logo file
        if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
            Storage::disk('public')->delete($partner->logo);
        }

        return $this->repository->delete($partner);
    }

    protected function uploadLogo(UploadedFile $file): string
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('partners', $filename, 'public');
    }
}

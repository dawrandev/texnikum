<?php

namespace App\Repositories\API;

class CategoryRepository
{
    public function getAll()
    {
        return \App\Models\Category::with('translations')->get();
    }

    public function findById($id)
    {
        return \App\Models\Category::with('translations')->find($id);
    }
}

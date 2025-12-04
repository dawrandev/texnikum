<?php

namespace App\Repositories;

class CategoryRepository
{
    public function getAll()
    {
        return \App\Models\Category::with('translations')->get();
    }
}

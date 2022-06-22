<?php

namespace Modules\Categories\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Categories\Models\Category;

interface CategoriesRepositoryInterface
{
    public function listCategories(): Collection | array;
    public function create($category): Category | array;
    public function update($id, $category): void;
    public function delete($id): void;
    public function get($id): Category | null | array;
}

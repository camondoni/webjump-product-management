<?php

namespace Modules\Categories\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Categories\Repositories\CategoriesRepositoryInterface;
use Modules\Categories\Models\Category;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    public function listCategories(): Collection
    {
        return Category::select('*')->orderBy('updated_at', 'desc')->get();
    }

    public function create($product): Category
    {
        return Category::create($product);
    }

    public function update($id, $product): void
    {
        Category::where("id", $id)->update($product);
    }

    public function delete($id): void
    {
        Category::where("id", $id)->delete();
    }

    public function get($id): Category | null
    {
        return Category::find($id);
    }
}

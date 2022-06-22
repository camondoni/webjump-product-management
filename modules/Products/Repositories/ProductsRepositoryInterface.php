<?php

namespace Modules\Products\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Products\Models\Product;

interface ProductsRepositoryInterface
{
    public function listProducts(): Collection | array;
    public function create($product): Product | array;
    public function update($id, $product): void;
    public function delete($id): void;
    public function deleteProductCategory($id): void;
    public function createProductCategory($productId, $categoryId): void;
    public function get($id): Product | null | array;
}

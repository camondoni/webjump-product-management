<?php

namespace Modules\Products\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Products\Repositories\ProductsRepositoryInterface;
use Modules\Products\Models\Product;
use Modules\Products\Models\Product_Category;

class ProductsRepository implements ProductsRepositoryInterface
{
    public function listProducts(): Collection
    {
        return Product::select('*')->orderBy('updated_at', 'desc')->get();
    }

    public function create($product): Product
    {
        return Product::create($product);
    }

    public function update($id, $product): void
    {
        Product::where("id", $id)->update($product);
    }

    public function delete($id): void
    {
        Product::where("id", $id)->delete();
    }

    public function deleteProductCategory($id): void
    {
        Product_Category::where("product_id", $id)->delete();
    }

    public function createProductCategory($productId, $categoryId): void
    {
        Product_Category::updateOrCreate(['product_id' => $productId, 'category_id' => $categoryId]);
    }

    public function get($id): Product | null
    {
        return Product::with('categories')->find($id);
    }
}

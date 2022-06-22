<?php

namespace Modules\Products\UseCases\ListProducts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Products\Repositories\ProductsRepositoryInterface;

class ListProductsUseCase
{
    private ProductsRepositoryInterface $productsRepository;
    public function __construct(ProductsRepositoryInterface $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    public function execute(): Collection | array
    {
        $products = $this->productsRepository->listProducts();
        return $products;
    }
}

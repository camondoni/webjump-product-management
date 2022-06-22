<?php

namespace Modules\Products\UseCases\UpdateProduct;

use Modules\Products\Repositories\ProductsRepositoryInterface;

class UpdateProductUseCase
{
    private ProductsRepositoryInterface $productsRepository;
    public function __construct(ProductsRepositoryInterface $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    public function execute($id, $product): void
    {
        $this->productsRepository->update($id, $product);
    }
}

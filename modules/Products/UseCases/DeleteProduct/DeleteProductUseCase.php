<?php

namespace Modules\Products\UseCases\DeleteProduct;

use Modules\Products\Repositories\ProductsRepositoryInterface;

class DeleteProductUseCase
{
    private ProductsRepositoryInterface $productsRepository;
    public function __construct(ProductsRepositoryInterface $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    public function execute($id): void
    {
        $this->productsRepository->deleteProductCategory($id);
        $this->productsRepository->delete($id);
    }
}

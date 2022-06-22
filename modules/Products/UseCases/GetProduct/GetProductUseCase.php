<?php

namespace Modules\Products\UseCases\GetProduct;

use Camondoni\Framework\Response;
use Modules\Products\Models\Product;
use Modules\Products\Repositories\ProductsRepositoryInterface;

class GetProductUseCase
{
    private ProductsRepositoryInterface $productsRepository;
    public function __construct(ProductsRepositoryInterface $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    public function execute($id): Product | null | array
    {
        $product = $this->productsRepository->get($id);

        if (empty($product)) {
            Response::notFound();
        }

        return $product;
    }
}

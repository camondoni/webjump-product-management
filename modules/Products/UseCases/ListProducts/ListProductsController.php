<?php

namespace Modules\Products\UseCases\ListProducts;

use Camondoni\Framework\Response;
use Modules\Products\Repositories\ProductsRepository;
use Modules\Products\UseCases\ListProducts\ListProductsUseCase;


class ListProductsController
{

    private ListProductsUseCase $listProductUseCase;

    public function __construct()
    {
        $productsRepositories = new ProductsRepository();
        $this->listProductUseCase = new ListProductsUseCase($productsRepositories);
    }
    public function execute()
    {
        $products = $this->listProductUseCase->execute();
        return Response::json($products);
    }
}

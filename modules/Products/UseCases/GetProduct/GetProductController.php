<?php

namespace Modules\Products\UseCases\GetProduct;

use Camondoni\Framework\Response;
use Modules\Products\Repositories\ProductsRepository;
use Modules\Products\UseCases\GetProduct\GetProductUseCase;


class GetProductController
{

    private GetProductUseCase $getProductUseCase;
    public function __construct()
    {
        $productsRepositories = new ProductsRepository();
        $this->getProductUseCase = new GetProductUseCase($productsRepositories);
    }
    public function execute($request)
    {
        $product = $this->getProductUseCase->execute($request['params']['id']);
        return Response::json($product);
    }
}

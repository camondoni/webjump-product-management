<?php

namespace Modules\Products\UseCases\DeleteProduct;

use Modules\Products\UseCases\DeleteProduct\DeleteProductRequestValidator;
use Camondoni\Framework\Response;
use Modules\Products\Repositories\ProductsRepository;
use Modules\Products\UseCases\DeleteProduct\DeleteProductUseCase;


class DeleteProductController
{

    private DeleteProductUseCase $deleteProductUseCase;
    public function __construct()
    {
        $productsRepositories = new ProductsRepository();
        $this->deleteProductUseCase = new DeleteProductUseCase($productsRepositories);
    }
    public function execute($request)
    {
        $this->deleteProductUseCase->execute($request['params']['id']);
        return Response::json([], 204);
    }
}

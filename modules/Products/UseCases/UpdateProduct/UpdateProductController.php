<?php

namespace Modules\Products\UseCases\UpdateProduct;

use Modules\Products\UseCases\UpdateProduct\UpdateProductRequestValidator;
use Camondoni\Framework\Response;
use Modules\Products\Repositories\ProductsRepository;
use Modules\Products\UseCases\UpdateProduct\UpdateProductUseCase;


class UpdateProductController
{

    private UpdateProductUseCase $updateProductUseCase;
    public function __construct()
    {
        $productsRepositories = new ProductsRepository();
        $this->updateProductUseCase = new UpdateProductUseCase($productsRepositories);
    }
    public function execute($request)
    {
        $requestValidator = new UpdateProductRequestValidator();
        $requestValidator = $requestValidator->validate($request['body']);
        if ($requestValidator) {
            return Response::json($requestValidator, 400);
        };

        $this->updateProductUseCase->execute($request['params']['id'], $request['body']);
        return Response::json([], 204);
    }
}

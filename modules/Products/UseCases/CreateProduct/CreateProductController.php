<?php

namespace Modules\Products\UseCases\CreateProduct;

use Modules\Products\UseCases\CreateProduct\CreateProductRequestValidator;
use Camondoni\Framework\Response;
use Exception;
use Modules\Categories\Repositories\CategoriesRepository;
use Modules\Products\Repositories\InMemory\InMemoryProductsRepository;
use Modules\Products\Repositories\ProductsRepository;
use Modules\Products\UseCases\CreateProduct\CreateProductUseCase;


class CreateProductController
{

    private CreateProductUseCase $createProductUseCase;
    public function __construct()
    {
        $productsRepositories = new ProductsRepository();
        $categoriesRepository = new CategoriesRepository();
        $this->createProductUseCase = new CreateProductUseCase($productsRepositories, $categoriesRepository);
    }
    public function execute($request)
    {

        $requestValidator = new CreateProductRequestValidator();
        $requestValidator = $requestValidator->validate($request['body']);
        if ($requestValidator) {
            return Response::json($requestValidator, 400);
        };
        $product = $this->createProductUseCase->execute($request['body']);
        return Response::json($product, 201);
    }
}

<?php

namespace Modules\Categories\UseCases\CreateCategory;

use Modules\Categories\UseCases\CreateCategory\CreateCategoryRequestValidator;
use Camondoni\Framework\Response;
use Modules\Categories\Repositories\CategoriesRepository;
use Modules\Categories\UseCases\CreateCategory\CreateCategoryUseCase;


class CreateCategoryController
{

    private CreateCategoryUseCase $createCategoryUseCase;
    public function __construct()
    {
        $categoriesRepositories = new CategoriesRepository();
        $this->createCategoryUseCase = new CreateCategoryUseCase($categoriesRepositories);
    }
    public function execute($request)
    {
        $requestValidator = new CreateCategoryRequestValidator();
        $requestValidator = $requestValidator->validate($request['body']);
        if ($requestValidator) {
            return Response::json($requestValidator, 400);
        };

        $category = $this->createCategoryUseCase->execute($request['body']);
        return Response::json($category, 201);
    }
}

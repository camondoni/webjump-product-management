<?php

namespace Modules\Categories\UseCases\UpdateCategory;

use Modules\Categories\UseCases\UpdateCategory\UpdateCategoryRequestValidator;
use Camondoni\Framework\Response;
use Modules\Categories\Repositories\CategoriesRepository;
use Modules\Categories\UseCases\UpdateCategory\UpdateCategoryUseCase;


class UpdateCategoryController
{

    private UpdateCategoryUseCase $updateCategoryUseCase;
    public function __construct()
    {
        $categoriesRepositories = new CategoriesRepository();
        $this->updateCategoryUseCase = new UpdateCategoryUseCase($categoriesRepositories);
    }
    public function execute($request)
    {
        $requestValidator = new UpdateCategoryRequestValidator();
        $requestValidator = $requestValidator->validate($request['body']);
        if ($requestValidator) {
            return Response::json($requestValidator, 400);
        };

        $this->updateCategoryUseCase->execute($request['params']['id'], $request['body']);
        return Response::json([], 204);
    }
}

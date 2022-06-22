<?php

namespace Modules\Categories\UseCases\GetCategory;

use Camondoni\Framework\Response;
use Modules\Categories\Repositories\CategoriesRepository;
use Modules\Categories\UseCases\GetCategory\GetCategoryUseCase;


class GetCategoryController
{

    private GetCategoryUseCase $getCategoryUseCase;
    public function __construct()
    {
        $categoriesRepositories = new CategoriesRepository();
        $this->getCategoryUseCase = new GetCategoryUseCase($categoriesRepositories);
    }
    public function execute($request)
    {
        $category = $this->getCategoryUseCase->execute($request['params']['id']);
        return Response::json($category);
    }
}

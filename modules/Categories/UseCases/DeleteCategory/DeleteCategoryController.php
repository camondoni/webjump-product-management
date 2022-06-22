<?php

namespace Modules\Categories\UseCases\DeleteCategory;

use Camondoni\Framework\Response;
use Modules\Categories\Repositories\CategoriesRepository;
use Modules\Categories\UseCases\DeleteCategory\DeleteCategoryUseCase;


class DeleteCategoryController
{

    private DeleteCategoryUseCase $deleteCategoryUseCase;
    public function __construct()
    {
        $categoriesRepositories = new CategoriesRepository();
        $this->deleteCategoryUseCase = new DeleteCategoryUseCase($categoriesRepositories);
    }
    public function execute($request)
    {
        $this->deleteCategoryUseCase->execute($request['params']['id']);
        return Response::json([], 204);
    }
}

<?php

namespace Modules\Categories\UseCases\ListCategories;

use Camondoni\Framework\Response;
use Modules\Categories\Repositories\CategoriesRepository;
use Modules\Categories\UseCases\ListCategories\ListCategoriesUseCase;


class ListCategoriesController
{

    private ListCategoriesUseCase $listCategoriesUseCase;
    public function __construct()
    {
        $categoriesRepositories = new CategoriesRepository();
        $this->listCategoriesUseCase = new ListCategoriesUseCase($categoriesRepositories);
    }
    public function execute()
    {
        $categories = $this->listCategoriesUseCase->execute();
        return Response::json($categories);
    }
}

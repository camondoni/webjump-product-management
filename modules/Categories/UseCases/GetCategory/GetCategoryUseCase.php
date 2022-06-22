<?php

namespace Modules\Categories\UseCases\GetCategory;

use Camondoni\Framework\Response;
use Modules\Categories\Models\Category;
use Modules\Categories\Repositories\CategoriesRepositoryInterface;

class GetCategoryUseCase
{
    private CategoriesRepositoryInterface $categoriesRepository;
    public function __construct(CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }
    public function execute($id): Category | null | array
    {
        $category = $this->categoriesRepository->get($id);

        if (empty($category)) {
            Response::notFound();
        }

        return $category;
    }
}

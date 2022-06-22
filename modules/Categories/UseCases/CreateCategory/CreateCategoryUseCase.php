<?php

namespace Modules\Categories\UseCases\CreateCategory;

use Modules\Categories\Models\Category;
use Modules\Categories\Repositories\CategoriesRepositoryInterface;

class CreateCategoryUseCase
{
    private CategoriesRepositoryInterface $categoriesRepository;
    public function __construct(CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }
    public function execute($request): Category | array
    {
        return $this->categoriesRepository->create($request);
    }
}

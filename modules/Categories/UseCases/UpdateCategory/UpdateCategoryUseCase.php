<?php

namespace Modules\Categories\UseCases\UpdateCategory;

use Modules\Categories\Repositories\CategoriesRepositoryInterface;

class UpdateCategoryUseCase
{
    private CategoriesRepositoryInterface $categoriesRepository;
    public function __construct(CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }
    public function execute($id, $category): void
    {
        $this->categoriesRepository->update($id, $category);
    }
}

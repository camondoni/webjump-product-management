<?php

namespace Modules\Categories\UseCases\DeleteCategory;

use Modules\Categories\Repositories\CategoriesRepositoryInterface;

class DeleteCategoryUseCase
{
    private CategoriesRepositoryInterface $categoriesRepository;
    public function __construct(CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }
    public function execute($id): void
    {
        $this->categoriesRepository->delete($id);
    }
}

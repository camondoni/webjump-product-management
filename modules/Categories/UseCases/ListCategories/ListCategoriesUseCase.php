<?php

namespace Modules\Categories\UseCases\ListCategories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Categories\Repositories\CategoriesRepositoryInterface;

class ListCategoriesUseCase
{
    private CategoriesRepositoryInterface $categoriesRepository;
    public function __construct(CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }
    public function execute(): Collection
    {
        $categories = $this->categoriesRepository->listCategories();
        return $categories;
    }
}

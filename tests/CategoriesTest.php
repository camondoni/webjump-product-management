<?php

namespace Camondoni\Framework;

use Modules\Categories\Repositories\InMemory\InMemoryCategoriesRepository;
use Modules\Categories\UseCases\CreateCategory\CreateCategoryUseCase;
use Modules\Categories\UseCases\DeleteCategory\DeleteCategoryUseCase;
use Modules\Categories\UseCases\GetCategory\GetCategoryUseCase;
use Modules\Categories\UseCases\UpdateCategory\UpdateCategoryUseCase;
use PHPUnit\Framework\TestCase;

class CategoriesTest extends TestCase
{
    public function testCreateCategory()
    {
        $categoriesRepository = new InMemoryCategoriesRepository();
        $createCategoryUseCase = new CreateCategoryUseCase($categoriesRepository);

        $category = array(
            "name" => "Cars",
            "cod" => "XPTO"
        );

        $category = $createCategoryUseCase->execute($category);
        $this->assertArrayHasKey('id', $category, "Should Create Category");
    }

    public function testUpdateCategory()
    {
        $categoryRepository = new InMemoryCategoriesRepository();
        $updateCategoryUseCase = new UpdateCategoryUseCase($categoryRepository);

        $category = array(
            "name" => "Cars",
            "cod" => "XPTO",
        );

        $newCategory = $categoryRepository->create($category);

        $category['name'] = "BlueCars";
        $updateCategoryUseCase->execute($newCategory['id'], $category);

        $category = $categoryRepository->get($newCategory['id']);


        $this->assertEquals('BlueCars', $category['name'], "Should update category");
    }


    public function testDeleteCategory()
    {
        $categoryRepository = new InMemoryCategoriesRepository();
        $deleteCategoryUseCase = new DeleteCategoryUseCase($categoryRepository);

        $category = array(
            "name" => "Cars",
            "cod" => "XPTO"
        );

        $category = $categoryRepository->create($category);

        $deleteCategoryUseCase->execute($category['id']);

        $category = $categoryRepository->get($category['id']);

        $this->assertEmpty($category, "Should delete Category");
    }


    public function testGetCategory()
    {
        $categoryRepository = new InMemoryCategoriesRepository();
        $getCategoryUseCase = new GetCategoryUseCase($categoryRepository);

        $category = array(
            "name" => "Cars",
            "cod" => "XPTO"
        );

        $category = $categoryRepository->create($category);

        $category = $getCategoryUseCase->execute($category['id']);

        $this->assertArrayHasKey('id', $category, "Should return created Category");
    }
}

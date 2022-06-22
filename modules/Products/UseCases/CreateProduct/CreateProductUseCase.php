<?php

namespace Modules\Products\UseCases\CreateProduct;

use Exception;
use Modules\Categories\Repositories\CategoriesRepositoryInterface;
use Modules\Products\Models\Product;
use Modules\Products\Repositories\ProductsRepositoryInterface;

class CreateProductUseCase
{
    private ProductsRepositoryInterface $productsRepository;
    private CategoriesRepositoryInterface $categoryRepository;
    public function __construct(ProductsRepositoryInterface $productsRepository, CategoriesRepositoryInterface $categoryRepository)
    {
        $this->productsRepository = $productsRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function execute($request): Product | array
    {
        if (!empty($request['categories'])) {
            foreach ($request['categories'] as $category) {
                $checkIfCategoryExists = $this->categoryRepository->get($category['id']);
                if (empty($checkIfCategoryExists)) {
                    throw new Exception("The associated category could not be found", 400);
                }
            }
        }

        $product = $this->productsRepository->create($request);
        if (!empty($request['categories'])) {
            foreach ($request['categories'] as $category) {
                $this->productsRepository->createProductCategory($product['id'], $category['id']);
            }
        }
        return $this->productsRepository->create($request);
    }
}

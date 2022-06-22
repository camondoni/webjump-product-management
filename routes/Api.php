<?php

namespace Camondoni\Framework;

use Camondoni\Framework\Router;
use Modules\Products\UseCases\CreateProduct\CreateProductController;
use Modules\Products\UseCases\UpdateProduct\UpdateProductController;
use Modules\Products\UseCases\DeleteProduct\DeleteProductController;
use Modules\Products\UseCases\GetProduct\GetProductController;
use Modules\Products\UseCases\ListProducts\ListProductsController;
use Modules\Products\UseCases\UploadProductImages\UploadProductImagesController;

use Modules\Categories\UseCases\CreateCategory\CreateCategoryController;
use Modules\Categories\UseCases\UpdateCategory\UpdateCategoryController;
use Modules\Categories\UseCases\DeleteCategory\DeleteCategoryController;
use Modules\Categories\UseCases\GetCategory\GetCategoryController;
use Modules\Categories\UseCases\ListCategories\ListCategoriesController;



class Api
{
    private Router $router;
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function routing()
    {
        $this->productsRoutes();
        $this->categoriesRoutes();
    }

    public function categoriesRoutes()
    {
        $this->router->get('/categories', function ($request) {
            $categoryController = new ListCategoriesController();
            return $categoryController->execute($request);
        });

        $this->router->get('/categories/{id}', function ($request) {
            $categoryController = new GetCategoryController();
            return $categoryController->execute($request);
        });

        $this->router->post('/categories', function ($request) {
            $categoryController = new CreateCategoryController();
            return $categoryController->execute($request);
        });

        $this->router->put('/categories/{id}', function ($request) {
            $categoryController = new UpdateCategoryController();
            return $categoryController->execute($request);
        });

        $this->router->delete('/categories/{id}', function ($request) {
            $categoryController = new DeleteCategoryController();
            return $categoryController->execute($request);
        });
    }

    public function productsRoutes()
    {


        $this->router->get('/products', function ($request) {
            $productController = new ListProductsController();
            return $productController->execute($request);
        });

        $this->router->get('/products/{id}', function ($request) {
            $productController = new GetProductController();
            return $productController->execute($request);
        });

        $this->router->post('/products', function ($request) {
            $productController = new CreateProductController();
            return $productController->execute($request);
        });

        $this->router->put('/products/{id}', function ($request) {
            $productController = new UpdateProductController();
            return $productController->execute($request);
        });

        $this->router->delete('/products/{id}', function ($request) {
            $productController = new DeleteProductController();
            return $productController->execute($request);
        });

        $this->router->post('/products/{id}/images', function ($request) {
            $productController = new UploadProductImagesController();
            return $productController->execute($request);
        });
    }
}

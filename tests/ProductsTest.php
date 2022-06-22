<?php

namespace Camondoni\Framework;

use Modules\Categories\Repositories\InMemory\InMemoryCategoriesRepository;
use Modules\Products\Repositories\InMemory\InMemoryProductsRepository;
use Modules\Products\UseCases\CreateProduct\CreateProductUseCase;
use Modules\Products\UseCases\DeleteProduct\DeleteProductUseCase;
use Modules\Products\UseCases\GetProduct\GetProductUseCase;
use Modules\Products\UseCases\UpdateProduct\UpdateProductUseCase;
use PHPUnit\Framework\TestCase;

class ProductsTest extends TestCase
{
    public function testCreateProduct()
    {
        $productRepository = new InMemoryProductsRepository();
        $categoriesRepository = new InMemoryCategoriesRepository();
        $createProductUseCase = new CreateProductUseCase($productRepository, $categoriesRepository);

        $product = array(
            "name" => "CarTest",
            "unit_price" => 120.00,
            "sku" => "TST",
            "quantity" => 5,
            "description" => "Hello world"
        );

        $product = $createProductUseCase->execute($product);
        $this->assertArrayHasKey('id', $product, "Should Create Product");


        $product = array(
            "name" => "CarTest",
            "unit_price" => 120.00,
            "sku" => "TST",
            "quantity" => 5,
            "description" => "Hello world",
            "categories" => [
                array(
                    "id" => 5,
                )
            ],
        );

        try {
            $product = $createProductUseCase->execute($product);
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "The associated category could not be found", "Should not create product due to invalid category");
        }
    }

    public function testUpdateProduct()
    {
        $productRepository = new InMemoryProductsRepository();
        $updateProductUseCase = new UpdateProductUseCase($productRepository);

        $product = array(
            "name" => "CarTest",
            "unit_price" => 120.00,
            "sku" => "TST",
            "quantity" => 5,
            "description" => "Hello world"
        );

        $newProduct = $productRepository->create($product);

        $product['name'] = "CarCrazy";
        $updateProductUseCase->execute($newProduct['id'], $product);

        $product = $productRepository->get($newProduct['id']);


        $this->assertEquals('CarCrazy', $product['name'], "Should update product");
    }

    public function testDeleteProduct()
    {
        $productRepository = new InMemoryProductsRepository();
        $deleteProductUseCase = new DeleteProductUseCase($productRepository);

        $product = array(
            "name" => "CarTest",
            "unit_price" => 120.00,
            "sku" => "TST",
            "quantity" => 5,
            "description" => "Hello world"
        );

        $product = $productRepository->create($product);

        $deleteProductUseCase->execute($product['id']);

        $product = $productRepository->get($product['id']);

        $this->assertEmpty($product, "Should delete Product");
    }


    public function testGetProduct()
    {
        $productRepository = new InMemoryProductsRepository();
        $getProductUseCase = new GetProductUseCase($productRepository);

        $product = array(
            "name" => "CarTest",
            "unit_price" => 120.00,
            "sku" => "TST",
            "quantity" => 5,
            "description" => "Hello world"
        );

        $product = $productRepository->create($product);

        $product = $getProductUseCase->execute($product['id']);

        $this->assertArrayHasKey('id', $product, "Should return created Product");
    }
}

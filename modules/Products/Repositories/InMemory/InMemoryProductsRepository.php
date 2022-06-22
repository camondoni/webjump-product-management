<?php

namespace Modules\Products\Repositories\InMemory;

use Modules\Products\Repositories\ProductsRepositoryInterface;

class InMemoryProductsRepository implements ProductsRepositoryInterface
{
    private static $instance;

    private array $products = [];
    private int $id = 0;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function listProducts(): array
    {
        return $this->products;
    }

    public function create($product): array
    {
        $this->id += 1;

        $product['id'] = $this->id;
        $product['created_at'] = date('Y-m-d H:i:s');

        array_push($this->products, $product);
        return $product;
    }

    public function update($id, $product): void
    {
        $index = $this->findIndex($id);
        $this->products[$index] = array_merge($this->products[$index], $product);
    }

    public function delete($id): void
    {
        $index = $this->findIndex($id);
        unset($this->products[$index]);
    }

    public function deleteProductCategory($id): void
    {
    }

    public function createProductCategory($productId, $categoryId): void
    {
    }

    public function get($id): array | null
    {
        $index = $this->findIndex($id);

        if ($index >= 0) {
            return $this->products[$index];
        } else {
            return [];
        }
    }


    protected function findIndex($id): int
    {
        $productIndex = -1;
        foreach ($this->products as $index => $product) {
            if ($product['id'] == $id) {
                $productIndex = $index;
                break;
            }
        }
        return $productIndex;
    }
}

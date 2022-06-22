<?php

namespace Modules\Categories\Repositories\InMemory;

use Modules\Categories\Repositories\CategoriesRepositoryInterface;

class InMemoryCategoriesRepository implements CategoriesRepositoryInterface
{
    private static $instance;

    private array $categories = [];
    private int $id = 0;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function listCategories(): array
    {
        return $this->categories;
    }

    public function create($category): array
    {
        $this->id += 1;

        $category['id'] = $this->id;
        $category['created_at'] = date('Y-m-d H:i:s');

        array_push($this->categories, $category);
        return $category;
    }

    public function update($id, $category): void
    {
        $index = $this->findIndex($id);
        $this->categories[$index] = array_merge($this->categories[$index], $category);
    }

    public function delete($id): void
    {
        $index = $this->findIndex($id);
        unset($this->categories[$index]);
    }


    public function get($id): array
    {

        $index = $this->findIndex($id);

        if ($index >= 0) {
            $this->categories = array_splice($this->categories, $index, 1);
        } else {
            return [];
        }

        return $this->categories[$index];
    }


    protected function findIndex($id): int
    {
        $categoryIndex = -1;
        foreach ($this->categories as $index => $category) {
            if ($category['id'] == $id) {
                $categoryIndex = $index;
                break;
            }
        }
        return $categoryIndex;
    }
}

<?php

namespace Modules\Products\Repositories;

interface ProductsImagesRepositoryInterface
{
    public function uploadImages($images, $productId): void;
}

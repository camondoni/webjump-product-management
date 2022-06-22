<?php

namespace Modules\Products\UseCases\UploadProductImages;

use Modules\Products\Repositories\ProductsImagesRepositoryInterface;

class UploadProductImagesUseCase
{
    private ProductsImagesRepositoryInterface $productsImagesRepository;
    public function __construct(ProductsImagesRepositoryInterface $productsImagesRepository)
    {
        $this->productsImagesRepository = $productsImagesRepository;
    }
    public function execute($images, $productId): void
    {
        $this->productsImagesRepository->uploadImages($images, $productId);
    }
}

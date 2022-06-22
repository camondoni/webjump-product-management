<?php

namespace Modules\Products\UseCases\UploadProductImages;

use Modules\Products\UseCases\UploadProductImages\CreateProductRequestValidator;
use Camondoni\Framework\Response;
use Modules\Products\Repositories\ProductsImagesRepository;
use Modules\Products\UseCases\UploadProductImages\UploadProductImagesUseCase;

class UploadProductImagesController
{
    private UploadProductImagesUseCase $uploadProductImagesUseCase;
    public function __construct()
    {
        $productsImagesRepository = new ProductsImagesRepository();
        $this->uploadProductImagesUseCase = new UploadProductImagesUseCase($productsImagesRepository);
    }
    public function execute($request)
    {
        /*$requestValidator = new CreateProductRequestValidator();
        $requestValidator = $requestValidator->validate($request['files']);
        if ($requestValidator) {
            return Response::json($requestValidator, 400);
        };
        */

        $this->uploadProductImagesUseCase->execute($request['files'], $request['params']['id']);
        return Response::json([], 204);
    }
}

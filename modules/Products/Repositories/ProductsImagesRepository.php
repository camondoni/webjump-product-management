<?php

namespace Modules\Products\Repositories;

use Camondoni\Framework\Response;

class ProductsImagesRepository implements ProductsImagesRepositoryInterface
{
    public function uploadImages($images, $productId): void
    {
        $folderPath = dirname(__DIR__, 3) . "/public/images" . "/" . $productId;
        if (!is_dir($folderPath)) {
            mkdir($folderPath);
        }
        $images = $this->reArrayFiles($images['files']);
        foreach ($images as $image) {
            if (!move_uploaded_file($image["tmp_name"], $folderPath . "/" . $image['name'])) {
                Response::serverError();
            }
        }
    }

    protected function reArrayFiles(&$file_post)
    {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }
}

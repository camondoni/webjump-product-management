<?php

namespace Modules\Products\UseCases\CreateProduct;

use Rakit\Validation\Validator;

class CreateProductRequestValidator
{

    public function validate($request): array | bool
    {

        $validator = new Validator();
        $validation = $validator->make($request, [
            'name'        => 'required|regex:/^[\s\da-zA-Z]+$/|max:100',
            'sku'         => 'required|regex:/^[\s\da-zA-Z]+$/|max:100',
            'unit_price'  => 'required|numeric',
            'quantity'    => 'required|numeric',
            'description' => 'regex:/^[\s\da-zA-Z]+$/|max:1000',
            'categories'    => 'array'
        ]);

        $validation->validate();
        if ($validation->fails()) {
            return array(
                "error" => true,
                "errorsMessage" => $validation->errors()->all()
            );
        } else {
            return false;
        }
    }
}

<?php

namespace Modules\Categories\UseCases\UpdateCategory;

use Rakit\Validation\Validator;

class UpdateCategoryRequestValidator
{

    public function validate($request): array | bool
    {

        $validator = new Validator();
        $validation = $validator->make($request, [
            'name'        => 'required|regex:/^[\s\da-zA-Z]+$/|max:100',
            'cod'         => 'required|regex:/^[\s\da-zA-Z]+$/|max:100'
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

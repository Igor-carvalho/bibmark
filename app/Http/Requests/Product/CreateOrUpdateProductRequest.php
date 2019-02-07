<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateOrUpdateProductRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'id' => 'sometimes|integer|exists:products',
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'image' => 'sometimes|url|nullable',
            'price' => 'sometimes|numeric',
            'slug' => 'sometimes|string',
            'is_available' => 'sometimes|boolean'
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     *  @return void
     */
    public function filters()
    {
        return [
            'name' => 'trim',
            'description' => 'trim',
            'image' => 'trim|escape',
            'slug' => 'trim'
        ];
    }
}

<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class AddProductToSizeRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'quantity' => 'sometimes|integer',
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
            
        ];
    }
}

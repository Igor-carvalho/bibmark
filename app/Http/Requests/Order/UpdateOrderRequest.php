<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class UpdateOrderRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'order_id' => 'required|integer|exists:orders,id',
            'source_id' => 'required|integer|exists:addresses,id',
            'weight' => 'required|numeric'
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

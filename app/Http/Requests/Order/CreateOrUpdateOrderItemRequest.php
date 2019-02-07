<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateOrUpdateOrderItemRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'order_id' => 'sometimes|integer|exists:orders,id',
            'product_id' => 'required|integer|exists:products,id',
            'size_id' => 'required|integer|exists:sizes,id',
            'quantity' => 'required|integer',
            'design_id' => 'required|integer|exists:designs,id',
            'event_registration_id' => 'required|integer|exists:event_registrations,id',
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

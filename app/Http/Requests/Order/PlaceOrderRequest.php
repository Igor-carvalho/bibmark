<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class PlaceOrderRequest extends Request
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
            'destination_id' => 'required|integer|exists:addresses,id',
            'coupon_id' => 'sometimes|integer|exists:coupons,id',
            'billing_id' => 'required|integer|exists:billings,id'
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

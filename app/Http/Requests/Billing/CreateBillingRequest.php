<?php

namespace App\Http\Requests\Billing;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateBillingRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'user_id' => 'sometimes|integer|exists:users,id',
            'stripe_token' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
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
            'stripe_token' => 'trim',
            'name' => 'trim',
            'address' => 'trim',
            'city' => 'trim',
            'state' => 'trim',
            'zip' => 'trim',
        ];
    }
}

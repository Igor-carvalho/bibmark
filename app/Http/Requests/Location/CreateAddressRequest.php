<?php

namespace App\Http\Requests\Location;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateAddressRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'address_1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'sometimes|string',
            'email' => 'required|email',
            'phone' => 'required|numeric|regex:/(01)[0-9]{9}/',
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
            'address_1' => 'trim',
            'address_2' => 'trim',
            'city' => 'trim',
            'state' => 'trim',
            'postal_code' => 'trim',
            'country' => 'trim',
            'email' => 'trim',
            'phone' => 'trim',
        ];
    }
}

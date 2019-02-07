<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateOrUpdateAccountRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'id' => 'sometimes|integer|exists:accounts',
            'name' => 'required|string',
            'budget' => 'sometimes|numeric',
            'balance' => 'sometimes|numeric',
            'logo' => 'sometimes|url|nullable',
            'background_image' => 'sometimes|url|nullable'
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
            'logo' => 'trim|escape',
            'background_image' => 'trim|escape'
        ];
    }
}

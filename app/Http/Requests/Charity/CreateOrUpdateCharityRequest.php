<?php

namespace App\Http\Requests\Charity;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateOrUpdateCharityRequest extends Request
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

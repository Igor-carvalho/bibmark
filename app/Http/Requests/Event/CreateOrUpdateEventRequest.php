<?php

namespace App\Http\Requests\Event;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateOrUpdateEventRequest extends Request
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
            'rev_share' => 'sometimes|numeric',
            'balance' => 'sometimes|numeric',
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
        ];
    }
}

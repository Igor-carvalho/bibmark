<?php

namespace App\Http\Requests\Design;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateOrUpdateDesignRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'id' => 'sometimes|integer|exists:designs',
            'name' => 'required|string',
            'exported_file' => 'sometimes|url',
            'properties' => 'sometimes|json'
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
            'exported_file' => 'trim|escape',
            'properties' => 'trim'
        ];
    }
}

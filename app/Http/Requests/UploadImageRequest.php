<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class UploadImageRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'image' => 'required|image',
            'type' => 'required|string'
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
            'type' => 'trim'
        ];
    }
}

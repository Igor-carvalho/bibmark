<?php

namespace App\Http\Requests\Design;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class UploadDesignFileRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'file' => 'required|mimes:pdf',
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

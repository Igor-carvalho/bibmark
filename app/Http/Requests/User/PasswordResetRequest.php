<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class PasswordResetRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
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
            'email' => 'trim',
        ];
    }
}

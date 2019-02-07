<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class PasswordUpdateRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
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
            'password' => 'trim',
            'token' => 'trim',
        ];
    }
}

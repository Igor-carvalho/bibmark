<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class RegisterRequest extends Request
{
    use SanitizesInput;

    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'firstname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
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
            'email' => 'trim',
            'password' => 'trim',
        ];
    }
}

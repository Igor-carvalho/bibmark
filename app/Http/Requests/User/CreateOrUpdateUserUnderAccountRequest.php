<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateUserUnderAccountRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'account_id' => 'required|integer|exists:accounts,id',
            'user_id' => 'sometimes|integer|exists:users,id',
            'role' => 'sometimes|integer',
            'name' => 'sometimes|string',
            'email' => 'sometimes|email'
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
            'email' => 'trim'
        ];
    }
}

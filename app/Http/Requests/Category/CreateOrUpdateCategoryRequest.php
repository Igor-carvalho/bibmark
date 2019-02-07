<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class CreateOrUpdateCategoryRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'parent_id' => 'sometimes|exists:categories,id',
            'id' => 'sometimes|exists:categories'
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
            'name' => 'trim'
        ];
    }
}

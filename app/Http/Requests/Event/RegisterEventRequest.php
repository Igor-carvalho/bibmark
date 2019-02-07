<?php

namespace App\Http\Requests\Event;

use App\Http\Requests\Request;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class RegisterEventRequest extends Request
{
    /**
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:events,id',
            'event_instance_id' => 'required|integer|exists:event_instances,id',
            'confirmation_number' => 'required|string',
            'bibmark_number' => 'required|string',
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
            'confirmation_number' => 'trim',
        ];
    }
}

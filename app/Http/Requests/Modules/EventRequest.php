<?php

namespace App\Http\Requests\Modules;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:30'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'venue' => ['required']
        ];
    }
}

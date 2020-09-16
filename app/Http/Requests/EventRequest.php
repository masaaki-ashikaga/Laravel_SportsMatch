<?php

namespace App\Http\Requests;

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
        if($this->path() == 'event')
        {
            return true;
        } else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sport_id' => 'required',
            'prefecture' => 'required',
            // 'title' => 'requrired|string|max:50',
            // 'event_start_date' => 'required|date|after:today',
            // 'event_start_time' => 'required|date|after_or_equal:event_start_date',
            // 'event_start_date' => 'required',
            // 'event_start_time' => 'required',
            // 'apply_end_date' => 'required|date|before:event_start_date',
            // 'apply_end_time' => 'required',
            // 'capacity' => 'integer|between:2,100',
            // 'payment' => 'integer',
            // 'venue' => 'required|max:150',
            // 'address' => 'required|max:150',
            // 'event_imagepath' => 'image',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTicketFormRequest extends FormRequest
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
        $rules =
            [
                'RequestType'=>['required'],
                'department'=>['required'],
                'section' => ['required'],
                'subject'=>['required'],
                'ComplainDetails'=>['required'],
                'priority'=>['required']
            ];
        return $rules;
    }
}

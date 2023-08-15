<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'content'=>'required',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=> 'name   required ',
            // 'name.string'=> 'name   must consist of letters ',
            // 'name.min'=> 'Name   must consist of at least 3 letters ',
            'content.required'=> 'content not be nullable. ',


        ];
    }
}

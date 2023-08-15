<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:5',
            'email'=>'required|email',
            'subject'=> 'required',
            'message'=> 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=> 'name and surname required ',
            'name.string'=> 'name and surname must consist of letters ',
            'name.min'=> 'Name and surname must consist of at least 3 letters ',
            'email.email'=> 'İnvalid email adress ',
            'email.required'=> 'name and surname required ',
            'subject.required'=> 'The subject field cannot be left empty.',
            'message.required'=> 'The message field cannot be left empty. '

        ];
    }
}

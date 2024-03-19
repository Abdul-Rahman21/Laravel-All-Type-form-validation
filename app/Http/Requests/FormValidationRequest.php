<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:5|max:25|regex:/^[a-zA-Z ]+$/u',
            'last_name' => 'required|min:5|max:25|regex:/^[a-zA-Z]+$/u',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|digits:10',
            'password' => 'required|min:5|max:25',
            'password_confirmation' => 'required|min:5|max:25|same:password',
            'messages' => 'required|min:5|max:500|regex:/^[ A-Za-z0-9.,-]*$/',
        ];
    }

    public function messages()
    {
        return [
            "messages.regex" => "Only Alphanumeric, dot,hyphens and comma accepted"
        ];
    }
}

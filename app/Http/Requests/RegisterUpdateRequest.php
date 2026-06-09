<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:registers,email,'.$this->route('id'),
            'password' => 'nullable|min:6',
            'phone' => 'required|digits:10',
            'multiimage' => 'nullable|array',

            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'multiimage.*' => 'image|mimes:jpg,jpeg,png',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.min' => 'The password must be at least 6 characters.',
            'phone.required' => 'The phone field is required.',
            'phone.digits' => 'The phone must be exactly 10 digits.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpg, jpeg, png.',
            'multiimage.*.image' => 'Each file must be an image.',
            'multiimage.*.mimes' => 'Each image must be a file of type: jpg, jpeg, png.',


        ];
    }
}

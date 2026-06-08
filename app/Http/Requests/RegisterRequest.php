<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:registers,email',
            'password' => 'required|min:6',
            'phone' => 'required|digits:10',
            'multiimage' => 'required|array',
            
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'multiimage.*' => 'image|mimes:jpg,jpeg,png|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email must be unique',
            'phone.required' => 'Phone number is required',
            'phone.digits' => 'Phone number must be 10 digits',
            'image.required' => 'Image is required',
            'image.image' => 'File must be an image',
            'image.mimes' => 'Image must be a file of type: png, jpg, jpeg',
            'multiimage.required' => 'Multiple images are required',
            'multiimage.*.image' => 'Each file must be an image',
            'multiimage.*.mimes' => 'Each image must be a file of type: png, jpg, jpeg',
        ];
    }
}

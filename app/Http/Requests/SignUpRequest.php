<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required",
            "email"=>"required|email",
            "password"=>"required|min:4|max:8",
            "image"=>"required"
        ];
    }

    public function message(){
          return [
            "name.required"=>"Name is Required",
            "email.email"=>"Its Not a Email Format",
            "email.required"=>"Email is Required",
          ];
    }
}

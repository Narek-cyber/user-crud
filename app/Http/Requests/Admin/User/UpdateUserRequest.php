<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $id = $this->route('user');

        return [
            'name' => ['required', 'max:100'],
            'email' => [
                'required',
                'string',
                'email',
                'max:150',
                'regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',
                Rule::unique('users')->ignore($id)
            ],
            'address' => ['required', 'string', 'max:150'],
            'phone_number' => ['required', 'string', 'min:9', 'max:20'],
            'password' => ['nullable', 'min:8'],
        ];
    }
}

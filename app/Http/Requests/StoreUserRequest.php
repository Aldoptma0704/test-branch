<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nama' => 'required|unique:user,nama',
            'npm' => 'required|unique:user,npm',
            'kelas_id' => 'required|exists:kelas,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'The name field is required.',
            'npm.required' => 'The NPM field is required.',
            'npm.unique' => 'This NPM is already registered. Please use another NPM.',
            'kelas_id.required' => 'The class field is required.',
            'kelas_id.exists' => 'The selected class is invalid.',
        ];
    }
}

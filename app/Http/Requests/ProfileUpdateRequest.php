<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['nullable', 'string', 'max:255'],
            'patronymic' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date'],
            'address' => ['nullable', 'string', 'max:500'],
            'passport_number' => ['nullable', 'numeric'],
            'passport_series' => ['nullable', 'numeric'],
            'passport_date' => ['nullable', 'date'],
            'passport_address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'phone:RU', Rule::unique(User::class)->ignore($this->user()->id)],
            'bank_number' => ['nullable', 'string', 'max:34'],
            'bank_bic' => ['nullable', 'string', 'max:34'],
            'bank_name' => ['nullable', 'string', 'max:255'],
            'size' => ['nullable', 'numeric', 'max:10'],
            'passport_photo_1' => ['nullable', 'file', 'image', 'max:2000', 'dimensions:min_width=300,min_height=200,max_width=6000,max_height=6000'],
            'passport_photo_2' => ['nullable', 'file', 'image', 'max:4000', 'dimensions:min_width=300,min_height=200,max_width=6000,max_height=6000'],
            'contract_photo' => ['nullable', 'file', 'image', 'max:4000', 'dimensions:min_width=300,min_height=200,max_width=6000,max_height=6000'],
            'employment_photo' => ['nullable', 'file', 'image', 'max:4000', 'dimensions:min_width=300,min_height=200,max_width=6000,max_height=6000'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}

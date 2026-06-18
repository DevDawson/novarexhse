<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactInquiryRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:160',
            'email'   => 'required|email|max:190',
            'phone'   => 'nullable|string|max:30',
            'company' => 'nullable|string|max:160',
            'service' => 'nullable|string|max:120',
            'message' => 'required|string|min:10|max:3000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Your name is required.',
            'email.required'   => 'A valid email address is required.',
            'message.required' => 'Please enter your message.',
            'message.min'      => 'Message must be at least 10 characters.',
        ];
    }
}

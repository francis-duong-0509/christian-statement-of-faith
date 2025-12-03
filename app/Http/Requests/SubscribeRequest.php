<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
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
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'unique:subscribers,email',
            ],
            'name' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email_required' => __t(
                'Vui lòng nhập địa chỉ email',
                'Please provide an email address'
            ),
            'email_email' => __t(
                'Địa chỉ email không hợp lệ',
                'Please provide a valid email address'
            ),
            'email_unique' => __t(
                'Địa chỉ email đã được đăng ký',
                'This email address is already subscribed'
            ),
        ];
    }
}

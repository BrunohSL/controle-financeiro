<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KillAccountRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|string|min:36|max:36',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function wantsJson()
    {
        return true;
    }
}

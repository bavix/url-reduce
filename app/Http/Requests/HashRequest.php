<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HashRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
            'hash' => ['required', 'alpha_num', 'size:5']
        ];
    }

    /**
     * Switching validation on the parameters
     *
     * @param null $keys
     * @return array
     */
    public function all($keys = null): array
    {
        return $this->route()->parameters();
    }

}

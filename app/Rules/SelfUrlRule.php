<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SelfUrlRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $host = \parse_url($value, PHP_URL_HOST);
        return !ends_with($host, request()->getHost());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'You can\'t cut yourself.';
    }

}

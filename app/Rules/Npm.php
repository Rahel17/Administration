<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Npm implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Contoh: Validasi bahwa NPM hanya terdiri dari angka dengan panjang 8 karakter
        return is_string($value) && strlen($value) === 9;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid NPM (8 string characters).';
    }
}
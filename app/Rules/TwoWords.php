<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TwoWords implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $nameValidation = explode(' ', $value);
        return (count($nameValidation) >= 2);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The owner name must consist of at least 2 words.';
    }
}

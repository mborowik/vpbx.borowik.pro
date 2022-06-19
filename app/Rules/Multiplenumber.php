<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Multiplenumber implements Rule
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
        $nr = explode("-", $value);
        if ((int)$nr[0] < (int)$nr[1]) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Popraw numerację i spróbuj jeszcze raz.';
    }
}

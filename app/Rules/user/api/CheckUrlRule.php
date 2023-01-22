<?php

namespace App\Rules\user\api;

use Illuminate\Contracts\Validation\Rule;

class CheckUrlRule implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
        $base_url = parse_url($value,PHP_URL_HOST);

        $myHost = parse_url(url(''),PHP_URL_HOST);;

        if ($base_url === $myHost){
            return false;
        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'لینک غیرمجاز';
    }
}

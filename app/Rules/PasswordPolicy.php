<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordPolicy implements Rule
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
     * Determine if the validation rule passes. 特殊文字 ^$*.[]{}()?"!@#%&/\,><\':;|_~`
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\-+=^$*.\[\]{}()?\"!@#%&\/\\\\,><\':;|_~`\-+=])(?!.*[^a-zA-Z\d\-+=^$*.\[\]{}()?\"!@#%&\/\\\\,><\':;|_~`]).+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'パスワードの強度が足りません。半角英小文字、半角英大文字、半角数字、特殊記号をそれぞれ1種類以上含む8文字以上にしてください。';
    }
}

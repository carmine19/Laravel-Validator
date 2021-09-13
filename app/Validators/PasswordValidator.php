<?php

namespace App\Validators;

use Illuminate\Support\Facades\Hash;

class PasswordValidator
{

    public function validate($attribute, $value, $parameters, $validator)
    {
        return Hash::check($value, optional(auth()->user())->password);
    }
}

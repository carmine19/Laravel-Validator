<?php

namespace App\Rules;

use App\Coupon;
use Illuminate\Contracts\Validation\Rule;

class ValidCoupon implements Rule
{
    private $coupon;
    private $message;
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
        $this->coupon = Coupon::where('code', $value)->first();

        if (!$this->coupon) {
            $this->message = "Coupon Non Valido";
            return false;
        }

        if ($this->coupon->hasExpired()) {
            $this->message = "Coupon Scaduto";
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
        return $this->message;
    }
}

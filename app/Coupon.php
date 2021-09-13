<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    public function hasExpired()
    {
        if (is_null($this->expired_at)) {
            return false;
        }

        return $this->expired_at < now();
    }
}

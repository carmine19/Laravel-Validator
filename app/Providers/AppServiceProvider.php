<?php

namespace App\Providers;

use App\Validators\PasswordValidator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('La password non è corretta!');
                    }
                }
     * @return void
     */
    public function boot()
    {
        //Validator::extend('current_password', PasswordValidator::class);
    }
}

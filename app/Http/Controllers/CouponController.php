<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Rules\ValidCoupon;
use Illuminate\Http\Request;
use App\Rules\CurrentPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('coupon');
    }


    public function store(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'coupon' => ['required', new ValidCoupon()]
        ]);

        return back()->withStatus('Coupon applicato con Successo!');
    }
}

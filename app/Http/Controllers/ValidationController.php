<?php

namespace App\Http\Controllers;

use App\Rules\CurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('validation');
    }


    public function store(Request $request)
    {
        $user = $request->user();
        //dd($user);
        $data = request()->validate([
            'password' => [
                'required',
                new CurrentPassword($user)
            ]
        ]);

        return back()->withStatus('Operazione con Successo!');
    }
}

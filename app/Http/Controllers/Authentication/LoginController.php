<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.template-login');
    }

    public function store(LoginRequest $request)
    {
        $request->validated();

        //return $request->input('email');
        return $request->email;
    }
}

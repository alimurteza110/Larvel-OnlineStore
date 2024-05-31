<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required_without:email|string',
            'email' => 'required_without:name|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)
            ->orWhere('name', $request->name)
            ->first();

        if(!$user or !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $data = [
            'token' => $user->createToken($request->userAgent())->plainTextToken
        ];

        return Response::json($data)->setStatusCode(201);
    }
}

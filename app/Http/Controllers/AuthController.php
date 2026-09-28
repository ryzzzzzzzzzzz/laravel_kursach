<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function registration(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $readerRole = Role::where('name', 'reader')->firstOrFail();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $readerRole->id,
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Регистрация успешно завершена. Войдите в аккаунт.');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ])) {
            return back()
                ->withErrors([
                    'email' => 'Неверный email или пароль.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        $token = $user->createToken('web-auth');

        session([
            'sanctum_token_id' => $token->accessToken->id,
        ]);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user && session()->has('sanctum_token_id')) {
            $user->tokens()
                ->where('id', session('sanctum_token_id'))
                ->delete();
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
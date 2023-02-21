<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request){
        //dd($request->input('remember')); <= IMPRIME EL VALOR DE UN CAMPO EN EL NAVEGADOR EN FORMATO JSON
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string','max:255'],
        ]);

        if ( ! Auth::attempt($credentials,$request->boolean('remember'))){
            throw ValidationException::withMessages([
                'email' => __('auth.failed') //Va a la carpeta lang
            ]);
        };

        $request->session()->regenerate();

        return redirect()->intended('/')->with('status','You are logged in');

    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('home')->with('status', 'You are logged out!');

    }
}

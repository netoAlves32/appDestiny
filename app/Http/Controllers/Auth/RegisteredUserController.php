<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Validation\Rules; //Importar siempre que se usen las Rules/Passwords
use Illuminate\Http\Request;


class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::default()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), //Has::make($request->password) is the same

        ]);

        return to_route('login')->with('status','Account created!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate(
                [
                    'user_email' => 'required|email',
                    'user_password' => 'required|min:8'
                ],
                [
                    'user_email.required' => 'Debes ingresar el correo',
                    'user_email.email' => 'el correo debe ser valido',
                    'user_password.required' => 'Debes ingresar la contraseña',
                    'user_password.min' => 'La contraseña debe tener minimo 8 caracteres'
                ]
            );

            $user = User::where('user_email', $request->get('user_email'))->first();

            if (!$user) throw new Exception("El usuario no existe");

            if (!Hash::check($request->get('user_password'), $user->user_password)) {
                throw new Exception("La contraseña es incorrecta");
            }

            Auth::login($user);

            if ($user->rol_id == 1) {
                return redirect('/rooms');
            } else {
                return redirect('/dashboard');
            }

        } catch (ValidationException $error) {
            return redirect()->back()->withErrors($error->errors())->withInput();
        } catch (\Exception $error) {
            return redirect()->back()->with('error', $error->getMessage())->withInput();
        }
    }
}

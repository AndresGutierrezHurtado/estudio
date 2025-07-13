<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use App\Models\Administrative;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate(
                [
                    'user_email' => 'required|email',
                    'user_password' => 'required|min:8',
                ],
                [
                    'user_email.required' => 'El correo electrónico es requerido',
                    'user_email.required' => 'El correo electrónico ingresado debe ser válido',
                    'user_password.required' => 'La contraseña es requerida',
                    'user_password.min' => 'La contraseña debe tener mínimo 8 carácteres',
                ]
            );

            $user = User::where('user_email', $request->input('user_email'))->first();

            if (!$user) {
                throw new \Exception("El usuario no existe", 404);
            }

            $passwordCheck = Hash::check($request->input('user_password'), $user->user_password);

            if (!$passwordCheck) {
                throw new \Exception("La contaseña es incorrecta", 402);
            }

            Auth::login($user, true);

            if ($user->role_id === 2) {
                return redirect('/admin/calls');
            } else {
                return redirect('/calls');
            }
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput($request->all());
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput($request->all());
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate(
                [
                    'user_name' => 'required|string',
                    'user_lastname' => 'required|string',
                    'user_email' => 'required|email',
                    'user_password' => 'required|min:8',
                    'student_institution' => 'sometimes|string|min:5',
                    'student_birth' => 'sometimes|date',
                ],
                [
                    'user_name.required' => 'El nombre es requerido',
                    'user_name.string' => 'El nombre debe ser una cadena de texto',
                    'user_lastname.required' => 'Los apellidos son requeridos',
                    'user_lastname.string' => 'Los apellidos deben ser una cadena de texto',
                    'user_email.required' => 'El correo electrónico es requerido',
                    'user_email.required' => 'El correo electrónico ingresado debe ser válido',
                    'user_password.required' => 'La contraseña es requerida',
                    'user_password.min' => 'La contraseña debe tener mínimo 8 carácteres',
                    'student_institution.string' => 'La institucion debe ser una cadena de texto',
                    'student_institution.min' => 'La institucion debe tener minimo 5 caracteres',
                    'student_birth.date' => 'Tu nacimiento debe ser una fecha',
                ]
            );

            DB::transaction(function () use ($request) {
                $user = User::create($request->all());

                if ($user->role_id === 1) {
                    Student::create([
                        'user_id' => $user->user_id,
                        'student_institution' => $request->input('student_institution'),
                        'student_birth' => $request->input('student_birth'),
                    ]);
                } else {
                    Administrative::create([
                        'user_id' => $user->user_id,
                    ]);
                }

                return redirect('login')->with('success', 'cuenta creada exitosamente');
            });
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput($request->all());
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput($request->all());
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            return redirect('/');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput($request->all());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Enviar al usuario a Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Recibir los datos después de iniciar sesión
    public function callback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Buscar si ya existe este usuario de Google
            $user = User::where(
                'google_id',
                $googleUser->getId()
            )->first();

            if (!$user) {
                $email = $googleUser->getEmail();

                if (!$email) {
                    return redirect()->route('login')
                        ->withErrors([
                            'email' => 'Google no proporcionó un correo.'
                        ]);
                }

                // Evitar duplicar cuentas con el mismo correo
                if (User::where('email', $email)->exists()) {
                    return redirect()->route('login')
                        ->withErrors([
                            'email' => 'Este correo ya está registrado. Inicia sesión con tu contraseña.'
                        ]);
                }

                // Registrar al usuario por primera vez
                $user = User::create([
                    'name' => $googleUser->getName()
                        ?: 'Usuario Google',
                    'email' => $email,
                    'google_id' => $googleUser->getId(),
                    'dni' => null,
                    'password' => null,
                ]);
            }

            // Iniciar sesión en Laravel
            Auth::login($user);

            // Proteger la sesión
            $request->session()->regenerate();

            // Enviar al dashboard
            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            report($e);

            return redirect()->route('login')
                ->withErrors([
                    'email' => 'No se pudo iniciar sesión con Google.'
                ]);
        }
    }
}

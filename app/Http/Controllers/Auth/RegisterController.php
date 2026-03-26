<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users',
                function ($attribute, $value, $fail) {
                // Correo personal permitido SOLO para el administrador
                $adminEmail = 'walter.avr0102@gmail.com';

                if ($value !== $adminEmail && !str_ends_with($value, '@uagraria.edu.ec')) {
                    $fail('Solo se permite el correo institucional (@uagraria.edu.ec)');
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     protected function create(array $data)
    {

        $email = $data['email'];


        // 🧠 Usuario antes del @
        $username = explode('@', $email)[0];


        // 🧠 Contar puntos
        $puntos = substr_count($username, '.');


        // 🎯 Determinar rol
        if ($email === 'walter.avr0102@gmail.com') {
        $rol = 'Adminsitrador';
        } elseif ($puntos >= 2) {
        $rol = 'Estudiante';
        } else {
        $rol = 'Docente';
        }


        // 👤 Crear usuario
        $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        ]);
        // 🔑 ASIGNAR ROL (FORMA CORRECTA)
        $user->assignRole($rol);
        return $user;
    }
}

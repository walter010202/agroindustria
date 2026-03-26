<?php

return [

    'failed'   => 'El correo o la contraseña son incorrectos.',
    'password' => 'La contraseña es incorrecta.',
    'throttle' => 'Demasiados intentos. Por favor intenta de nuevo en :seconds segundos.',

];

return [

    'required' => 'El campo :attribute es obligatorio.',
    'email'    => 'El campo :attribute debe ser un correo electrónico válido.',
    'unique'   => 'El :attribute ya está registrado.',
    'numeric'  => 'El campo :attribute debe contener solo números.',
    'digits'   => 'El campo :attribute debe tener exactamente :digits dígitos.',

    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],

    'max' => [
        'string' => 'El campo :attribute no debe superar los :max caracteres.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Mensajes personalizados
    |--------------------------------------------------------------------------
    */

    'custom' => [

        'telefono' => [
            'digits' => 'El teléfono debe tener exactamente 10 dígitos.',
        ],

        'ci' => [
            'digits' => 'La cédula debe tener exactamente 10 dígitos.',
        ],

        'email' => [
            'unique' => 'El correo electrónico ya está registrado.',
        ],

        'foto' => [
            'image' => 'La foto debe ser una imagen válida.',
            'mimes' => 'La foto debe estar en formato JPG, PNG o JPEG.',
        ],

        // 👇 Mensaje especial para foto de perfil humano
        'foto_perfil' => [
            'human' => 'La foto debe ser de un rostro humano visible.',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Nombres amigables de atributos
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'email'               => 'correo institucional',
        'ci'                  => 'cédula',
        'telefono'            => 'teléfono',
        'numero_emergencia'   => 'número de emergencia',
        'foto'                => 'foto',
        'foto_perfil'         => 'foto de perfil',
    ],

];

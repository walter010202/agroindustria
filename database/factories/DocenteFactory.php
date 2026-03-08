<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nombres = $this->faker->firstName;
        $apellidos = $this->faker->lastName;
        $ci = $this->faker->unique()->numerify('##########');

        $usuario = User::create([
            'name' => $nombres . " " . $apellidos,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt($ci)
        ]);

        $usuario->assignRole('Docente');

        // 1️⃣ Seleccionamos la facultad primero
        $facultad = $this->faker->randomElement([
            'Facultad de Ciencias Agrarias',
            'Facultad de Economía Agrícola',
            'Facultad de Medicina Veterinaria y Zootecnia'
        ]);

        // 2️⃣ Definimos las carreras según la facultad
        switch ($facultad) {

            case 'Facultad de Ciencias Agrarias':
                $carreras = [
                    'Agroindustria',
                    'Agronomía',
                    'Ambiental',
                    'Ciencias de la Computación'
                ];
                break;

            case 'Facultad de Economía Agrícola':
                $carreras = [
                    'Economía',
                    'Economía Agrícola'
                ];
                break;

            case 'Facultad de Medicina Veterinaria y Zootecnia':
                $carreras = [
                    'Medicina Veterinaria'
                ];
                break;

            default:
                $carreras = [];
        }

        return [
            'usuario_id' => $usuario->id,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'ci' => $ci,
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2000-12-31'),
            'telefono' => $this->faker->numerify('09########'),
            'profesion' => $this->faker->randomElement(['Ingeniero/a', 'Licenciado/a', 'Economista']),
            'sede' => $this->faker->randomElement(['Guayaquil', 'Milagro', 'El triunfo']),
            'facultad' => $facultad,
            'carrera' => $this->faker->randomElement($carreras), // 👈 ahora depende de la facultad
            'direccion' => $this->faker->address,
            'foto' => 'docente.jpg',
        ];
    }
}

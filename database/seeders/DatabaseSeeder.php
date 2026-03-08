<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrativo;
use App\Models\Estudiante;
use App\Models\Laboratorio;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Semestre;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create(['name'=>'Administrador']);
        Role::create(['name'=>'Docente']);
        Role::create(['name'=>'Estudiante']);
        Role::create(['name'=>'Administrativo']);


        User::create([
            'name'=>'Walter Andrés Vélez Rapel',
            'email'=>'walter.avr0102@gmail.com',
            'password'=>Hash::make('12345678')

        ])->assignRole('Administrador');

        Periodo::create(['nombre'=>'I-2026']);
        Periodo::create(['nombre'=>'II-2026']);

        Semestre::create(['nombre'=>'1 SEMESTRE']);
        Semestre::create(['nombre'=>'2 SEMESTRE']);
        Semestre::create(['nombre'=>'3 SEMESTRE']);
        Semestre::create(['nombre'=>'4 SEMESTRE']);
        Semestre::create(['nombre'=>'5 SEMESTRE']);
        Semestre::create(['nombre'=>'6 SEMESTRE']);
        Semestre::create(['nombre'=>'7 SEMESTRE']);
        Semestre::create(['nombre'=>'8 SEMESTRE']);
        Semestre::create(['nombre'=>'9 SEMESTRE']);
        Semestre::create(['nombre'=>'10 SEMESTRE']);

        Materia::create(['nombre'=>'Química Inorgánica']);
        Materia::create(['nombre'=>'Biología Celular y Molecular']);
        Materia::create(['nombre'=>'Biofísica']);
        Materia::create(['nombre'=>'Química Analítica']);
        Materia::create(['nombre'=>'Química Orgánica']);
        Materia::create(['nombre'=>'Bio Matemática']);
        Materia::create(['nombre'=>'Toxicología']);
        Materia::create(['nombre'=>'Microbiología de los Alimentos']);
        Materia::create(['nombre'=>'Bioquímica de los Alimentos']);
        Materia::create(['nombre'=>'Química Instrumental']);
        Materia::create(['nombre'=>'Nutrición Humana']);
        Materia::create(['nombre'=>'Análisis de Alimentos']);
        Materia::create(['nombre'=>'Biotecnología Agroindustrial']);
        Materia::create(['nombre'=>'Parasitología de los Alimentos']);
        Materia::create(['nombre'=>'Producción de Materia Prima Vegetal']);
        Materia::create(['nombre'=>'Empaque y Emabalaje']);
        Materia::create(['nombre'=>'Nutrición Animal']);
        Materia::create(['nombre'=>'Producción de Materia Prima']);
        Materia::create(['nombre'=>'Diseño Experimental']);
        Materia::create(['nombre'=>'Diseño de Plantas Industriales']);
        Materia::create(['nombre'=>'Control de Calidad']);
        Materia::create(['nombre'=>'Fenómenos de Transportes']);
        Materia::create(['nombre'=>'Post-Cosecha']);
        Materia::create(['nombre'=>'Termodinámica']);
        Materia::create(['nombre'=>'Optimización de Procesos']);
        Materia::create(['nombre'=>'Procesamientos Agroindustriales: Innovación y Desarrollo de Productos']);
        Materia::create(['nombre'=>'Industria de la Leche']);
        Materia::create(['nombre'=>'Insdustria Acuícola y Pesquera']);
        Materia::create(['nombre'=>'Procesamientos Agroindustriales: Operación y Mantenimiento de Equipos Agroindustrailes']);
        Materia::create(['nombre'=>'Industrialización de Carne']);
        Materia::create(['nombre'=>'Industria Azucarera y Panelera']);
        Materia::create(['nombre'=>'ITINERARIO I - Procesamientos Agroindustriales: Aprovechamiento de Desechos Agroindustriales']);
        Materia::create(['nombre'=>'Industrialización de Frutas y Hortalizas']);
        Materia::create(['nombre'=>'Industria de Cereales y Oleaginosas']);
        Materia::create(['nombre'=>'Industria Pecuaria No Comestible']);
        Materia::create(['nombre'=>'Industrialización de Cacao, Café, Caña de Azucar y Plantas Aromáticas']);
        Materia::create(['nombre'=>'Industrialización de productos Agrícolas no Comestibles']);

        Laboratorio::create(['nombre'=>'Laboratorio de Cárnicos',
                            'descripcion'=>'Se dedica al análisis científico de la carne y sus derivados para asegurar calidad, seguridad alimentaria y cumplimiento normativo',
                            'estado'=>'Activo']);
        Laboratorio::create(['nombre'=>'Laboratorio de Lácteos',
                            'descripcion'=>'Es una instalación dedicada al análisis, control de calidad y desarrollo de productos lácteos',
                            'estado'=>'Activo']);
        Laboratorio::create(['nombre'=>'Laboratorio de Químicos Alimentícios',
                            'descripcion'=>'Espacio especializado para analizar la composición, calidad, seguridad e inocuidad de los alimentos mediante ensayos físico-químicos y microbiológicos',
                            'estado'=>'Activo']);
        Laboratorio::create(['nombre'=>'Laboratorio de Microbiología',
                            'descripcion'=>'Es un espacio especializado para estudiar, identificar y manipular microorganismos',
                            'estado'=>'Activo']);
        Laboratorio::create(['nombre'=>'Laboratorio de Análisis Sensorial',
                            'descripcion'=>'Espacio técnico y controlado dedicado a evaluar productos principalmente alimentos y bebidas utilizando los sentidos humanos como instrumentos de medición',
                            'estado'=>'Inactivo']);
        Laboratorio::create(['nombre'=>'Laboratorio de Planta Piloto',
                            'descripcion'=>'Instalación industrial a escala reducida diseñada para reproducir, validar y optimizar procesos químicos, físicos o biológicos antes de pasar a la producción comercial completa.',
                            'estado'=>'Activo']);

        /*$usuario= User::create([
            'name'=>'Estudiante Ejemplo',
            'email'=>'estudiante@example.com',
            'password'=>Hash::make('11223344')

        ])->assignRole('Estudiante');

        Estudiante::create([
            'usuario_id'=> $usuario->id,
            'nombres'=>'Carlos',
            'apellidos'=>'Gómez',
            'ci'=>'0974748277',
            'fecha_nacimiento'=>'2005-03-15',
            'telefono'=>'0974648332',
            'ref_celular'=>'0967588574',
            'persona_emergencia'=>'Padre',
            'numero_emergencia'=>'0967463847',
            'direccion'=>'Calle 456, Ciudad Ejmeplo',
            'foto'=>'foto.jpg'
        ]);*/

        $this->call([EstudianteSeeder::class]);
        $this->call([DocenteSeeder::class]);

    }
}

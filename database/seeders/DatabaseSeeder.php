<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrativo;
use App\Models\Configuracion;
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

        $this->call([RoleSeeder::class]);

        Configuracion::create([
            'nombre'=>'Universidad Agraria del Ecuador',
            'facultad'=>'Ciencias Agrarias',
            'descripcion'=>'"FORMANDO A LOS MISIONEROS DE LA TÉCNICA EN EL AGRO"',
            'direccion'=>'Av. 25 de Julio y Pío Jaramillo, Guayaquil, Ecuador',
            'codigo_postal'=>'090104',
            'telefono'=>'(04) 2439995 - 2439394',
            'web'=>'https://www.uagraria.edu.ec/',
            'logo'=>'img/logo_uae.png',
            'facebook'=>'@uae.agraria',
            'instagram'=>'@uae.agraria',
            'twitter'=>'@uae_agraria',
        ]);

        //Role::create(['name'=>'Administrador']);
        //Role::create(['name'=>'Docente']);
        //Role::create(['name'=>'Estudiante']);
        //Role::create(['name'=>'Administrativo']);


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
        Laboratorio::create(['nombre'=>'Laboratorio de Química de Alimentos',
                            'descripcion'=>'Espacio especializado para analizar la composición, calidad, seguridad e inocuidad de los alimentos mediante ensayos físico-químicos y microbiológicos',
                            'estado'=>'Activo']);
        Laboratorio::create(['nombre'=>'Laboratorio de Microbiología',
                            'descripcion'=>'Es un espacio especializado para estudiar, identificar y manipular microorganismos',
                            'estado'=>'Activo']);
        Laboratorio::create(['nombre'=>'Laboratorio de Análisis Sensorial',
                            'descripcion'=>'Espacio técnico y controlado dedicado a evaluar productos principalmente alimentos y bebidas utilizando los sentidos humanos como instrumentos de medición',
                            'estado'=>'Activo']);
        Laboratorio::create(['nombre'=>'Planta Piloto',
                            'descripcion'=>'Instalación industrial a escala reducida diseñada para reproducir, validar y optimizar procesos químicos, físicos o biológicos antes de pasar a la producción comercial completa.',
                            'estado'=>'Activo']);

        $usuario= User::create([
            'name'=>'Alba Medina Rodríguez',
            'email'=>'amedina@uagraria.edu.ec',
            'password'=>Hash::make('23456789')

        ])->assignRole('Administrativo');

        Administrativo::create([
            'usuario_id'=> $usuario->id,
            'nombres'=>'Alba',
            'apellidos'=>'Medina Rodríguez',
            'ci'=>'0908553563',
            'telefono'=>'0991131065',
            'direccion'=>'Av. 25 de Julio, Guayaquil 090104',
            'profesion'=>'Ingeniera agrónoma',
            'fecha_nacimiento'=>'1986-06-12',
        ]);

        $this->call([EstudianteSeeder::class]);
        $this->call([DocenteSeeder::class]);

        
    }
}

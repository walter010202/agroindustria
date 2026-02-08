<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semestre;
use App\Models\Materia;
class AdminController extends Controller
{
    //
    public function index()
    {
        $total_semestres=Semestre::count();
        $total_materias=Materia::count();
        return view('admin.index', compact('total_semestres',
                                            'total_materias',));
    }
}

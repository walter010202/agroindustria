@extends('adminlte::page')

@section('content_header') 
    <h1><b>Registro de Grupos academicos del docente </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Datos del docente</h3>
                </div>

                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Busque sus datos:</label>
                                    <select name="" id="buscar_docente" class="form-control select2">
                                        <option value="">Buscar sus datos...</option>
                                        @foreach($docentes as $docente)
                                        <option value="{{$docente->id}}"
                                        {{ $docente->id == $grupoAcademico->docente_id ? 'selected' : '' }}>{{$docente->apellidos." ".$docente->nombres." - ".$docente->ci}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="datos_docente" style="display:block">
                            <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <p id="nombres">{{$grupoAcademico->docente->nombres}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <p id="apellidos">{{$grupoAcademico->docente->apellidos}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Cédula</label>
                                            <p id="ci">{{$grupoAcademico->docente->ci}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <p id="fecha_nacimiento">{{$grupoAcademico->docente->fecha_nacimiento}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Teléfono</label>
                                            <p id="telefono">{{$grupoAcademico->docente->telefono}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Profesion</label>
                                            <p id="profesion">{{$grupoAcademico->docente->profesion}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Sede</label>
                                            <p id="sede">{{$grupoAcademico->docente->sede}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Facultad</label>
                                            <p id="facultad">{{$grupoAcademico->docente->facultad}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Carrera</label>
                                            <p id="carrera">{{$grupoAcademico->docente->carrera}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <p id="email">{{$grupoAcademico->docente->usuario->email}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <p id="direccion">{{$grupoAcademico->docente->direccion}}</p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{url($grupoAcademico->docente->foto)}}" id="foto_docente" width="80%" alt="fotografia del docente">
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Modifique los datos para la actualización del grupo academico</h3>
                    </div>

                    <div class="card-body">
                            <form action="{{ route('admin.grupos_academicos.update', $grupoAcademico->id) }}" method="POST">
                               @csrf
                               @method('PUT')
                                <div class="row">
                                    <input type="hidden" id="docente_id" name="docente_id" value="{{ $grupoAcademico->docente_id }}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Periódo académico</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <select name="periodo_id" id="" class="form-control select2" required>
                                                    <option value="">Seleccione el periodo Academico...</option>
                                                    @foreach ($periodos as $periodo)
                                                        <option value="{{$periodo->id}}"
                                                        {{ old('periodo_id', $periodo->id) == $grupoAcademico->periodo_id ? 'selected':''}}
                                                        >{{$periodo->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Semestre academico</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <select name="semestre_id" id="" class="form-control select2" required>
                                                    <option value="">Seleccione el semestre que esta cursando...</option>
                                                    @foreach ($semestres as $semestre)
                                                        <option value="{{$semestre->id}}"
                                                        {{old('semestre_id', $semestre->id) == $grupoAcademico->semestre_id ? 'selected':''}}
                                                        >{{$semestre->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Paralelo </label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                                                </div>
                                                <select class="form-control select2" name="paralelo" required>
                                                    <option value="">Seleccione el paralelo</option>
                                                    <option value="A" {{ old('paralelo', $grupoAcademico->paralelo) == 'A' ? 'selected' : '' }}>A</option>
                                                    <option value="B" {{ old('paralelo', $grupoAcademico->paralelo) == 'B' ? 'selected' : '' }}>B</option>
                                                    <option value="C" {{ old('paralelo', $grupoAcademico->paralelo) == 'C' ? 'selected' : '' }}>C</option>
                                                    <option value="D" {{ old('paralelo', $grupoAcademico->paralelo) == 'D' ? 'selected' : '' }}>D</option>
                                                    <option value="E" {{ old('paralelo', $grupoAcademico->paralelo) == 'E' ? 'selected' : '' }}>E</option>
                                                    <option value="F" {{ old('paralelo', $grupoAcademico->paralelo) == 'F' ? 'selected' : '' }}>F</option>
                                                </select>
                                            </div>
                                            @error('paralelo')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <label>Materia<b>(*)</b></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select name="materia_id" class="form-control select2" required>
                                            <option value="">Seleccione la materia...</option>
                                            @foreach ($materias as $materia)
                                                <option value="{{ $materia->id }}"
                                                {{ old('materia_id', $materia->id) == $grupoAcademico->materia_id ? 'selected':''}}
                                                >{{$materia->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <label>Cantidad de estudiantes *</label>
                                        <input type="number"
                                            name="cant_estudiantes"
                                            class="form-control"
                                            min="1"
                                            required
                                            placeholder="cantidad de estudiantes"
                                            value="{{$grupoAcademico->cant_estudiantes}}">
                                    </div> 
                                </div>
                                
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- Botones --}}
                                        <div class="form-group">
                                            <a href="{{ url('/admin/grupos_academicos') }}" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
            {{-- ================= HISTORIAL ACADÉMICO ================= --}}
        <div class="row mt-3">
            <div class="col-12">
                <div class="card card-success" id="historial_academico">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-history"></i> Historial Académico</h3>
                    </div>

                    <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered mb-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Período</th>
                                                    <th>Semestre</th>
                                                    <th>Paralelo</th>
                                                    <th>Materia</th>
                                                    <th class="text-center">Estudiantes</th>
                                                </tr>
                                            </thead>
                                            <tbody id="contenido_historial">

                                                @if($grupoAcademico->docente && $grupoAcademico->docente->gruposAcademicos->count() > 0)

                                                    @foreach ($grupoAcademico->docente->gruposAcademicos as $grupo)
                                                        <tr>
                                                            <td>{{ $grupo->periodo->nombre ?? '-' }}</td>
                                                            <td>{{ $grupo->semestre->nombre ?? '-' }}</td>
                                                            <td>
                                                                <span class="badge badge-info">
                                                                    {{ $grupo->paralelo }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $grupo->materia->nombre ?? '-' }}</td>
                                                            <td class="text-center">
                                                                <span class="badge badge-success">
                                                                    {{ $grupo->cant_estudiantes }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted p-3">
                                                            No hay historial académico registrado
                                                        </td>
                                                    </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

@stop 

@section('css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
.select2-container .select2-selection--single {
    height: 38px !important;
}
.select2-selection__rendered {
    line-height: 36px !important;
}
.select2-selection__arrow {
    height: 36px !important;
}
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.select2').select2({ });
    $(document).ready(function(){
        var docenteSeleccionado = $('#buscar_docente').val();
        if(docenteSeleccionado){
            $('#historial_academico').show();
            $('#historial_academico_pre').hide();
        }

    });
    $('#buscar_docente').on('change', function(){
        var id = $(this).val();
        if(id){
            $.ajax({
                url:"{{url('/admin/grupos_academicos/buscar_docente')}}" + '/' +id,
                type:'GET',
                success:function(docente){
                    console.log(docente);
                    $('#nombres').html(docente.nombres);
                    $('#apellidos').html(docente.apellidos);
                    $('#ci').html(docente.ci);
                    $('#fecha_nacimiento').html(docente.fecha_nacimiento);
                    $('#telefono').html(docente.telefono);
                    $('#profesion').html(docente.profesion);
                    $('#sede').html(docente.sede);
                    $('#facultad').html(docente.facultad);
                    $('#carrera').html(docente.carrera);
                    $('#email').html(docente.usuario.email);
                    $('#direccion').html(docente.direccion);
                    $('#foto_docente').attr('src', docente.foto_url).show();
                    $('#datos_docente').css('display','block');                    
                    $('#docente_id').val(docente.id);

                    if(docente.grupos_academicos && docente.grupos_academicos.length > 0){

                        let filas = '';

                        docente.grupos_academicos.forEach(function (grupo) {

                            filas += `
                                <tr>
                                    <td>${grupo.periodo?.nombre ?? '-'}</td>
                                    <td>${grupo.semestre?.nombre ?? '-'}</td>
                                    <td><span class="badge badge-info">${grupo.paralelo}</span></td>
                                    <td>${grupo.materia?.nombre ?? '-'}</td>
                                    <td class="text-center">
                                        <span class="badge badge-success">${grupo.cant_estudiantes}</span>
                                    </td>
                                </tr>
                            `;
                        });

                        $('#contenido_historial').html(filas);

                    }else{

                        $('#contenido_historial').html(`
                            <tr>
                                <td colspan="5" class="text-center text-muted p-3">
                                    No hay historial académico registrado
                                </td>
                            </tr>
                        `);
                    }
                },error:function(){
                    alert("No se pudo obtener la información del docente")
                }

            });

        }
    });
</script>

@stop


@extends('adminlte::page')

@section('content_header') 
    <h1><b>Registro de Grupos academicos del docente </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
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
                                        <option value="{{$docente->id}}">{{$docente->apellidos." ".$docente->nombres." - ".$docente->ci}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="datos_docente" style="display:none">
                            <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <p id="nombres"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <p id="apellidos"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Cédula</label>
                                            <p id="ci"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <p id="fecha_nacimiento"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Teléfono</label>
                                            <p id="telefono"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Profesion</label>
                                            <p id="profesion"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Sede</label>
                                            <p id="sede"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Facultad</label>
                                            <p id="facultad"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Carrera</label>
                                            <p id="carrera"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <p id="email"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <p id="direccion"></p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="" id="foto_docente" width="80%" alt="fotografia del docente">
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos para la inscripcion</h3>
                    </div>

                    <div class="card-body">
                            <form action="{{ route('admin.grupos_academicos.store') }}" method="POST">
                                @csrf 
                                <div class="row">
                                    <input type="text" id="docente_id" name="docente_id" hidden>
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
                                                        <option value="{{$periodo->id}}">{{$periodo->nombre}}</option>
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
                                                        <option value="{{$semestre->id}}">{{$semestre->nombre}}</option>
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
                                                    <option value="A" {{ old('paralelo') == 'A' ? 'selected' : '' }}>A</option>
                                                    <option value="B" {{ old('paralelo') == 'B' ? 'selected' : '' }}>B</option>
                                                    <option value="C" {{ old('paralelo') == 'C' ? 'selected' : '' }}>C</option>
                                                    <option value="D" {{ old('paralelo') == 'D' ? 'selected' : '' }}>D</option>
                                                    <option value="E" {{ old('paralelo') == 'E' ? 'selected' : '' }}>E</option>
                                                    <option value="F" {{ old('paralelo') == 'F' ? 'selected' : '' }}>F</option>
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
                                                <option value="{{ $materia->id }}">{{$materia->nombre}}</option>
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
                                            placeholder="cantidad de estudiantes">
                                    </div> 
                                </div>
                                
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- Botones --}}
                                        <div class="form-group">
                                            <a href="{{ url('/admin/grupos_academicos') }}" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="historial_academico" style="display:none">
                <div class="col-12">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Historial Académico</h3>
                    </div>
                    <div class="card-body">
                        <div id="tabla_historial"></div>
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
                    $('#historial_academico').css('display','block');
                    $('#docente_id').val(docente.id);

                    if(docente.grupos_academicos && docente.grupos_academicos.length > 0){
                        var tabla = '<table class="table table-bordered">';
                            tabla+='<thead><tr><th>Periódo</th><th>Semestre</th><th>Paralelo</th><th>Materia</th><th>Cantidad de estudiantes</th></tr></thead>';
                            tabla+='<tbody>';
                                docente.grupos_academicos.forEach(function (grupo) {
                                    tabla+='<tr>';
                                    tabla+='<td>' + grupo.periodo.nombre + '</td>';
                                    tabla+='<td>' + grupo.semestre.nombre + '</td>';
                                    tabla+='<td>' + grupo.paralelo + '</td>';
                                    tabla+='<td>' + grupo.materia.nombre + '</td>';
                                    tabla+='<td>' + grupo.cant_estudiantes + '</td>';
                                    tabla+='</tr>'; 
                                });
                            tabla+='</table>';
                        $('#tabla_historial').html(tabla).show();
                    }else{
                        $('#tabla_historial').html('<p>No hay historial academico registrado del docente</p>').show();
                    }
                },error:function(){
                    alert("No se pudo obtener la información del docente")
                }

            });

        }
    });
</script>

@stop


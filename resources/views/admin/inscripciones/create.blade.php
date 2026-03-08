@extends('adminlte::page')

@section('content_header') 
    <h1><b>Resgistro de Inscripcion del Laboratorio</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del estudiante</h3>
                </div>

                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Busque sus datos para la inscripcion:</label>
                                    <select name="" id="buscar_estudiante" class="form-control select2">
                                        <option value="">Buscar sus datos para la inscripcion...</option>
                                        @foreach($estudiantes as $estudiante)
                                        <option value="{{$estudiante->id}}">{{$estudiante->apellidos." ".$estudiante->nombres." - ".$estudiante->ci}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="datos_estudiante" style="display:none">
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
                                            <label for="">Referencia de celular</label>
                                            <p id="ref_celular"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Persona de emergencia</label>
                                            <p id="persona_emergencia"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Numero de emergencia</label>
                                            <p id="numero_emergencia"></p>
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
                                <img src="" id="foto_estudiante" width="80%" alt="fotografia del estudiante">
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
                            <form action="{{ route('admin.inscripciones.store') }}" method="POST">
                                @csrf 
                                <div class="row">
                                    <input type="text" id="estudiante_id" name="estudiante_id" hidden>
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
                                            <label for="Sede">Sede</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <select class="form-control select2" name="sede" required>
                                                    <option value="">Seleccione la sede....</option>
                                                    <option value="Guayaquil" {{ old('sede') == 'Guayaquil' ? 'selected' : '' }}>Guayaquil</option>
                                                    <option value="Milagro" {{ old('sede') == 'Milagro' ? 'selected' : '' }}>Milagro</option>
                                                    <option value="El triunfo" {{ old('sede') == 'El triunfo' ? 'selected' : '' }}>El triunfo</option>
                                                </select>
                                            </div>
                                            @error('sede')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror      
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Facultad</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>

                                                <select class="form-control select2" name="facultad" required>
                                                    <option value="">Seleccione la facultad</option>
                                                    <option value="Facultad de Ciencias Agrarias" {{ old('facultad') == 'Facultad de Ciencias Agrarias' ? 'selected' : '' }}>Facultad de Ciencias Agrarias</option>
                                                    <option value="Facultad de Economía Agrícola" {{ old('facultad') == 'Facultad de Economía Agrícola' ? 'selected' : '' }}>Facultad de Economía Agrícola</option>
                                                    <option value="Facultad de Medicina Veterinaria y Zootecnia" {{ old('facultad') == 'Facultad de Medicina Veterinaria y Zootecnia' ? 'selected' : '' }}>Facultad de Medicina Veterinaria y Zootecnia</option>
                                                </select>
                                            </div>
                                            @error('facultad')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror 
                                        </div>
                                    </div>

                                    {{-- Carrera --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Carrera</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                                </div>
                                                <select class="form-control select2" name="carrera" required>
                                                    <option value="">Seleccione la carrera</option>
                                                    <option value="Agronomía" {{ old('carrera') == 'Agronomía' ? 'selected' : '' }}>Agronomía</option>
                                                    <option value="Agroindustria" {{ old('carrera') == 'Agroindustria' ? 'selected' : '' }}>Agroindustria</option>
                                                    <option value="Ambiental" {{ old('carrera') == 'Ambiental' ? 'selected' : '' }}>Ambiental</option>
                                                    <option value="Economía" {{ old('carrera') == 'Economía' ? 'selected' : '' }}>Economía</option>
                                                    <option value="Economía Agrícola" {{ old('carrera') == 'Economía Agrícola' ? 'selected' : '' }}>Economía Agrícola</option>
                                                    <option value="Medicina Veterinaria" {{ old('carrera') == 'Medicina Veterinaria' ? 'selected' : '' }}>Medicina Veterinaria</option>
                                                </select>
                                            </div>
                                            @error('carrera')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror      
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
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- Botones --}}
                                        <div class="form-group">
                                            <a href="{{ url('/admin/inscripciones') }}" class="btn btn-secondary">Cancelar</a>
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
    $('#buscar_estudiante').on('change', function(){
        var id = $(this).val();
        if(id){
            $.ajax({
                url:"{{url('/admin/inscripciones/buscar_estudiante')}}" + '/' +id,
                type:'GET',
                success:function(estudiante){
                    $('#nombres').html(estudiante.nombres);
                    $('#apellidos').html(estudiante.apellidos);
                    $('#ci').html(estudiante.ci);
                    $('#fecha_nacimiento').html(estudiante.fecha_nacimiento);
                    $('#telefono').html(estudiante.telefono);
                    $('#ref_celular').html(estudiante.ref_celular);
                    $('#persona_emergencia').html(estudiante.persona_emergencia);
                    $('#numero_emergencia').html(estudiante.numero_emergencia);
                    $('#email').html(estudiante.usuario.email);
                    $('#direccion').html(estudiante.direccion);
                    $('#foto_estudiante').attr('src', estudiante.foto_url).show();
                    $('#datos_estudiante').css('display','block');
                    $('#historial_academico').css('display','block');
                    $('#estudiante_id').val(estudiante.id);

                    if(estudiante.inscripciones && estudiante.inscripciones.length > 0){
                        var tabla = '<table class="table table-bordered">';
                            tabla+='<thead><tr><th>Periódo</th><th>Sede</th><th>Facultad</th><th>Carrera</th><th>Semestre</th><th>Paralelo</th></tr></thead>';
                            tabla+='<tbody>';
                                estudiante.inscripciones.forEach(function (inscripcion) {
                                    tabla+='<tr>';
                                    tabla+='<td>' + inscripcion.periodo.nombre + '</td>';
                                    tabla+='<td>' + inscripcion.sede + '</td>';
                                    tabla+='<td>' + inscripcion.facultad + '</td>';
                                    tabla+='<td>' + inscripcion.carrera + '</td>';
                                    tabla+='<td>' + inscripcion.semestre.nombre + '</td>';
                                    tabla+='<td>' + inscripcion.paralelo + '</td>';
                                    tabla+='</tr>'; 
                                });
                            tabla+='</table>';
                        $('#tabla_historial').html(tabla).show();
                    }else{
                        $('#tabla_historial').html('<p>No hay historial academico registrado del estudiante</p>').show();
                    }
                },error:function(){
                    alert("No se pudo obtner la información del estudiante")
                }

            });

        }
    });
</script>

@stop


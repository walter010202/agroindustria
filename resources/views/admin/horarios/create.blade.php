@extends('adminlte::page')

@section('content_header') 
    <h1><b>Horarios/Registro de un nuevo horario  </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">




            <div class="row">
                <div class="col-md-12">
                        <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Grupo Académico</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                Buscar grupo academico
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Datos del docente</h4>
                                        <hr>
                                    <div id="datos_docente" style="display:block">
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
                                                        <div class="col-md-6">
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
                            
                    </div>
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del grupo academico</h3>
                    </div>

                    <div class="card-body">
                            
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Periódo académico</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="" id="periodo_id" readonly>
                                            
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
                                            <input type="text" class="form-control" name="" id="semestre_id" readonly>
                                            
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
                                            <input type="text" class="form-control" name="" id="paralelo" readonly>
                                            
                                        </div>
                                        @error('paralelo')
                                            <small style="color: red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Materia<b>(*)</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-layer-group"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="" id="materia_id" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cantidad de estudiantes *</label>
                                        <input type="number"
                                            name="cant_estudiantes"
                                            id="cant_estudiantes" 
                                            class="form-control"
                                            min="1"
                                            required
                                            placeholder="cantidad de estudiantes" readonly>
                                    </div>
                                </div> 
                            </div>
                                
                                
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Horario</h3>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.horarios.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="grupo_academico_id" id="grupo_academico_id" hidden>
                                            <label>Día</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                                </div>
                                                <select name="dia" class="form-control" required>
                                                    <option value="">Seleccionar un día</option>
                                                    <option value="Lunes"> Lunes</option>
                                                    <option value="Martes"> Martes</option>
                                                    <option value="Miércoles"> Miércoles</option>
                                                    <option value="Jueves"> Jueves</option>
                                                    <option value="Viernes"> Viernes</option>
                                                </select>
                                            </div>
                                            @error('dia')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Aula <b>(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-door-open"></i></span>
                                                </div>
                                                <input type="text" name="aula" class="form-control" placeholder="Ej: 101" required>
                                            </div>
                                        </div>
                                        @error('aula')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hora de incio</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <input type="time" name="hora_inicio" class="form-control" required>
                                            </div>
                                            @error('hora_inicio')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hora de finalización</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <input type="time" name="hora_fin" class="form-control" required>
                                            </div>
                                            @error('hora_fin')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                    <div class="col-md-12">
                                        {{-- Botones --}}
                                        <div class="form-group">
                                            <a href="{{ url('/admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </div>
                            </form>       
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Grupos academico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                    <tr>
                        <th style="text-align: center">Nro</th>
                        <th style="text-align: center">Docente</th>
                        <th style="text-align: center">Periodo</th>
                        <th style="text-align: center">Materia</th>
                        <th style="text-align: center">Semestre</th>
                        <th style="text-align: center">Paralelo</th>
                        <th style="text-align: center">Estudiantes</th>
                        <th style="text-align: center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php 
                        $contador = 1;
                    @endphp
                    @foreach($gruposAcademicos as $grupos)
                        <tr>
                            <td style="text-align: center">{{$contador++}}</td>
                            <td style="text-align: center">{{$grupos->docente->apellidos.' '.$grupos->docente->nombres}}</td>
                            <td style="text-align: center">{{$grupos->periodo->nombre}}</td>
                            <td style="text-align: center">{{$grupos->materia->nombre}}</td>
                            <td style="text-align: center">{{$grupos->semestre->nombre}}</td>
                            <td style="text-align: center">{{$grupos->paralelo}}</td>
                            <td style="text-align: center">{{$grupos->cant_estudiantes}}</td>

                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-info btn_seleccionar" 
                                        data-id="{{ $grupos->id }}" data-dismiss="modal">Seleccionar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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

<script>
    $('.btn_seleccionar').click(function(){
        var id = $(this).data('id');
        if(id){
            $.ajax({
                url:"{{url('/admin/horarios/buscar_grupo_academico/')}}" + '/' +id,
                type:'GET',
                success:function(grupoAcademico){
                    console.log(grupoAcademico);
                    $('#nombres').html(grupoAcademico.docente.nombres);
                    $('#apellidos').html(grupoAcademico.docente.apellidos);
                    $('#ci').html(grupoAcademico.docente.ci);
                    $('#fecha_nacimiento').html(grupoAcademico.docente.fecha_nacimiento);
                    $('#telefono').html(grupoAcademico.docente.telefono);
                    $('#profesion').html(grupoAcademico.docente.profesion);
                    $('#sede').html(grupoAcademico.docente.sede);
                    $('#facultad').html(grupoAcademico.docente.facultad);
                    $('#carrera').html(grupoAcademico.docente.carrera);
                    $('#email').html(grupoAcademico.docente.usuario.email);
                    $('#grupo_academico_id').val(grupoAcademico.id);
                    $('#direccion').html(grupoAcademico.docente.direccion);
                    $('#foto_docente').attr('src', grupoAcademico.foto_url).show();

                    $('#periodo_id').val(grupoAcademico.periodo.nombre);
                    $('#semestre_id').val(grupoAcademico.semestre.nombre);
                    $('#paralelo').val(grupoAcademico.paralelo);
                    $('#materia_id').val(grupoAcademico.materia.nombre);
                    $('#cant_estudiantes').val(grupoAcademico.cant_estudiantes);
                    
                },error:function(){
                    alert("No se pudo obtener la información del docente")
                }

            });

        }
        

    });
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@if (session('mensaje'))
<script>
    Swal.fire({
        icon: "{{ session('icono', 'success') }}",
        title: "{{ session('mensaje') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables + Buttons + Export Plugins -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


<script>
    $(function() {
        $("#example1").DataTable({
            "dom":'Blfrtip',
            "pageLength":5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Grupos Académicos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Grupos Académicos",
                "infoFiltered": "(Filtrado de _MAX_ total Grupos Académicos)",
                "lengthMenu": "Mostrar _MENU_ Grupos Académicos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords":"Sin resultados encontrados",
                "paginate":{
                    "first":"Primero",
                    "last": "Último",
                    "next": "siguiente",
                    "previous": "Anterior"
                }
            },
            
        })
    });
</script>



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


@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Inscripciones para los 
        estudiantes que necesitan practicas de laboratorio</b></h1>
    <hr>
@stop

@section('content')
    {{-- MENSAJES DE ALERTA --}}
    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Inscripciones Registrados</h3>


                    <div class="card-tools">
                        <a href="{{url('/admin/inscripciones/create')}}" class="btn btn-primary">Inscribirse</a>
                    </div>
                    <!--/.card-tools -->
                </div>
                <!--/.card-header--> 
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="text-align: center">Nro</th>
                            <th style="text-align: center">Estudiante</th>
                            <th style="text-align: center">Cédula</th>
                            <th style="text-align: center">Período Académico</th>
                            <th style="text-align: center">Sede</th>
                            <th style="text-align: center">Facultad</th>
                            <th style="text-align: center">Carrera</th>
                            <th style="text-align: center">Semestre</th>
                            <th style="text-align: center">Paralelo</th>
                          

                            <th style="text-align: center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php 
                            $contador = 1;
                        @endphp
                        @foreach($inscripciones as $inscripcion)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td style="text-align: center">{{$inscripcion->estudiante->apellidos.' '.$inscripcion->estudiante->nombres}}</td>
                                <td style="text-align: center">{{$inscripcion->estudiante->ci}}</td>
                                <td style="text-align: center">{{$inscripcion->periodo->nombre}}</td>
                                <td style="text-align: center">{{$inscripcion->sede}}</td>
                                <td style="text-align: center">{{$inscripcion->facultad}}</td>
                                <td style="text-align: center">{{$inscripcion->carrera}}</td>
                                <td style="text-align: center">{{$inscripcion->semestre->nombre}}</td>
                                <td style="text-align: center">{{$inscripcion->paralelo}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example" >

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAsignar{{ $inscripcion->id }}">
                                            Asignar laboratorio <i class="fas fa-list"></i>
                                        </button>

                                        <div class="modal fade" id="modalAsignar{{$inscripcion->id}}">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            
                                            <div class="modal-header bg-info text-white">
                                                <h5 class="modal-title">Asignación de laboratorio</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <h4>Laboratorios registrados en la inscripción</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover table-striped table-sm text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Turno</th>
                                                                <th>Hora inicio</th>
                                                                <th>Hora fin</th>
                                                                <th>Laboratorio</th>
                                                                <th>Docente</th>
                                                                <th>Tipo de uso</th>
                                                                <th>observaciones</th>
                                                                <th>fecha asignada</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php 
                                                                $contador=1;
                                                            @endphp
                                                            @foreach ($asignacionEstudiantes as $asignacionEstudiante)
                                                                @if ($asignacionEstudiante->inscripcion_id==$inscripcion->id)
                                                                <tr>
                                                                    <td>{{$contador++}}</td>
                                                                    <td>{{$asignacionEstudiante->turno}}</td>
                                                                    <td>{{$asignacionEstudiante->hora_inicio}}</td>
                                                                    <td>{{$asignacionEstudiante->hora_fin}}</td>
                                                                    <td>{{$asignacionEstudiante->laboratorio->nombre}}</td>
                                                                    <td>{{$asignacionEstudiante->docente->nombres.' '.$asignacionEstudiante->docente->apellidos}}</td>
                                                                    <td>{{$asignacionEstudiante->tipo_uso}}</td>
                                                                    <td>{{$asignacionEstudiante->observaciones}}</td>
                                                                    <td>{{$asignacionEstudiante->fecha_asignacion}}</td>
                                                                    <td>
                                                                        <form action="{{url('/admin/inscripciones/asignaciones_estudiantes', $asignacionEstudiante->id)}}" method="post"
                                                                            onclick="preguntar1{{$asignacionEstudiante->id}}(event)" id="miformulario1{{$asignacionEstudiante->id}}">
                                                                        @csrf 
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                                                    </form>
                                                                    <script>
                                                                        function preguntar1{{$asignacionEstudiante->id}}(event){
                                                                            event.preventDefault();
                                                                            Swal.fire({
                                                                                title: '¿Desea eliminar este registro?',
                                                                                text:'',
                                                                                icon:'question',
                                                                                showDenyButton: true,
                                                                                confirmButton: 'Eliminar',
                                                                                confirmButtonColor: '#a5161d',
                                                                                denyButtonColor:'#270a0a',
                                                                                denyButtonText:'Cancelar',
                                                                            }).then((result)=> {
                                                                                if (result.isConfirmed){
                                                                                    var form=$('#miformulario1{{$asignacionEstudiante->id}}');
                                                                                    form.submit();
                                                                                }
                                                                            });

                                                                        }
                                                                    </script>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <hr>
                                                    <form action="{{ url('/admin/inscripciones/asignaciones_estudiantes/create') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="inscripcion_id" value="{{$inscripcion->id}}">

                                                        <div class="row">
                                                             {{-- Turno --}}
                                                            <div class="col-md-3">
                                                                <label>Turno <b>(*)</b></label>
                                                                <select class="form-control" name="turno" required>
                                                                    <option value="">Seleccione el turno</option>
                                                                    <option value="Matutino" {{ old('turno') == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                                                                    <option value="Vespertino" {{ old('turno') == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                                                                    <option value="Nocturno" {{ old('turno') == 'Nocturno' ? 'selected' : '' }}>Nocturno</option>
                                                                </select>
                                                                @error('turno')
                                                                    <small style="color: red;">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            {{-- Hora Inicio --}}
                                                            <div class="col-md-2">
                                                                <label>Hora de Inicio<b>(*)</b></label>
                                                                <input type="time" class="form-control" name="hora_inicio" value="{{ old('hora_inicio') }}" required>
                                                                @error('hora_inicio')
                                                                    <small style="color: red;">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            {{-- Hora Fin --}}
                                                            <div class="col-md-2">
                                                                <label>Hora de Fin<b>(*)</b></label>
                                                                <input type="time" class="form-control" name="hora_fin" value="{{ old('hora_fin') }}" required>
                                                                @error('hora_fin')
                                                                    <small style="color: red;">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>Laboratorio</label>
                                                                <select name="laboratorio_id" class="form-control" required>
                                                                    <option value="">Seleccione</option>
                                                                    @foreach ($laboratorios as $laboratorio)
                                                                        <option value="{{$laboratorio->id}}">{{$laboratorio->nombre}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <!-- Buscar docente -->
                                                            <div class="col-md-6">
                                                                <label>Buscar docentes:</label>
                                                                <select name="docente_id" style="width: 100%;" id="buscar_docente" class="form-control select2" required>
                                                                    <option value="">Buscar...</option>
                                                                    @foreach($docentes as $docente)
                                                                        <option value="{{ $docente->id }}">{{ $docente->apellidos }} {{ $docente->nombres }} - {{ $docente->ci }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>Tipo de uso</label>
                                                                <select name="tipo_uso" class="form-control" required>
                                                                    <option value="">Seleccione</option>
                                                                    <option value="Práctica">Práctica</option>
                                                                    <option value="Investigación">Investigación</option>
                                                                    <option value="Tesis">Tesis</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label>Observaciones</label>
                                                                <textarea class="form-control" name="observaciones" rows="3" required></textarea>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label>Fecha de asignación</label>
                                                                <input type="date" class="form-control" name="fecha_asignacion" required>
                                                            </div>
                                                        </div>

                                                        <br>

                                                        <button type="submit" class="btn btn-primary">
                                                            Guardar
                                                        </button>
                                                    </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        

                                        <a href="{{url('/admin/inscripciones/'.$inscripcion->id.'/edit')}}" style="border-radius: 0px 0px 0px 0px" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i>Editar</a>
                                        <form action="{{url('/admin/inscripciones', $inscripcion->id)}}" method="post"
                                                onclick="preguntar{{$inscripcion->id}}(event)" id="miformulario{{$inscripcion->id}}">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i>Eliminar</button>
                                        </form>
                                        <script>
                                            function preguntar{{$inscripcion->id}}(event){
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Desea eliminar este registro?',
                                                    text:'',
                                                    icon:'question',
                                                    showDenyButton: true,
                                                    confirmButton: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor:'#270a0a',
                                                    denyButtonText:'Cancelar',
                                                }).then((result)=> {
                                                    if (result.isConfirmed){
                                                        var form=$('#miformulario{{$inscripcion->id}}');
                                                        form.submit();

                                                    }
                                                });

                                            }
                                        </script>
                                        <a href="{{url('/admin/inscripciones/pdf/'.$inscripcion->id)}}" style="border-radius: 0px 0px 0px 0px" class="btn btn-warning btn-sm"><i class="fas fa-print"></i> Imprimir</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop 

@section('css')
    <!-- DataTables + Botones -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <style>
        /*Fondo transparente y sin borde en el contenedor*/
        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;/* Centrar los botones*/
            gap: 10px;/*Espaciado entre botones*/ 
            margin-bottom: 15px;/* Separar botones de la tabla*/
        }
        /* Estilo personalizado para los botones */
        #example1_wrapper .btn{
            color: #fff;/* Color del texto en blanco */
            border-radius: 4px;/* Bordes redondeados */
            padding: 5px 15px;/* Espaciado interno */
            font-size: 14px;/* Tamaño de fuente */
        }
        /* Colores por tipo de botón - con !important */
        .btn-danger { background-color: #dc3545 !important; border: none !important; color:#fff !important;}
        .btn-success { background-color: #28a645 !important; border: none !important; color:#fff !important;}
        .btn-info {background-color: #17a2b8 !important; border: none !important; color: #fff !important;}
        .btn-warning {background-color: #ffc107 !important; color: #212529 !important; border: none !important;} 
        .btn-default {background-color: #6e7176 !important; color: #212529 !important; border: none !important;} 
    </style>
@stop 
@section('js')
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
@if (session('warning'))
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Advertencia',
        text: "{{ session('warning') }}",
    });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Correcto',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
<!-- DataTables + Buttons + Export Plugins -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<!-- Popper + Bootstrap 4.6 (NECESARIOS PARA EL MODAL) -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script>
$(document).ready(function () {
    $('#example1').DataTable({
        dom: 'Bfrtip',
        pageLength: 5,
        responsive: true,
        lengthChange: true,
        autoWidth: false,
        language: {
            emptyTable: "No hay información",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Inscripciones",
            infoEmpty: "Mostrando 0 a 0 de 0 Inscripciones",
            infoFiltered: "(Filtrado de _MAX_ total Inscripciones)",
            lengthMenu: "Mostrar _MENU_ Inscripciones",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscador:",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        },

         buttons: [
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-danger',
                exportOptions: { columns: ':not(:last-child)' }
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: 'btn btn-info',
                exportOptions: { columns: ':not(:last-child)' }
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> EXCEL',
                className: 'btn btn-success',
                exportOptions: { columns: ':not(:last-child)' }
            },
        ]


    });
});
</script>

@stop
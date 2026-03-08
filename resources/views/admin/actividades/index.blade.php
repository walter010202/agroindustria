@extends('adminlte::page')

@section('content_header')
    <h1><b>Cumplimiento de Actividades y observaciones en las Practicas de Laboratorios en la carrera de agroindustria</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Actividades Registradas</h3>


                    <div class="card-tools">
                        <a href="{{url('/admin/actividades/create')}}" class="btn btn-primary">crear nuevo</a>
                    </div>
                    <!--/.card-tools -->
                </div>
                <!--/.card-header--> 
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="text-align: center">Nro</th>
                            <th style="text-align: center">Docente responsable</th>
                            <th style="text-align: center">Fecha de la actividad</th>
                            <th style="text-align: center">Laboratorio</th>
                            <th style="text-align: center">Actividad realizada</th>
                            <th style="text-align: center">Observaciones</th>
                            <th style="text-align: center">Estado</th>
                            <th style="text-align: center">Hora de entrada</th>
                            <th style="text-align: center">Hora de salida</th>
                            <th style="text-align: center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php 
                            $contador = 1;
                        @endphp
                        @foreach($actividades as $actividad)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td style="text-align: center">{{$actividad->docente->apellidos.' '.$actividad->docente->nombres}}</td>
                                <td style="text-align: center">{{$actividad->fecha_actividad}}</td>
                                <td style="text-align: center">{{$actividad->laboratorio->nombre}}</td>
                                <td style="text-align: center">{{$actividad->actividad_realizada}}</td>
                                <td style="text-align: center">{{$actividad->observaciones}}</td>
                                <td style="text-align: center">{{$actividad->estado}}</td>
                                <td style="text-align: center">{{$actividad->hora_inicio}}</td>
                                <td style="text-align: center">{{$actividad->hora_fin}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('/admin/actividades/'.$actividad->id.'/edit')}}" style="border-radius: 0px 0px 0px 0px" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{url('/admin/actividades', $actividad->id)}}" method="post"
                                                onclick="preguntar{{$actividad->id}}(event)" id="miformulario{{$actividad->id}}">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$actividad->id}}(event){
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
                                                        var form=$('#miformulario{{$actividad->id}}');
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables + Buttons + Export Plugins -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


    <script>
        $(function() {
            $("#example1").DataTable({
                "dom":'Blfrtip',
                "pageLength":5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Actividades",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Actividades",
                    "infoFiltered": "(Filtrado de _MAX_ total Actividades)",
                    "lengthMenu": "Mostrar _MENU_ Actividades",
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
                "resonsive":true,
                "lengthChange":true,
                "autoWidth":false,
                buttons:[
                    {text:'<i class="fas fa-copy"></i> COPIAR', extend: 'copy', className: 'btn btn-default', exportOptions:{columns:':not(:last-child)'}},
                    {text:'<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className: 'btn btn-danger', exportOptions:{columns:':not(:last-child)'}},
                    {text:'<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className: 'btn btn-info', exportOptions:{columns:':not(:last-child)'}},
                    {text:'<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className: 'btn btn-success', exportOptions:{columns:':not(:last-child)'}},
                    {text:'<i class="fas fa-print"></i> IMPRIMIR', extend: 'print', className: 'btn btn-warning', exportOptions:{columns:':not(:last-child)'}},
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>
@stop
@extends('adminlte::page')

@section('content_header')
<h1>
    Materiales y Equipos -
    <small>{{ $laboratorio->nombre }}</small>
</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.materiales_equipos.create', $laboratorio->id) }}"
       class="btn btn-primary">
        <i class="fas fa-plus"></i> Registrar material
    </a>

    <a href="{{ route('laboratorios.index') }}"
       class="btn btn-secondary">
        Volver a laboratorios
    </a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Tipo</th>
            <th>Artículo</th>
            <th>Marca</th>
            <th>Descripción</th>
            <th>Observaciones</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($materiales_equipos as $i => $material)
        <tr>
            <td style="text-align: center">{{ $i+1 }}</td>
            <td style="text-align: center">{{ $material->tipo }}</td>
            <td style="text-align: center">{{ $material->articulo }}</td>
            <td style="text-align: center">{{ $material->marca }}</td>
            <td style="text-align: center">{{ $material->descripcion }}</td>
            <td style="text-align: center">{{ $material->observacion }}</td>
            <td style="text-align: center">{{ $material->estado }}</td>
            <td style="text-align: center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('admin.materiales_equipos.edit', [$laboratorio->id, $material->id]) }}"
                        class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{route('admin.materiales_equipos.destroy', [$laboratorio->id, $material->id])}}" method="post"
                            onclick="preguntar{{$material->id}}(event)" id="miformulario{{$material->id}}">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                    </form>
                    <script>
                        function preguntar{{$material->id}}(event){
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
                                    var form=$('#miformulario{{$material->id}}');
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
@stop

@section('css')
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

    <script>
        $(function() {
            $("#example1").DataTable({
                "dom":'Blfrtip',
                "pageLength":5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Materiales",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Materiales",
                    "infoFiltered": "(Filtrado de _MAX_ total Materiales)",
                    "lengthMenu": "Mostrar _MENU_ Materiales",
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

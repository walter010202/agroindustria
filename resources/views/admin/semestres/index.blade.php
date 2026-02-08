@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Semestres</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Semestres Registrados</h3>


                    <div class="card-tools">
                        <a href="{{url('/admin/semestres/create')}}" class="btn btn-primary">Registrar Semestre</a>
                    </div>
                    <!--/.card-tools -->
                </div>
                <!--/.card-header--> 
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="text-align: center">Nro</th>
                            <th style="text-align: center">Semestre</th>
                            <th style="text-align: center">Acción</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php 
                            $contador = 1;
                        @endphp
                        @foreach($semestres as $semestre)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td style="text-align: center">{{$semestre->nombre}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('/admin/semestres/'.$semestre->id.'/edit')}}" style="border-radius: 0px 0px 0px 0px" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{url('/admin/semestres', $semestre->id)}}" method="post"
                                                onclick="preguntar{{$semestre->id}}(event)" id="miformulario{{$semestre->id}}">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$semestre->id}}(event){
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
                                                        var form=$('#miformulario{{$semestre->id}}');
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
    <!-- DataTables Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap4.min.css">

    <style>
    /* Botones modernos */
    .dt-buttons .btn {
    border-radius: 20px;
    padding: 5px 14px;
    font-size: 13px;
    margin-right: 5px;
    }

    /* Buscador moderno */
    .dataTables_filter input {
    border-radius: 20px;
    padding-left: 12px;
    }

    /* Select moderno */
    .dataTables_length select {
    border-radius: 20px;
    }

    /* Hover elegante */
    table.dataTable tbody tr:hover {
    background-color: #f4f6f9;
    }
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


<!-- DataTables Bootstrap -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<!-- Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap4.min.js"></script>

<!-- Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>
$(document).ready(function () {
    $('#example1').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],

        dom:
            "<'row mb-2'<'col-md-6'B><'col-md-6'f>>" +
            "<'row'<'col-12'tr>>" +
            "<'row mt-2'<'col-md-5'i><'col-md-7'p>>",

        language: {
            search: "",
            searchPlaceholder: "Buscar...",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Semestres",
            lengthMenu: "Mostrar _MENU_ Semestres",
            zeroRecords: "No se encontraron resultados",
            paginate: {
                next: "›",
                previous: "‹"
            }
        },

        buttons: [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i>',
                className: 'btn btn-outline-secondary btn-sm',
                titleAttr: 'Copiar'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i>',
                className: 'btn btn-outline-success btn-sm',
                titleAttr: 'Excel'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i>',
                className: 'btn btn-outline-danger btn-sm',
                titleAttr: 'PDF'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i>',
                className: 'btn btn-outline-primary btn-sm',
                titleAttr: 'Imprimir'
            }
        ]
    });
});
</script>

@stop
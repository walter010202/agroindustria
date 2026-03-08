@extends('adminlte::page')

@section('content_header')
    <h1><b>Laboratorios – Carrera de Agroindustria</b></h1>
    <hr>
@stop

@section('content')
<div class="row mb-3">
    <div class="col-md-12 text-right">
        <a href="{{ url('/admin/laboratorios/create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear nuevo laboratorio
        </a>
    </div>
</div>

<div class="row">
@foreach($laboratorios as $laboratorio)
    <div class="col-md-4">
        <div class="card card-outline card-success laboratorio-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-flask"></i> {{ $laboratorio->nombre }}
                </h3>
                <div class="card-tools">
                    <span class="badge badge-{{ $laboratorio->estado == 'Activo' ? 'success' : 'secondary' }}">
                        {{ $laboratorio->estado }}
                    </span>
                </div>
            </div>

            <div class="card-body">
                <p class="text-muted">
                    {{ $laboratorio->descripcion }}
                </p>

                <hr>
            </div>

            <!-- Ver materiales y equipos -->
            <a href="{{ route('admin.materiales_equipos.index', $laboratorio->id) }}"
                class="btn btn-info btn-sm">
                <i class="fas fa-boxes"></i> Materiales y equipos
            </a>


            <div class="card-footer text-center">
                
               
                <div class="btn-group mt-2">

                    <a href="{{ url('/admin/laboratorios/'.$laboratorio->id.'/edit') }}"
                       class="btn btn-success btn-sm">
                        <i class="fas fa-edit"></i> Editar
                    </a>

                    <form action="{{ url('/admin/laboratorios', $laboratorio->id) }}"
                          method="POST"
                          id="formEliminar{{ $laboratorio->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                                onclick="eliminar{{ $laboratorio->id }}()"
                                class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert -->
    <script>
        function eliminar{{ $laboratorio->id }}(){
            Swal.fire({
                title: '¿Eliminar laboratorio?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#a5161d',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formEliminar{{ $laboratorio->id }}').submit();
                }
            });
        }
    </script>
@endforeach
</div>
@stop

@section('css')
<style>
    .laboratorio-card {
        transition: all 0.3s ease;
        min-height: 320px;
    }

    .laboratorio-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
    }

    .card-title {
        font-size: 16px;
        font-weight: bold;
    }

    .btn-group .btn {
        border-radius: 0;
    }

    .btn-group .btn:first-child {
        border-radius: 4px 0 0 4px;
    }

    .btn-group .btn:last-child {
        border-radius: 0 4px 4px 0;
    }
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
@stop

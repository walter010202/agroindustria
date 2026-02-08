@extends('adminlte::page')

@section('content_header') 
    <h1><b>Registros/editar los semestres</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del formulario</h3>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.semestres.update', $semestre->id)}}" method="POST">
                        @csrf 
                        @method('PUT')
                        {{-- Nombre --}}
                        <div class="form-group">
                            <label>Semestre<b>(*)</b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $semestre->nombre) }}" placeholder="Escriba el nombre..." required>
                            </div>
                            @error('nombre')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror      
                        </div>


                        <hr>
                        {{-- Botones --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/semestres') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop 

@section('css')
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
@stop
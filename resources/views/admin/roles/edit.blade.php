@extends('adminlte::page')

@section('content_header') 
    <h1><b>Actualizar los Roles</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Modifique los datos del formulario</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('admin/roles/'.$role->id)}}" method="POST">
                        @csrf 
                        @method('PUT')
                        {{-- Nombre --}}
                        <div class="form-group">
                            <label>Nombre del rol<b>(*)</b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                </div>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}" placeholder="Escriba aquí..." required>
                            </div>
                            @error('name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror      
                        </div>

                        <hr>
                        {{-- Botones --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/roles') }}" class="btn btn-secondary">Cancelar</a>
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

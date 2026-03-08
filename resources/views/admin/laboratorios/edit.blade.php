@extends('adminlte::page')

@section('content_header')
    <h1><b>Actualizar el laboratorio correspondiente</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-body">
                    <h3 class="card-title">Llene los datos del laboratorio</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.laboratorios.update', $laboratorio->id) }}" method="post">
                        @csrf 
                        @method('PUT')

                       {{-- laboratorio --}}
                        <div class="form-group">
                            <label>laboratorio<b>(*)</b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $laboratorio->nombre) }}" placeholder="Ingrese el nombre del laboratorio..." required>
                            </div>
                            @error('nombre')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror      
                        </div>

                        {{-- Descripcion --}}
                        <div class="form-group">
                            <label>Descripción</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                </div>
                                <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion',$laboratorio->descripcion) }}" placeholder="Descripción del artículo..." required>
                            </div>
                            @error('descripcion')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Estado --}}
                        <div class="form-group">
                            <label>Estado <b>(*)</b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                </div>
                                <select class="form-control" name="estado" required>
                                    <option value="">Seleccione el estado</option>
                                    <option value="Activo" {{ old('estado',$laboratorio->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="Inactivo" {{ old('estado',$laboratorio->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                    <option value="Mantenimiento" {{ old('estado',$laboratorio->estado) == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                                </select>
                            </div>
                            @error('estado')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>


                        <hr>
                        {{-- Botones --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/laboratorios') }}" class="btn btn-secondary">Cancelar</a>
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

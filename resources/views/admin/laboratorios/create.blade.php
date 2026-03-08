@extends('adminlte::page')

@section('content_header') 
    <h1><b>Resgistro de laboratorios</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del laboratorio</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.laboratorios.store') }}" method="POST">
                        @csrf 

                        {{-- laboratorio --}}
                        <div class="form-group">
                            <label>laboratorio<b>(*)</b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese el nombre del laboratorio..." required>
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
                                <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripción del artículo..." required>
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
                                    <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                    <option value="Mantenimiento" {{ old('estado') == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                                </select>
                            </div>
                            @error('estado')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                {{-- Botones --}}
                                <div class="form-group">
                                    <a href="{{ url('/admin/laboratorios') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
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
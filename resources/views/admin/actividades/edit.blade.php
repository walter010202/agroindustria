@extends('adminlte::page')

@section('content_header') 
    <h1><b>Editar las actividades del cumplimento en las practicas de Laboratorios en Agroindustria</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-body">
                    <h3 class="card-title">Llene los datos del formulario</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/actividades', $actividad->id)}}" method="post">
                        @csrf 
                        @method('PUT') {{-- Esto le dice a Laravel que simule una petición PUT --}}
                        {{-- Nombre --}}
                       <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Buscar docente:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-fw fa-chalkboard-teacher"></i>
                                    </span>
                                    <select name="docente_id" class="form-control" required>
                                        <option value="">Buscar...</option>
                                        @foreach($docentes as $docente)
                                            <option value="{{ $docente->id }}"
                                            {{ $docente->id == $actividad->docente_id ? 'selected' : '' }}>{{ $docente->apellidos . " " . $docente->nombres }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Fecha de Gestión --}}
                        <div class="form-group">
                            <label>Fecha de Gestión <b>(*)</b></label>
                            <input type="date" class="form-control" name="fecha_actividad" value="{{ old('fecha_actividad', $actividad->fecha_actividad) }}" required>
                            @error('fecha_gestion')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Laboratorio</label>
                            <select name="laboratorio_id" class="form-control" required>
                                <option value="">Seleccione</option>
                                @foreach ($laboratorios as $laboratorio)
                                    <option value="{{$laboratorio->id}}"
                                    {{ $laboratorio->id == $actividad->laboratorio_id ? 'selected' : '' }}>{{$laboratorio->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Actividad Realizada --}}
                        <div class="form-group">
                            <label>Actividad Realizada <b>(*)</b></label>
                            <textarea class="form-control" name="actividad_realizada" rows="4" placeholder="Describa la actividad realizada..." required>{{ old('actividad_realizada', $actividad->actividad_realizada) }}</textarea>
                            @error('actividad_realizada')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Observaciones --}}
                        <div class="form-group">
                            <label>Observaciones</label>
                            <textarea class="form-control" name="observaciones" rows="3" placeholder="Observaciones adicionales...">{{ old('observaciones', $actividad->observaciones) }}</textarea>
                            @error('observaciones')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Estado --}}
                        <div class="form-group">
                            <label>Estado <b>(*)</b></label>
                            <select class="form-control" name="estado" required>
                                <option value="">Seleccione el estado</option>
                                <option value="Pendiente" {{ old('estado', $actividad->estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="En proceso" {{ old('estado', $actividad->estado) == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                                <option value="Finalizado" {{ old('estado', $actividad->estado) == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                            </select>
                            @error('estado')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Hora Inicio --}}
                        <div class="form-group">
                            <label>Fecha de Inicio <b>(*)</b></label>
                            <input type="time" class="form-control" name="hora_inicio" value="{{ old('hora_inicio', $actividad->hora_inicio) }}" required>
                            @error('hora_inicio')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Hora Fin --}}
                        <div class="form-group">
                            <label>Fecha de Fin <b>(*)</b></label>
                            <input type="time" class="form-control" name="hora_fin" value="{{ old('hora_fin', $actividad->hora_fin) }}" required>
                            @error('hora_fin')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <hr>
                        {{-- Botones --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/actividades') }}" class="btn btn-secondary">Cancelar</a>
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

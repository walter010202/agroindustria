@extends('adminlte::page')

@section('content_header') 
    <h1><b>Editar material / equipo</b></h1>
    <hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">
                    Laboratorio: {{ $laboratorio->nombre }}
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.materiales_equipos.update', [$laboratorio, $material]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- Tipo --}}
                    <div class="form-group">
                        <label>Tipo <b>(*)</b></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                            </div>
                            <select name="tipo" class="form-control" required>
                                <option value="">Seleccione el tipo</option>
                                <option value="Equipos de laboratorio"{{ old('tipo',$material->tipo) == 'Equipos de laboratorio' ? 'selected' : '' }}>Equipos de laboratorio</option>
                                <option value="Multimedia y Equipos Electrónicos"{{ old('tipo',$material->tipo) == 'Multimedia y Equipos Electrónicos' ? 'selected' : '' }}>Multimedia y Equipos Electrónicos</option>
                                <option value="Mobiliario"{{ old('tipo',$material->tipo) == 'Mobiliario' ? 'selected' : '' }}>Mobiliario</option>
                                <option value="Insumo"{{ old('tipo',$material->tipo) == 'Insumo' ? 'selected' : '' }}>Insumo</option>
                            </select>
                        </div>
                        @error('tipo')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- Artículo --}}
                    <div class="form-group">
                        <label>Artículo <b>(*)</b></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                            </div>
                            <input type="text" class="form-control" name="articulo" value="{{ old('articulo', $material->articulo) }}" required>
                        </div>
                        @error('articulo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror  
                    </div>

                    {{-- Marca --}}
                    <div class="form-group">
                        <label>Marca</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            </div>
                            <textarea class="form-control" name="marca" rows="2">{{ old('marca', $material->marca) }}</textarea>
                        </div>
                        @error('marca')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Descripción --}}
                    <div class="form-group">
                        <label>Descripción</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                            </div>
                            <textarea class="form-control" name="descripcion" rows="3">{{ old('descripcion', $material->descripcion) }}</textarea>
                        </div>
                        @error('descripcion')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Observación --}}
                    <div class="form-group">
                        <label>Observaciones</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                            </div>
                        <textarea class="form-control" name="observacion" rows="3">{{ old('observacion', $material->observacion) }}</textarea>
                        </div>
                        @error('observacion')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Estado --}}
                    <div class="form-group">
                        <label>Estado <b>(*)</b></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                            </div>
                            <select name="estado" class="form-control" required>
                                <option value="">Seleccione el estado de los materiales y equipos</option>
                                <option value="Disponible" {{ old('estado', $material->estado) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                <option value="En uso" {{ old('estado', $material->estado) == 'En uso' ? 'selected' : '' }}>En uso</option>
                                <option value="Dañado" {{ old('estado', $material->estado) == 'Dañado' ? 'selected' : '' }}>Dañado</option>
                                <option value="Matenimiento" {{ old('estado', $material->estado) == 'Mantenimiento' ? 'selected' : '' }}>Matenimiento</option>
                            </select>
                        </div>
                        @error('estado')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <hr>

                    <a href="{{ route('admin.materiales_equipos.index', $laboratorio) }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

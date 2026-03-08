@extends('adminlte::page')

@section('content_header') 
    <h1><b>Personal docente/Modificar datos del personal docente</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del formulario</h3>
                </div>

                <div class="card-body">
                   <form action="{{route('admin.docentes.update', $docente->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')
                        {{-- Nombre --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Rol de trabajo<b>(*)</b></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select name="rol" id="" class="form-control" style="pointer-events:none">
                                            @foreach($roles as $rol)
                                                @if($rol->name=='Docente')
                                                    <option value="{{$rol->name}}" {{$rol->name == 'Docente' ? 'selected':'' }}>{{$rol->name}}</option>
                                                @else
                                                    <option value=" "> No existe el rol docente</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('rol')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nombres" id="nombres" value="{{ old('nombres', $docente->nombres) }}" placeholder="Ingrese Nombres..." required>
                                    </div>
                                    @error('nombres')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombres">Apellidos</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old('apellidos', $docente->apellidos) }}" placeholder="Ingrese Apellidos..." required>
                                    </div>
                                    @error('apellidos')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ci">Cédula</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ci" id="ci" value="{{ old('ci', $docente->ci) }}" placeholder="Ingrese cedula..." required>
                                    </div>
                                    @error('ci')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $docente->fecha_nacimiento) }}" placeholder="Ingrese su fecha de nacimiento..." required>
                                    </div>
                                    @error('fecha_nacimiento')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono', $docente->telefono) }}" placeholder="Ingrese su telefono..." required>
                                    </div>
                                    @error('telefono')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Correo electrónico</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $docente->usuario->email) }}" placeholder="Ingrese su correo..." required>
                                    </div>
                                    @error('email')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Profesion">Profesión</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="profesion" id="profesion" value="{{ old('profesion', $docente->profesion) }}" placeholder="Ingrese su profesion..." required>
                                    </div>
                                    @error('profesion')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion', $docente->direccion) }}" placeholder="Ingrese su direccion..." required>
                                    </div>
                                    @error('direccion')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Sede">Sede</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <select class="form-control" name="sede" required>
                                            <option value="">Seleccione la sede....</option>
                                            <option value="Guayaquil" {{ old('sede',$docente->sede) == 'Guayaquil' ? 'selected' : '' }}>Guayaquil</option>
                                            <option value="Milagro" {{ old('sede',$docente->sede) == 'Milagro' ? 'selected' : '' }}>Milagro</option>
                                            <option value="El triunfo" {{ old('sede',$docente->sede) == 'El triunfo' ? 'selected' : '' }}>El triunfo</option>
                                        </select>
                                    </div>
                                    @error('sede')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Facultad</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>

                                        <select class="form-control" name="facultad" required>
                                            <option value="">Seleccione la facultad</option>
                                            <option value="Facultad de Ciencias Agrarias" {{ old('facultad',$docente->facultad) == 'Facultad de Ciencias Agrarias' ? 'selected' : '' }}>Facultad de Ciencias Agrarias</option>
                                            <option value="Facultad de Economía Agrícola" {{ old('facultad',$docente->facultad) == 'Facultad de Economía Agrícola' ? 'selected' : '' }}>Facultad de Economía Agrícola</option>
                                            <option value="Facultad de Medicina Veterinaria y Zootecnia" {{ old('facultad',$docente->facultad) == 'Facultad de Medicina Veterinaria y Zootecnia' ? 'selected' : '' }}>Facultad de Medicina Veterinaria y Zootecnia</option>
                                        </select>
                                    </div>
                                    @error('facultad')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Carrera</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select class="form-control" name="carrera" required>
                                            <option value="">Seleccione la carrera</option>
                                            <option value="Agronomía" {{ old('carrera',$docente->carrera) == 'Agronomía' ? 'selected' : '' }}>Agronomía</option>
                                            <option value="Agroindustria" {{ old('carrera',$docente->carrera) == 'Agroindustria' ? 'selected' : '' }}>Agroindustria</option>
                                            <option value="Ambiental" {{ old('carrera',$docente->carrera) == 'Ambiental' ? 'selected' : '' }}>Ambiental</option>
                                            <option value="Economía" {{ old('carrera',$docente->carrera) == 'Economía' ? 'selected' : '' }}>Economía</option>
                                            <option value="Economía Agrícola" {{ old('carrera',$docente->carrera) == 'Economía Agrícola' ? 'selected' : '' }}>Economía Agrícola</option>
                                            <option value="Medicina Veterinaria" {{ old('carrera',$docente->carrera) == 'Medicina Veterinaria' ? 'selected' : '' }}>Medicina Veterinaria</option>
                                        </select>
                                    </div>
                                    @error('carrera')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto">Foto de perfil</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="file" id="file" class="form-control" name="foto">
                                    </div> 
                                    <output id="list">
                                        <img src="{{ url($docente->foto)}}" width="150px"  alt=""> 
                                       
                                    </output>
                                    @error('foto')<small style="color: red">{{$message}}</small> @enderror
                                </div>
                                <script>
                                    function archivo(evt){
                                        var files = evt.target.files; //filelist object
                                        //obtenemos la imagen del campo "file"
                                        for (var i=0, f; f=files[i];i++) {
                                            //Solo admitimos imagenes.
                                            if (!f.type.match('image.*')) {
                                                continue;
                                            }
                                            var reader= new FileReader();
                                            reader.onload=(function(theFile){
                                                return function(e){
                                                    document.getElementById("list").innerHTML=['<img class="thumn thumbnail" src=""',e.target.result,'" width="70%" title="Foto">']
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                    }
                                    document.getElementById('file').addEventListener('change', archivo, false);
                                </script>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                {{-- Botones --}}
                                <div class="form-group">
                                    <a href="{{ url('/admin/docentes') }}" class="btn btn-secondary">Cancelar</a>
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
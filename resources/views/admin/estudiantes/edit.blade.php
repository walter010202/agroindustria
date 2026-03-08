@extends('adminlte::page')

@section('content_header') 
    <h1><b>Estudiantes/Editar datos del estudiante</b></h1>
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
                    <form action="{{route('admin.estudiantes.update', $estudiante->id)}}" method="POST" enctype="multipart/form-data">
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
                                                @if($rol->name=='Estudiante')
                                                    <option value="{{$rol->name}}" {{$rol->name == 'Estudiante' ? 'selected':'' }}>{{$rol->name}}</option>
                                                @else
                                                    <option value=" "> No existe el rol estudiante</option>
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
                                        <input type="text" class="form-control" name="nombres" id="nombres" value="{{ old('nombres', $estudiante->nombres) }}" placeholder="Ingrese Nombres..." required>
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
                                        <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old('apellidos', $estudiante->apellidos) }}" placeholder="Ingrese Apellidos..." required>
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
                                        <input type="text" class="form-control" name="ci" id="ci" value="{{ old('ci', $estudiante->ci) }}" placeholder="Ingrese cedula..." required>
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
                                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento) }}" placeholder="Ingrese su fecha de nacimiento..." required>
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
                                        <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono', $estudiante->telefono) }}" placeholder="Ingrese su telefono..." required>
                                    </div>
                                    @error('telefono')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Ref celular</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ref_celular" id="ref_celular" value="{{ old('ref_celular', $estudiante->ref_celular) }}" placeholder="Ingrese su telefono..." required>
                                    </div>
                                    @error('ref_celular')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Persona_emergencia">Persona de emergencia</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="persona_emergencia" id="persona_emergencia" value="{{ old('persona_emergencia', $estudiante->persona_emergencia) }}" placeholder="Ingrese a la persona de emergencia..." required>
                                    </div>
                                    @error('persona_emergencia')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_emergencia">Numero de emergencia</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="numero_emergencia" id="numero_emergencia" value="{{ old('numero_emergencia', $estudiante->numero_emergencia) }}" placeholder="Ingrese su telefono de emergencia..." required>
                                    </div>
                                    @error('numero_emergencia')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Correo electronico</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $estudiante->usuario->email) }}" placeholder="Ingrese su correo..." required>
                                    </div>
                                    @error('email')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion', $estudiante->direccion) }}" placeholder="Ingrese su direccion..." required>
                                    </div>
                                    @error('direccion')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror      
                                </div>
                            </div>
                        </div>
                        <div class="row">

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
                                        <img src ="{{url ($estudiante->foto)}}" width="250" alt="">
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
                                    <a href="{{ url('/admin/estudiantes') }}" class="btn btn-secondary">Cancelar</a>
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
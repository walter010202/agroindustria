@extends('adminlte::page')

@section('content_header')
    <h1>Configuraciones del sistema</h1>
    <hr>
@stop

@section('content')
<div class="row">
<div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Lleno los datos del formulario</h3>
            </div>
            <!--/.card-header-->
            <div class="card-body">
                <form action="{{ url('admin/configuraciones/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                        <!-- Nombre -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Universidad</label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('nombre', $configuracion->nombre ?? '') }}"  name="nombre" placeholder="Ingrese el nombre">
                                </div>
                                @error('nombre')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                         <!-- facultad -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Facultad</label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('facultad', $configuracion->facultad ?? '') }}" name="facultad" placeholder="Ingrese la facultad">
                                </div>
                                @error('facultad')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Descripción</label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('descripcion', $configuracion->descripcion ?? '') }}" name="descripcion" placeholder="Ingrese la descripción">
                                </div>
                                @error('descripcion')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>     
                        <!-- Dirección -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>       
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('direccion', $configuracion->direccion ?? '') }}" name="direccion" placeholder="Ingrese la dirección">
                                </div>
                                @error('direccion')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                         <!-- Codigo postal -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Código postal</label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('codigo_postal', $configuracion->codigo_postal ?? '') }}" name="codigo_postal" placeholder="Ingrese el codigo postal">
                                </div>
                                @error('codigo_postal')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <!-- Teléfono -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Teléfonos</label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('telefono', $configuracion->telefono ?? '') }}" name="telefono" placeholder="Ingrese el número de teléfono">
                                </div>     
                                @error('telefono')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <!-- Facebook -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                    </div>
                                    <input type="facebook" class="form-control" value="{{ old('facebook', $configuracion->facebook ?? '') }}" name="facebook" placeholder="Ingrese el facebook">
                                </div>
                                @error('facebook')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Instagram -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram">Instagram</label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    </div>
                                    <input type="instagram" class="form-control" value="{{ old('instagram', $configuracion->instagram ?? '') }}" name="instagram" placeholder="Ingrese el instagram">
                                </div>
                                @error('instagram')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Twitter -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter">Twitter</label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                    </div>
                                    <input type="twitter" class="form-control" value="{{ old('twitter', $configuracion->twitter ?? '') }}" name="twitter" placeholder="Ingrese el twitter">
                                </div>
                                @error('twitter')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                         <!-- Sitio web -->
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sitio web</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                    </div>
                                    <input type="url" class="form-control" value="{{ old('web', $configuracion->web ?? '') }}" name="web" placeholder="https://ejemplo.com">
                                </div>
                                @error('web')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Logo (Subir imagen) -->
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="logo">Logo</label><b>(*)</b>
                                <input type="file" id="file" name="logo" accept=".jpg, .jpeg, .png" class="form-control" required>
                                @error('logo')
                                <small style="color: red;">🔴 {{ $message }}</small>
                                @enderror
                                <br>
                                <center> 
                                    <output id="list">
                                        @if(isset($configuracion->logo))
                                        <img class="thumn thumbnail" src="{{url($configuracion->logo)}}" width="70%" title="Logo">
                                        @endif
                                    </output>
                                </center>
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
                                                    document.getElementById("list").innerHTML=['<img class="thumn thumbnail" src=""',e.target.result,'" width="70%" title="Logo">']
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                    }
                                    document.getElementById('file').addEventListener('change', archivo, false);
                                </script>
                            </div>
                        </div>
                    </div>
                  <!-- /.row -->
            </div>
                <hr> <!-- /.card-body -->
                <div class="row">
                    <div class="card-md-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ url('admin/configuraciones')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    
@stop
@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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
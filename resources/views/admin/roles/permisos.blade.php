@extends('adminlte::page')

@section('content_header')
    <h1><b>Permisos del Rol - {{$rol->name}}</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Permisos Registrados</h3>
                    <!--/.card-tools -->
                </div>
                <!--/.card-header--> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                           <form action="{{ route('admin.roles.update_permisos', $rol->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    @foreach ($permisos as $modulo => $grupoPermisos)
                                        <div class="col-md-3">
                                            <h3>{{$modulo}}</h3>
                                            @foreach($grupoPermisos as $permiso)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permisos[]"
                                                value="{{$permiso->id}}"{{$rol->hasPermissionTo($permiso->name)? 'checked' : ''}} >
                                                <label for="" class="form-check-label">{{$permiso->name}}</label>
                                            </div>
                                            @endforeach
                                            <br>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{url('/admin/roles')}}" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                           </form>
                        </div>
                    </div>
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
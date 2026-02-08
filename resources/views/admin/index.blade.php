@extends('adminlte::page')

@section('content_header')
    <h1>Dashboard</h1>
    <hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/calendario.png') }}" width="60px"  alt="">
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Semestres Registrados</b></span>
                <span class="info-box-number">{{$total_semestres}} semestres</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/libro.png') }}" width="60px" alt="">
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Materias Registradas</b></span>
                <span class="info-box-number">{{$total_materias}} Materias</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>

</div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
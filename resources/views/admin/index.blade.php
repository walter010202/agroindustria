@extends('adminlte::page')

@section('content_header')
    <h1>Bienvenidos a los laboratorios</h1>
    <hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/cheque.gif') }}" width="60px"  alt="">
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
            <img src="{{ url('/img/materias.gif') }}" width="60px" alt="">
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Materias Registradas</b></span>
                <span class="info-box-number">{{$total_materias}} Materias</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/roles.gif') }}" width="60px" alt="">
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Roles Registrados</b></span>
                <span class="info-box-number">{{$total_roles}} Roles</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/administrativos.gif') }}" width="60px" alt="">
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Administrativos Registrados</b></span>
                <span class="info-box-number">{{$total_administrativos}} Administrativos</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/docente.gif') }}" width="60px" alt="">
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Docentes Registrados</b></span>
                <span class="info-box-number">{{$total_docentes}} Docentes</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/estudiantes.gif') }}" width="60px" alt="">
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Estudiantes Registrados</b></span>
                <span class="info-box-number">{{$total_estudiantes}} Estudiantes</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/inventario.gif') }}" alt="" width="60px" >
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Actividades Registradas</b></span>
                <span class="info-box-number">{{$total_actividades}} Actividades</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/laboratorio.gif') }}" alt="" width="60px" >
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Laboratorios Registrados</b></span>
                <span class="info-box-number">{{$total_laboratorios}} Laboratorios</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <img src="{{ url('/img/equipos_materiales.gif') }}" alt="" width="60px" >
            <div class="info-box-content">
                <span class="info-box-text" style="color: rgb(4, 120, 13) "><b>Materiales y Equipos Resgistrados</b></span>
                <span class="info-box-number">{{$total_equipos}} Materiales y Equipos</span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
    </div>



</div>

<!--Reporte de estudiantes en inscripciones de los laboratorio en cada periodo -->
<div class="row">
    <div class="col-md-4">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Estudiantes inscritos por período académico</h3>
            </div>
            <div class="card-body">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!--Reporte de estudiantes inscritos por laboratorio-->
    <div class="col-md-4">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Cantidad de Estudiantes inscritos por laboratorio</h3>
            </div>
            <div class="card-body">
                <div style="height:250px">
                    <canvas id="chartLaboratorios"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">Uso de laboratorios por turno</h3>
            </div>
            <div class="card-body">
                <div style="height:250px">
                    <canvas id="chartTurnos"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var periodos = @json($periodosArray);
        var inscritos = @json($datosInscritos);
        new Chart(document.getElementById('myChart'),{
            type:'line',
            data:{
                labels:periodos,
                datasets:[{
                    label:'Estudiantes inscritos por periodo',
                    data:inscritos,
                    backgroundColor: 'rgba(54,162,235,0.2)',
                    borderColor:'rgba(52,162,235,1)',
                    borderWidth:2,
                    fill:true,
                    tension:0.3
                }]
            },
            options:{
                scales:{
                    y:{
                        beginAtZero:true
                    }
                }
            }

        });
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>


   <script>
    var labs = @json($labsArray ?? []);
    var inscritos = @json($labsInscritos ?? []);

    new Chart(document.getElementById('chartLaboratorios'), {
        type: 'bar',
        data: {
            labels: labs,
            datasets: [{
                label: 'Estudiantes por laboratorio',
                data: inscritos,
                backgroundColor: 'rgba(54,162,235,0.5)',
                borderColor: 'rgba(54,162,235,1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // 🔑 CLAVE
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                }
            }
        }
    });
</script>

<script>
    var turnos = @json($turnosLabels ?? []);
    var totales = @json($turnosTotales ?? []);

    new Chart(document.getElementById('chartTurnos'), {
        type: 'pie',
        data: {
            labels: turnos,
            datasets: [{
                data: totales,
                backgroundColor: [
                    '#007bff',
                    '#28a745',
                    '#ffc107',
                    '#dc3545',
                    '#6f42c1'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@stop
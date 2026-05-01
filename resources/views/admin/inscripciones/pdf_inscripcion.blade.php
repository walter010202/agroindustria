<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscripcion</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212121;
            border-collapse: collapse;
        }
        .table-bordered {
            border: 1px solid #000000;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000000;
        }
        .table-bordered thead th {
            border-bottom-width: 2px;
        }
    </style>
</head>
<body>
    <table border="0" style ="font-size:8pt;">
        <tr>
            <td style="text-align: center;">
                <img src="{{ asset(str_replace('logos', 'logos/', $configuracion->logo)) }}" width="100"><br>
                <b>{{$configuracion->nombre}}</b><br>
                <b>Facultad: </b> {{$configuracion->facultad}}<br>
                <b>Direccion: </b> {{$configuracion->direccion}}<br>
                <b>Codigo postal: </b> {{$configuracion->codigo_postal}}<br>
                <b>Telefonos: </b> {{$configuracion->telefono}}<br>
            </td>
            <td style="width: 300px"></td>
            <td>
                <img src="{{ $barcodePNG }}" style="width:200px;height:50px;display:block;margin:0 auto;">
                <div style="text-align:center; font-family:monospace;margin-top: 5px;">
                    CI: {{$inscripcion->estudiante->ci}}
                </div>
            </td>
        </tr>
    </table>
    <h3 style="text-align: center"><b><u>ASIGNACIÓN DE LABORATORIO DEL ESTUDIANTE</u></b></h3>


    <table border="0" cellpadding="3">
        <tr>
            <td><b>Periódo: </b></td>
            <td style="width: 300px;">{{$inscripcion->periodo->nombre}}</td>
            <td style="width: 200px"></td>
            <td rowspan="4" style="text-align: center">
                <img src="{{ public_path($inscripcion->estudiante->foto) }}" width="120"><br>
            </td>
        </tr>
        <tr>
            <td><b>Sede: </b></td>
            <td>{{$inscripcion->sede}}</td>
        </tr>
        <tr>
            <td><b>Facultad: </b></td>
            <td>{{$inscripcion->facultad}}</td>
        </tr>
        <tr>
            <td><b>Carrera: </b></td>
            <td>{{$inscripcion->carrera}}</td>
        </tr>
        <tr>
            <td><b>Semestre: </b></td>
            <td>{{$inscripcion->semestre->nombre}}</td>
        </tr>
        <tr>
            <td><b>Paralelo: </b></td>
            <td>{{$inscripcion->paralelo}}</td>
        </tr>
    </table>


    <table border="0" style="width: 100%; margin: top 10px; text-align:center;">
        <tr>
            <td><b>{{$inscripcion->estudiante->apellidos}}</b><br>----------------------------<br>Apellidos</td>
            <td><b>{{$inscripcion->estudiante->nombres}}</b><br>----------------------------<br>Nombres</td>
            <td><b>{{$inscripcion->estudiante->ci}}</b><br>----------------------------<br>Carnet de identidad </td>
            
        </tr>

    </table>

    <br>
    <p style="text-align: center;"><b>LABORATORIO ASIGNADO</b></p>
    <table class=" table table-bordered" cellpadding="4" style="width: 100%; font-size: 8pt; text-align:center;">
        <tr style="text-align: center; background-color: #f2f2f2;">
            <td><b>Nro</b></td>
            <td><b>Laboratorio</b></td>
            <td><b>Tipo de uso</b></td>
            <td><b>Observaciones</b></td>
            <td><b>Fecha asignada</b></td>
            <td><b>Turno</b></td>
            <td><b>Hora de inicio</b></td>
            <td><b>Hora de Finalización</b></td>
            <td><b>Tutor a cargo</b></td>

        </tr>
        @php 
            $contador = 1;
        @endphp 
        @foreach ($asignacionEstudiantes as $datos)
            <tr>
                <td style="text-align: center">{{$contador++}}</td>
                <td style="text-align:center">{{$datos->laboratorio->nombre}}</td>
                <td style="text-align:center">{{$datos->uso->nombre}}</td>
                <td style="text-align:center">{{$datos->observaciones}}</td>
                <td style="text-align:center">{{$datos->fecha_asignacion}}</td>
                <td style="text-align:center">{{$datos->turno}}</td>
                <td style="text-align:center">{{$datos->hora_inicio}}</td>
                <td style="text-align:center">{{$datos->hora_fin}}</td>
                <td style="text-align:center">{{$datos->docente->nombres.' '.$datos->docente->apellidos}}</td>
            </tr>
        @endforeach
    </table>
    <span style="font-size: 9pt"> Guayaquil, @php echo now()->translatedFormat('j \d\e F \d\e\l Y'); @endphp</span>
    
    <br><br><br><br><br><br><br><br>

    <table border="0" style="width: 100%; text-align:center">
        <tr>
            <td>
                ___________________________<br> Coordinador/a Carrera
            </td>
            <td>
                ___________________________<br> Profesor/a responsable del laboratorio
            </td>
        </tr>
    </table>
    <br><br><br>
    <p style="text-align: center;"><b>{{$configuracion->descripcion}}</b></p>
    
</body>
</html>
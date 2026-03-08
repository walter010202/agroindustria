@extends('adminlte::page')

@section('title', 'Calendario de Laboratorios')

@section('content_header')
    <h1><b>Calendario de Asignación de Laboratorios</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <div id="calendar"></div>
    </div>
</div>

<!-- FullCalendar -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        locale: 'es',
        initialView: 'timeGridWeek',

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día'
        },

        events: '{{ route("admin.calendario.eventos") }}',

        slotMinTime: "07:00:00",
        slotMaxTime: "22:00:00",
        allDaySlot: false,
        height: 650,

        nowIndicator: true,
        navLinks: true,
        editable: false,
        selectable: false,

        // 👇 FORMATO 12 HORAS EN LA COLUMNA DE HORAS
        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            hour12: true
        },

        // 👇 FORMATO 12 HORAS EN LOS EVENTOS
        eventTimeFormat: {
            hour: 'numeric',
            minute: '2-digit',
            hour12: true
        },
        //Calendario de Asignación de Laboratorios para estudiantes
        eventClick: function(info) {
            alert(
                "Laboratorio: " + info.event.title + "\n" +
                "Docente: " + info.event.extendedProps.docente + "\n" +
                "Turno: " + info.event.extendedProps.turno + "\n" +
                "Tipo de uso: " + info.event.extendedProps.tipo_uso + "\n" +
                "Observaciones: " + info.event.extendedProps.observaciones
            );
        }
        //Calendario de Asignación de Laboratorios para docentes

    });

    calendar.render();
});
</script>

@stop
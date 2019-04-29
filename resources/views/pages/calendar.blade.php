<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel="stylesheet" href="{{asset('css/fullcalendar.min.css')}}" rel='stylesheet'/>
<link rel="stylesheet" href="{{asset('css/fullcalendar.print.min.css')}}" rel='stylesheet' media='print'/>
<script src="{{asset('js/moment.min.js')}} "></script>
<script src="{{asset('js/jquery.min.js')}} "></script>
<script src="{{asset('js/fullcalendar.min.js')}} "></script>
<style>
  .fc-today-button{
    background-color: #007bff;
    color:white;
  }
  .fc-today-button:focus{
    
  }
  .fc-today-button{
    background-color: #007bff;
  }
  .fc-month-button,.fc-agendaWeek-button,.fc-agendaDay-button{
    background-color: #007bff;
  }
  .fc-month-button:focus{
    color:white;
  }
  .fc-agendaWeek-button:focus{
    color:white;
  }
  .fc-agendaDay-button:focus{
    color:white;
  }
  .fc-day-header{
    height: 35px;
   
  }
  .fc-day-header span{
   position: absolute;
   bottom: 6px;
  }
}
</style>
<script>
  $(document).ready(function() {
    $('#bootstrapModalFullCalendar').fullCalendar({
        events: '/hackyjson/cal/',
        header: {
            left: '',
            center: 'prev title next',
            right: ''
        },
        eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#eventUrl').attr('href',event.url);
            $('#fullCalModal').modal();
        }
    });

     $('#calendar').fullCalendar({
     header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      selectable: true,
      selectHelper: true,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true,   
          events: [
        {
          title: 'All Day Event',
          start: '2019-04-01T10:00:00',
          end: '2019-04-01T12:30:00',
          color: 'red'
        },
        {
          title: 'Long Event',
          start: '2019-04-07',
          end: '2019-04-10',
          color: 'green'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-04-09T16:00:00',
          color: 'blue'
        }
      ]
  });
  });
</script>
</head>

<body>
     @extends('layouts.app')
    @section('content')
    <div id='calendar'></div>
    @endsection
</body>
</html>

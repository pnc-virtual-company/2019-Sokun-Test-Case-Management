<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel="stylesheet" href="{{asset('css/fullcalendar.min.css')}}" rel='stylesheet'/>
<link rel="stylesheet" href="{{asset('css/fullcalendar.print.min.css')}}" rel='stylesheet' media='print'/>
<script src="{{asset('js/moment.min.js')}} "></script>
<script src="{{asset('js/jquery.min.js')}} "></script>
<script src="{{asset('js/fullcalendar.min.js')}} "></script>

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
      select:function (startDate,endDate ){
          var eventTitle = prompt('Even Title:','dog vs cat');
          var eventData;
          if(eventTitle){
            //random color
            var letters = '0123456789ABCDEF';
            var color = '#';
              for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
                   }
              eventData ={
                  title: eventTitle,
                  start: startDate,
                  end: endDate,
                  
                  color: color  
              };

              $('#calendar').fullCalendar('renderEvent',eventData,true,);//stick true
          }
          $('#calendar').fullCalendar(unselect);
          },
         
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
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-04-16T16:00:00',
          color: 'purple'
        },
        {
          title: 'Conference',
          start: '2019-04-15',
          end: '2019-04-17',
          color: 'black'
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
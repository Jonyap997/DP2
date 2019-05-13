$(document).ready(function(){
        var calendar = $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek,agendaDay'
            },
            businessHours: {
                start: '09:00',
                end: '17:30',
                dow: [1, 2, 3, 4, 5, 6]
            },
            defaultView: 'agendaWeek',
            allDaySlot: false,
            
            events: "booking4.php?view=1"
        });
               
    });
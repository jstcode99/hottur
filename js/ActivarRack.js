function ActivarRack() 
{
    var initialLocaleCode = 'es';
    var FechaActual= new Date();
    var FechaActual = FechaActual.getFullYear() + "/" + (FechaActual.getMonth()+1) + "/" + FechaActual.getDate();
    $('#RackGrafico').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
      },
      defaultDate: FechaActual,
      locale: initialLocaleCode,
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events:''
    });
    var ParaContar=new Array();
    var NombreProceso="TraerEventosRack";
    var parametros = {"NombreProceso" : NombreProceso};
    $.ajax({
            data:  parametros,
            url:   '../modulos/registroindividual/funciones.php',
            type:  'post',                
            success:  function (response) {               
                    var datos = JSON.parse(response);                                        
                    ParaContar=JSON.parse(response);
                    cantidad=ParaContar.length;
                    for(var i=0;i<cantidad;i++)
                    {                
                      addCalanderEvent(datos[i].id, datos[i].start, datos[i].end, datos[i].title,"#5cb85c");
                      
                    }                
            }
    });
    
}

  function addCalanderEvent(id, start, end, title, colour)
  {
      var eventObject = {
      title: title,
      start: start,
      end: end,
      id: id,
      color: colour
      };
      $('#RackGrafico').fullCalendar('renderEvent', eventObject, true);
      return eventObject;
  }

  ActivarRack();
 
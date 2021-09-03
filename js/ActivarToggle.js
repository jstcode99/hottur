$(function() {
    $("#MostrarConvenios").hide();
    $("#ContenedorConvenios").hide();
    $("#ContenedorConvenioRegistro").hide();
    $("#AbonoEspecificoHabitacion").hide();
    $("#ContenedorDesayuno").hide();
    $("#ContenedorComisionAgencia").hide();
    $("#Checkreserva>div").attr( "disabled", true);
    $("#ContenedorDesayunoRegistro").hide();
    



    $('#CheckConvenio').bootstrapToggle({
    on: 'Tiene Convenio',
    off: 'No Tiene Convenio',
    onstyle: 'success'
    });

   
    $('#CheckTipoAbono').bootstrapToggle({
    on: 'Especifico por habitación',
    off: 'General',
    onstyle: 'success'
    });

    $('#CheckTipoAbono').change(function() {
       
        var TipoAbono = document.getElementById("CheckTipoAbono").checked;
       
        if(TipoAbono == false){
            $("#AbonoEspecificoHabitacion").hide();
            document.getElementById("ComporobanteIngresoNumeroHabitacion").value  = "";
            document.getElementById("ComporobanteIngresoValorHabitacion").value  = "";
            document.getElementById("ComporobanteIngresoAbonosHabitacion").value  = "";
            document.getElementById("ComporobanteIngresoDebeHabitacion").value  = "";
            $(".ControlDataToggle").attr("disabled", true);

        }else{
            $("#AbonoEspecificoHabitacion").show();
            $(".ControlDataToggle").attr("disabled", false);
        }
        
        
    });


     /* JOSE CASTELLANOS */
      // Activa Toggle en Movmineto Reserva
      
      $('#AplicarConvenioRegistroIndividual').bootstrapToggle({
        on : 'Si',
        off : 'No'
        });
        $('#GrupoSiNoMovimiento').bootstrapToggle({
              on : 'Si',
              off : 'No'
          });
        $('#ConvenioReservaCorporativo').bootstrapToggle(
          {
              on : 'Si',
              off : 'No'
          });
        $('#Convenio').bootstrapToggle(
          {
              on : 'Si',
              off : 'No'
          });
        $('#ComisionAgencia').bootstrapToggle(
          {
              on : 'Si',
              off : 'No'
          });
        $('#ReservaSiNo').bootstrapToggle(
          {
              on : 'Si',
              off : 'No'
          });
        $('#GrupoSiNoRegistro').bootstrapToggle(
          {
              on : 'Si',
              off : 'No'
          });
        $('#ConvenioRegistro').bootstrapToggle(
          {
              on : 'Si',
              off : 'No'
          });
        $('#Desayuno').bootstrapToggle(
          {
              on : 'Si',
              off : 'No'
          });
        $('#DesayunoRegistro').bootstrapToggle(
          {
              on : 'Si',
              off : 'No'
          });
        $('#SeguroRegistro').bootstrapToggle(
          {
              on : 'Con seguro',
              off : 'Sin seguro'
          });
        $('#SeguroRegistroConReserva').bootstrapToggle(
          {
              on : 'Con seguro',
              off : 'Sin seguro'
          });


    //cargar formulario en registro para contenedor datos reservas
    // para walking
       var parametros = "";
        $.ajax({
                data: parametros,
                url: "../modulos/movimiento/Registro/DatosRegistroWalking.php",
                type: 'post',
                beforeSend: function () {
                        $("#Contenedor1Registros").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#Contenedor1Registros").html(response);
                }
        });
      /*FIN JOSE CASTELLANOS */
    
});
//JOSE CASTELLANOS
//RESERVA
$('#Convenio').change(function() {
    var convenio = document.getElementById("Convenio").checked;
    var TipoCliente = document.getElementById("ClienteTipoReserva").value;
    if(convenio == true && (TipoCliente == "3" || TipoCliente == "2"))
    {
        console.log("yesA");
        //Con relacion
        // var Parametros = {
                        //  "TipoCliente" : TipoCliente
        // }
        // sin Relacion
        $("#ContenedorConvenios").show();
        $('#ContenedorComisionAgencia').show();
        $('#ComisionAgencia').prop('checked', true).change();
        $('#ComisionAgencia').prop('disabled', true);
        $("#ContenedorDatosReserva").hide(); 
        // Con relacion
        // $.ajax({
            // 
            // data : Parametros,
            // type: "post",
            // url: "../modulos/ConvenioSelect.php",
            // success: function (response) {
                //  $("#ConveniosSelect").html(response);
                //  $("#ContenedorDatosReserva").hide(); 
            // }
        // });
    }
    else if(convenio == false)
    {
        $("#ContenedorConvenios").hide();
        $("#ContenedorDatosReserva").show();
        console.log("No");
        // con Relacion
        // $.ajax({
        //     type: "post",
        //     url: "../modulos/ConvenioSelect.php",
        //     data: "data",
        //     success: function (response) {
        //          $("#ClienteNitReserva").html(response);
        //     }
        // });
    }
    
});

// Registro
$('#ReservaSiNo').change(function(){
    var ReservaSiNo = document.getElementById("ReservaSiNo").checked;
    var ruta = "";
    if ( ReservaSiNo == true )
    {  
        $('#ContenedorHab').hide();
        var TipoCliente = $('#ClienteTipoRegistro').val();
        switch(TipoCliente)
        {
            case '1':
                var TipoDocumento = $('#TipoDocumentoClienteParticularRegistro').val();
                var Nit = $('#NitClienteParticularRegistro').val();
                var Parametros = {
                     "TipoCliente":TipoCliente,
                     "TipoDocumento":TipoDocumento,
                     "NumeroDocumento":Nit
                };
            break;
            case '2':
                var Convenio =$('#ConvenioRegistro').prop('checked');
               if(Convenio == true)
               {
                var IdCliente = $('#ConveniosSelectRegistro').val();
                    var Parametros = {
                        "Convenio":Convenio,
                        "TipoDocumento":"NADA",
                        "NumeroDocumento":"NADA",
                        "TipoCliente":TipoCliente,
                        "IdCliente":IdCliente
                    };
               }else{
                var NitCliente = $('#NitClienteCorporativoRegistro').val();
                    var Parametros = {
                        "Convenio":Convenio,
                        "TipoDocumento":"NADA",
                        "NumeroDocumento":"NADA",
                        "TipoCliente":TipoCliente,
                        "NumeroDocumento":NitCliente
                    };
               }
            break;
            case '3':
            var Convenio =$('#ConvenioRegistro').prop('checked');
                if(Convenio == true)
                {
                 var IdCliente = $('#ConveniosSelectRegistro').val();
                     var Parametros = {
                         "Convenio":Convenio,
                         "TipoDocumento":"NADA",
                         "NumeroDocumento":"NADA",
                         "TipoCliente":TipoCliente,
                         "IdCliente":IdCliente
                     };
                }else{
                 var NitCliente = $('#NitClienteAgenciaRegistro').val();
                     var Parametros = {
                         "Convenio":Convenio,
                         "TipoDocumento":"NADA",
                         "NumeroDocumento":"NADA",
                         "TipoCliente":TipoCliente,
                         "NumeroDocumento":NitCliente
                     };
                }
            break;
        }
        ruta = "../modulos/movimiento/Registro/TablaMovimientos.php";
    }
    else
    {
        $('#ContenedorHab').show();
        $('#ContenedorTablaHab').hide();
        $('#ContenedorRegistroHuespedes').hide();
        //console.log("NO");
         ruta = "../modulos/movimiento/Registro/DatosRegistroWalking.php"; 
    }
//     var parametros = "";
     $.ajax({
             data: Parametros,
             url: ruta,
             type: 'post',
             beforeSend: function () {
                     $("#Contenedor1Registros").html("Procesando, espere por favor...");
             },
             success: function (response) {
                     $("#Contenedor1Registros").html(response);
             }
     });
});
$('#ConvenioRegistro').change(function() {
    var convenio = document.getElementById("ConvenioRegistro").checked;
    var TipoCliente = document.getElementById("ClienteTipoRegistro").value;
    if(convenio == true && (TipoCliente == "3" || TipoCliente == "2"))
    {
        console.log("yesA");
        // con relacion
        // var Parametros = {
        //                  "TipoCliente" : TipoCliente
        // }

        // sin relacion
        $("#ContenedorConvenioRegistro").show();
        $('#ContenedorComisionAgencia').show();
        $('#ComisionAgencia').prop('checked', true).change();
        $('#ComisionAgencia').prop('disabled', true);
        $("#ContenedorClienteRegistro").hide(); 
        //con relacion
        // $.ajax({
            // 
            // data : Parametros,
            // type: "post",
            // url: "../modulos/ConvenioSelect.php",
            // success: function (response) {
                //  $("#ConveniosSelectRegistro").html(response);
                //  $("#ContenedorClienteRegistro").hide(); 
            // }
        // });
    }
    else if(convenio == false)
    {
        $("#ContenedorConvenioRegistro").hide();
        $("#ContenedorClienteRegistro").show();
        $("#ContenedorComisionAgencia").hide();
        console.log("No");
        //con relacion
        // $.ajax({
        //     type: "post",
        //     url: "../modulos/ConvenioSelect.php",
        //     data: "data",
        //     success: function (response) {
        //          $("#NitRegistro").html(response);
        //     }
        // });
    }
    
});
$('#Desayuno').change(function (){
  
    var Desayuno = document.getElementById("Desayuno").checked;
    var ValorEstadia = $('#ValorEstadiaHabitacion').val();
 
    if(Desayuno == true)
    {
        $("#ContenedorDesayuno").show();
        $('#SelectDesayuno').change(function(){
            var CadenaDesayuno = $('#SelectDesayuno').val();
            //console.log('este es la cadena deldesayuno :'+CadenaDesayuno);

             IvaDesayuno = localStorage.ivahotelg;
             PorcentajeTarifa = localStorage.PorcentajeTarifa;

            //console.log('Iva del hotel: '+IvaDesayuno);

            // toca seprar el valor del desayuno de su Nombre 
            var InicioValorDesayuno = CadenaDesayuno.indexOf('-');
            var FinValorDesayuno = CadenaDesayuno.length;
            //console.log('Posicion del separador del valor del desayuno :'+InicioValorDesayuno+' fin cadena '+FinValorDesayuno);
            var ValorDesayuno = (CadenaDesayuno).substr(InicioValorDesayuno+1,FinValorDesayuno);
            //console.log('valor desayuno '+ValorDesayuno);

            // Dias que se hospedara en el hotel. Utilizado en ambas fechas
            // el moment se agrega para poder hacer lad iferencia de dias
            // el substrig es porque el mosmen solicita parametros yyyy-mm-12 y se usa para cortar la hora
            // val para traer el valor de la caja de fecha 
             var FechaInicial = moment(($('#MovimientoReservaFechaEntrada').val()).substr(0,10));
             var FechaFinal = moment(($('#MovimientoReservaFechaSalida').val()).substr(0,10));
             var DiferenciaDias = FechaFinal.diff(FechaInicial, 'days');
            //---------------------------------
            // Sacar el valos de la caja de cuantos adultos  y niños se van a hospedar
            var CantidadAdultosOperacion = parseInt($('#CantidadAdultos').val());
            var CantidadNinos = parseInt($('#CantidadNinos').val());
            // Sacamos la Cantidad de Pax que ocuparan la habitacion tanto niños como adultos
            var CantidadTotalPax = CantidadAdultosOperacion+CantidadNinos;

            var ValorDescuentoTarifa =(ValorDesayuno*parseInt(PorcentajeTarifa))/100;
            //console.log("("+ValorDesayuno+"*"+parseInt(PorcentajeTarifa)+")/"+100);
            //console.log("Valor Descuento iva: "+ValorDescuentoTarifa);

            var ValorIvaDesayuno = (ValorDesayuno*parseInt(IvaDesayuno)/100);
            //console.log('ValorIva Desayuno: '+ValorIvaDesayuno);
            var ValorSumaDesayuno = (parseInt(ValorDesayuno)+ValorIvaDesayuno)-ValorDescuentoTarifa;
            //console.log("("+ValorDesayuno+"+"+ValorIvaDesayuno+")"+ValorDescuentoTarifa);
            //console.log("Valor suma desayuno y iva Desayuno: "+ValorSumaDesayuno);
            var ValorTotalDesayuno = (ValorSumaDesayuno*CantidadTotalPax)*DiferenciaDias;
            //console.log('valor total Desayuno: '+ValorTotalDesayuno);

            $('#ValorEstadiaHabitacion').val(ValorTotalDesayuno+parseInt(ValorEstadia));   
            //console.log(ValorTotalDesayuno+"+"+parseInt(ValorEstadia));
        });
    }//
    else
    {
        $('#SelectDesayuno').val("");
        var Id = $('#MovimientoReservaTipoTarifa').val();
        TraerPorfencajeTarifa(Id);
        $("#ContenedorDesayuno").hide();
    }

});

$('#DesayunoRegistro').change(function (){
  
    var Desayuno = document.getElementById("DesayunoRegistro").checked;
    var ValorEstadia = $('#ValorEstadiaHabitacionRegistro').val();
 
    if(Desayuno == true)
    {
        $("#ContenedorDesayunoRegistro").show();
        $('#SelectDesayunoRegistro').change(function(){
            var CadenaDesayuno = $('#SelectDesayunoRegistro').val();
            //console.log('este es la cadena deldesayuno :'+CadenaDesayuno);

             IvaDesayuno = localStorage.ivahotelg;
             PorcentajeTarifa = localStorage.PorcentajeTarifa;

            //console.log('Iva del hotel: '+IvaDesayuno);

            // toca seprar el valor del desayuno de su Nombre 
            var InicioValorDesayuno = CadenaDesayuno.indexOf('-');
            var FinValorDesayuno = CadenaDesayuno.length;
            //console.log('Posicion del separador del valor del desayuno :'+InicioValorDesayuno+' fin cadena '+FinValorDesayuno);
            var ValorDesayuno = (CadenaDesayuno).substr(InicioValorDesayuno+1,FinValorDesayuno);
            //console.log('valor desayuno '+ValorDesayuno);

            // Dias que se hospedara en el hotel. Utilizado en ambas fechas
            // el moment se agrega para poder hacer lad iferencia de dias
            // el substrig es porque el mosmen solicita parametros yyyy-mm-12 y se usa para cortar la hora
            // val para traer el valor de la caja de fecha 
             var FechaInicial = moment(($('#MovimientoRegistroFechaEntrada').val()).substr(0,10));
             var FechaFinal = moment(($('#MovimientoRegistroFechaSalida').val()).substr(0,10));
             var DiferenciaDias = FechaFinal.diff(FechaInicial, 'days');
            //---------------------------------
            // Sacar el valos de la caja de cuantos adultos  y niños se van a hospedar
            var CantidadAdultosOperacion = parseInt($('#CantidadAdultosRegistro').val());
            var CantidadNinos = parseInt($('#CantidadNinosRegistro').val());
            // Sacamos la Cantidad de Pax que ocuparan la habitacion tanto niños como adultos
            var CantidadTotalPax = CantidadAdultosOperacion+CantidadNinos;

            var ValorDescuentoTarifa =(ValorDesayuno*parseInt(PorcentajeTarifa))/100;
            //console.log("("+ValorDesayuno+"*"+parseInt(PorcentajeTarifa)+")/"+100);
            //console.log("Valor Descuento iva: "+ValorDescuentoTarifa);

            var ValorIvaDesayuno = (ValorDesayuno*parseInt(IvaDesayuno)/100);
            //console.log('ValorIva Desayuno: '+ValorIvaDesayuno);
            var ValorSumaDesayuno = (parseInt(ValorDesayuno)+ValorIvaDesayuno)-ValorDescuentoTarifa;
            //console.log("("+ValorDesayuno+"+"+ValorIvaDesayuno+")"+ValorDescuentoTarifa);
            //console.log("Valor suma desayuno y iva Desayuno: "+ValorSumaDesayuno);
            var ValorTotalDesayuno = (ValorSumaDesayuno*CantidadTotalPax)*DiferenciaDias;
            //console.log('valor total Desayuno: '+ValorTotalDesayuno);

            $('#ValorEstadiaHabitacionRegistro').val(ValorTotalDesayuno+parseInt(ValorEstadia));   
            //console.log(ValorTotalDesayuno+"+"+parseInt(ValorEstadia));
        });
    }//
    else
    {
        $('#SelectDesayunoRegistro').val("");
        var Id = $('#MovimientoReservaTipoTarifa').val();
        TraerPorfencajeTarifa(Id);
        $("#ContenedorDesayunoRegistro").hide();
    }

});
//FIN JOSE CASTELLANOS


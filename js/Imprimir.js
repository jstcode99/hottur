function imprSelec(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write(ficha.innerHTML);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
  }



  function imprSelecCotizacion(nombre) {

    var TablaCotizada=$('#Registroproductos');
    var ValorTraidoTotal=$('#TotalCotizado').val();
              $("#TablaEnviada tbody tr").each(function (index) {
                  var campo1, campo2, campo3, camp4, camp5;
                  $(this).children("td").each(function (index2) {
                      switch (index2) {
                          case 0:
                              campo1 ='<td style="width: 10%; text-align: center;border:solid 1px;">'+ $(this).text()+'</td>';
                              break;
                           case 1:
                               campo2 = ' <td style="width: 40%; text-align: left;border:solid 1px;">'+ $(this).text()+'</td>';
                               break;
                           case 2:
                               campo3 = '<td style="width: 10%; text-align: right;border:solid 1px;">'+ $(this).text()+'</td>';
                               break;
                           case 3:
                               campo4 ='<td style="width: 20%; text-align: right;border:solid 1px;">$'+$(this).text()+'</td>'
                               break;
                           case 4:
                               campo5 =  '<td style="width: 20%; text-align: right;border:solid 1px;">$'+$(this).text()+'</td>';
                               break;
                       }
                   })
                   $('#TablaMostrarImpresion').append("<tr>" + campo1 + campo2 + campo3 + campo4 + campo5);
               });

   
    $('#TotalImprimirCotizacion').html(ValorTraidoTotal);
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    ventimp.close();
  }

  function imprFactura(Nombre,Nit,Telefono,Direccion,TablaFactura,ValorSum,ValorIva,ValorSub) {
    $('#TablaMostrarImpresion').html(" ")
    $('#TablaMostrarImpresion').html(TablaFactura);

    $('#FormatoNombre').html(Nombre);
    $('#FormatoNit').html(Nit);
    $('#FormatoTelefono').html(Telefono);
    $('#FormatoDireccion').html(Direccion);
    
    
    $('#FormatoSubtotal').html(MASK(this,ValorSub,'##,###,##0',0));
    $('#FormatoIva').html(MASK(this,ValorIva,'##,###,##0',0));
    $('#FormatoTotal').html(MASK(this,ValorSum,'##,###,##0',0));
    var ficha = document.getElementById("Cabereca");
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    ventimp.close();
    $('#TablaMostrarImpresion').html(" ");
  }
  
  function imprPreCuenta(Div) {
      if($('#ConsultarFolioSelectFolios').val() != "")
      {
        Contenido=document.getElementById(Div);
        $('#TablaMostrarImpresion').html(Contenido.innerHTML);
        Habitacion=$('#FolioNombreHabitacion').html();
        FolioResponsable=$('#FolioResponsable').html();
        $('#DatosFolio').html("<br>Habitacion:"+Habitacion+"<br>Responsable:"+FolioResponsable)
        var ficha = document.getElementById("Cabereca");
        var ventimp = window.open(' ', 'popimpr');
        ventimp.document.write(ficha.innerHTML);
        ventimp.document.close();
        ventimp.print();
        ventimp.close();
      }
    
  }
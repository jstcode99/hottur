
/// PONER LA RUTA DE L ARCHIVO CREADO 
function TraerFormulario(li) {
        
        var ruta = "";
        switch (li) {

                case 100:
                        ruta = "#";
                        ajax(ruta);
                        break;

                case 1:
                        ruta = "../modulos/movimiento/MovimientoTab.php";                        
                        ajax(ruta);
                        break;

                  case 2:
                        ruta = "../modulos/registroindividual/MostrarRack.php";
                        ajax(ruta);
                  break;

                case 3:
                        ruta = "../modulos/cliente/VehiculoTab.php";
                        ajax(ruta);
                        break;

                case 4:
                        ruta = "#";
                        ajax(ruta);
                        break;

                case 5:
                        ruta = "../modulos/registroindividual/RegistroIndividualTab.php";
                        ajax(ruta);
                        break;

                case 6:
                        ruta = "../modulos/cliente/ConvenioTab.php";
                        ajax(ruta);
                        break;

                case 7:
                        ruta = "../modulos/folio/FoliosTap.php";
                        ajax(ruta);
                        break;

                case 8:
                        ruta = "../modulos/parametrizacion/ActualizarMostrarUsuarios.php";
                        ajax(ruta);
                        break;

                case 9:
                        ruta = "../modulos/parametrizacion/ParametrosHotelTab.php";
                        ajax(ruta);
                        break;

                case 10:
                        ruta = "../modulos/parametrizacion/InformacionHotelHabitacionesTab.php";
                        ajax(ruta);
                        break;

                case 11:
                        ruta = "../modulos/inventario/ProductosTab.php";
                        ajax(ruta);
                        break;

                case 12:
                        ruta = "../modulos/inventario/BienesTab.php";
                        ajax(ruta);
                        break;

                case 13:
                        ruta = "../modulos/inventario/ProveedoresTab.php";
                        ajax(ruta);
                        break;

                case 14:
                        ruta = "../modulos/inventario/ServiciosTab.php";
                        ajax(ruta);
                        break;


                case 15:
                        ruta = "../modulos/facturacion/RegistrarFactura.php";
                        ajax(ruta);
                        break;

                case 16:
                        ruta = "../modulos/facturacion/CotizacionTap.php";
                        ajax(ruta);
                        break;

                case 17:
                        ruta = "../modulos/facturacion/AbonosDepositosTab.php";
                        ajax(ruta);
                        
                        break;

                case 18:
                        ruta = "../modulos/facturacion/DevolucionesTab.php";
                        ajax(ruta);
                        break;

                case 19:
                        ruta = "../modulos/facturacion/TransferenciasTab.php";
                        ajax(ruta);
                        break;

                case 20:
                        ruta = "../modulos/facturacion/CajaTap.php";
                        ajax(ruta);
                        break;
                case 21:
                        ruta = "#";
                        ajax(ruta);
                        break;
                case 22:
                        ruta = "../modulos/facturacion/ConsumosTap.php";                        
                        ajax(ruta);
                        break;
                case 23:
                        
                        $.ajax({
                                type: "POST",
                                url: "../modulos/facturacion/funciones.php",
                                data: {"NombreProceso": "LecturaFecha"},
                                success: function (response) {
                                        if(response.trim() == "ACTUALIZO" ){
                                            
                                        }else{
                                            
                                        }
                                }
                            });
        
                                break;
                                
                default:
                        alert("Hubo un error...");

                        ruta = "#";
                        ajax(ruta);
                        break;

        }







}
function ajax(ruta) {

        if(ruta=="#")
        {
                ruta="../modulos/404.php"
        }
        var parametros = "";
        $.ajax({
                data: parametros,
                url: ruta,
                type: 'post',
                beforeSend: function () {
                        $("#Forms").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#Forms").html(response);
                }
        });


}
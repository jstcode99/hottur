<!-- <div class="container"> -->
<script src="../js/ActivarToggle.js"></script>

    <div class="row">
        

         <div class="col-sm-5">
            <div class="panel ">
                <div class="panel-body">
                    <form class="form-horizontal">

                        <legend> &nbsp;&nbsp;&nbsp;&nbsp; Recibo de Caja</legend>


                            <div class="form-group form-inline">
                                <label for="ComprobanteIngresoNitCliente" class="col-sm-3 control-label">Cedula</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ComprobanteIngresoNitCliente" id="ComprobanteIngresoNitCliente" class="form-control" placeholder="Nit Cliente">
                                    <button class="btn btn-primary" type="button" onclick="ConsultarClienteComprobanteNit();"   > Consulta Cliente </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ComporobanteIngresoNombreCliente" class="col-sm-3 control-label">Nombre Cliente </label>
                                <div class="col-sm-9">
                                    <input type="text"  name="ComporobanteIngresoNombreCliente" id="ComporobanteIngresoNombreCliente" class="form-control" placeholder="Nombre Cliente" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="ComporobanteIngresoTipoCliente" class="col-sm-3 control-label">Tipo Cliente </label>
                                <div class="col-sm-9">
                                    <input type="text"  name="ComporobanteIngresoTipoCliente" id="ComporobanteIngresoTipoCliente" class="form-control" placeholder="Tipo: Personal, Empresa, Agencia" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="ComporobanteIngresoTipoCliente" class="col-sm-3 control-label">Convenio </label>
                                <div class="col-sm-9">
                                <input type="checkbox" id="CheckConvenio"  data-width="270px" disabled >
                                </div>
                            </div>
                            
                            <div class="form-group" id="MostrarConvenios">
                                <label for="ComporobanteNombreConvenio" class="col-sm-3 control-label">Nombre Convenio </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteNombreConvenio" id="ComporobanteNombreConvenio" class="form-control" placeholder="Codigo | Nombre Convenio" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group" >
                                <label for="ComporobanteIngresoReserva" class="col-sm-3 control-label">Numero de Reserva </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoReserva" id="ComporobanteIngresoReserva" class="form-control" placeholder="Numero reserva" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group" >
                                <label for="ComporobanteIngresoValorTotal" class="col-sm-3 control-label">Valor Total Costo </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoValorTotal" id="ComporobanteIngresoValorTotal" class="form-control" placeholder="Valor Abono" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group" >
                                <label for="ComporobanteIngresoAbono" class="col-sm-3 control-label">Valor Abono Total </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoAbono" id="ComporobanteIngresoAbono" class="form-control" placeholder="Valor Total" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group" >
                                <label for="ComporobanteIngresoAbonoHabitaciones" class="col-sm-3 control-label">Valor Abonos en Habitaciones </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoAbonoHabitaciones" id="ComporobanteIngresoAbonoHabitaciones" class="form-control" placeholder="Valor Abonos en Habitaciones" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group" >
                                <label for="ComporobanteIngresoAbonoGeneral" class="col-sm-3 control-label">Valor Abonos en General </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoAbonoGeneral" id="ComporobanteIngresoAbonoGeneral" class="form-control" placeholder="Valor Abonos en General" disabled>
                                </div>
                            </div>

                            <div class="form-group" >
                                <label for="ComporobanteIngresoFaltaPagar" class="col-sm-3 control-label">Falta Pagar </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoFaltaPagar" id="ComporobanteIngresoFaltaPagar" class="form-control" placeholder="Falta Pagar" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ComporobanteIngresoTipoCliente" class="col-sm-3 control-label"> Tipo de Abono </label>
                                <div class="col-sm-9">
                                <input type="checkbox" id="CheckTipoAbono"  data-width="270px"  >
                                </div>
                            </div>

                        <div id="AbonoEspecificoHabitacion">

                            <div class="form-group" >
                                <label for="ComporobanteIngresoNumeroHabitacion" class="col-sm-3 control-label">Numero Habitación </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoNumeroHabitacion" id="ComporobanteIngresoNumeroHabitacion" class="form-control" placeholder="Numero Habitación" disabled >
                                </div>
                            </div>

                            <div class="form-group" >
                                <label for="ComporobanteIngresoValorHabitacion" class="col-sm-3 control-label">Valor Habitación </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoValorHabitacion" id="ComporobanteIngresoValorHabitacion" class="form-control" placeholder="Valor Habitación" disabled >
                                </div>
                            </div>
                        
                            <div class="form-group" >
                                <label for="ComporobanteIngresoAbonosHabitacion" class="col-sm-3 control-label"> Valor Abonos Habitación Realizados </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoAbonosHabitacion" id="ComporobanteIngresoAbonosHabitacion" class="form-control" placeholder="Valor Abonos Habitación Realizados" disabled >
                                </div>
                            </div>

                            <div class="form-group" >
                                <label for="ComporobanteIngresoDebeHabitacion" class="col-sm-3 control-label"> Debe por Habitación </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoDebeHabitacion" id="ComporobanteIngresoDebeHabitacion" class="form-control" placeholder="Debe por Habitación" disabled >
                                </div>
                            </div>
                         </div>

                            
                            <div class="form-group">
                                <label for="ComporobanteIngresoFormaPago" class="col-sm-3 control-label">Forma de Pago </label>
                                <div class="col-sm-9">
                                    <select name="ComporobanteIngresoFormaPago" id="ComporobanteIngresoFormaPago" class="form-control">
                                                      <option value="EFECTIVO">EFECTIVO</option>
                                                      <option value="TARJETACREDITO">TARJETA CREDITO</option>
                                                      <option value="TARJETADEBITO">TARJETA DEBITO</option>
                                                      <option value="CHEQUE">CHEQUE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" >
                                <label for="ComporobanteIngresoValor" class="col-sm-3 control-label">Valor </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteIngresoValor" id="ComporobanteIngresoValor" class="form-control" placeholder="Valor Comprobante Ingreso" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ComporobanteIngresoConcepto1" class="col-sm-3 control-label">Concepto </label>
                                <div class="col-sm-9">
                                    <textarea name=""  class="form-control" id="ComporobanteIngresoConcepto" cols="30" rows="5" placeholder="Concepto"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-9">

                            </div>
                            <button type="button" onclick="ComporobanteIngresoRegistrar();" class="btn btn-success btn-md" > Guardar </button>
             
                            <span id="Resultado">

                            </span>
                        </div>
                                                                                                                                                                                                                 
                    </form>
                </div>
            </div>
        </div>

    <div id="CargaTablaMovimientos" class="col-sm-7">
        <?php
          //  include('ComprobanteIngresoListarDatos.php');
        ?>
    </div>
    <div id="CargaTablaMovimientosHabitacion" class="col-sm-7">
        <?php
           /* include('ComprobanteIngresoMovimientosHabitaciones.php');  */
        ?>
    </div>


    </div>
<div class="modal fade LlamadoModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="CerroModalImprimir1" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Imprimir Recibo de Caja</h4>
        </div>
        <?php 
        include('../conexion.php');
        $ConsultaEmpresa = "SELECT * FROM `datosempresa` order by IdDatosEmpresa ASC";
        $resultado = $conexion->query($ConsultaEmpresa);
        $filas = $resultado->fetch_array();
        
        $ConsultaCantidadComprobante = "SELECT IdIngresoComprobante FROM `ingresocomprobante` ORDER BY IdIngresoComprobante DESC LIMIT 1";
        $resultado2 = $conexion->query($ConsultaCantidadComprobante);
        // echo $resultado2;
        $valorIngresoComprobante = $resultado2->fetch_array();
        

      ?>
            <div class="modal-body" id="AreaImprimirComprobanteIngreso">
                    <?php 
                        include('ReciboCaja.php');
                    
                    ?>
            </div>
        <div class="modal-footer">
            <a type="button" href="javascript:imprSelec('AreaImprimirComprobanteIngreso')"  class="btn btn-primary">Imprimir</a>
            <!-- <a type="button" href="javascript:HTMLtoPDF('AreaImprimirComprobanteIngreso')"  class="btn btn-primary">Generar PDF</a> -->
            <button type="button" class="btn btn-default" id="CerroModalImprimir"  >Cerrar</button>
        </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
        $("#CerroModalImprimir").click(function() {
            $('.LlamadoModal').modal('hide');
            /* $('body').removeClass('modal-open'); */
            $('.modal-backdrop').remove();
                        /* TraerFormulario(17); */
                        var ruta = "../modulos/facturacion/AbonosDepositosTab.php";
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
                        $(".modal-open").css("overflow", "auto");
            
      });


        $("#CerroModalImprimir1").click(function() {
            $('.LlamadoModal').modal('hide');
            /* $('body').removeClass('modal-open'); */
            $('.modal-backdrop').remove();
                        /* TraerFormulario(17); */
                        var ruta = "../modulos/facturacion/AbonosDepositosTab.php";
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
                        $(".modal-open").css("overflow", "auto");
            
      });

});
</script>
<!-- <div class="container"> -->
<script src="../js/ActivarToggle.js"></script>

    <div class="row">
        

         <div class="col-sm-5">
            <div class="panel ">
                <div class="panel-body">
                    <form class="form-horizontal">

                        <legend> &nbsp;&nbsp;&nbsp;&nbsp; Comprobante de Egreso</legend>


                            <div class="form-group form-inline">
                                <label for="ComprobanteEgresoNitCliente"  class="col-sm-3 control-label">Nit Cliente</label>
                                <div class="col-sm-9">
                                    <input type="text" disabled name="ComprobanteEgresoNitCliente" id="ComprobanteEgresoNitCliente" class="form-control" placeholder="Nit Cliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ComporobanteEgresoNombreCliente" class="col-sm-3 control-label">Nombre Cliente </label>
                                <div class="col-sm-9">
                                    <input type="text"  name="ComporobanteEgresoNombreCliente" id="ComporobanteEgresoNombreCliente" class="form-control" placeholder="Nombre Cliente" disabled>
                                </div>
                            </div>
                            

                            <div class="form-group" >
                                <label for="ComporobanteEgresoValor" class="col-sm-3 control-label">Valor Comprobante </label>
                                <div class="col-sm-9" >
                                    <input type="text"  name="ComporobanteEgresoValor" id="ComporobanteEgresoValor" class="form-control" placeholder="Valor Comprobante Egreso" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ComporobanteEgresoConcepto1" class="col-sm-3 control-label">Concepto </label>
                                <div class="col-sm-9">
                                    <textarea name=""  class="form-control" id="ComporobanteEgresoConcepto" cols="30" rows="5" placeholder="Concepto"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-9">

                            </div>
                            <button type="button" onclick="ComporobanteEgresoRegistrar();" class="btn btn-success btn-md" > Guardar </button>
             
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Imprimir Recibo de Caja</h4>
        </div>
        <?php 
        include('../conexion.php');
        $ConsultaEmpresa = "SELECT * FROM `datosempresa` order by IdDatosEmpresa ASC";
        $resultado = $conexion->query($ConsultaEmpresa);
        $filas = $resultado->fetch_array();
        
        $ConsultaCantidadComprobante = "SELECT IdIngresoComprobante FROM `ingresocomprobante` ORDER BY IdIngresoComprobante DESC LIMIT 1";
        $resultado2 = $conexion->query($ConsultaCantidadComprobante);
        $valorIngresoComprobante = $resultado2->fetch_array();
        

      ?>
            <div class="modal-body" id="AreaImprimirComprobanteIngreso">
                    <?php 
                        include('ReciboCaja.php');
                    
                    ?>
            </div>
        <div class="modal-footer">
            <a type="button" href="javascript:imprSelec('AreaImprimirComprobanteIngreso')"  class="btn btn-primary">Imprimir</a>
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
});
</script>
<script>
TraerFolios();
</script>
            <div class="panel panel-default" id="PrecuentaDiv">
                
                <!-- Default panel contents -->
                    <div class="panel-heading" id="DatosdelFolio">
                        <form class="form-inline">                                                                             
                                <div class="form-group">
                                    <label for="">Listado de Habiciones:</label>
                                    <select name="" id="ConsultarFolioSelectFolios" class="form-control" onchange="TraerCompendioFolio();">
                                        <option value="">Selecione una habitaciòn</option>
                                    </select>
                                </div>                              
                        </form>
                        Habitación:<a class="text-primary" id="FolioNombreHabitacion">000</a>
                        <br>
                        Fecha de creación:<a class="text-primary" id="FolioFechaCreacion">yyyy-mm-dd hh-mm-s</a>
                        <br>
                        Responsable:<a class="text-primary" id="FolioResponsable">NN</a>
                        <br>  
                        <br>
                        <button id="AplicaraProductos" type="button" class="btn btn-primary" onclick="imprPreCuenta('ListaConsumos');">Generar Pre - Cuenta </button>                                      
                        <br>
                    </div>
                        <div class="panel-body" id="PreCuenta">
                            <div class="table-responsive" style="padding:40px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Codigo</th>
                                            <th>Concepto</th>
                                            <th>Cantidad</th>
                                            <th>Impuesto / Iva</th>                                                         
                                            <th>Valor total</th>
                                            <th>  <i class="glyphicon glyphicon-share-alt"></i></th>      
                                                                      
                                        </tr>
                                    </thead>
                                    <tbody id="ListaConsumos">
                                    </tbody>
                                </table>
                            </div>
                        </div> 
            </div>   


            <div class="modal fade bs-example-modal-folio" tabindex="-1" role="dialog" id="TrasladoForm">
    <div class="modal-dialog modal-folio" role="document">
        <div class="modal-content">
            <div style="padding:40px;">
                <form>    
                        Codigo:<a class="text-primary" id="CodigoConsumo">000</a>
                        <br>
                        Nombre:<a class="text-primary" id="NombreConsumo">NN</a>
                        <br>
                        Valor:<a class="text-primary" id="ValorConsumo">00</a>
                        <br>                                                       
                    <div class="form-group">
                    <label for="">Habitacion</label>
                    <select id="SelectIdFolioTraslado" class="form-control">
                        <option value="">Habitacion</option>
                        <?php
                                                    require_once ('../conexion.php');
                                                    $ComandoSql="SELECT habitacion.IdHabitacion,habitacion.NombreHabitacion,folio.IdFolio from movimientohabitacion,habitacion,folio WHERE folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and movimientohabitacion.IdHabitacion=habitacion.IdHabitacion and movimientohabitacion.EstadoMovimientoHabitacion='ACTIVO'";
                                                    $resultado = $conexion->query($ComandoSql);
                                                
                                                    while($fila=$resultado->fetch_array())
                                                    {
                                                        echo '<option value="'.$fila['IdFolio'].'">'.$fila['NombreHabitacion'].'</option>';
                                                    } 
                                                    ?>
                    </select>   
                    <br>                                 
                    <button type="button" id="AgregarProductosLista" onclick="TraladarConsumos();" class="btn btn-primary">Trasladar</button>
                </form>
            </div>
	    </div>
    </div>
</div>
<?php
include 'ImpresionPreCuenta.php';
?>    


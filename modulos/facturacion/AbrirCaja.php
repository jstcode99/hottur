<script>
EstadoActualCaja();
</script>
<div class="row" style="padding:20px;">      
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel panel-header">                                            
                            <h4 class="text-center">Fecha actual: <a id="FechaActualMostrar">0000-00-00</a></h4>             
                    </div>
                    <div class="panel panel-body">  
                        <div class="form-group">   
                            <div class="col-sm-3">
                                <label for="AbrirCajaValorBase">Base</label>                   
                                <a id="AbrirCajaValorBase">$0'000.000</a>                   
                            </div>
                            <div class="col-sm-3">
                                <label for="AbrirCajaValorActual">Dinero en caja:</label>                   
                                <a id="AbrirCajaValorActual">$0'000.000</a>                   
                            </div>
                            <div class="col-sm-3">
                                <label for="AbrirCajaObservacionesBase">Observaciones</label>
                                <a id="AbrirCajaObservacionesBase">Observaciones......</a>
                            </div>             
                            <div class="col-sm-3">
                                <label for="AbrirCajaOFecha">Fecha de apertura</label>
                                <a id="AbrirCajaFecha">00-00-00</a>
                            </div>      
                            <div class="col-sm-3">
                                <label for="AbrirCajaHoraApertura">Hora de apertura</label>
                                <a id="AbrirCajaHoraApertura">00:00 am</a>
                            </div>  
                            <div class="col-sm-3">
                                <label for="AbrirCajaHoraCierre">Hora de cierre</label>
                                <a id="AbrirCajaHoraCierre">00:00 pm</a>
                            </div>  
                            
                        </div> 
                        <div class="form-group">   
                            <div class="col-sm-3">
                                <button type="buttom" class="btn btn-danger"  onclick="RegistarCerradoCaja();">cerrar caja</button>       
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel panel-header">
                        <h4 class="text-center"><a>Registrar apertura de caja</a></h4>                                
                    </div>    
                    <div class="panel panel-body">
                        <div class="form-group">   
                            <div class="col-sm-3">
                                <label for="AbrirIngresarCajaValorBase">Base</label>
                                <input type="text" class="form-control" id="IngresarAbrirCajaValorBase" placeholder="$1'314.545"  onkeypress="return ValidarSoloNumeros(event);">
                            </div>
                            <div class="col-sm-3">
                                <label for="AbrirIngresarCajaObservacionesBase">Observaciones</label>
                                <input type="text" class="form-control" id="IngresarAbrirCajaObservaciones" placeholder="Observaciones...">
                            </div>             
                            <div class="col-sm-3">    
                            <br>                
                                <button type="buttom"  onclick="RegistarAberturaCaja();"class="btn btn-primary">Abrir caja</button>                                        
                            </div>
                        </div>            
                    </div> 
                </div> 
            </div>

            <div class="col-md-12">
                <div class="panel panel-default"> 
                    <div class="panel panel-body">         
                        <h2>Total facturaciòn por fecha</h2>    
                        <div class="bs-example" data-example-id="simple-responsive-table">                              
                            <div class="table-responsive">
                                <table class="table table-bordered" id="Tabla1">
                                    <br>
                                    <thead>
                                        <tr> 
                                            <th>#</th>                                                                                                
                                            <th>Base</th>
                                            <th>Total caja</th>                                        
                                            <th>Fecha</th>
                                            <th>hora cierre</th>
                                            <th>Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ResultadoTabla">
                                        <?php
                                            require_once ('../../modulos/conexion.php');
                                            $ComandoSql="SELECT * FROM `historialcaja`";
                                            if($Resultado=$conexion->query($ComandoSql))
                                            {
                                            /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                                            /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                                            while($fila= $Resultado->fetch_array())
                                                {
                                                echo '<tr>';
                                                echo '<td >'.mb_convert_encoding($fila['IdHistorialCaja'], "UTF-8").'</td>';
                                                echo '<td>'.mb_convert_encoding($fila['ValorBaseCaja'], "UTF-8").'</td>';
                                                echo '<td>'.mb_convert_encoding($fila['ValorActualHistorialCaja'], "UTF-8").'</td>';
                                                echo '<td>'.mb_convert_encoding($fila['FechaHistorialCaja'], "UTF-8").'</td>';
                                                echo '<td>'.mb_convert_encoding($fila['HoraHistorialCaja'], "UTF-8").'</td>';                                            
                                                echo '<td>'.mb_convert_encoding($fila['ObservacionesHistorialCaja'], "UTF-8").'</td>';                                            
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <br>
                                <br>         
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-2"> 
            </div> 
            <div class="col-md-8">
                    <div class="panel panel-default" > 
                        <div class="panel panel-body"> 
                            <h2>Movimientos en caja</h2>            
                            <div class="bs-example" data-example-id="simple-responsive-table" >                              
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="Tabla" >
                                        <br>
                                        <thead>
                                            <tr> 
                                            <th>#</th>                
                                            <th>Fecha</th>
                                            <th>Codigo</th>
                                            <th>Concepto</th>                        
                                            <th>Valor</th>
                                            </tr>
                                        </thead>                
                                        <tbody>
                                        <?php
                                                require_once ('../../modulos/conexion.php');
                                            $ComandoSqlMovimientos="SELECT `FechaComprobanteEgreso` as 'Fecha',`IdComprobanteEgreso` as 'Codigo',`ConceptoComprobanteEgreso` as 'Concepto',`ValorComprobanteEgreso`  as 'Valor' FROM `comprobanteegreso` 
                                            UNION SELECT ingresocomprobante.FechaIngresoComprobante as 'Fecha',ingresocomprobante.IdIngresoComprobante as 'Codigo',ingresocomprobante.ConceptoIngresoComprobante as 'Concepto',ingresocomprobante.ValorIngresoComprobante as 'Valor' FROM ingresocomprobante 
                                            UNION SELECT facturaexterna.FechaFacturaExterna as 'Fecha',facturaexterna.IdFacturaExterna as 'Codigo',CONCAT('Folios facturados:' ,facturaexterna.IdFolios) as 'Concepto',facturaexterna.ValorTotalFacturaExterna as 'Valor' from facturaexterna;";                                                     
                                                $Resultado=$conexion->query($ComandoSqlMovimientos);
                                                $i=0;
                                            while($fila= $Resultado->fetch_array())
                                            {
                                                $i++;
                                                    echo '<tr>';
                                                    echo '<td>'.$i.'</td>';
                                                    echo '<td>'.mb_convert_encoding($fila[0], "UTF-8").'</td>';
                                                    echo '<td>'.mb_convert_encoding($fila[1], "UTF-8").'</td>';
                                                    echo '<td>'.mb_convert_encoding($fila[2], "UTF-8").'</td>';
                                                    echo '<td>'.mb_convert_encoding($fila[3], "UTF-8").'</td>';
                                            }                                                                                                                         
                                        ?>                                                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"> 
                    </div> 
            </div>  
            <br><br><br><br> 
</div>
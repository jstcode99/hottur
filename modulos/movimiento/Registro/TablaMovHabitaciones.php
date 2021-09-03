<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoMovimientoHabitacion">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Listado Habitaciones
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla2">
                    <thead>
                        <tr>
                            <th>Habitación</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Salida</th>
                            <th>Cantidad Adultos</th>
                            <th>Cantidad Niños</th>
                            <th>Observaciones</th>
                            <th>Huespedes</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoTablaMovimientoHabitaciones">
                    <?php
                    require_once('../../conexion.php');

                    $IdMovimiento = $_POST['IdMovimiento'];
                    //echo $TipoCliente;

                        $ComandoSql= "SELECT  h.NombreHabitacion,m.* FROM movimientohabitacion m,habitacion h WHERE m.IdMovimiento = ".$IdMovimiento." AND m.IdHabitacion = h.IdHabitacion AND m.EstadoMovimientoHabitacion = 'ACTIVO' AND m.TipoMovimientoHabitacion LIKE '%RESERVA%';";
                        
                    //$nit = $_POST['nit'];
                    
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                    { 
                        
                        $NombreCompleto='"'.$fila["NombreResponsableMovimientoHabitacion"]."  ".$fila["ApellidoResponsableMovimientoHabitacion"].'"';
                        $TipoMovimientoHabitacion = '"'.$fila[10].'"';
                        echo '<tr>';
                        echo '<td>'.$fila['NombreHabitacion'].'</td>';
                        echo '<td>'.$fila['FechaEntradaMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['FechaSalidaMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['CantidadAdultosMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['CantidadNinosMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['ObservacionesMovimientoHabitacion'].'</td>';
                        
                        echo '<td>'."<button id='ConsultarHabitacion' onclick='CargarFormularioHuespedes(".$fila[1].",
                                                                                                         ".$fila[0].",
                                                                                                         ".$fila[7].",
                                                                                                         ".$fila[8].",
                                                                                                         ".$TipoMovimientoHabitacion.",
                                                                                                         ".$fila[11].",
                                                                                                         ".$NombreCompleto.");' class='btn btn-primary' type='button'>Ingresar</button>".'</td>';
                    } 
                   echo '</tr>';
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
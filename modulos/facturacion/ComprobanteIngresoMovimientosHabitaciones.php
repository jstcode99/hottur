<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDatosHabitacion">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Listado de Movimientos en Habitaciones
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla1">
                    <thead>
                        <tr>
                            <th>Habitación y Tipo Habitación</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Salida</th>
                            <th># Niños</th>
                            <th># Adultos</th>
                            <th>Valor Habitación</th>
                            <th>Cargar</th> 
                        </tr>
                    </thead>
                    <tbody id="ResultadoTabla">
                    <?php
                    require_once('../../modulos/conexion.php');
                    $CodigoHabitacion = $_POST['CodHabitacion'];
                    /* $CodigoHabitacion = '32'; */
                    $ComandoSql= "SELECT habitacion.NombreHabitacion, habitaciontipo.NombreHabitacionTipo, movimientohabitacion.FechaEntradaMovimientoHabitacion ,movimientohabitacion.FechaSalidaMovimientoHabitacion, movimientohabitacion.CantidadNinosMovimientoHabitacion, movimientohabitacion.CantidadAdultosMovimientoHabitacion , habitaciontipo.ValorPaxHabitacionTipo from movimientohabitacion,movimiento,habitacion, habitaciontipo WHERE movimientohabitacion.IdMovimiento=movimiento.IdMovimiento and movimiento.IdMovimiento='".$CodigoHabitacion."' and movimientohabitacion.EstadoMovimientoHabitacion='ACTIVO' AND habitacion.IdHabitacioN=movimientohabitacion.IdHabitacion and habitacion.IdHabitacionTipo = habitaciontipo.IdHabitacionTipo";
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                    { 
                        echo '<tr>';
                        echo '<td>'.$fila['NombreHabitacion']. "   ". $fila['NombreHabitacionTipo']  .'</td>';
                        echo '<td>'.$fila['FechaEntradaMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['FechaSalidaMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['CantidadNinosMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['CantidadAdultosMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['ValorPaxHabitacionTipo'].'</td>';
                        echo '<td>'."<button id='ConsultarHabitacion' onclick='CargaDatosAbono(".$fila['NombreHabitacion'].");' class='btn btn-primary ControlDataToggle' type='button' > <i class='glyphicon glyphicon-search'></i></button>".'</td>';
                        echo '</tr>';
                    } 
                  
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
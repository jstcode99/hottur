<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDatosPasadia"> 
    <div class="col-sm-11">
        <h2 class="page-header">
        Actualizar datos
        </h2>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla3">
                <br>
                <br>
                <br>
                    <thead>
                        <tr>
                            <th>Habtación</th>
                            <th>Nit</th>
                            <th>Estado Movimiento</th>
                            <th>Nombre</th>
                            <th>Tipo Movimiento</th>
                            <th>Responsable</th>
                            <th>Nit Responsable</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Salida</th>
                            <th>No Show</th>
                            <th>Activo</th>
                            <th>Cancelado</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoTabla">
                    <?php
                    require_once('../../modulos/conexion.php');
                    $FechaMovimientoEspecifico = $_POST['FechaMovimientoEspecifico'];
                    $ComandoSql = "SELECT h.NombreHabitacion, m.EstadoMovimiento ,c.NitCliente, c.NombreCliente, m.TipoMovimiento, mh.NombreResponsableMovimientoHabitacion, mh.NitResponsableMovimientoHabitacion, m.FechaEntradaMovimiento, m.FechaSalidaMovimiento, m.IdMovimiento, mh.IdMovimientoHabitacion FROM movimiento m, movimientohabitacion mh, habitacion h, cliente c WHERE (m.EstadoMovimiento = 'ACTIVO' OR m.EstadoMovimiento = 'NO SHOW' OR m.EstadoMovimiento = 'CANCELADO') AND m.IdMovimiento = mh.IdMovimiento AND (mh.EstadoMovimientoHabitacion = 'ACTIVO' OR mh.EstadoMovimientoHabitacion = 'NO SHOW' OR mh.EstadoMovimientoHabitacion = 'CANCELADO') AND m.FechaEntradaMovimiento > '".$FechaMovimientoEspecifico."' AND mh.IdHabitacion = h.IdHabitacion and m.IdCliente = c.IdCliente";
                    //$ComandoSql = "SELECT h.NombreHabitacion, m.EstadoMovimiento ,c.NitCliente, c.NombreCliente, m.TipoMovimiento, mh.NombreResponsableMovimientoHabitacion, mh.NitResponsableMovimientoHabitacion, m.FechaEntradaMovimiento, m.FechaSalidaMovimiento, m.IdMovimiento, mh.IdMovimientoHabitacion FROM movimiento m, movimientohabitacion mh, habitacion h, cliente c WHERE (m.EstadoMovimiento = 'ACTIVO' OR m.EstadoMovimiento = 'NO SHOW' OR m.EstadoMovimiento = 'CANCELADO') AND m.TipoMovimiento = 'CHECK IN' AND m.IdMovimiento = mh.IdMovimiento AND (mh.EstadoMovimientoHabitacion = 'ACTIVO' OR mh.EstadoMovimientoHabitacion = 'NO SHOW' OR mh.EstadoMovimientoHabitacion = 'CANCELADO') AND mh.TipoMovimientoHabitacion = 'CHECK IN' AND m.FechaEntradaMovimiento > '".$FechaMovimientoEspecifico."' AND mh.IdHabitacion = h.IdHabitacion and m.IdCliente = c.IdCliente";
                    /* echo $ComandoSql; */
                    if ($Resultado = $conexion->query($ComandoSql)) {
                    /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE"; */
                    /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while ($fila = $Resultado->fetch_array()) {
                            echo '<tr>';
                            echo '<td >' . mb_convert_encoding($fila['NombreHabitacion'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['NitCliente'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['EstadoMovimiento'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['NombreCliente'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['TipoMovimiento'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['NombreResponsableMovimientoHabitacion'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['NitResponsableMovimientoHabitacion'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['FechaEntradaMovimiento'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['FechaSalidaMovimiento'], "UTF-8") . '</td>';
                            echo "<td><button id='ActualizarMovimientoEspecifico' class='btn btn-info' onclick='ActualizarMovimientoEspecifico(".json_encode(array("IdMovimientoHabitacion"=> $fila['IdMovimientoHabitacion'] , "IdMovimiento"=> $fila['IdMovimiento'] ,"ESTADO" => "NO SHOW")).");' >NO SHOW</button></td>";
                            echo "<td><button id='ActualizarMovimientoEspecifico' class='btn btn-success' onclick='ActualizarMovimientoEspecifico(".json_encode(array("IdMovimientoHabitacion"=> $fila['IdMovimientoHabitacion'] , "IdMovimiento"=> $fila['IdMovimiento'] ,"ESTADO" => "ACTIVO")).");' >ACTIVO</button></td>";
                            echo "<td><button id='ActualizarMovimientoEspecifico' class='btn btn-danger' onclick='ActualizarMovimientoEspecifico(".json_encode(array("IdMovimientoHabitacion"=> $fila['IdMovimientoHabitacion'] , "IdMovimiento"=> $fila['IdMovimiento'] ,"ESTADO" => "CANCELADO")).");' >CANCELADO</button></td>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
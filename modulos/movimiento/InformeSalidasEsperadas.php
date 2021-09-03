<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoSalidasEsperadas">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Salidas Esperadas
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla3">
                    <thead>
                        <tr>
                            <th>Habitacion</th>
                            <th>Estado</th>
                            <th>Fecha Salida</th>
                            <th>Cantidad Huespedes</th>
                            <th>Nit Responsable</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoSalidasEsperadas">
                    <?php
                    require_once('../conexion.php');

                        //$ComandoSql= "SELECT h.NombreHabitacion,mh.TipoMovimientoHabitacion,m.FechaSalidaMovimiento,SUM(hd.TipoHuesped) AS CantidadHuespedes, mh.NitResponsableMovimientoHabitacion,CONCAT(mh.NombreResponsableMovimientoHabitacion,' ',mh.ApellidoResponsableMovimientoHabitacion) AS NombreCompleto FROM movimiento m,movimientohabitacion mh,habitacion h, huesped hd WHERE (mh.TipoMovimientoHabitacion = 'CHECK OUT' OR mh.TipoMovimientoHabitacion = 'CHECK IN') AND mh.IdHabitacion = h.IdHabitacion AND mh.FechaSalidaMovimientoHabitacion BETWEEN (select DATE_ADD(NOW(),INTERVAL -1 DAY)) AND (SELECT NOW()) GROUP BY h.NombreHabitacion";
                        $ComandoSql = "SELECT h.NombreHabitacion,mh.TipoMovimientoHabitacion,m.FechaSalidaMovimiento, m.IdMovimiento ,COUNT(hd.TipoHuesped) AS CantidadHuespedes, mh.NitResponsableMovimientoHabitacion,CONCAT(mh.NombreResponsableMovimientoHabitacion,' ',mh.ApellidoResponsableMovimientoHabitacion) AS NombreCompleto FROM movimiento m,movimientohabitacion mh,habitacion h, huesped hd WHERE m.IdMovimiento = mh.IdMovimiento AND (mh.TipoMovimientoHabitacion = 'CHECK OUT' OR mh.TipoMovimientoHabitacion = 'CHECK IN') AND mh.IdHabitacion = h.IdHabitacion AND mh.FechaSalidaMovimientoHabitacion BETWEEN (select DATE_ADD(NOW(),INTERVAL -1 DAY)) AND (select DATE_ADD(NOW(),INTERVAL 1 DAY)) AND hd.IdMovimientoHabitacion = mh.IdMovimientoHabitacion GROUP BY h.NombreHabitacion";
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                    { 
                        echo '<tr>';
                        echo '<td>'.$fila['NombreHabitacion'].'</td>';
                        if($fila['TipoMovimientoHabitacion']  == 'CHECK IN')
                        {
                            echo '<td>OCUPADA</td>';
                        }
                        else
                        {
                            echo '<td>CHECK OUT</td>';
                        }
                        echo '<td>'.$fila['FechaSalidaMovimiento'].'</td>';
                        echo '<td>'.$fila['CantidadHuespedes'].'</td>';
                        echo '<td>'.$fila['NitResponsableMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['NombreCompleto'].'</td>';
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
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoHabitacionesSucias">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
          Habitaciones Sucias
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla1">
                    <thead>
                        <tr>
                            <th>Habitacion</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoTablaMovimientoRegistro">
                    <?php
                    require_once('../conexion.php');

                    //$ComandoSql= "SELECT h.NombreHabitacion,mh.TipoMovimientoHabitacion FROM movimientohabitacion mh,habitacion h WHERE (mh.TipoMovimientoHabitacion = 'CHECK OUT' OR mh.TipoMovimientoHabitacion = 'CHECK IN' AND mh.IdHabitacion = h.IdHabitacion AND mh.FechaSalidaMovimientoHabitacion BETWEEN (select DATE_ADD(NOW(),INTERVAL -1 DAY)) AND (select DATE_ADD(NOW(),INTERVAL 1 DAY)))";
                    $ComandoSql = "SELECT h.NombreHabitacion,mh.TipoMovimientoHabitacion , mh.EstadoMovimientoHabitacion FROM movimientohabitacion mh,habitacion h WHERE (mh.TipoMovimientoHabitacion = 'CHECK OUT' OR mh.TipoMovimientoHabitacion = 'CHECK IN' AND mh.IdHabitacion = h.IdHabitacion AND mh.FechaSalidaMovimientoHabitacion BETWEEN (select DATE_ADD(NOW(),INTERVAL -1 DAY)) AND (select DATE_ADD(NOW(),INTERVAL 1 DAY)))";
                    //echo $ComandoSql;
                    //$nit = $_POST['nit'];
                    
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                    { 
                        echo '<tr>';
                        echo '<td>'.$fila['NombreHabitacion'].'</td>';
                        if($fila['TipoMovimientoHabitacion']  == 'CHECK IN' && $fila['EstadoMovimientoHabitacion'] == "ACTIVO")
                        {
                            echo '<td>OCUPADA Y SUCIA</td>';
                        }
                        else
                        {
                            echo '<td>CHECK OUT Y SUCIA</td>';
                        }
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
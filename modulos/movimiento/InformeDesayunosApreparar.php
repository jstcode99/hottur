<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDesayunos">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Desayunos
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla2">
                    <thead>
                        <tr>
                            <th>Habitacion</th>
                            <th>Desayunos</th>
                            <th>Dias de Desayuno</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoDesayunos">
                    <?php
                    require_once('../conexion.php');

                        $ComandoSql= "SELECT h.NombreHabitacion,mh.CantidadAdultosMovimientoHabitacion,mh.CantidadNinosMovimientoHabitacion,(mh.CantidadAdultosMovimientoHabitacion + mh.CantidadNinosMovimientoHabitacion) AS Cantidad, CONCAT('Desde    ',DATE_ADD(Date_format(m.FechaEntradaMovimiento,'%Y/%m/%d'),INTERVAL 1 DAY),'    al     ',m.FechaSalidaMovimiento) AS PagoDesayuno FROM movimiento m,movimientohabitacion mh,habitacion h WHERE m.IdMovimiento = mh.IdMovimiento AND h.IdHabitacion = mh.IdHabitacion AND mh.IdDesayuno != '' AND mh.EstadoMovimientoHabitacion = 'ACTIVO' AND mh.TipoMovimientoHabitacion = 'CHECK IN'";
                    
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                    { 
                        echo '<tr>';
                        echo '<td>'.$fila['NombreHabitacion'].'</td>';
                        echo '<td>'.$fila['Cantidad'].'</td>';
                        echo '<td>'.$fila['PagoDesayuno'].'</td>';
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
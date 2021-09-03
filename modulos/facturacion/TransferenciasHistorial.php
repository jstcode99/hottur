<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="HistorialTransferencias">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Historial Transferencias
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla4">
                    <thead>
                        <tr>
                            <th>Fecha Transferencia</th>
                            <th>Concepto de transferencia</th>
                            <th>Valor Transferencia</th>

                        </tr>
                    </thead>
                    <tbody id="ResultadoDesayunos">
                    <?php
                    require_once('../conexion.php');

                        $ComandoSql= "SELECT CONCAT(c.NombreCliente,' ',c.ApellidoCliente) as NombreCompletoCliente, m.IdMovimiento, m.TipoMovimiento , GROUP_CONCAT(CONCAT_WS(',',h.NombreHabitacion)) habitaciones, tc.FechaTransferencia , tc.ValorTransferencia , tc.IdMovimientoReceptorTransferencia FROM cliente c , movimiento m , movimientohabitacion mh ,habitacion h , transferenciacomporbanteingreso tc  WHERE c.IdCliente = m.IdCliente AND m.IdMovimiento = mh.IdMovimiento AND m.IdMovimiento = tc.IdMovimiento AND mh.IdHabitacion = h.IdHabitacion GROUP BY tc.IdTransferencia";
                        
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                        while($fila= $Resultado->fetch_array())
                        { 
                            echo '<tr>';
                            echo '<td>'.$fila['FechaTransferencia'].'</td>';
                            /*toca hacer otra consulta para traer los datos del cliente se le trasnfirio el dinero */
                            $ComandoSql2 = "SELECT CONCAT(c.NombreCliente,' ',c.ApellidoCliente) as NombreCompletoCliente, m.IdMovimiento, m.TipoMovimiento , GROUP_CONCAT(CONCAT_WS(',',h.NombreHabitacion)) habitaciones  FROM cliente c , movimiento m , movimientohabitacion mh ,habitacion h   WHERE c.IdCliente = m.IdCliente AND m.IdMovimiento = mh.IdMovimiento AND  mh.IdHabitacion = h.IdHabitacion AND m.IdMovimiento = ".$fila['IdMovimientoReceptorTransferencia'].";";
                            if($Resultado2=$conexion->query($ComandoSql2))
                            {
                                $fila2= $Resultado2->fetch_array();
                            }
                            echo '<td> El Señor '.$fila['NombreCompletoCliente'].' quien tenia o tiene  un(a) '.$fila['TipoMovimiento'].' en las habitaciones  '.$fila['habitaciones'].' solicito una transferencia para el Señor(a) '.$fila2['NombreCompletoCliente'].' quien tenia o tiene un(a)  '.$fila2['TipoMovimiento'].' en las habitaciones '.$fila2['habitaciones'].'</td>';
                            echo '<td>'.$fila['ValorTransferencia'].'</td>';
                        } 
                        echo '</tr>';
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
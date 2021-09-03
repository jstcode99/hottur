<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDatosHabitacion">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Listado de Reservas - "Moviento"
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla">
                    <thead>
                        <tr>
                            <th>Tipo Movimiento</th>
                            <th>Estado Movimiento</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Salida</th>
                            <th>"Costo Total Estadia"</th>
                            <th>Cargar</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoTabla">
                    <?php
                    require_once('../../modulos/conexion.php');
                    $nit = $_POST['nit'];
                    $ComandoSql = "SELECT m.TipoMovimiento, m.IdMovimiento, m.EstadoMovimiento, m.FechaEntradaMovimiento, m.FechaSalidaMovimiento, m.ValorTotalMovimiento, m.AbonoMovimiento FROM cliente c, movimiento m WHERE c.NitCliente = '".$nit."' and c.IdCliente = m.IdCliente and m.EstadoMovimiento = 'ACTIVO'";
                    
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                    { 
                        echo '<tr>';
                        echo '<td>'.$fila['TipoMovimiento'].'</td>';
                        echo '<td>'.$fila['EstadoMovimiento'].'</td>';
                        echo '<td>'.$fila['FechaEntradaMovimiento'].'</td>';
                        echo '<td>'.$fila['FechaSalidaMovimiento'].'</td>';
                        echo '<td>'.$fila['ValorTotalMovimiento'].'</td>';
                        echo '<td>'."<button id='ConsultarHabitacion' onclick='ConsultarMovimientoHabitacionEgreso(".$fila['IdMovimiento'].",".$fila['ValorTotalMovimiento'].",".$fila['AbonoMovimiento'].");' class='btn btn-primary' type='button' >Consultar</button>".'</td>';
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
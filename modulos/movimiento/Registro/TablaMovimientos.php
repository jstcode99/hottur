<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoMovimientosRegistro">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Listado de Reservas
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla1">
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
                    <tbody id="ResultadoTablaMovimientoRegistro">
                    <?php
                    require_once('../../conexion.php');

                    $TipoCliente = $_POST['TipoCliente'];
                    //echo $TipoCliente;
                    switch($TipoCliente)
                    {
                        case '1':
                        $TipoDocumento = $_POST['TipoDocumento'];
                        $Nit = $_POST['NumeroDocumento'];
                        //CON RELACIONES
                        $ComandoSql= "SELECT m.TipoMovimiento, m.IdMovimiento, m.EstadoMovimiento, m.FechaEntradaMovimiento, m.FechaSalidaMovimiento, m.ValorTotalMovimiento FROM cliente c, movimiento m WHERE c.IdClienteTipo = ".$TipoCliente." AND c.NitCliente = '".$Nit."' and c.IdCliente = m.IdCliente and m.EstadoMovimiento = 'ACTIVO' AND (m.TipoMovimiento LIKE '%RESERVA GARANTIZADA%')";
                        // echo $ComandoSql;
                        break;
                        case '2':
                            $Convenio = $_POST['Convenio'];
                            if($Convenio == 'true')
                                {
                                    $IdCliente = $_POST['IdCliente'];
                                    $ComandoSql= "SELECT m.TipoMovimiento, m.IdMovimiento, m.EstadoMovimiento, m.FechaEntradaMovimiento, m.FechaSalidaMovimiento, m.ValorTotalMovimiento FROM cliente c, movimiento m WHERE c.IdClienteTipo = ".$TipoCliente." AND c.IdCliente = '".$IdCliente."' and c.IdCliente = m.IdCliente and m.EstadoMovimiento = 'ACTIVO' AND (m.TipoMovimiento LIKE '%RESERVA GARANTIZADA%')";
                                    //echo $ComandoSql;
                                }else{
                                    $Nit =$_POST['NumeroDocumento'];
                                    $ComandoSql= "SELECT m.TipoMovimiento, m.IdMovimiento, m.EstadoMovimiento, m.FechaEntradaMovimiento, m.FechaSalidaMovimiento, m.ValorTotalMovimiento FROM cliente c, movimiento m WHERE c.NitCliente = '".$Nit."' and  m.EstadoMovimiento = 'ACTIVO' AND (m.TipoMovimiento LIKE '%RESERVA GARANTIZADA%') AND c.IdClienteTipo = ".$TipoCliente." and c.IdCliente=(SELECT cliente.IdCliente from cliente WHERE cliente.NitCliente='".$Nit."')";
                                    //echo $ComandoSql;
                                }
                        break;
                        case '3':
                                $Convenio = $_POST['Convenio'];
                                if($Convenio == 'true')
                                    {
                                        $IdCliente = $_POST['IdCliente'];
                                        $ComandoSql= "SELECT m.TipoMovimiento, m.IdMovimiento, m.EstadoMovimiento, m.FechaEntradaMovimiento, m.FechaSalidaMovimiento, m.ValorTotalMovimiento FROM cliente c, movimiento m WHERE c.IdClienteTipo = ".$TipoCliente." AND c.IdCliente = '".$IdCliente."' and c.IdCliente = m.IdCliente and m.EstadoMovimiento = 'ACTIVO' AND (m.TipoMovimiento LIKE '%RESERVA GARANTIZADA%')";
                                        //echo $ComandoSql;
                                    }else{
                                        $Nit =$_POST['NumeroDocumento'];
                                        $ComandoSql= "SELECT m.TipoMovimiento, m.IdMovimiento, m.EstadoMovimiento, m.FechaEntradaMovimiento, m.FechaSalidaMovimiento, m.ValorTotalMovimiento FROM cliente c, movimiento m WHERE c.IdClienteTipo = ".$TipoCliente." AND c.NitCliente = '".$Nit."' and c.IdCliente = m.IdCliente and m.EstadoMovimiento = 'ACTIVO' AND (m.TipoMovimiento LIKE '%RESERVA GARANTIZADA%')";
                                        //echo $ComandoSql;
                                    }
                        break;
                    }
                    //$nit = $_POST['nit'];
                    
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
                        echo '<td>'."<button id='ConsultarHabitacion' onclick='CargarHabitaciones(".$fila['IdMovimiento'].");' class='btn btn-primary' type='button' >Check In</button>".'</td>';
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
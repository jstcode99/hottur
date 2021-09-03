<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoSalidasEsperadas">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Listas Check In
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla4">
                    <thead>
                        <tr>
                            <th>Fecha Movimiento</th>
                            <th>Nombre Cliente</th>
                            <th>Habitación</th>
                            <th>Movimiento</th>
                            <th>Nit Responsable</th>
                            <th>Responsable Habitación</th>
                            <th>Imprimir</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoSalidasEsperadas">
                    <?php
                    require_once('../conexion.php');
                        $Fecha1MovimientosParaImprimir = $conexion->real_escape_string($_POST['Fecha1MovimientosParaImprimir']);
                        $ComandoSql= "SELECT c.NombreCiudad,dp.NombreDepartamento,tr.NombreTarifa,cl.*,h.NombreHabitacion, m.*,mh.* FROM ciudad c,departamento dp,cliente cl,movimiento m,movimientohabitacion mh, habitacion h,tarifa tr WHERE dp.IdDepartamento = c.IdDepartamento AND c.IdCiudad = cl.IdCiudad AND cl.IdCliente = m.IdCliente AND tr.IdTarifa = m.IdTarifa AND m.EstadoMovimiento = 'ACTIVO' AND m.TipoMovimiento = 'CHECK IN' AND m.IdMovimiento = mh.IdMovimiento AND mh.EstadoMovimientoHabitacion = 'ACTIVO' AND mh.TipoMovimientoHabitacion = 'CHECK IN' AND m.FechaEntradaMovimiento > '".$Fecha1MovimientosParaImprimir."' AND mh.IdHabitacion = h.IdHabitacion";
                    
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                    { 
                        echo '<tr>';
                        echo '<td>'.$fila['FechaMovimiento'].'</td>';
                        echo '<td>'.$fila['NombreCliente'].'  '.$fila['ApellidoCliente'].'</td>';
                        echo '<td>'.$fila['NombreHabitacion'].'</td>';
                        echo '<td>'.$fila['TipoMovimiento'].'</td>';
                        echo '<td>'.$fila['NitResponsableMovimientoHabitacion'].'</td>';
                        echo '<td>'.$fila['NombreResponsableMovimientoHabitacion'].'  '.$fila['ApellidoResponsableMovimientoHabitacion'].'</td>';
                       
                        echo '<td>'."<button id='ConsultaEgreso' onclick='ImprimirFomularioRegistroCheckIn(".json_encode($fila).");' class='btn btn-primary' type='button' >Buscar</button>".'</td>';
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
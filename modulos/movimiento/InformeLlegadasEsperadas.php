<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoLlegadasEsperadas">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
            Llegadas Esperadas
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla5">
                    <thead>
                        <tr>
                            <th>Habitacion</th>
                            <th>Nit Responsable</th>
                            <th>Nombre Responsable</th>
                            <th>Cantidad Adultos</th>
                            <th>Cantidad Niños</th>
                            <th>Fecha Llegada</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoLlegadasEsperadas">
                    <?php
                        require_once('../conexion.php');
                        $Fecha1LlegadasEsperadas = $conexion->real_escape_string($_POST['Fecha1LlegadasEsperadas']);
                        // echo $Fecha1LlegadasEsperadas;
                        $Fecha2LlegadasEsperadas = $conexion->real_escape_string($_POST['Fecha2LlegadasEsperadas']);
                        // echo $Fecha2LlegadasEsperadas;
                        $ComandoSql= "SELECT h.NombreHabitacion,mh.CantidadAdultosMovimientoHabitacion,mh.CantidadNinosMovimientoHabitacion,mh.NitResponsableMovimientoHabitacion ,CONCAT(mh.NombreResponsableMovimientoHabitacion,' ',mh.ApellidoResponsableMovimientoHabitacion) AS NombreCompleto, mh.FechaEntradaMovimientoHabitacion FROM movimientohabitacion mh,movimiento m,habitacion h WHERE m.IdMovimiento = mh.IdMovimiento AND m.TipoMovimiento = 'RESERVA GARANTIZADA' AND mh.IdHabitacion = h.IdHabitacion AND mh.FechaEntradaMovimientoHabitacion BETWEEN '".$Fecha1LlegadasEsperadas."' AND '".$Fecha2LlegadasEsperadas."'";
                        // echo  $ComandoSql;             
                    //$nit = $_POST['nit'];
                    
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                        { 
                            echo '<tr>';
                            echo '<td>'.$fila['NombreHabitacion'].'</td>';
                            echo '<td>'.$fila['NitResponsableMovimientoHabitacion'].'</td>';
                            echo '<td>'.$fila['NombreCompleto'].'</td>';
                            echo '<td>'.$fila['CantidadAdultosMovimientoHabitacion'].'</td>';
                            echo '<td>'.$fila['CantidadNinosMovimientoHabitacion'].'</td>';
                            echo '<td>'.$fila['FechaEntradaMovimientoHabitacion'].'</td>';
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
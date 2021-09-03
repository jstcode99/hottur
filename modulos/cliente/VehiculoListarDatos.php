<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDatosVehiculos">
    <div class="table-responsive" style="padding:55px">
        <table class="table table-bordered" id="Tabla2">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th>Descripción</th>
                    <th>CC Cliente</th>
                    <th>Nombre y Apellido</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
                <tbody id="ResultadoTabla">
                <?php
                require_once('../../modulos/conexion.php');
                $ComandoSql = "SELECT c.NombreCliente, c.ApellidoCliente, vc.IdVehiculoCliente, vc.PlacaVehiculoCliente, vc.DescripcionVehiculoCliente, vc.FechaInicialVehiculoCliente, vc.FechaFinalVehiculoCliente , c.NitCliente, vc.IdCliente FROM `vehiculocliente` vc INNER JOIN `cliente` c ON vc.IdCliente = c.IdCliente";
                if ($Resultado = $conexion->query($ComandoSql)) {
                /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE"; */
                /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                    while ($fila = $Resultado->fetch_array()) {
                        echo '<tr>';
                        echo '<td >' . mb_convert_encoding($fila['PlacaVehiculoCliente'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['FechaInicialVehiculoCliente'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['FechaFinalVehiculoCliente'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['DescripcionVehiculoCliente'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['NitCliente'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['NombreCliente'], "UTF-8") . " " . mb_convert_encoding($fila['ApellidoCliente'], "UTF-8") . '</td>';
                        echo '<td><button type="buttom" id="ActualizarVehiculo" class="btn btn-warning" onclick="ConsultarVehiculo(' . mb_convert_encoding($fila['IdVehiculoCliente'], "UTF-8") . ');" >Actualizar</button></td>';                        
                    }
                }
                ?>
                </tbody>
        </table>  
    </div>
</div>



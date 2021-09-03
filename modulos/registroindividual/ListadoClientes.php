<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoClientes">
    <div class="table-responsive" style="padding:55px">
        <table class="table table-bordered" id="Tabla2">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Nit / Número</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                </tr>
            </thead>
                <tbody id="ResultadoTabla">
                <?php
                require_once('../../modulos/conexion.php');
                $ComandoSql = "SELECT cliente.* , clientetipo.NombreClienteTipo FROM cliente , clientetipo WHERE cliente.IdClienteTipo = clientetipo.IdClienteTipo";
                if ($Resultado = $conexion->query($ComandoSql)) {
                /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE"; */
                /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                    while ($fila = $Resultado->fetch_array()) {
                        echo '<tr>';
                        echo '<td >' . mb_convert_encoding($fila['NombreClienteTipo'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['NitCliente'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['NombreCliente'], "UTF-8") ."    ".mb_convert_encoding($fila['ApellidoCliente'], "UTF-8").'</td>';
                        echo '<td>' . mb_convert_encoding($fila['DireccionCliente'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['CorreoCliente'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['Telefono1Cliente'], "UTF-8"). '</td>';
                        //echo '<td><button type="buttom" id="ActualizarVehiculo" class="btn btn-warning" onclick="ConsultarVehiculo(' . mb_convert_encoding($fila['IdVehiculoCliente'], "UTF-8") . ');" >Actualizar</button></td>';                        
                    }
                }
                ?>
                </tbody>
        </table>  
    </div>
</div>



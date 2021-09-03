<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDatosConvenio">
    <div class="table-responsive" style="padding:55px">
        <table class="table table-bordered" id="Tabla2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Codigo</th>
                    <th>Estado</th>
                    <th>Nombre Convenio</th>
                    <th>Forma Pago</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
                <tbody id="ResultadoTabla">
                <?php
                require_once('../../modulos/conexion.php');
                $ComandoSql = "SELECT * FROM `convenio`";
                if ($Resultado = $conexion->query($ComandoSql)) {
                /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE"; */
                /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                    while ($fila = $Resultado->fetch_array()) {
                        echo '<tr>';
                        echo '<td >' . mb_convert_encoding($fila['IdConvenio'], "UTF-8") . '</td>';
                        echo '<td >' . mb_convert_encoding($fila['CodigoConvenio'], "UTF-8") . '</td>';
                        if($fila['EstadoConvenio'] =="ACTIVO"){
                            echo '<td class="success">' . mb_convert_encoding($fila['EstadoConvenio'], "UTF-8") . '</td>';
                        }else if($fila['EstadoConvenio'] =="CANCELADO"){
                            echo '<td class="danger">' . mb_convert_encoding($fila['EstadoConvenio'], "UTF-8") . '</td>';
                        }else if($fila['EstadoConvenio'] =="FINALIZADO"){
                            echo '<td class="active">' . mb_convert_encoding($fila['EstadoConvenio'], "UTF-8") . '</td>';
                        }
                        echo '<td>' . mb_convert_encoding($fila['NombreConvenio'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['FormaPagoConvenio'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['InicioFechaConvenio'], "UTF-8") . '</td>';
                        echo '<td>' . mb_convert_encoding($fila['FinFechaConvenio'], "UTF-8") . '</td>';
                        echo '<td>'."<button id='ActualizarVehiculo' onclick='CargarConvenios(".json_encode($fila).");' class='btn btn-warning' type='button' >Actualizar</button>".'</td>';                   
                    }
                }
                ?>
                </tbody>
        </table>  
    </div>
</div>



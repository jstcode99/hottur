<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDatosTipoHabitacion"> 
    <div class="col-sm-11">
        <h1 class="page-header">
        Actualizar datos
        </h1>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla2">
                <br>
                <br>
                <br>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre Tipo Habitación</th>
                            <th>Fecha Registro</th>
                            <th>Cantidad Pax Tipo Habitacion</th>
                            <th>Valor Pax Tipo Habitacion</th>
                            <th>Valor Adicional Habitacion Tipo</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoTabla">
                    <?php
                    require_once('../../modulos/conexion.php');
                    $ComandoSql = "SELECT * FROM `habitaciontipo` ";
                    if ($Resultado = $conexion->query($ComandoSql)) {
                    /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE"; */
                    /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while ($fila = $Resultado->fetch_array()) {
                            echo '<tr>';
                            echo '<td >' . mb_convert_encoding($fila['IdHabitacionTipo'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['NombreHabitacionTipo'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['FechaCreacionHabitacionTipo'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['CantidadPaxHabitacionTipo'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['ValorPaxHabitacionTipo'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['ValorAdicionalHabitacionTipo'], "UTF-8") . '</td>';
                            echo "<td><button id='ActualizarTipoHabitacion' class='btn btn-warning' onclick='ConsultarTipoHabitacion(" . json_encode($fila). ");' >Actualizar</button></td>";
                            echo '<td><button id="EliminarTipoHabitacion" class="btn btn-danger" onclick="EliminarTipoHabitacion(' . mb_convert_encoding($fila['IdHabitacionTipo'], "UTF-8") . ');" >Eliminar</button></td>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
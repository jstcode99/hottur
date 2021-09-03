<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDatosHabitacion">
    <div class="col-sm-11">
        <h1 class="page-header">
        Actualizar datos
        </h1>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla">
                    <br>
                    <br>
                    <br>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre Habitación</th>
                            <th>Estado Habitación</th>
                            <th>Tipo Habitación</th>
                            <th>Observciones</th>
                            <th>Actualizar</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoTabla">
                    <?php
                    require_once ('../../modulos/conexion.php');
                    $ComandoSql= "SELECT * FROM `habitacion` h , `habitaciontipo`th WHERE h.IdHabitacionTipo = th.IdHabitacionTipo ";
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE"; */
                    /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                    while($fila= $Resultado->fetch_array())
                    {
                    echo '<tr>';
                    echo '<td >'.mb_convert_encoding($fila['IdHabitacion'], "UTF-8").'</td>';
                    echo '<td>'.mb_convert_encoding($fila['NombreHabitacion'], "UTF-8").'</td>';
                    echo '<td>'.mb_convert_encoding($fila['EstadoHabitacion'], "UTF-8").'</td>';
                    echo '<td>'.mb_convert_encoding($fila['NombreHabitacionTipo'], "UTF-8").'</td>';
                    echo '<td>'.mb_convert_encoding($fila['ObservacionesHabitacion'], "UTF-8").'</td>';
                    echo '<td><button id="ConsultarHabitacion" class="btn btn-warning" onclick="ConsultarHabitacion('.mb_convert_encoding($fila['IdHabitacion'], "UTF-8").');" class="btn btn-default">Actualizar</button></td>';
                    }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
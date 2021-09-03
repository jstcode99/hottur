<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDatosContribuyente">
    <div class="table-responsive" style="padding:55px">
        <table class="table table-bordered" id="Tabla2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo Contribuyente</th>
                    <th>Actualizar</th>
                    <!-- <th>Eliminar</th> -->
                </tr>
            </thead>
            <tbody id="ResultadoTabla">
            <?php
            require_once('../../modulos/conexion.php');
            $ComandoSql = "SELECT  * FROM tipocontribuyente";
            if ($Resultado = $conexion->query($ComandoSql)) {
            /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE"; */
            /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                while ($fila = $Resultado->fetch_array()) {
                    echo '<tr>';
                    echo '<td >' . mb_convert_encoding($fila['IdTipoContribuyente'], "UTF-8") . '</td>';                
                    echo '<td>' . mb_convert_encoding($fila['NombreTipoContribuyente'], "UTF-8", 'ISO-8859-1') . '</td>';
                    echo '<td><button type="buttom" class="btn btn-warning" onclick="ConsultarTipoContribuyente('.$fila[0].');"> Actualizar </button></td>';
                    /*echo '<td><button type="buttom"  id="EliminarTipoContribuyente" class="btn btn-danger" onclick="EliminarTipoContribuyente(' . mb_convert_encoding($fila['IdTipoContribuyente'], "UTF-8") . ');" >Eliminar</button></td>';*/
                }
            }
            ?>
            </tbody>
        </table>  
    </div>
</div> 
      


<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>

<div class="row" style="padding:25px" id="TablaRecarga">
        <h1 class="page-header">Usuarios Registrados</h1>
<!--TABLA RESPONSIVA-->
    <div class="bs-example" data-example-id="simple-responsive-table">          
        <div class="table-responsive">
            <table class="table table-bordered" id="Tabla">
                <br>
                <thead>
                    <tr> 
                    <th>#</th>
                    <th>Rol</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Codigo de empresa</th>
                    <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody id="ResultadoTabla">
                    <?php
    /**--------------------------------- Mostrar Usuarios---------------------------------------------------- */    
                require_once ('../conexion.php');
                    $ComandoSql="SELECT * FROM `usuario` WHERE 1";
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                    /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                    while($fila= $Resultado->fetch_array())
                        {
                        echo '<tr>';
                        echo '<td>'.mb_convert_encoding($fila['IdUsuario'], "UTF-8").'</td>';
                        echo '<td>'.mb_convert_encoding($fila['RolUsuario'], "UTF-8").'</td>';
                        echo '<td>'.mb_convert_encoding($fila['NombreUsuario'], "UTF-8").'</td>';
                        echo '<td>'.mb_convert_encoding($fila['ApellidoUsuario'], "UTF-8").'</td>';
                        echo '<td>'.mb_convert_encoding($fila['TelefonoUsuario'], "UTF-8").'</td>';
                        echo '<td>'.mb_convert_encoding($fila['CorreoUsuario'], "UTF-8").'</td>';
                        echo '<td>'.mb_convert_encoding($fila['IdDatosEmpresa'], "UTF-8").'</td>';
                        echo '<td><button  class="btn btn-warning" onclick="ActualizarUsuarios('.mb_convert_encoding($fila['IdUsuario'], "UTF-8").');">Actualizar</button></td>';          
                        }
                    }                          
    /**--------------------------------- Mostrar Usuarios---------------------------------------------------- */                                                            
                    ?>
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <br>         
        </div>
    </div> 
<!--TABLA RESPONSIVA-->       
</div> 
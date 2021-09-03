<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div class="row" style="padding:25px" id="TablaRecarga">
    <h1 class="page-header">Proveedores Registrados</h1>
    <!--TABLA RESPONSIVA-->
    <div class="bs-example" data-example-id="simple-responsive-table">                              
        <div class="table-responsive">
            <table class="table table-bordered" id="Tabla">
                <br>
                <thead>
                    <tr> 
                        <th>#</th>
                        <th>Nit</th>                                                                                                
                        <th>Nombre</th>                        
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Correo</th>  
                        <th>Celular</th>        
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody id="ResultadoTabla">
                    <?php
                        require_once ('../../modulos/conexion.php');
                        $ComandoSql="SELECT * FROM `Proveedores` WHERE 1";
                        if($Resultado=$conexion->query($ComandoSql))
                        {
                        /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                        /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while($fila= $Resultado->fetch_array())
                            {
                            echo '<tr>';
                            echo '<td >'.mb_convert_encoding($fila['IdProveedores'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['NitProveedores'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['NombreProveedores'], "UTF-8").'</td>';                            
                            echo '<td>'.mb_convert_encoding($fila['TelefonoProveedores'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['DireccionProveedores'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['CorreoProveedores'], "UTF-8").'</td>';                
                            echo '<td>'.mb_convert_encoding($fila['CelularProveedores'], "UTF-8").'</td>';             
                            echo '<td><button  class="btn btn-warning" onclick="TraerProveedores('.mb_convert_encoding($fila['IdProveedores'], "UTF-8").');">Actualizar</button></td>';                            
                            }
                        }
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
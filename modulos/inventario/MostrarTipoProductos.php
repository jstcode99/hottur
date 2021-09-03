<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div class="row" style="padding:25px" id="TablaRecarga">
    <h1 class="page-header">Clases registradas</h1>
    <!--TABLA RESPONSIVA-->
    <div class="bs-example" data-example-id="simple-responsive-table">                              
        <div class="table-responsive">
            <table class="table table-bordered" id="Tabla">
                <br>
                <thead>
                    <tr> 
                        <th>#</th>                                                                                                
                        <th>Nombre</th>
                        <th>Observaciones</th>
                        <th>Impuesto</th>
                        <th>Centro contable</th>
                        <th>Cuenta contable</th>
                        <th>Concepto contable</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="ResultadoTabla">
                    <?php
                        require_once ('../../modulos/conexion.php');
                        $ComandoSql="SELECT * FROM `productotipo` WHERE 1";
                        if($Resultado=$conexion->query($ComandoSql))
                        {
                        /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                        /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while($fila= $Resultado->fetch_array())
                            {
                            echo '<tr>';
                            echo '<td >'.mb_convert_encoding($fila['IdProductoTipo'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['NombreProductoTipo'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['ObservacionesProductoTipo'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['ImpuestoProductoTipo'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['CentroContableProductoTipo'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['CuentaContableProductoTipo'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['ConceptoContableProductoTipo'], "UTF-8").'</td>';
                            echo '<td><button  class="btn btn-warning" onclick="TraerTipoProductos('.mb_convert_encoding($fila['IdProductoTipo'], "UTF-8").');">Actualizar</button></td>';
                            echo '<td><button  class="btn btn-danger" onclick="EliminarTipoProductos('.mb_convert_encoding($fila['IdProductoTipo'], "UTF-8").');">Eliminar</button></td>';
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div class="col-lg-12" style="padding:5px;">
                <span id="TipoProductosResultadoEliminar"></span>
            </div>
            <br>
            <br>
            <br>
            <br>         
        </div>
    </div> 
    <!--TABLA RESPONSIVA-->                           
</div> 
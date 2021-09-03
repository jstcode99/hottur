<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div class="row" style="padding:45px" id="TablaRecarga1">
    <h1 class="page-header">Inventario de productos</h1>
    <!--TABLA RESPONSIVA-->
    <div class="bs-example" data-example-id="simple-responsive-table">                              
        <div class="table-responsive">
            <table class="table table-bordered" id="Tabla1">
                <br>
                <thead>
                    <tr> 
                        <th>#</th>                                                                                                
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Observaciones</th>
                        <th>Descripciòn</th>
                        <th>Tipo de Producto</th>
                        <th>Codigo de Provedor</th>
                        <th>Medida</th>
                        <th>Cantidad</th>
                        <th>Valor</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody id="ResultadoTabla">
                    <?php
                        require_once ('../../modulos/conexion.php');
                        $ComandoSql="SELECT * from productos,productotipo WHERE productotipo.IdProductoTipo=productos.IdProductoTipo";
                        if($Resultado=$conexion->query($ComandoSql))
                        {
                        /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                        /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while($fila= $Resultado->fetch_array())
                            {
                            echo '<tr>';
                            echo '<td >'.mb_convert_encoding($fila['IdProductos'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['NombreProductos'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['MarcaProductos'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['ObservacionesProductos'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['DescripcionProductos'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['NombreProductoTipo'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['IdProveedores'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['MedidaProductos'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['CantidadProductos'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['ValorProductos'], "UTF-8").'</td>';
                            echo '<td><button  class="btn btn-warning" onclick="TraerProductos('.mb_convert_encoding($fila['IdProductos'], "UTF-8").');">Actualizar</button></td>';
                            
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
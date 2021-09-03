<div class="col-sm-12"  style="padding:25px" id="TablaRecarga">
    <h1 class="page-header">Inventario de Bienes</h1>
    <!--TABLA RESPONSIVA-->
    <div class="bs-example" data-example-id="simple-responsive-table">                              
        <div class="table-responsive">
            <table class="table table-bordered" id="Tabla1">
                <br>
                <thead>
                    <tr> 
                        <th>#</th>                                                                                                
                        <th>Nombre</th>
                        <th>Impuesto</th>
                        <th>Tipo de servcicio</th>
                        <th>Valor</th>
                        <th>Observaciones</th>
                        <th>Descripción</th>                        
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody id="ResultadoTabla">
                    <?php
                        require_once ('../../modulos/conexion.php');
                        $ComandoSql="SELECT servicios.*,serviciotipo.NombreServicioTipo FROM `servicios`,serviciotipo WHERE serviciotipo.IdServicioTipo=servicios.IdServicioTipo";
                        if($Resultado=$conexion->query($ComandoSql))
                        {
                        /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                        /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while($fila= $Resultado->fetch_array())
                            {
                            echo '<tr>';
                            echo '<td >'.mb_convert_encoding($fila['IdServicios'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['NombreServicios'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['ImpuestoServicios'], "UTF-8").'</td>';   
                            echo '<td>'.mb_convert_encoding($fila['NombreServicioTipo'], "UTF-8").'</td>';                          
                            echo '<td>'.mb_convert_encoding($fila['ValorServicios'], "UTF-8").'</td>';                            
                            echo '<td>'.mb_convert_encoding($fila['ObservacionesServicios'], "UTF-8").'</td>';                            
                            echo '<td>'.mb_convert_encoding($fila['DescripcionServicios'], "UTF-8").'</td>';
                            echo '<td><button  class="btn btn-warning" onclick="TraerServicios('.mb_convert_encoding($fila['IdServicios'], "UTF-8").');">Actualizar</button></td>';                            
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
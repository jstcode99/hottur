<div class="row" style="padding:25px" id="TablaRecarga1">
    <h1 class="page-header">Inventario de Bienes</h1>
    <!--TABLA RESPONSIVA-->
    <div class="bs-example" data-example-id="simple-responsive-table">                              
        <div class="table-responsive">
            <table class="table table-bordered" id="Tabla">
                <br>
                <thead>
                    <tr> 
                        <th>#</th>                                                                                                
                        <th>Nombre</th>
                        <th>Valor</th>
                        <th>Observaciones</th>
                        <th>Tipo de Activo</th>
                        <th>Estado</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody id="ResultadoTabla">
                    <?php
                        require_once ('../../modulos/conexion.php');
                        $ComandoSql="SELECT * FROM `Bienes` WHERE 1";
                        if($Resultado=$conexion->query($ComandoSql))
                        {
                        /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                        /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while($fila= $Resultado->fetch_array())
                            {
                            echo '<tr>';
                            echo '<td >'.mb_convert_encoding($fila['IdBienes'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['NombreBienes'], "UTF-8").'</td>';                           
                            echo '<td>'.mb_convert_encoding($fila['ValorBienes'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['ObservacionBienes'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['IdTipoBienes'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['EstadoBienes'], "UTF-8").'</td>';
                            echo '<td><button  class="btn btn-warning" onclick="TraerBienes('.mb_convert_encoding($fila['IdBienes'], "UTF-8").');">Actualizar</button></td>';                            
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
<div class="row" style="padding:25px" id="TablaRecarga1">
    <h1 class="text-center">Listado de cotizantes</h1>
    <!--TABLA RESPONSIVA-->
    <div class="bs-example" data-example-id="simple-responsive-table" style="padding:50px;">                              
        <div class="table-responsive">
            <table class="table table-bordered" id="Tabla">
                <br>
                <thead>
                    <tr> 
                        <th>#</th>                                                                                                
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Fecha de entrada</th>
                        <th>Fecha de salida</th>
                        <th>Plazo</th>
                        <th>Peticion</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody id="ResultadoTabla">
                    <?php
                        require_once ('../../modulos/conexion.php');
                        $ComandoSql="SELECT * FROM `cotizacion`";
                        if($Resultado=$conexion->query($ComandoSql))
                        {
                        /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                        /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while($fila= $Resultado->fetch_array())
                            {
                            echo '<tr>';
                            echo '<td >'.mb_convert_encoding($fila['IdCotizacion'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['DatosClienteCotizacion'], "UTF-8").'</td>';                           
                            echo '<td>'.mb_convert_encoding($fila['FechaCotizacion'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['FechaInicioCotizacion'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['FechaSalidaCotizacion'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['PlazoCotizacion'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['ObservacionesCotizacion'], "UTF-8").'</td>';
                            echo '<td>'.mb_convert_encoding($fila['ValorCotizacion'], "UTF-8").'</td>';
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

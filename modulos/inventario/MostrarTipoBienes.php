<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div class="col-md-12" id="TablaRecarga">   
    <div class="row" style="padding:25px">
        <h3 class="page-header">Clasificación de activos</h3>
        <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">                              
            <div class="table-responsive">
                <table class="table table-bordered" id="Tabla1">
                    <br>
                    <thead>
                        <tr> 
                            <th>#</th>                                                                                                
                            <th>Nombre</th>                        
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoTabla">
                        <?php
                            require_once ('../../modulos/conexion.php');
                            $ComandoSql="SELECT * FROM `tipobienes`  WHERE 1";
                            if($Resultado=$conexion->query($ComandoSql))
                            {
                            /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                            /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                            while($fila= $Resultado->fetch_array())
                                {
                                echo '<tr>';
                                echo '<td >'.mb_convert_encoding($fila['IdTipoBienes'], "UTF-8").'</td>';
                                echo '<td>'.mb_convert_encoding($fila['NombreTipoBienes'], "UTF-8").'</td>';                                                            
                                echo '<td><button  class="btn btn-warning" onclick="TraerTipoBienes('.mb_convert_encoding($fila['IdTipoBienes'], "UTF-8").');">Actualizar</button></td>';
                                echo '<td><button  class="btn btn-danger" onclick="EliminarTipoBienes('.mb_convert_encoding($fila['IdTipoBienes'], "UTF-8").');">Eliminar</button></td>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <div class="col-lg-12" style="padding:5px;">
                <span id="TipoBienesResultadoEliminar"></span>
                </div>
                <br>
                <br>
                <br>
                <br>         
            </div>
        </div> 
        <!--TABLA RESPONSIVA-->                           
    </div>
</div>  
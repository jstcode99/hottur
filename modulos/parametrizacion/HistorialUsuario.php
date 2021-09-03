
<!--DEBEN RUTA QUEDA ASI Y ESTE LINK LO PONEN EN LOS DIFERENTES MOSTRAR-->
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="page-wrapper">
    <div class="container-fluid" >
        <div class="container" style="height:auto">
            <div class="panel panel-default">
                <div class="panel panel-default"  style="padding: 25px;">
                <h1 class="page-header">Historial de Usuarios <i class="fa fa-user"></i></h1>
                                <!--TABLA RESPONSIVA-->
                                <div class="bs-example" data-example-id="simple-responsive-table">                              
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="Tabla">
                                        <br>
                                            <thead>
                                                <tr> 
                                                    <th>#</th>
                                                    <th>Proceso</th>
                                                    <th>Nombre Proceso</th>
                                                    <th>Fecha</th>                                                    
                                                    <th>Fecha de Ingreso</th>                                                
                                                    <th>Usuario</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ResultadoTabla">
                                            <?php
                                            require_once ('../../modulos/conexion.php');
                                                        $ComandoSql="SELECT * FROM `historialprocesosusuarios`";
                                                        if($Resultado=$conexion->query($ComandoSql))
                                                        {
                                                        /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                                                        /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                                                        while($fila= $Resultado->fetch_array())
                                                            {
                                                            echo '<tr>';
                                                            echo '<td >'.mb_convert_encoding($fila['IdHistorialProceso'], "UTF-8").'</td>';
                                                            echo '<td>'.mb_convert_encoding($fila['IdProcesoRealizado'], "UTF-8").'</td>';
                                                            echo '<td>'.mb_convert_encoding($fila['NombreProceso'], "UTF-8").'</td>';
                                                            echo '<td>'.mb_convert_encoding($fila['FechaProceso'], "UTF-8").'</td>';
                                                            echo '<td>'.mb_convert_encoding($fila['FechadeIngreso'], "UTF-8").'</td>';
                                                            echo '<td>'.mb_convert_encoding($fila['IdUsuario'], "UTF-8").'</td>';                                
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
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoDatosPasadia"> 
    <div class="col-sm-11">
        <h2 class="page-header">
        Listado de Huespedes por Habitación
        </h2>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla2">
                <br>
                <br>
                <br>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nit</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Nacionalidad</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Salida</th>
                            <th>Actualizar</th>
                        </tr>
                    </thead>

                    <tbody id="ResultadoTabla">
                    <?php
                    require_once('../../modulos/conexion.php');
                    $IdMovimientoHabitacion = $_POST['IdMovimientoHabitacion'];
                    $cantidadPax = $_POST['CantidadPax'];
                    $ComandoSql = "SELECT * FROM `huesped` WHERE IdMovimientoHabitacion ='".$IdMovimientoHabitacion."' ";
                    $contar  = 0;
                    /* echo $ComandoSql; */
                    if ($Resultado = $conexion->query($ComandoSql)) {
                    /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE"; */
                    /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while ($fila = $Resultado->fetch_array()) {
                            // if($fila['FechaSalidaHuesped'] == "" || $fila['FechaSalidaHuesped'] == "0000-00-00 00:00:00"){
                                // $contar = $contar + 1; 
                            // }
                            echo count($fila);
                            if($fila['EstadoOcupacionHuesped'] == 'FINALIZADO')
                            {
                                $contar = $contar + 1;
                            }  
                           // echo $contar;
                            echo '<tr>';
                            echo '<td >' . mb_convert_encoding($fila['IdHuesped'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['NumeroDocumentoHuesped'], "UTF-8") . '</td>';
                          
                            echo '<td>' . mb_convert_encoding($fila['NombreHuesped'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['ApellidoHuesped'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['NacionalidadHuesped'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['FechaEntradaHuesped'], "UTF-8") . '</td>';
                            echo '<td>' . mb_convert_encoding($fila['FechaSalidaHuesped'], "UTF-8") . '</td>';
                            
                            // if($fila['FechaSalidaHuesped'] == "" || $fila['FechaSalidaHuesped'] == "0000-00-00 00:00:00")
                            if($fila['EstadoOcupacionHuesped'] == 'FINALIZADO' || count($fila) == 1){
                                
                                // if($contar ==1)
                                    echo "<td><button id='ActualizarFechaSalida' disabled  class='btn btn-warning'  onclick='ActualizarFechaSalida(" .  mb_convert_encoding($fila['IdHuesped'], "UTF-8") . ");' >Actualizar</button></td>";
                                // else
                                    // echo "<td><button id='ActualizarFechaSalida'  class='btn btn-warning'  onclick='ActualizarFechaSalida(" .  mb_convert_encoding($fila['IdHuesped'], "UTF-8") . ");' >Actualizar</button></td>";

                                    
                            }else{
                               
                                if($contar + 1 == $cantidadPax)
                                {
                                    echo "<td><button id='ActualizarFechaSalida' disabled class='btn btn-warning' onclick='ActualizarFechaSalida(" .  mb_convert_encoding($fila['IdHuesped'], "UTF-8") . ");' >Actualizar</button></td>";
                                }
                                else{
                                echo "<td><button id='ActualizarFechaSalida'  class='btn btn-warning'  onclick='ActualizarFechaSalida(" .  mb_convert_encoding($fila['IdHuesped'], "UTF-8") . ");' >Actualizar</button></td>";  
                                }
                                   //echo "<td><button id='ActualizarFechaSalida' class='btn btn-warning' onclick='ActualizarFechaSalida(" .  mb_convert_encoding($fila['IdHuesped'], "UTF-8") . ");' >Actualizar</button></td>";
                               
                            }
                            
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
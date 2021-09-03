<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="HistorialHuespedesFormulario">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Listas Check In
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla4">
                    <thead>
                        <tr>
                            <th>Numero Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha Nacimiento</th>
                            <th>Nacionalidad</th>
                            <th>Tipo Huesped</th>
                            <th>Actualizar</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoHistorialHuespedes">
                    <?php
                    require_once('../conexion.php');
                        $ComandoSql= "SELECT * FROM `huesped`";
                    
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                    { 
                        echo '<tr>';
                        echo '<td>'.$fila['NumeroDocumentoHuesped'].'</td>';
                        echo '<td>'.$fila['NombreHuesped'].'</td>';
                        echo '<td>'.$fila['ApellidoHuesped'].'</td>';
                        echo '<td>'.$fila['FechaNacimientoHuesped'].'</td>';
                        echo '<td>'.$fila['NacionalidadHuesped'].'</td>';
                        echo '<td>'.$fila['TipoHuesped'].'</td>';
                        echo '<td>'."<button id='ActualizarHuesped' onclick='ActualizarHuesped(".json_encode($fila).");' class='btn btn-primary' type='button' >Cargar</button>".'</td>';
                    } 
                   echo '</tr>';
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
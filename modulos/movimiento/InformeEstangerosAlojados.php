<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="ListadoExtragerosAlojados">
    <div class="col-sm-11">
        <h3><!--  class="page-header" -->
        Extrageros Alojados
        </h3>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table" id="Tabla2">
                    <thead>
                        <tr>
                            <th>Tipo Documento</th>
                            <th>Numero Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Nacionalidad</th>
                            <th>Fecha Nacimiento</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Salida</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoExtrangerosAlojados">
                    <?php
                    require_once('../conexion.php');

                        $Fecha1ExtrangerosAlojados = $conexion->real_escape_string($_POST['Fecha1ExtrangerosAlojados']);
                        $Fecha2ExtrangerosAlojados = $conexion->real_escape_string($_POST['Fecha2ExtrangerosAlojados']);
                        $ComandoSql= "SELECT h.* FROM huesped h WHERE h.FechaEntradaHuesped BETWEEN '".$Fecha1ExtrangerosAlojados."' AND '".$Fecha2ExtrangerosAlojados."' AND NacionalidadHuesped != 'COLOMBIANO'";
                    //$nit = $_POST['nit'];
                    
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                    while($fila= $Resultado->fetch_array())
                    { 
                        echo '<tr>';
                        echo '<td>'.$fila['TipoDocumentoHuesped'].'</td>';
                        echo '<td>'.$fila['NumeroDocumentoHuesped'].'</td>';
                        echo '<td>'.$fila['NombreHuesped'].'</td>';
                        echo '<td>'.$fila['ApellidoHuesped'].'</td>';
                        echo '<td>'.$fila['NacionalidadHuesped'].'</td>';
                        echo '<td>'.$fila['FechaNacimientoHuesped'].'</td>';
                        echo '<td>'.$fila['FechaEntradaHuesped'].'</td>';
                        echo '<td>'.$fila['FechaSalidaHuesped'].'</td>';
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
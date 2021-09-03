<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
    <!--TABLA RESPONSIVA-->
        <div class="bs-example" data-example-id="simple-responsive-table">
            <h3 class="text-center"><!--  class="page-header" -->
                Historial Transferencias
            </h3>
            <div class="table-responsive" style="padding:50px;">
                <table class="table" id="Tabla4">
                    <thead>
                        <tr>
                            <th>Numero Egreso</th>
                            <th>Concepto</th>
                            <th>Fecha Egreso</th>
                            <th>Valor</th>
                            <th>Valor Letras</th>
                        </tr>
                    </thead>
                    <tbody id="ResultadoDesayunos">
                    <?php
                    require_once('../conexion.php');

                        $ComandoSql= "SELECT * FROM  `comprobanteegreso` ";
                        
                    if($Resultado=$conexion->query($ComandoSql))
                    {
                        while($fila= $Resultado->fetch_array())
                        { 
                            echo '<tr>';
                            echo '<td>'.$fila['IdComprobanteEgreso'].'</td>';
                            echo '<td>'.$fila['ConceptoComprobanteEgreso'].'</td>';
                            echo '<td>'.$fila['FechaComprobanteEgreso'].'</td>';
                            echo '<td>'.$fila['ValorComprobanteEgreso'].'</td>';
                            echo '<td>'.$fila['ValorLetrasComprobanteEgreso'].'</td>';
                        } 
                        echo '</tr>';
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
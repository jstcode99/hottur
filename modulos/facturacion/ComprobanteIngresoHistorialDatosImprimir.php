<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div class="row">
    <div class="col-sm-12">
        <div class="panel ">
            <div class="panel-body">
                <div id="ListadoRecibosDeAbonos">
                    <div class="col-sm-11">
                        <h3><!--  class="page-header" -->
                        Historial de Caja o Abonos
                        </h3>
                    <!--TABLA RESPONSIVA-->
                        <div class="bs-example" data-example-id="simple-responsive-table">
                            <div class="table-responsive">
                                <table class="table" id="Tabla">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha Comprobante</th>
                                            <th>Nombre Cliente</th>
                                            <th>Valor Comprobante</th>
                                            <th>Concepto</th>
                                            <th>Valor en Letras</th>
                                            <th># Reserva</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ResultadoTabla">
                                    <?php
                                    require_once('../../modulos/conexion.php');
                                    
                                    $ComandoSql= "SELECT * FROM historialcomprobanteingreso ";
                                    if($Resultado=$conexion->query($ComandoSql))
                                    {
                                        while($fila= $Resultado->fetch_array())
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$fila['IdHistorialComprobanteIngreso'].'</td>';
                                            echo '<td>'.$fila['FechaHistorialComprobanteIngreso'].'</td>';
                                            echo '<td>'.$fila['NombreComprobanteIngreso'].'</td>';
                                            echo '<td>'.$fila['ValorComprobanteIngreso'].'</td>';
                                            echo '<td>'.$fila['ConceptoComprobanteIngreso'].'</td>';
                                            echo '<td>'.$fila['ValorLetrasComprobanteIngreso'].'</td>';
                                            echo '<td>'.$fila['IdMovimiento'].'</td>';
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
            </div>
        </div>
    </div>
</div>
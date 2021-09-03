<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div class="row">
    <div class="col-sm-12">
        <div class="panel ">
            <div class="panel-body">
                <div id="ListadoRecibosDeAbonos">
                    <div class="col-sm-11">
                        <h3><!--  class="page-header" -->
                        Listado de Recibos de Caja o Abonos
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
                                            <th>Cargar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ResultadoTabla">
                                    <?php
                                    require_once('../../modulos/conexion.php');
                                    
                                    $ComandoSql= "SELECT * FROM ingresocomprobante i WHERE YEAR(I.FechaIngresoComprobante) = YEAR(CURDATE()) ORDER BY i.IdIngresoComprobante DESC";
                                    if($Resultado=$conexion->query($ComandoSql))
                                    {
                                    while($fila= $Resultado->fetch_array())
                                    { 
                                        echo '<tr>';
                                        echo '<td>'.$fila['IdIngresoComprobante'].'</td>';
                                        echo '<td>'.$fila['FechaIngresoComprobante'].'</td>';
                                        echo '<td>'.$fila['NombreClienteIngresoComprobante'].'</td>';
                                        echo '<td>'.$fila['ValorIngresoComprobante'].'</td>';
                                        echo '<td>'.$fila['ConceptoIngresoComprobante'].'</td>';
                                        echo '<td>'.$fila['ValorLetrasIngresoComprobante'].'</td>';
                                        echo '<td>'.$fila['IdMovimiento'].'</td>';
                                        echo '<td>'."<button id='ConsultaEgreso' onclick='CargaDatosEgreso(".json_encode($fila).");' class='btn btn-primary' type='button' >Consultar</button>".'</td>';
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
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<script type="text/javascript" language="javascript" src="../js/html2canvas.js"></script>
<script type="text/javascript" language="javascript" src="../js/jspdf.js"></script>
<br><br>
<div class="container-fluid">
    <div class="panel panel-default">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#ComprobanteIngresoRegistrar" aria-controls="ComprobanteIngresoRegistrar" role="tab" data-toggle="tab">
                    Registro de recibo de caja
                    </a>
                </li>
                    <li role="presentation">
                        <a href="#ComprobanteIngresoListado" onclick="LlamadoTablaEgreso();" aria-controls="ComprobanteIngresoListado" role="tab" data-toggle="tab">
                        Listado Abonos - Recibos de Caja
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#ComprobanteIngresoHistorial" aria-controls="ComprobanteIngresoHistorial" role="tab" data-toggle="tab">
                        Historial Abonos - Recibos de Caja
                        </a>
                    </li>
            </ul>

            <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel"  class="tab-pane active" id="ComprobanteIngresoRegistrar">
                    <br>
                        <?php
                        require_once('ComprobanteIngresoRegistrar.php');
                        ?>
                    </div>
                    
                    <div role="tabpanel2" class="tab-pane" id="ComprobanteIngresoListado">
                        <br>
                            <div id="ListadoLlamadoEgresos"> </div>
                           <div id="AreaImprimirComprobanteIngresoListado">
                            <?php
                            echo "<center>";
                             include('ReciboEgreso.php');
                             echo "</center>";
                            ?>
                           </div>
                           <canvas id="myCanvas" width="578" height="200"></canvas>
                           <center>
                           <br><br>
                            <button type="button" onclick="imprSelec('AreaImprimirComprobanteIngresoListado')" class="btn btn-primary  "><h3>Imprimir</h3></button>
                            <!-- <button type="button" onclick="HTMLtoPDF('AreaImprimirComprobanteIngresoListado')" class="btn btn-primary  "><h3>Generar PDF</h3></button> -->
                            <!--<a type="button" href="javascript:HTMLtoPDF()"  class="btn btn-primary">Generar PDF</a>-->
                           </center>
                            <script>
                            

                            function HTMLtoPDF(){
                                html2canvas($("#AreaImprimirComprobanteIngresoListado"), {
                                            onrendered: function(canvas) {
                                                theCanvas = canvas;
                                                document.getElementById("myCanvas").before(canvas); 
                                            }
                                        });
                                        var canvas = document.getElementById('myCanvas');     
                                        var date = new Date();
                                        var image = canvas.toDataURL("image/png");
                                        var ScreenName = date.getDate()+'-'+(date.getMonth()+1)+'-'+date.getFullYear()+'_'+(date.getHours())+'.'+date.getMinutes()+'.'+date.getSeconds()+'.'+date.getMilliseconds();
                                        var pdf = new jsPDF();
                                        
                                        pdf.addImage(image, 'JPEG', 0, 0);
                                        pdf.save("Recibo: "+ScreenName+".pdf");
                                        }
                                    
                            </script>
                            <!-- <button id='LlamadoRack' class='btn btn-primary '  data-toggle="modal" data-target="#RackModal"  type='button' >Rack</button> -->
                        <br>
                    </div>
                    <div role="tabpanel3"  class="tab-pane" id="ComprobanteIngresoHistorial">
                        <br>
                        <?php
                         require_once('ComprobanteIngresoHistorialDatosImprimir.php'); 
                        
                        ?>
                    </div>
                </div>
    </div>
</div>
<br><br>
<script type="text/javascript" src="../js/ActivarDateTimes.js"></script>
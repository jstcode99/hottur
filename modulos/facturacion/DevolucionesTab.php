<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<br><br>
<div class="container-fluid">
    <div class="panel panel-default">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#DevolucionesRegistrar" aria-controls="DevolucionesRegistrar" role="tab" data-toggle="tab">
                    Historial de Devoluciones
                    </a>
                </li>
                    <!-- <li role="presentation">
                        <a href="#DevolucionesHistorial" aria-controls="DevolucionesHistorial" role="tab" data-toggle="tab">
                        Historial de Devoluciones
                        </a>
                    </li> -->
            </ul>

            <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel"  class="tab-pane active" id="DevolucionesRegistrar">
                    <br>
                        <?php
                          include('ListadoDevolucioneAGenerar.php'); 
                        ?>
                    </div>
                   
                </div>
    </div>
</div>
<br><br>
<script type="text/javascript" src="../js/ActivarDateTimes.js"></script>
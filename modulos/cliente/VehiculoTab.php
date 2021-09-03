<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<br><br>
<div class="container">
    <div class="panel panel-default">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#VehiculoRegistrar" aria-controls="VehiculoRegistrar" role="tab" data-toggle="tab">
                    Registro de Vehiculo
                    </a>
                </li>
                    <li role="presentation">
                        <a href="#VehiculoActualizar" aria-controls="VehiculoActualizar" role="tab" data-toggle="tab">
                        Actualizar Vehiculos
                        </a>
                    </li>
            </ul>

            <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="VehiculoRegistrar">
                    <br>
                        <?php
                            require_once('VehiculoRegistrar.php');
                        ?>
                    </div>
                    <div role="tabpanel2" class="tab-pane" id="VehiculoActualizar">
                        <br>
                            <?php
                            require_once('VehiculoActualizar.php');
                        include('VehiculoListarDatos.php');
                            ?>
                        <br>
                    </div>
                </div>
    </div>
</div>
<br><br>
<script type="text/javascript" src="../js/ActivarDateTimes.js"></script>
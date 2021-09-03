<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<script type="text/javascript" language="javascript" src="../js/ActivarDateTimes.js"></script>
<br><br>
<div class="container">
    <div class="panel panel-default">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#ConvenioRegistrar" aria-controls="ConvenioRegistrar" role="tab" data-toggle="tab">
                    Registro de Convenios
                    </a>
                </li>
                    <li role="presentation">
                        <a href="#ConvenioActualizar" aria-controls="ConvenioActualizar" role="tab" data-toggle="tab">
                        Actualizar Convenios
                        </a>
                    </li>
            </ul>

            <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="ConvenioRegistrar">
                    <br>
                        <?php
                            require_once('ConvenioRegistrar.php');
                        ?>
                    </div>
                    <div role="tabpanel2" class="tab-pane" id="ConvenioActualizar">
                        <br>
                            <?php
                            require_once('ConvenioActualizar.php');
                            require_once('ConvenioListarDatos.php');
                            ?>
                        <br>
                    </div>
                </div>
    </div>
</div>
<br><br>
<script type="text/javascript" src="../js/ActivarDateTimes.js"></script>
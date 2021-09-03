<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<br><br>
<div class="container">
    <div class="panel panel-default">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#TipoContribuyenteRegistrar" aria-controls="TipoContribuyenteRegistrar" role="tab" data-toggle="tab">
                    Registro de Tipo Contribuyente
                    </a>
                </li>
                    <li role="presentation">
                        <a href="#TipoContribuyenteActualizar" aria-controls="TipoContribuyenteActualizar" role="tab" data-toggle="tab">
                        Actualizar Tipo Contribuyente
                        </a>
                    </li>
            </ul>

            <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="TipoContribuyenteRegistrar">
                    <br>
                        <?php
                            require_once('TipoContribuyenteRegistrar.php');
                        ?>
                    </div>
                    <div role="tabpanel2" class="tab-pane" id="TipoContribuyenteActualizar">
                        <br>
                            <?php
                            require_once('TipoContribuyenteActualizar.php');
                        require_once('TipoContribuyenteListarDatos.php');
                            ?>
                        <br>
                    </div>
                </div>
    </div>
</div>
<br><br>
<script type="text/javascript" src="../js/ActivarDateTimes.js"></script>
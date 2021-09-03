<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<br><br>
<div class="container">
    <div class="panel panel-default">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#ListadoClientes" aria-controls="ListadoClientes" role="tab" data-toggle="tab">
                    Listado Clientes
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="ListadoClientes">
                    <br>
                        <?php
                            require_once('ListadoClientes.php');
                        ?>
                    </div>
                </div>
    </div>
</div>
<br><br>
<script type="text/javascript" src="../js/ActivarDateTimes.js"></script>
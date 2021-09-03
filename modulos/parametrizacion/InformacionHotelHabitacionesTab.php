<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<br><br>
<div class="container">
    <div class="panel panel-default">
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#HabitacionRegistrar" aria-controls="HabitacionRegistrar" role="tab" data-toggle="tab">
                    Registro de Habitaciones
                    </a>
                    </li>
                    <li role="presentation">
                        <a href="#HabitacionActualizar" aria-controls="HabitacionActualizar" role="tab" data-toggle="tab">
                        Actualizar de Habitaciones
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#DastosEmpresaRegistrar" onclick="BloquearInformacionHotel();" aria-controls="DastosEmpresaRegistrar" role="tab" data-toggle="tab">
                        Registrar Información Hotel
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#DatosEmpresaActualizar" onclick="DatosEmpresaConsultar();" aria-controls="DatosEmpresaActualizar" role="tab" data-toggle="tab">
                        Actualizar Información Hotel
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#TipoHabitacionRegistrar"  aria-controls="TipoHabitacionRegistrar" role="tab" data-toggle="tab">
                        Tipo Habitación Registrar
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#TipoHabitacionActualizar"  aria-controls="TipoHabitacionActualizar" role="tab" data-toggle="tab">
                        Tipo Habitación Actualizar
                        </a>
                    </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="HabitacionRegistrar">
                    <br>
                        <?php
                            require_once('HabitacionRegistrar.php');
                        ?>
                </div>
                <div role="tabpanel2" class="tab-pane" id="HabitacionActualizar">
                    <br>
                        <?php
                        require_once('HabitacionActualizar.php');
                        ?>
                    <br>
                </div>
                <div role="tabpanel3" class="tab-pane" id="DastosEmpresaRegistrar">
                    <br>
                        <?php
                        require_once('DatosEmpresaRegistrar.php');
                        ?>
                    <br>
                </div>
                <div role="tabpanel3" class="tab-pane" id="DatosEmpresaActualizar">
                    <br>
                    <?php
                        require_once('DatosEmpresaActualizar.php');
                        ?>
                    <br>
                </div>
                <div role="tabpanel4" class="tab-pane" id="TipoHabitacionRegistrar">
                    <br>
                    <?php
                        require_once('TipoHabitacionRegistrar.php');
                        ?>
                    <br>
                </div>
                <div role="tabpanel4" class="tab-pane" id="TipoHabitacionActualizar">
                    <br>
                    <?php
                        require_once('TipoHabitacionActualizar.php');
                        ?>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
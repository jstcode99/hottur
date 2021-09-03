<!--DEBEN RUTA QUEDA ASI Y ESTE LINK LO PONEN EN LOS DIFERENTES MOSTRAR-->
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="page-wrapper">
    <div class="container-fluid" >
        <div style="height:auto">
            <div class="panel panel-default">
             <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="tabpanel" class="active"><a href="#RegistroReserva" aria-controls="RegistroReserva" role="tab" data-toggle="tab">Reserva</a></li>
                    <li role="tabpanel1"><a href="#RegistroRegistro" aria-controls="RegistroRegistro" role="tab" data-toggle="tab">Check in</a></li>
                    <li role="tabpanel2"><a href="#RegistroHuespedes" aria-controls="RegistroHuespedes" role="tab" data-toggle="tab">Huespedes</a></li>
                    <li role="tabpanel2"><a href="#Informes" aria-controls="Informes" role="tab" data-toggle="tab">Informes</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="RegistroReserva">
                        <div class="container-fluid">
                            <?php 
                            include('Reserva/ReservaIngresar.php');
                            ?>
                        </div>
                    </div>
                                    <div role="tabpanel1" class="tab-pane" id="RegistroRegistro">                       
                                        <div class="container-fluid">
                                            <div class="row">
                                            <?php
                                            require_once('Registro/Registro.php');
                                            ?>  
                                            </div> 
                                        </div> 
                                    </div>
                            <div role="tabpanel2" class="tab-pane" id="RegistroHuespedes">
                                <div class="container-fluid">
                                    <div class="row">
                                    <br>
                                        <?php 
                                            //include('ActualizarHuespedes.php');
                                            // include('TiposDeInformes.php');
                                            include('Extras.php');
                                        ?>
                                    <br>
                                    <br>
                                    <br>
                                    </div> 
                                </div>                                            
                            </div>
                        <div role="tabpanel3" class="tab-pane" id="Informes">
                            <div class="container-fluid">
                                <div class="row">
                                <br>
                                    <?php 
                                        //include('ActualizarHuespedes.php');
                                        // include('TiposDeInformes.php');
                                        include('TiposDeInformes.php');
                                    ?>
                                <br>
                                <br>
                                <br>
                                </div> 
                            </div>                                            
                        </div>
                </div>            
            </div>
        </div>
    </div>
</div>
<script src="../js/ActivarDateTimes.js"></script>    


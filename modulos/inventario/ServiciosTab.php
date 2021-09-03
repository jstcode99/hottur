<!--DEBEN RUTA QUEDA ASI Y ESTE LINK LO PONEN EN LOS DIFERENTES MOSTRAR-->
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="page-wrapper">
    <div class="container-fluid" >
        <div class="container" style="height:auto">
            <div class="panel panel-default">
             <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a href="#MostrarServicios" aria-controls="MostrarServicios" role="tab" data-toggle="tab">Servicios registrados</a></li>
                    <li role="presentation" class="active"><a href="#RegistrarServicios" aria-controls="RegistrarServicios" role="tab" data-toggle="tab">Registrar Servicios</a></li>                   
                    <li role="presentation"><a href="#RegistrarTipoServicio" aria-controls="RegistrarTipoServicio" role="tab" data-toggle="tab">Registrar clase de servicio</a></li>                   
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="RegistrarServicios">
                        
                        <?php                        
                            include ('RegistrarServicios.php');                                                     
                        ?>                                                                                                
                    </div>
                    <div role="tabpanel" class="tab-pane" id="MostrarServicios">
                        <div class="row">
                            <?php        
                                include ('ActualizarServicios.php');                                                      
                                include ('MostrarServicios.php');
                            ?> 
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="RegistrarTipoServicio">                       
                            <?php        
                                include ('RegistroTipoServicio.php');                                                                                    
                            ?>                         
                    </div>
                </div>            
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
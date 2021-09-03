<!--DEBEN RUTA QUEDA ASI Y ESTE LINK LO PONEN EN LOS DIFERENTES MOSTRAR-->
<div id="page-wrapper">
    <div class="container-fluid" >
        <div class="container" style="height:auto">
            <div class="panel panel-default">
             <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#RegistrarServicios" aria-controls="RegistrarServicios" role="tab" data-toggle="tab">Registrar Servicios</a></li>                   
                    <li role="presentation"><a href="#RegistroTarifas" aria-controls="RegistroTarifas" role="tab" data-toggle="tab">Tarifas</a></li> 
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="RegistrarServicios">
                        <div class="row">
                        <?php                        
                             include ('RegistrarParametrosHotel.php');
                             include ('ActualizarParametrosHotel.php');                     
                        ?>
                        </div>                        
                    </div>
                        <div role="tabpanel2" class="tab-pane" id="RegistroTarifas">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Ingresar Tarifas
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">
                                    <?php
                                     include('TarifaIngresar.php');
                                    ?> 
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Mostrar y Actualizar Tarifas
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="panel-body">
                                     <?php
                                       include('TarifaActualizar.php');
                                       include('TarifaMostrar.php');
                                     ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>                          
                </div>            
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
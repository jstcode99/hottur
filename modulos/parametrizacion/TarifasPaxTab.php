<script type="text/javascript" src="../js/ListarTablas.js"></script>
<br><br>
<div class="page-wrapper">
    <div class="container-fluid" style="height:auto">

        <div class="panel panel-default">
              <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active">
                      <a href="#TarifaPax" aria-controls="TarifaPax" role="tab" data-toggle="tab">
                        Ingresar Tarifa Pax
                      </a>
                  </li>

                  <li role="presentation">
                      <a href="#TarifaPaxActualizar" aria-controls="TarifaPaxActualizar" role="tab" data-toggle="tab">
                        Actualizar Tarifa Pax
                      </a>
                  </li>
                
                  <li role="presentation">
                      <a href="#TarifaDescuento" aria-controls="TarifaDescuento" role="tab" data-toggle="tab">
                          Ingresar Tarifas
                      </a>
                  </li>

                  <li role="presentation">
                      <a href="#ActualizarTarifa" aria-controls="ActualizarTarifa" role="tab" data-toggle="tab">
                          Actualizar Tarifas
                      </a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="TarifaPax">
                        <br>
                        <?php
                        include('PaxIngresar.php');
                        ?>
                      </div>

                      <div role="tabpanel2" class="tab-pane" id="TarifaPaxActualizar">
                        <br>
                          <?php
                            include('PaxActualizar.php');
                          ?>
                          <br>
                          <?php
                            include('PaxMostrar.php');
                          ?>
                          <br><br>
                      </div>

                      <div role="tabpanel2" class="tab-pane" id="TarifaDescuento">  
                      <br>    
                        <?php
                          include('TarifaIngresar.php');
                        ?>
                      <br>
                      </div>

                      <div role="tabpanel3" class="tab-pane" id="ActualizarTarifa">  
                        <br>    
                          <?php
                              include('TarifaActualizar.php');
                          ?>
                        <br>
                        <?php
                              include('TarifaMostrar.php');
                          ?>
                        <br><br>
                        </div>
                </div>

            
            </div>
        </div>
    </div>
</div>
        

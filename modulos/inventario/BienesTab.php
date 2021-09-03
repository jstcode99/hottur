<!--DEBEN RUTA QUEDA ASI Y ESTE LINK LO PONEN EN LOS DIFERENTES MOSTRAR-->
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="page-wrapper">
    <div class="container-fluid" >
        <div class="container" style="height:auto">
            <div class="panel panel-default">
             <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#RegistrarBienes" aria-controls="RegistrarBienes" role="tab" data-toggle="tab">RegistrarBienes</a></li>
                    <li role="presentation"><a href="#Inventario" aria-controls="Inventario" role="tab" data-toggle="tab">Inventario de activos</a></li>
                    <li role="presentation"><a href="#TipoBienes" aria-controls="TipoBienes" role="tab" data-toggle="tab">Clasificación de activo</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="RegistrarBienes">
                        <?php                        
                            include ('RegistrarBienes.php');
                            
                        ?> 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Inventario">                       
                        <div class="container-fluid">
                            <div class="row">
                            <?php            
                                include ('ActualizarBienes.php');                                                 
                                include ('MostrarBienes.php');                             
                                ?>  
                            </div> 
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="TipoBienes">
                        <div class="container-fluid">
                            <div class="row">
                            <?php     
                                include ('RegistrarTipoBienes.php'); 
                                include ('ActualizarTipoBienes.php');                                                              
                                include ('MostrarTipoBienes.php');                                                                                                                                          
                            ?>
                            </div> 
                        </div>                                            
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>

                              
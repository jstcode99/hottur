<!--DEBEN RUTA QUEDA ASI Y ESTE LINK LO PONEN EN LOS DIFERENTES MOSTRAR-->
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="page-wrapper">
    <div class="container-fluid" >
        <div class="container" style="height:auto">
            <div class="panel panel-default">
             <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#RegistrarProveedores" aria-controls="RegistrarProveedores" role="tab" data-toggle="tab">Registrar Proveedores</a></li>
                    <li role="presentation"><a href="#MostrarProveedores" aria-controls="MostrarProveedores" role="tab" data-toggle="tab">Proveedores registrados</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="RegistrarProveedores">
                        <?php                        
                            include ('RegistrarProveedores.php');
                            
                        ?> 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="MostrarProveedores">
                        <?php                                                            
                            include ('ActualizarProveedores.php');  
                            include ('MostrarProveedores.php');                             
                        ?> 
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>
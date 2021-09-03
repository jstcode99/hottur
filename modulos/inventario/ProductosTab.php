<!--DEBEN RUTA QUEDA ASI Y ESTE LINK LO PONEN EN LOS DIFERENTES MOSTRAR-->
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div id="page-wrapper">
    <div class="container-fluid" >
        <div class="container" style="height:auto">
            <div class="panel panel-default">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#RegistrarProductos" aria-controls="Actualizar" role="tab" data-toggle="tab">
                        Registrar productos
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#MostrarProductos" aria-controls="Actualizar" role="tab" data-toggle="tab">
                        Productos en Inventario
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#Listar" aria-controls="Listar" role="tab" data-toggle="tab">
                        Clasificación de Productos
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#Actualizar" aria-controls="Actualizar" role="tab" data-toggle="tab">
                        Registrar Clasificación
                        </a>
                    </li>
                   
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">                    
                    <div role="tabpanel" class="tab-pane" id="Listar">                        
                        <div class="panel panel-default"  style="padding: 25px;">
                        <?php                        
                            include ('ActualizarTipoProductos.php');
                            include ('MostrarTipoProductos.php');  
                            ?> 
                        </div> 
                    </div> 
                    <div role="tabpanel" class="tab-pane" id="Actualizar">
                            <?php                            
                            include ('RegistrarTipoProductos.php'); 
                            //include ('RegistrarProveedores.php');                             
                            ?>         
                    </div>
                    <div role="tabpanel" class="tab-pane active" id="RegistrarProductos">
                            <?php                            
                            include ('RegistrarProductos.php');                            
                            ?>         
                    </div>
                    <div role="tabpanel" class="tab-pane" id="MostrarProductos">
                            <?php                            
                            include ('ActualizarProductos.php');
                            include ('MostrarProductos.php');                                                                                    
                            ?>         
                    </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--DEBEN RUTA QUEDA ASI Y ESTE LINK LO PONEN EN LOS DIFERENTES MOSTRAR-->
<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<script type="text/javascript" language="javascript" src="../js/ActivarPDF.js"></script>
<div id="page-wrapper">
    <div class="container-fluid" >
        <div class="container" style="height:auto">
            <div class="panel panel-default">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#Listar" aria-controls="Listar" role="tab" data-toggle="tab">
                        Lista
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#Actualizar" aria-controls="Actualizar" role="tab" data-toggle="tab">
                        Registrar
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">                    
                    <div role="tabpanel" class="tab-pane active" id="Listar">
                        
                        <div class="panel panel-default"  style="padding: 25px;">
                        <?php                        
                            include ('ActualizarUsuarios.php');
                            include ('MostrarUsuarios.php');  
                            ?> 
                        </div> 
                    </div> 
                    <div role="tabpanel" class="tab-pane" id="Actualizar">
                            <?php                            
                            include ('RegistrarUsuarios.php');                            
                            ?>         
                    </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
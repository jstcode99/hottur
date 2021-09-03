<!--DEBEN RUTA QUEDA ASI Y ESTE LINK LO PONEN EN LOS DIFERENTES MOSTRAR-->
<!-- <script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script> -->
<script>
                        $(document).ready(function(){
                            $('#ClienteListadodeConvenios').attr("disabled",false);
                            $('#ClienteListadodeConvenios').val(-1);  
                            $('#ClienteValorCredito1').hide();
                            $('#ClienteConvenioSINO1').hide();
                            $('#ClienteListadodeConvenios1').hide();
                            $('#ClienteComisionConvenio1').hide();
                            localStorage.TipoCliente = 1;
                        });
                        
</script>
<div id="page-wrapper">
    <div class="container-fluid" >
        <div style="height:auto">
            <div class="panel panel-default">
             <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="tabpanel" class="active"><a href="#RegistroParticular" aria-controls="RegistroParticular" role="tab" data-toggle="tab">Registro de Cliente</a></li>
                    <li role="tabpanel1"><a href="#RegistroCorporativo" aria-controls="RegistroCorporativo" role="tab" data-toggle="tab">Actualizar Datos Cliente</a></li>
                    <li role="tabpanel2"><a href="#ListadoClientes" aria-controls="ListadoClientes" role="tab" data-toggle="tab">Listado Clientes</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="RegistroParticular">
                        
                        
                        <?php
                            require_once('Particular.php'); 
                        ?>
                    </div>
                    <div role="tabpanel1" class="tab-pane" id="RegistroCorporativo">                       
                        <?php
                            require_once('ParticularActualizar.php');
                        ?> 
                    </div>
                    <div role="tabpanel2" class="tab-pane" id="ListadoClientes">
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                    require_once('ListadoClientes.php');
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


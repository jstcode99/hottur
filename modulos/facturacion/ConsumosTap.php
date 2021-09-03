<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>

                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#RegistrarConsumos" aria-controls="RegistrarConsumos" role="tab" data-toggle="tab">
                        Consumos por huespedes
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#RegistrarConsumosparticular" aria-controls="RegistrarConsumosparticular" role="tab" data-toggle="tab">
                        Consumos por particular
                        </a>
                    </li>                   
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">                    
                    <div role="tabpanel" class="tab-pane active" id="RegistrarConsumos">
                        <br>                                            
                            <?php                        
                            include('RegistrarConsumos.php'); 
                            ?> 
                            <br>
                    </div> 
                    <div role="tabpanel" class="tab-pane" id="RegistrarConsumosparticular">   
                            <br>                                            
                            <?php                        
                            include('RegistrarConsumosExternos.php'); 
                            ?> 
                            <br>
                    </div>                      
                </div>
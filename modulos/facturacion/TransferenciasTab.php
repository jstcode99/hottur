<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>

                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#RegistrarTransferencias" aria-controls="RegistrarTransferencias" role="tab" data-toggle="tab">
                        Transferencia
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#HistorialTransferencias" aria-controls="HistorialTransferencias" role="tab" data-toggle="tab">
                        Historial Transferencias
                        </a>
                    </li>                   
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">                    
                    <div role="tabpanel" class="tab-pane active" id="RegistrarTransferencias">
                        <br>                                            
                            <?php                        
                                include("Transferencias.php");
                            ?> 
                            <br>
                    </div> 
                    <div role="tabpanel" class="tab-pane" id="HistorialTransferencias">   
                            <?php
                                include("TransferenciasHistorial.php");
                            ?>
                    </div>                      
                </div>
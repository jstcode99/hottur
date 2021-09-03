<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<script type="text/javascript" language="javascript" src="../js/AutoCompletar.js"></script>
<script type="text/javascript" language="javascript" src="../js/ActivarDateTimes.js"></script>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#RegistrarCotizacion" aria-controls="RegistrarCotizacion" role="tab" data-toggle="tab">
                        Cotizar
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#ListadoCotizaciones" aria-controls="ListadoCotizaciones" role="tab" data-toggle="tab">
                        Cotizaciones
                        </a>
                    </li>                   
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">                    
                    <div role="tabpanel" class="tab-pane active" id="RegistrarCotizacion">
                        <br>                                            
                            <?php                        
                            include('RegistrarCotizacion.php'); 
                            ?> 
                            <br>
                    </div> 
                    <div role="tabpanel" class="tab-pane" id="ListadoCotizaciones">   
                    <br>                                            
                            <?php                        
                            include('MostrarCotizaciones.php'); 
                            ?> 
                            <br>                                       
                            <?php                        
                            include('FormatoImpresion.php'); 
                            ?> 
                            <br>
                    </div>                      
                </div>
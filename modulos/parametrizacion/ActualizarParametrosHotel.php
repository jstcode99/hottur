<script>
TraerParametrosHotel();
</script>

<div class="col-md-6" >    
    <h3 class="page-header" style="padding:15px">Actualizar Parametrizaciòn del hotel <i class="fa fa-fw fa-gear"></i></h3>
        <div class="panel panel-default">
            <div class="row"  class="panel-body" style="padding:15px;">
                <form style="padding:15px;">
                    <div class="form-group">                        
                            <label for="NuevaParametrosHoraCheckIn">Hora de check in</label>
                            <select id="NuevaParametrosHoraCheckIn" class="form-control">                            
                                <option value="">Selecione de la lista</option>                            
                                <option value="15:00:00">3:00 pm</option>
                                <option value="16:00:00">4:00 pm</option>                         
                            </select>                                              
                    </div>      
                    <div class="form-group">                        
                            <label for="NuevaParametrosHoraCheckOut">Hora de check out</label>
                            <select id="NuevaParametrosHoraCheckOut" class="form-control">
                                <option value="">Selecione de la lista</option>                            
                                <option value="13:00:00">1:00 pm</option>
                                <option value="14:00:00">2:00 pm</option>                                                               
                            </select>                                                    
                    </div>        
                    <div class="form-group">                        
                            <label for="NuevaParametrosLimiteEdad">Decuento por edad (niños)</label>
                            <input type="number" onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="NuevaParametrosLimiteEdad">                                           
                    </div>
                    <div class="form-group">                                    
                            <label for="NuevoParametrosValorSeguro">Valor seguro</label>
                            <input type="number" onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="NuevoParametrosValorSeguro">  
                    </div>               
                    <div class="form-group">                                    
                            <label for="NuevaParametrosPorcentajePenalizacion">Penalizacion de estadia</label>
                            <input type="number" onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="NuevaParametrosPorcentajePenalizacion">                                                    
                    </div> 
                    <div class="form-group">                                    
                            <label for="NuevaParametrosFechaVencimientoFactura">Dias de vencimiento factura</label>
                            <input class="form-control" id="NuevaParametrosFechaVencimientoFactura"/>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4" style="padding:17px;">   
                            <button type="button" onclick="ActualizarParametrosHotel();"  class="btn btn-warning">Enviar</button>        
                        </div>                
                    </div>                                                                                                                                           
                </form>
            </div>
        </div>
</div>
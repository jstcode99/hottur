<div class="col-md-6" >    
    <h3 class="page-header" style="padding:15px">Registrar Parametrizaciòn del hotel <i class="fa fa-fw fa-gear"></i></h3>
        <div class="panel panel-default">
            <div class="row"  class="panel-body" style="padding:15px;">
                <form style="padding:15px;">
                    <div class="form-group">                        
                            <label for="ParametrosHoraCheckIn">Hora de check in</label>
                            <select name="" id="ParametrosHoraCheckIn" class="form-control">
                            <option value="">Selecione de la lista</option>                            
                                <option value="15:00:00">3:00 pm</option>
                                <option value="16:00:00">4:00 pm</option>                                                                                                                           
                            </select>                                              
                    </div>      
                    <div class="form-group">                        
                            <label for="ParametrosHoraCheckOut">Hora de check out</label>
                            <select name="" id="ParametrosHoraCheckOut" class="form-control">
                            <option value="">Selecione de la lista</option> 
                                <option value="13:00:00">1:00 pm</option>
                                <option value="14:00:00">2:00 pm</option>  
                            </select>                                                    
                    </div>        
                    <div class="form-group">                        
                            <label for="ParametrosLimiteEdad">Decuento por edad (niños)</label>
                            <input type="number" onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="ParametrosLimiteEdad">                                           
                    </div>               
                    <div class="form-group">                                    
                            <label for="ParametrosValorSeguro">Valor seguro</label>
                            <input type="number" onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="ParametrosValorSeguro">  
                    </div>             
                    <div class="form-group">                                    
                            <label for="ParametrosPorcentajeEPenalizacon">Penalizacion de estadia</label>
                            <input type="number" onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="ParametrosPorcentajePenalizacion">                                                    
                    </div> 
                    <div class="form-group">                                    
                            <label for="ParametrosFechaVencimientoFactura">Dias de vencimiento factura</label>
                            <input class="form-control" id="ParametrosFechaVencimientoFactura"/>                                                        
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4" style="padding:17px;">   
                            <button type="button" onclick="RegistrarParametrizacionhotel();"  class="btn btn-primary">Enviar</button>        
                        </div>                
                    </div>                                                                                                                                           
                </form>
            </div>
        </div>
</div>
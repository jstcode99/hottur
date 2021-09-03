<div class="col-md-12" >    
    <h4 class="page-header" style="padding:5px">Actualizar datos</h4>
        <form class="form-inline">
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="BienesId">Codigo</label>
                    <input type="text" class="form-control" id="BienesId" disabled>
                </div>                            
            </div>      
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoBienesNombre">Nombre</label>
                    <input type="text" class="form-control" id="NuevoBienesNombre" onkeypress="return ValidarSoloLetras(event);" placeholder="Nombre*">
                </div>                            
            </div>        
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoBienesValor">Valor</label>
                    <input type="text" class="form-control" id="NuevoBienesValor" onkeypress="return ValidarSoloNumeros(event);" placeholder="Valor*">
                </div>                            
            </div>
            <div class="form-group">            
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoBienesEstado">Estado</label>
                    <select  id="NuevoBienesEstado" class="form-control">
                        <option value="">Seleccione de la lista</option>
                        <option value="MALO">MALO</option>                        
                        <option value="BUENO">BUENO</option>
                        <option value="DAÑADO">DAÑADO</option>                   
                    </select>
                </div>     
            </div>              
            <div class="row" style="padding:15px;">
                <div class="form-group">            
                    <div class="col-sm-5" style="padding:5px;">
                        <label for="NuevoBienesIdTipoBienes">Tipo</label>
                        <select  id="NuevoBienesIdTipoBienes" class="form-control">
                            <option value="">Seleccione de la lista</option>
                                <?php                                                            
                                include ('TipoBienes.php');                             
                                ?> 
                        </select>
                    </div>     
                </div> 
                <div class="form-group" class="col-sm-5">
                    <div class="col-sm-5">
                        <label for="NuevoBienesObservaciones">Observaciones</label>
                        <textarea type="text" class="form-control"  id="NuevoBienesObservaciones"></textarea>
                    </div>                            
                </div>        
                <div class="form-group" class="col-sm-2">
                    <div class="col-sm-5">
                        <button type="button" onclick="ActualizarBienes();"  class="btn btn-warning">Enviar</button> 
                    </div>                            
                </div> 
            </div>                                                                                                                                            
        </form>
            <div class="col-lg-12" style="padding:5px;">
                <span id="BienesResultadoActualizacion"></span>
            </div>
</div>

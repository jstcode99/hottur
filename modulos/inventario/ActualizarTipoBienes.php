<div class="col-md-6">    
    <h4 class="page-header">Actualizar categoria</h4>
        <form class="form-inline">
        <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="TipoBienesId">Codigo</label>
                    <input type="text" class="form-control" id="TipoBienesId" disabled>
                </div>                            
            </div>      
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoTipoBienesNombre">Nombre</label>
                    <input type="text" class="form-control" id="NuevoTipoBienesNombre" onkeypress="return ValidarSoloLetras(event);" placeholder="Nombre*">
                </div>                            
            </div>                              
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">   
                    <button type="button" onclick="ActualizarTipoBienes();"  class="btn btn-warning">Enviar</button>        
                </div>                
            </div>               
        </form>
            <div class="col-lg-12" style="padding:5px;">
                <span id="TipoBienesResultadoActualizacion"></span>
            </div>
</div>
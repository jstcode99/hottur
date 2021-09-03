<div class="col-lg-12">
    <h1 class="page-header">Registrar</h1>
</div> 
    <div class="row" style="padding:25px;height:420px;">
        <form lass="form-inline">     
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="BienesNombre">Nombre</label>
                    <input type="text" class="form-control" id="BienesNombre" onkeypress="return ValidarSoloLetras(event);" placeholder="Nombre*">
                </div>                            
            </div>        
            <div class="form-group">       
                <div class="col-sm-4" style="padding:5px;">
                    <label for="BienesValor">Valor</label>         
                    <input type="number" class="form-control" id="BienesValor" placeholder="Valor*">     
                </div>     
            </div>
            <br>
            <div class="form-group">            
                <div class="col-sm-4" style="padding:5px;">
                    <label for="BienesObservaciones">Observaciones</label>
                    <input id="BienesObservaciones" class="form-control"  placeholder="Observaciones*">
                </div>     
            </div>
            <div class="form-group">            
                <div class="col-sm-4" style="padding:5px;">
                    <label for="BienesIdTipoBienes">Tipo de activo</label>
                    <select  id="BienesIdTipoBienes" class="form-control">
                        <option value="">Seleccione de la lista</option>
                    <?php                                                            
                            include ('TipoBienes.php');                             
                        ?> 
                    </select>
                </div>     
            </div>
            <div class="form-group">            
                <div class="col-sm-4" style="padding:5px;">
                    <label for="BienesEstado">Estado</label>
                    <select  id="BienesEstado" class="form-control">
                        <option value="">Seleccione de la lista</option>
                        <option value="MALO">MALO</option>                        
                        <option value="BUENO">BUENO</option>
                        <option value="DAÑADO">DAÑADO</option>                   
                    </select>
                </div>     
            </div>                            
            <div class="form-group">
                <div class="col-sm-4" style="padding:25px;">   
                    <button type="button" onclick="RegistrarBienes();"  class="btn btn-primary">Enviar</button>        
                </div>                
            </div>               
        </form>
        <br>
            <div class="col-lg-12" style="padding:5px;">
                <span id="BienesResultadoRegistro"></span>
            </div>
    </div> 
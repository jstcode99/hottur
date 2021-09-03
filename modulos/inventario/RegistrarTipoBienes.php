<div class="col-md-6">
    <h4 class="page-header">Registrar categoria</h4>
        <form class="form-inline">     
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="TipoBienesNombre">Nombre</label>
                    <input type="text" class="form-control" id="TipoBienesNombre" onkeypress="return ValidarSoloLetras(event);" placeholder="Nombre*">
                </div>                            
            </div>                              
            <div class="form-group">
                <div class="col-sm-4">   
                    <button type="button" onclick="RegistrarTipoBienes();"  class="btn btn-primary">Enviar</button>        
                </div>                
            </div>               
        </form>
        <br>
            <div class="col-lg-12">
                <span id="TipoBienesResultadoRegistro"></span>
            </div> 
    </div>   

   

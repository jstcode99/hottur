<div class="row" style="padding:30px;">                
                <form class="form-horizontal">
                <h3 style="padding:15px;">Registro clase de servcio</h3>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="nombre">Nombre*</label>
                            <input type="text" class="form-control" id="TipoServiciosNombre" onkeypress="return ValidarSoloLetras(event);" >
                        </div>                            
                    </div>      
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="TipoServiciosImpuesto">Impuesto*</label>
                            <input type="number" class="form-control" id="TipoServiciosImpuesto">   
                        </div>                            
                    </div>        
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="ServiciosValor">Centro contable*</label>
                            <input  class="form-control" id="TipoServiciosCentroContable">
                        </div>                            
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="ServiciosValor">Cuenta contable*</label>
                            <input  class="form-control" id="TipoServiciosCuentaContable">
                        </div>                            
                    </div><div class="form-group">
                        <div class="col-sm-3">
                            <label for="ServiciosValor">Concepto contable*</label>
                            <input  class="form-control" id="TipoServiciosConceptoContable">
                        </div>                            
                    </div>
          
                    <div class="form-group">            
                        <div class="col-sm-5">
                            <label for="TipoServiciosObservaciones">Observaciones*</label>
                            <textarea id="TipoServiciosObservaciones" class="form-control" rows="3"></textarea>
                        </div>     
                    </div>                               
                    <div class="form-group">
                        <div class="col-sm-2">  
                        <br>
                        <br>
                        <br>                         
                            <button type="button" onclick="RegistrarTipoServicios();"  class="btn btn-primary">Enviar</button>        
                        </div>                
                    </div>                                                                                                                                           
                </form>
            </div>
            
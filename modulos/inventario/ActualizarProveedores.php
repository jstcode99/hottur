<div class="col-lg-12">
    <h1 class="page-header">Actualizar datos</h1>
</div> 
    <div class="row" style="padding:25px;">
        <form lass="form-inline">
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="ProveedoresId">Codigo</label>
                    <input type="text" class="form-control" id="ProveedoresId" onkeypress="return ValidarSoloLetras(event);" placeholder="#" disabled>
                </div>                            
            </div>
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProveedoresNit">Nit*</label>
                    <input type="text" class="form-control" id="NuevoProveedoresNit" onkeypress="return ValidarSoloNumeros(event);" >
                </div>                            
            </div>    
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProveedoresNombre">Nombre</label>
                    <input type="text" class="form-control" id="NuevoProveedoresNombre" onkeypress="return ValidarSoloLetras(event);" placeholder="Nombre*">
                </div>                            
            </div>        
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProveedoresTelefono">Telefono*</label>
                    <input type="number" class="form-control" id="NuevoProveedoresTelefono">   
                </div>                     
            </div>
            <div class="form-group">       
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProveedoresDireccion">Dirección*</label>
                    <input type="text" class="form-control" id="NuevoProveedoresDireccion">    
                </div>     
            </div>
            <br>
            <div class="form-group">            
                <div class="col-sm-4" style="padding:5px;">
                <label for="NuevoProveedoresCorreo">Correo*</label>
                <input type="email" class="form-control" id="NuevoProveedoresCorreo"> 
                </div>     
            </div>     
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProveedoresCelular">Celular*</label>
                    <input onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="NuevoProveedoresCelular">
                </div>   
            </div>                 
            <div class="form-group">
                <div class="col-sm-4" style="padding:17px;">   
                    <button type="button" onclick="ActualizarProveedores();"  class="btn btn-warning">Enviar</button>        
                </div>                
            </div>
        </form>
        <br>
        <div class="col-lg-12" style="padding:5px;">            
        </div>        
    </div> 
<div class="col-lg-12">
    <h1 class="page-header">Registrar proveedor</h1>
</div>
<div class="row">
    <div class="col-lg-6" style="padding: 45px;">                                
        <form>
            <div class="form-group">
                <label for="ProveedoresNit">Nit*</label>
                <input type="text" class="form-control" id="ProveedoresNit" onkeypress="return ValidarSoloNumeros(event);" >
            </div>
            <div class="form-group">
                <label for="ProveedoresNombre">Nombre*</label>
                <input type="text" class="form-control" id="ProveedoresNombre" onkeypress="return ValidarSoloLetras(event);" >
            </div>
            <div class="form-group">
                <label for="ProveedoresTelefono">Telefono*</label>
                <input type="number" class="form-control" id="ProveedoresTelefono">     
            </div>
            <div class="form-group">
                <label for="ProveedoresDireccion">Dirección*</label>
                <input type="text" class="form-control" id="ProveedoresDireccion">  
            </div>                    
            <div clProvedor>
                <label for="ProveedoresCorreo">Correo*</label>
                <input type="email" class="form-control" id="ProveedoresCorreo">                 
            </div>  
            <div class="form-group">
                <label for="ProveedoresCelular">Celular*</label>
                <input onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="ProveedoresCelular">
            </div>           
                <button type="button" onclick="RegistrarProveedores();"  class="btn btn-primary">Enviar</button>        
        </form>
        <br>                                                   
   </div>    
    <br>
</div> 
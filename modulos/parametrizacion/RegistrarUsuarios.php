<div class="col-lg-12">
    <h1 class="page-header">Registrar Usuarios</h1>
</div>
<div class="row">
    <div class="col-lg-6" style="padding: 45px;">                                
        <form>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" >
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" >
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select  id="rol" class="form-control"  require>
                    <option value="RECEPCIONISTA">RECEPCIONISTA</option>
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option> 
                </select>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" id="telefono" onkeypress="return ValidarSoloNumeros(event);">     
            </div>
            <div class="form-group">
                <label for="correo">Email</label>
                <input type="email" class="form-control" id="correo"  placeholder="jane.doe@example.com" >
            </div>
            <div class="form-group">
                <label for="Contrasena">Contraseña</label>
                <input class="form-control" id="contrasena" type="password" >
            </div>
                <button type="button" onclick="UsuarioRegistrar();"  class="btn btn-primary">Enviar</button>
        </form>                                                     
   </div>    
    <br>
</div>        
                                         
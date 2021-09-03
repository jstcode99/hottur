<div class="row">            
    <div class="col-lg-6" style="padding: 25px;">
        <h1 class="page-header">Actualizar datos</h1>
    <form>
        <div class="form-group">
            <label for="nombre">Usuario</label>
            <input   type="text" class="form-control" id="IdUsuario" onkeypress="return ValidarSoloLetras(event);"  disabled>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input   type="text" class="form-control" id="NuevoNombreUsuario" onkeypress="return ValidarSoloLetras(event);" >
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input  type="text" class="form-control" id="NuevoApellidoUsuario" onkeypress="return ValidarSoloLetras(event);" >
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select  id="NuevoRolUsuario" class="form-control" class="bg-warning"  require>    
            <option value="Selecciones del listado">Selecciones del listado</option>
                <option value="RECEPCIONISTA">RECEPCIONISTA</option>
                <option value="ADMINISTRADOR">ADMINISTRADOR</option> 
            </select>
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input  type="number" class="form-control" id="NuevoTelefonoUsuario" onkeypress="return ValidarSoloNumeros(event);">     
        </div>
        <div class="form-group">
            <label for="correo">Nuevo Correo</label>
            <input type="email" class="form-control" id="NuevoCorreoUsuario"  placeholder="jane.doe@example.com" >
        </div>
        <div class="form-group">
            <label for="Contrasena">Nueva contraseña</label>
            <input class="form-control" id="NuevaContrasenaUsuario" type="password" >
        </div>
        <button type="button"  onclick="ActualizarDatosUsuario();"  class="btn btn-warning">Actualizar</button>    
    </form>
    <br>
    <span id="ResultadoActualizarDatos"></span>
    </div>                                                    
</div> 
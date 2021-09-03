

<!-- Page Heading -->
<div id="page-wrapper">
<!-- Page Heading -->
<div class="container-fluid" style="height:800px">
        <div class="col-lg-12">
            <h1 class="page-header">
                Registrar Usuarios y sus preferencias
            </h1>
        </div>
    <div class="row">
        <div class="col-lg-6" style="height:auto">
        
            <form  id="Formulario">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input name="NombreUsuario" type="text" class="form-control" id="nombre" placeholder="">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input name="ApellidoUsuario" type="text" class="form-control" id="apellido" placeholder="">
                </div>        
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select  id="rol" class="form-control" name="RolUsuario">
                        <option value="" readonly >ROL</option>
                        <option value="RECEPCIONISTA">RECEPCIONISTA</option>
                        <option value="ADMINISTRADOR">ADMINISTRADOR</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input name="TelefonoUsuario" type="number" class="form-control" id="telefono" require>     
                </div>
                <div class="form-group">
                    <label for="correo">Email</label>
                    <input name="CorreoUsuario" type="email" class="form-control" id="correo" placeholder="jane.doe@example.com" require>
                </div>
                <div class="form-group">
                    <label for="Contrasena">Contraseña</label>
                    <input name="ContrasenaUsuario" type="text" class="form-control" id="contrasena" require>
                </div>
                    <button id="Ingresar"  onclick="UsuarioRegistrar();"  class="btn btn-default">Enviar</button>
                    <!-- <button id="Ingresar"  onclick="UsuarioRegistrar($('#nombre').val(),$('#apellido').val(),$('#rol').val(),$('#telefono').val(),$('#correo').val(),$('#contrasena').val());return false;" type="submit" class="btn btn-default">Enviar</button> -->
            </div>
            </form>
            <span id="Resultado"></span>
        </div>
    </div>
    <!-- onclick="UsuarioRegistrar($('#nombre'),$('#apellido'),$('#rol'),$('#telefono'),$('#correo'),$('#contrasena').val());return false;"/.row -->
</div>
<!-- /.container-fluid -->
</div>

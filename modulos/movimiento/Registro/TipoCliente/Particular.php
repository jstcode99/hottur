<script src="../js/AutoCompletar.js"></script>
<!--Row 1-->
    <div class="col-xs-12 col-sm-5 col-md-4">
        <label for="TipoDocumentoClienteParticularRegistro">Tipo Documento</label>
        <select type="text" name="TipoDocumentoClienteParticularRegistro" id="TipoDocumentoClienteParticularRegistro" class="form-control">
          <?php
            require_once('../../../controles/TipoDocumento.php');
          ?>
        </select>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6" id="ContNitClientParti">
        <label for="NitClienteParticularRegistro">Numero Documento</label>
        <input type="text" name="NitClienteParticularRegistro" id="NitClienteParticularRegistro" class="form-control" placeholder="Numero Documento" onkeypress="return ValidarSoloNumeros(event);">
    </div>
    <br>
    <div class="col-xs-12 col-sm-5 col-md-2" style="padding:5px">
        <button type="button" class="btn btn-primary" onclick="VerificarCajaNitSiEstaVacia('REGISTRO');"><li class="glyphicon glyphicon-search"></li></button>
    </div>
<!--Row 2-->
    <div class="col-xs-12 col-sm-12 col-md-6" id="ContNombClientParti">
        <label for="NombreClienteParticularRegistro">Nombres</label>
        <input type="text" name="NombreClienteParticularRegistro" id="NombreClienteParticularRegistro" class="form-control" placeholder="Nombres" onkeypress="return ValidarSoloLetras(event);" disabled="true">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6" id="ContApelliClientParti">
        <label for="ApellidosClienteParticularRegistro">Apellidos</label>
        <input type="text" name="ApellidosClienteParticularRegistro" id="ApellidosClienteParticularRegistro" class="form-control" placeholder="Apellidos" onkeypress="return ValidarSoloLetras(event);" disabled="true">
    </div>
<!--Row 3-->
    <div class="col-xs-12 col-sm-6 col-md-3" id="ContTel1ClientParti">
        <label for="Telefono1ClienteParticularRegistro">Telefono 1</label>
        <input type="tel" name="Telefono1ClienteParticularRegistro" id="Telefono1ClienteParticularRegistro" class="form-control" placeholder="Telefono 1" onkeypress="return ValidarSoloNumeros(event);" disabled="true">
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3" id="ContTel2ClientParti">
        <label for="Telefono2ClienteParticularRegistro">Telefono 2</label>
        <input type="tel" name="Telefono2ClienteParticularRegistro" id="Telefono2ClienteParticularRegistro" class="form-control" placeholder="Telefono 2" onkeypress="return ValidarSoloNumeros(event);">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6" id="ContCorreoClientParti">
        <label for="CorreoClienteParticularRegistro">Correo</label>
        <input type="email" name="CorreoClienteParticularRegistro" id="CorreoClienteParticularRegistro" class="form-control" placeholder="Correo" disabled="true">
    </div>
<!--Row 4-->
    <div class="col-xs-12 col-sm-12 col-md-3" id="ContDireccClientParti">
        <label for="DireccionClienteParticularRegistro">Dirección</label>
        <input type="text" name="DireccionClienteParticularRegistro" id="DireccionClienteParticularRegistro" class="form-control">  
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3" id="ContNacionClientParti">
        <label for="NacionalidadClienteParticularRegistro">Nacionalidad</label>
        <input type="text" name="NacionalidadClienteParticularRegistro" id="NacionalidadClienteParticularRegistro" onblur="HabilitarDepartamento();" onkeypress="return ValidarSoloLetras(event);" onblur="" class="form-control">  
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3" id="ContDepartClientParti">
        <label for="DepartamentoClienteParticularRegistro">Departamento</label>
        <select type="text" name="DepartamentoClienteParticularRegistro" id="DepartamentoClienteParticularRegistro" onchange="CargarCiudadesConSelectDepartamento(this.value);" class="form-control">
        </select>  
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3" id="ContCiudadClientParti">
        <label for="CiudadClienteParticularRegistro">Ciudad</label>
        <select type="text" name="CiudadClienteParticularRegistro" id="CiudadClienteParticularRegistro" class="form-control">
            <?php
                 require_once('CiudadSelect.php');
            ?>
        </select>
    </div>
<!--Row 5-->
    <div class="col-xs-12 col-sm-6 col-md-3" id="ContActiEconoClientParti">
        <label for="ActividadEconomicaClieenteParticularRegistro">Profesion</label>
        <input type="text" name="ActividadEconomicaClieenteParticularRegistro" id="ActividadEconomicaClieenteParticularRegistro" class="form-control" onkeypress="return ValidarSoloLetras(event);">
    </div>
    <!-- <div class="col-xs-12 col-sm-6 col-md-3" id="ContNumCuentClientParti">
        <label for="NumeroCuentaClienteParticularRegistro">Numero Cuenta</label>
        <input type="text" name="NumeroCuentaClienteParticularRegistro" id="NumeroCuentaClienteParticularRegistro" class="form-control"  onkeypress="return ValidarSoloNumeros(event);">
    </div> -->
    <div class="col-xs-12 col-sm-6 col-md-3" id="ContTipPersonClientParti">
        <label for="TipoPersonaClientePartiuclarRegistro">Tipo Persona</label>
        <select type="text" name="TipoPersonaClientePartiuclarRegistro" id="TipoPersonaClientePartiuclarRegistro" class="form-control">
        <?php

            require_once('../../../conexion.php');

            $ComandoSql="SELECT * from personatipo";

            $resultado=$conexion->query($ComandoSql);

            while($fila=$resultado->fetch_array())
            {
            echo"<option value='".$fila['IdPersonaTipo']."'>".$fila['NombrePersonaTipo']."</option>"; 
            }
                
        ?>
        </select>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <label for="TipoContribuyenteClienteParticularRegistro">Tipo Contribuyente</label>
        <select type="text" name="TipoContribuyenteClienteParticularRegistro" id="TipoContribuyenteClienteParticularRegistro" class="form-control">
            <?php
                require_once('../../../conexion.php');

                $ComandoSql="SELECT * from contribuyentetipo";
                
                $resultado=$conexion->query($ComandoSql);
                
                while($fila=$resultado->fetch_array())
                {
                   echo"<option value='".$fila['IdContribuyenteTipo']."'>".$fila['NombreContribuyenteTipo']."</option>"; 
                }
            ?>
        </select>
    </div>
<!--Row 6-->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <label for="PreferenciasClienteParticularRegistro">Preferencias</label>
        <textarea type="text" name="PreferenciasClienteParticularRegistro" id="PreferenciasClienteParticularRegistro" class="form-control" row="2"></textarea>
    </div>
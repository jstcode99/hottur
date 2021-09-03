<!--Formulario para Clientes Tipo Particular-->
<script src="../js/AutoCompletar.JS"></script>
<div class="container-fluid">
    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <form id="form" class="form-horizontal">
                <!--Row 1-->
                <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <label for="ParticularNombre">TIPO CLIENTE: </label>
                            <div class="radio">
                                <label class="DistanciaRadioCliente"><input type="radio" checked onclick="RadioTipoCliente('Particular')" name="optradio" id="Particular">PARTICULAR</label>
                                <label class="DistanciaRadioCliente"><input type="radio" onclick="RadioTipoCliente('Agencia')" name="optradio" id="Agencia">AGENCIA</label>
                                <label class="DistanciaRadioCliente"><input type="radio" onclick="RadioTipoCliente('Corporativo')" name="optradio" id="Corporativo">CORPORATIVO</label>
                            </div>
                        </div>
                </div>

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteNombre">Nombres</label>
                            <input type="text" name="ClienteNombre" id="ClienteNombre" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label for="ClienteApellido">Apellidos</label>
                            <input type="text" name="ClienteApellido" id="ClienteApellido" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <label for="ClienteTipoDocumento">Tipo Documento</label>
                            <select name="ClienteTipoDocumento" id="ClienteTipoDocumento" class="form-control">
                                <option value="">Seleccione Tipo Documento</option>
                                <?php
                                require_once('../controles/TipoDocumento.php');
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteNumeroDocumento">Numero</label>
                            <input type="text" name="ClienteNumeroDocumento" id="ClienteNumeroDocumento" class="form-control" onblur="ValidarExistenciaCliente()" >
                        </div>
                    </div>
                    <!--Row 2-->
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <label for="ClienteTelefono1">Telefono 1</label>
                            <input type="text" name="ClienteTelefono1" id="ClienteTelefono1" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <label for="ClienteTelefono2">Telefono 2</label>
                            <input type="text" name="ClienteTelefono2" id="ClienteTelefono2" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteDireccion">Dirección</label>
                            <input type="text" name="ClienteDireccion" id="ClienteDireccion" class="form-control">  
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5">
                            <label for="ClienteCorreo">Correo</label>
                            <input type="text" name="ClienteCorreo" id="ClienteCorreo" class="form-control">
                        </div>
                    </div>
                    <!--Row 3-->
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteActividadEconomica"> Profesión</label>
                            <input type="text" name="ClienteActividadEconomica" id="ClienteActividadEconomica" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3" style=" display:none;">
                            <label for="ClienteNumeroCuenta">Numero Cuenta</label>
                            <input type="text" name="ClienteNumeroCuenta" id="ClienteNumeroCuenta" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteNacionalidad">Nacionalidad</label>
                            <input type="text" name="ClienteNacionalidad" id="NacionalidadClienteParticularRegistro" onblur="HabilitarDepartamentoDatosCliente();" class="form-control">  
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteDepartamento">Departamento</label>
                            <select class="form-control" name="ClienteDepartamento" disabled onchange="CargarCiudad()" id="ClienteDepartamento">
                                <option value="-1">Seleccione Departamento</option>
                                <?php
                                include('../controles/DepartamentoSelect.php');
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteCiudad">Ciudad</label>
                           
                            <select class="form-control" disabled name="ClienteCiudad" id="ClienteCiudadLista">
                               <!-- <option value="-1" id="ClienteCiudad" ></option> -->
                            </select>
                        </div>
                    </div>
                     <!--Row 4-->
                     <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteTipoPersona">Tipo Persona</label>
                            <select name="ClienteTipoPersona" id="ClienteTipoPersona" class="form-control" >
                                <option value="">Seleccione Tipo Persona</option>
                                <?php
                                     include('../controles/TipoPersona.php');
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteTipoContribuyente">Tipo Contribuyente</label>
                            <select name="ClienteTipoContribuyente" id="ClienteTipoContribuyente" class="form-control" >
                                <option value="-1">Seleccione Tipo Contribuyente</option>
                                <?php
                                     include('../controles/TipoContribuyente.php');
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2" style=" display:none;">
                            <label for="ClienteCodigoMagico">Codigo</label>
                            <input type="text" name="ClienteCodigoMagico" id="ClienteCodigoMagico" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <label for="ClientePreferencias">Preferencias</label>
                            <textarea type="text" name="ClientePreferencias" id="ClientePreferencias" class="form-control" row="2"></textarea>
                        </div>
                    </div>

                    <div class="form-group">

                    <div class="col-xs-12 col-sm-4 col-md-4">
                            <label for="ClienteObservaciones">Observaciones</label>
                            <textarea type="text" name="ClienteObservaciones" id="ClienteObservaciones" class="form-control" row="2"></textarea>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3" id="ClienteValorCredito1">
                            <label for="ClienteValorCredito">Valor Credito</label>
                            <input type="text" name="ClienteValorCredito" id="ClienteValorCredito" class="form-control">
                    </div>
                    

                        <div class="col-xs-2 col-sm-2 col-md-2" id="ClienteConvenioSINO1">
                            <label for="ClienteConvenioSINO">Aplicar Convenio</label>
                            <div class="checkbox" >
                                <label><input type="checkbox"  name="ClienteConvenioSINO" onclick="ListadoConvenios()" id="ClienteConvenioSINO" value="SI">Convenio</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3" id="ClienteListadodeConvenios1">
                            <label for="ClienteListadodeConvenios">Listado de Convenios</label>
                            <select type="text" name="ClienteListadodeConvenios" id="ClienteListadodeConvenios" disabled class="form-control">
                                <option value="-1">Selccione un Convenio</option>
                                <?php 
                                 require_once('../controles/ConvenioSelect.php');
                                ?>
                            </select>
                        </div>
                    </div>
                    
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-3" id="ClienteComisionConvenio1">
                                    <label for="ClienteComisionConvenio">Comisión</label>
                                    <input type="number" min="0" name="ClienteComisionConvenio" id="ClienteComisionConvenio" class="form-control">    
                            </div>
                        </div>
                        
                    <!--Row 5-->
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="button" onclick="ClienteRegistrar();" class="btn btn-success col-md-4 col-sm-2 col-xs-4 btn-md">Guardar</button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
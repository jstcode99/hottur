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
                                <label class="DistanciaRadioCliente"><input type="radio" checked onclick="RadioTipoClienteAcutalizar('Particular')" name="optradio" id="ParticularActualizar">PARTICULAR</label>
                                <label class="DistanciaRadioCliente"><input type="radio" onclick="RadioTipoClienteAcutalizar('Agencia')" name="optradio" id="AgenciaActualizar">AGENCIA</label>
                                <label class="DistanciaRadioCliente"><input type="radio" onclick="RadioTipoClienteAcutalizar('Corporativo')" name="optradio" id="CorporativoActualizar">CORPORATIVO</label>
                            </div>
                        </div>
                </div>

                    <div class="form-group">

                    <div class="col-xs-12 col-sm-6 col-md-2">
                            <label for="ClienteCodigo">Codigo</label>
                            <input type="text" name="ClienteCodigo" id="ClienteCodigo" class="form-control" disabled  >
                        </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteNumeroDocumentoActualizar">Numero</label>
                            <input type="text" name="ClienteNumeroDocumentoActualizar" id="ClienteNumeroDocumentoActualizar" class="form-control" onblur="ValidarExistenciaCliente()" >
                            
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for=""></label>
                            <!-- <input type="text" name="ClienteNumeroDocumento" id="ClienteNumeroDocumento" class="form-control" onblur="ValidarExistenciaCliente()" > -->
                            <button type="button" class="form-control btn btn-info" onclick="ConsultarClienteActualizar()" > Consultar </button>
                        </div>

                  <br>
                  <br>
                  <br>
                  <br>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                            <label for="ClienteTipoDocumentoActualizar">Tipo Documento</label>
                            <select name="ClienteTipoDocumentoActualizar" id="ClienteTipoDocumentoActualizar" class="form-control">
                                <option value="">Seleccione Tipo Documento</option>
                                <?php
                                include('../controles/TipoDocumento.php');
                                ?>
                            </select>
                        </div>
                        
                        
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <label for="ClienteNombreActualizar">Nombres</label>
                            <input type="text" name="ClienteNombreActualizar" id="ClienteNombreActualizar" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-4">
                            <label for="ClienteApellidoActualizar">Apellidos</label>
                            <input type="text" name="ClienteApellidoActualizar" id="ClienteApellidoActualizar" class="form-control">
                        </div>
                        
                    </div>
                    <!--Row 2-->
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <label for="ClienteTelefono1Actualizar">Telefono 1</label>
                            <input type="text" name="ClienteTelefono1Actualizar" id="ClienteTelefono1Actualizar" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <label for="ClienteTelefono2Actualizar">Telefono 2</label>
                            <input type="text" name="ClienteTelefono2Actualizar" id="ClienteTelefono2Actualizar" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteDireccionActualizar">Dirección</label>
                            <input type="text" name="ClienteDireccionActualizar" id="ClienteDireccionActualizar" class="form-control">  
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5">
                            <label for="ClienteCorreoActualizar">Correo</label>
                            <input type="text" name="ClienteCorreoActualizar" id="ClienteCorreoActualizar" class="form-control">
                        </div>
                    </div>
                    <!--Row 3-->
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteActividadEconomicaActualizar">Actividad Economica</label>
                            <input type="text" name="ClienteActividadEconomicaActualizar" id="ClienteActividadEconomicaActualizar" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3" style="display:none;">
                            <label for="ClienteNumeroCuentaActualizar">Numero Cuenta</label>
                            <input type="text" name="ClienteNumeroCuentaActualizar" id="ClienteNumeroCuentaActualizar" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteNacionalidadActualizar">Nacionalidad</label>
                            <input type="text" name="ClienteNacionalidadActualizar" id="NacionalidadClienteParticularActualizar" onblur="HabilitarDepartamentoDatosCliente();" class="form-control">  
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteDepartamentoActualizar">Departamento</label>
                            <select class="form-control" name="ClienteDepartamentoActualizar"  onchange="CargarCiudadActualzar()" id="ClienteDepartamentoActualizar">
                                <option value="">Seleccione Departamento</option>
                                <?php
                                include('../controles/DepartamentoSelect.php');
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteCiudad">Ciudad</label>
                           
                            <select class="form-control"  name="ClienteCiudadActualizar" id="ClienteCiudadListaActualizar">
                               <!-- <option value="-1" id="ClienteCiudad" ></option> -->
                            </select>
                        </div>
                    </div>
                     <!--Row 4-->
                     <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteTipoPersonaActualizar">Tipo Persona</label>
                            <select name="ClienteTipoPersonaActualizar" id="ClienteTipoPersonaActualizar" class="form-control" >
                                <option value="">Seleccione Tipo Persona</option>
                                <?php
                                     include('../controles/TipoPersona.php');
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <label for="ClienteTipoContribuyenteActualizar">Tipo Contribuyente</label>
                            <select name="ClienteTipoContribuyenteActualizar" id="ClienteTipoContribuyenteActualizar" class="form-control" >
                                <option value="">Seleccione Tipo Contribuyente</option>
                                <?php
                                     include('../controles/TipoContribuyente.php');
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2" style=" display:none;">
                            <label for="ClienteCodigoMagicoActualizar">Codigo</label>
                            <input type="text" name="ClienteCodigoMagicoActualizar" id="ClienteCodigoMagicoActualizar" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <label for="ClientePreferenciasActualizar">Preferencias</label>
                            <textarea type="text" name="ClientePreferenciasActualizar" id="ClientePreferenciasActualizar" class="form-control" row="2"></textarea>
                        </div>
                    </div>

                    <div class="form-group">

                    <div class="col-xs-12 col-sm-4 col-md-4">
                            <label for="ClienteObservacionesActualizar">Observaciones</label>
                            <textarea type="text" name="ClienteObservacionesActualizar" id="ClienteObservacionesActualizar" class="form-control" row="2"></textarea>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3" id="ClienteValorCreditoActualizar1">
                            <label for="ClienteValorCreditoActualizar">Valor Credito</label>
                            <input type="text" name="ClienteValorCreditoActualizar" id="ClienteValorCreditoActualizar" class="form-control">
                    </div>
                    

                        <div class="col-xs-2 col-sm-2 col-md-2" id="ClienteConvenioSINOActualizar1">
                            <label for="ClienteConvenioSINOActualizar">Aplicar Convenio</label>
                            <div class="checkbox" >
                                <label><input type="checkbox"  name="ClienteConvenioSINOActualizar" onclick="ListadoConveniosActualizar()" id="ClienteConvenioSINOActualizar" value="SI">Convenio</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3" id="ClienteListadodeConveniosActualizar1">
                            <label for="ClienteListadodeConveniosActualizar">Listado de Convenios</label>
                            <select type="text" disabled="disabled" name="ClienteListadodeConveniosActualizar" id="ClienteListadodeConveniosActualizar"  class="form-control">
                                <option value="-1">Selccione un Convenio</option>
                                <?php 
                                 include('../controles/ConvenioSelect.php');
                                ?>
                            </select>
                        </div>
                    </div>
                    
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-3" id="ClienteComisionConvenioActualizar1">
                                    <label for="ClienteComisionConvenioActualizar">Comisión </label>
                                    <input type="number" min="0"   name="ClienteComisionConvenioActualizar" id="ClienteComisionConvenioActualizar" class="form-control">    
                            </div>
                        </div>
                        
                    <!--Row 5-->
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="button" onclick="ClienteActualizar();" class="btn btn-warning col-md-4 col-sm-2 col-xs-4 btn-md">Actualizar</button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function(){
    $('#ClienteListadodeConveniosActualizar1').attr("disabled",false);
    $('#ClienteListadodeConveniosActualizar').val(-1);  
    $("#ClienteValorCreditoActualizar1").hide();
    $("#ClienteConvenioSINOActualizar1").hide();
    $("#ClienteListadodeConveniosActualizar1").hide();
    $("#ClienteComisionConvenioActualizar1").hide();
    localStorage.TipoClienteActualizar = 1;
});
</script>
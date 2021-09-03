
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" id="formUpload1">

                        <legend>Actualizar Información Hotel</legend>
                            <div class="form-group">
                                <label for="DatosEmpresaCodigoActualizar" class="col-sm-3 control-label">Codigo de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaCodigoActualizar" disabled="disabled" id="DatosEmpresaCodigoActualizar" class="form-control" placeholder="Nit de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaNitActualizar" class="col-sm-3 control-label">Nit de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaNitActualizar" id="DatosEmpresaNitActualizar" class="form-control" placeholder="Nit de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaNombreActualizar" class="col-sm-3 control-label">Nombre de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaNombreActualizar" id="DatosEmpresaNombreActualizar" class="form-control" placeholder="Nombre de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaTelefonoActualizar" class="col-sm-3 control-label">Telefono de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaTelefonoActualizar" id="DatosEmpresaTelefonoActualizar" class="form-control" placeholder="Telefono de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaCorreoActualizar" class="col-sm-3 control-label">Correo de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="email" name="DatosEmpresaCorreoActualizar" id="DatosEmpresaCorreoActualizar" class="form-control" placeholder="Correo de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaDireccionActualizar" class="col-sm-3 control-label">Dirección de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaDireccionActualizar" id="DatosEmpresaDireccionActualizar" class="form-control" placeholder="Dirección de Empresa">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="DatosEmpresaLogo" class="col-sm-3 control-label">Imagen</label>
                                <div class="col-sm-4">
                                   <img src="" alt="" id="MostrarImagenActualizar" class="col-sm-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaLogoActualizar" class="col-sm-3 control-label">Logo de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="file" name="DatosEmpresaLogoActualizar" id="DatosEmpresaLogoActualizar" class="form-control" placeholder="Dirección de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaWebActualizar" class="col-sm-3 control-label">Sitio Web de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaWebActualizar" id="DatosEmpresaWebActualizar" class="form-control" placeholder="Sitio Web de Empresa">
                                </div>
                            </div>

                            <!-- <div class="form-group" style="display: none;">
                                <label for="NombreProceso" class="col-sm-3 control-label">Sitio Web de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="NombreProceso" readonly="readonly" id="NombreProceso"   class="form-control" value="ActualizarDatosEmpresa" placeholder="Sitio Web de Empresa">
                                </div>
                            </div> -->
                            <div class="form-group">
                            <div class="col-sm-9">

                            </div>
                            <button type="button" onclick="DatosEmpresaActualizar();" class="btn btn-warning btn-md">Actualizar</button>
                            <span id="ResultadoDatosEmpresa">

                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
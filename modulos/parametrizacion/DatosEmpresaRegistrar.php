<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" id="formUpload">

                        <legend>Información Hotel</legend>
                            <div class="form-group">
                                <label for="DatosEmpresaNit" class="col-sm-3 control-label">Nit de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaNit" id="DatosEmpresaNit" class="form-control" placeholder="Nit de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaNombre" class="col-sm-3 control-label">Nombre de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaNombre" id="DatosEmpresaNombre" class="form-control" placeholder="Nombre de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaTelefono" class="col-sm-3 control-label">Telefono de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaTelefono" id="DatosEmpresaTelefono" class="form-control" placeholder="Telefono de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaCorreo" class="col-sm-3 control-label">Correo de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="email" name="DatosEmpresaCorreo" id="DatosEmpresaCorreo" class="form-control" placeholder="Correo de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaDireccion" class="col-sm-3 control-label">Dirección de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaDireccion" id="DatosEmpresaDireccion" class="form-control" placeholder="Dirección de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaLogo" class="col-sm-3 control-label">Logo de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="file" name="DatosEmpresaLogo" id="DatosEmpresaLogo" class="form-control" placeholder="Dirección de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DatosEmpresaWeb" class="col-sm-3 control-label">Sitio Web de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="DatosEmpresaWeb" id="DatosEmpresaWeb" class="form-control" placeholder="Sitio Web de Empresa">
                                </div>
                            </div>

                            <div class="form-group" style="display: none;">
                                <label for="NombreProceso" class="col-sm-3 control-label">Sitio Web de Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" name="NombreProceso" readonly="readonly"  id="NombreProceso" class="form-control" value="RegistrarDatosEmpresa" placeholder="Sitio Web de Empresa">
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-9">

                            </div>
                            <button type="button" id="GuardarDatosEmpresa" onclick="DatosEmpresaRegistrar();" class="btn btn-primary btn-md">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
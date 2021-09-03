<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal">

                        <legend>Actualizar Convenio</legend>
                            
                            <div class="form-group">
                                <label for="ConvenioIdentificador" class="col-sm-4 control-label">Identificador</label>
                                <div class="col-sm-5">
                                    <input type="text" name="ConvenioIdentificador" disabled id="ActualizarConvenioIdentificador" class="form-control" placeholder="Identificador">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="ConvenioCodigo" class="col-sm-4 control-label">Codigo</label>
                                <div class="col-sm-5">
                                    <input type="text" name="ConvenioCodigo" id="ActualizarConvenioCodigo" class="form-control" placeholder="Codigo">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="ConvenioEstado" class="col-sm-4 control-label">Estado</label>
                                <div class="col-sm-5">
                                        <select class="form-control"  id="ActualizarConvenioEstado">
                                            <option value="ACTIVO">ACTIVO</option>    
                                            <option value="CANCELADO">CANCELADO</option>    
                                            <option value="FINALIZADO">FINALIZADO</option>    
                                        </select>
                                </div>
                            </div>

                            <div class="form-group">
                            
                                <label for="ConvenioNombre" class="col-sm-4 control-label">Nombre Convenio</label>
                                <div class="col-sm-8 ">
                                    <input type="text"  name="ConvenioNombre" id="ActualizarConvenioNombre" class="form-control" placeholder="Nombre Convenio">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ConvenioFormaPago" class="col-sm-6 control-label">Forma de Pago:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Credito</label>
                                <div class="col-sm-2">
                                    <input type="checkbox"  name="ConvenioFormaPago" id="ActualizarConvenioFormaPago" class="form-control">
                                
                                </div>
                            </div>

                           
                           
                        <div class="form-group">
                                        <label class="col-sm-4 col-md-4 control-label"  for="ConvenioFechaInicio" class="">Fecha Inicio Convenio</label>
                                    <div class=" col-sm-8 col-md-8">
                                                            <div class="input-group date" id="ConvenioFechaInicio1"  >
                                                                            <input type="text" id="ActualizarConvenioFechaInicio"   class="form-control">
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                            </div>
                                    </div>
                        </div>
                        
                        <div class="form-group">
                                        <label class="col-sm-4 col-md-4 control-label"  for="ConvenioFechaFinal" class="">Fecha Final Convenio</label>
                                    <div class=" col-sm-8 col-md-8">
                                                            <div class="input-group date" id="ConvenioFechaFinal1"  >
                                                                            <input type="text" id="ActualizarConvenioFechaFinal"    class="form-control">
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                            </div>
                                    </div>
                        </div>
                        
                        
                        

                            

                           
                            <div class="form-group">
                            <div class="col-sm-9">

                            </div>
                            <button type="button" onclick="ConvenioActualizar();" class="btn btn-primary btn-md">Actualizar</button>
                            <br>
                            <br>
                            <span id="Resultado">

                            </span>
                        </div>
                    </form>

                </div>
            </div>
                    <br>
                    <br>
                    <br>
        </div>
    </div>
</div>

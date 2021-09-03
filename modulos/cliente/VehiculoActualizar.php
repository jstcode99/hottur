<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal">

                        <legend>Registro de Vehiculos</legend>


                            <div class="form-group form-inline">
                                <label for="VehiculoActualizarCodigo" class="col-sm-3 control-label">Codigo</label>
                                <div class="col-sm-9">
                                    <input type="text" disabled name="VehiculoActualizarCodigo" id="VehiculoActualizarCodigo" class="form-control" placeholder="Codigo">
                                </div>
                            </div>

                            <div class="form-group form-inline">
                                <label for="VehiculoActualizarDocumento" class="col-sm-3 control-label">Cedula</label>
                                <div class="col-sm-9 col-xs-12">
                                    <input type="text" name="VehiculoActualizarDocumento" id="VehiculoActualizarDocumento" class="form-control" placeholder="Cedula">
   
                                </div>
                            </div>

                            <div class="form-group">
                            
                                <label for="VehiculoActualizarPlaca" class="col-sm-3 control-label">Placa Vehiculo</label>
                                <div class="col-sm-9">
                                    <input type="text"  name="VehiculoActualizarPlaca" id="VehiculoActualizarPlaca" class="form-control" placeholder="Placa Vehiculo">
                                </div>
                            </div>
                           
                           
                            <div class="form-group">
                            <div class="row">
                                <div class="panel-body">
                                    <div class="col-xs-12 col-sm-3 col-md-3"  >
                                        <label for="FechaEntrada1" class="">Fecha Ingreso</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-9">
                                                            <div class="input-group date"   >
                                                                            <input type="text" id="VehiculoActualizarFechaEntrada"   class="form-control">
                                                                            <span class="input-group-addon" id="FechaEntrada1">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                           
                           
                            <div class="form-group">
                            <div class="row">
                                <div class="panel-body">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <label for="FechaSalida1" class="">Fecha Salida</label>
                                    </div>
                                        <div class="col-xs-12 col-sm-9 col-md-9">
                                                            <div class="input-group date" >
                                                                       <input type="text" id="VehiculoActualizarFechaSalida"  class="form-control">
                                                                            <span class="input-group-addon" id="FechaSalida1">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                            <div class="form-group">
                                <label for="VehiculoActualizarObservacion" class="col-sm-3 control-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea name=""  class="form-control" id="VehiculoActualizarObservacion" cols="30" rows="5" placeholder="Descripción"></textarea>
                                </div>
                            </div>

                           
                            <div class="form-group">
                            <div class="col-sm-9">

                            </div>
                            <button type="button" onclick="VehiculoActualizar();" class="btn btn-warning btn-md">Actualiar</button>
                            <br>
                            <br>
                            <span id="Resultado">

                            </span>
                        </div>
                    </form>

                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

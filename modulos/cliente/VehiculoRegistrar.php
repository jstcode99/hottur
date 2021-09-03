<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal">

                        <legend>Registro de Vehiculos</legend>


                            <div class="form-group form-inline">
                                <label for="VehiculoDocumento" class="col-sm-3 control-label">Cedula</label>
                                <div class="col-sm-9">
                                    <input type="text" name="VehiculoDocumento" id="VehiculoDocumento" class="form-control" placeholder="Cedula">
                                    <!-- <button type="button" onclick="BuscarCliente();" class="btn btn-primary">Consultar Cliente</button> -->
                                </div>
                            </div>


                            <div class="form-group">
                            
                                <label for="VehiculoPlaca" class="col-sm-3 control-label">Placa Vehiculo</label>
                                <div class="col-sm-9">
                                    <input type="text"  name="VehiculoPlaca" id="VehiculoPlaca" class="form-control" placeholder="Placa Vehiculo">
                                </div>
                            </div>
                           
                           
                        <div class="form-group">
                            <div class="row">
                                <div class="panel-body">
                                    <div class="col-xs-12 col-sm-3 col-md-3"  >
                                        <label for="FechaEntrada" class="">Fecha Ingreso</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-9">
                                                            <div class="input-group date" id="FechaEntrada"  >
                                                                            <input type="text" id="VehiculoFechaEntrada"   class="form-control">
                                                                            <span class="input-group-addon">
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
                                        <label for="FechaSalida" class="">Fecha Salida</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-9">
                                                            <div class="input-group date" id="FechaSalida">
                                                                            <input type="text" id="VehiculoFechaSalida"  class="form-control">
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                            <div class="form-group">
                                <label for="VehiculoObservacion" class="col-sm-3 control-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea name=""  class="form-control" id="VehiculoObservacion" cols="30" rows="5" placeholder="Descripción"></textarea>
                                </div>
                            </div>

                           
                            <div class="form-group">
                            <div class="col-sm-9">

                            </div>
                            <button type="button" onclick="VehiculoRegistrar();" class="btn btn-primary btn-md">Guardar</button>
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

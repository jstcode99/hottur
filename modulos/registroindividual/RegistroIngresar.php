<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel">
        <div class="panel-body">
           
            <form id="Forms" class="form-horizontal">

                <form class="form-inline">
                    <div class="form-group">
                        <label><h4>¿ El Cliente Tiene Reserva ?&nbsp;&nbsp;</h4></label>
                        <label class="radio-inline">
                            <input type="radio" name="RegistroTieneReserva" id="ReservaTieneSi" value="Si">Si
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="RegistroTieneReserva" id="ReservaTieneNo" value="No">No
                        </label>
                    </div>
                </form>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 col-md-2">
                            <div class="panel">
                              <label for="RegistroTipoCliente" class ="">Tipo Cliente</label>
                              <select name="RegistroTipoCliente" id="RegistroTipoCliente" class="form-control" onchange="ActivarCajasParaBuscarCliente();">
                                      <?php
                                        include('../controles/TipoCliente.php');
                                        ?>
                              </select>
                            </div>           
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2">
                               <div class="panel">
                                  <label for="RegistroClienteTipoDocumento" class="">Tipo Documento</label>
                                  <select name="RegistroClienteTipoDocumento" id="RegistroClienteTipoDocumento" class="form-control" disabled="true">
                                      <?php
                                        include('../controles/TipoDocumento.php');
                                        ?>
                                  </select>
                                  
                               </div>
                        </div>    
                        <div class="col-xs-12 col-sm-4 col-md-4"> 
                                <div class="panel">
                                        <label for="RegistroClienteNit" class="">Nit</label>
                                        <input type="text" name="RegistroClienteNit" id="RegistroClienteNit" class="form-control" placeholder="Nit" onkeypress="return ValidarSoloNumeros(event);"> 
                                </div>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2" style="padding:5px">
                              <div class="panel">
                                    <br>
                                    <button type="button" class="btn btn-primary btn-md" onclick="">Verificar</button>
                              </div>
                        </div>
                            <?php
                            include('TablaCheckIn.php');
                            ?>
                    </div>
                </div>
                  <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-7">
                            <div class="panel-body">
                            <?php
                            include('ClienteRegistro.php');
                            ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5">
                            <div class="panel-body">
                                <div class="form-group">
                                    <legend>Tarifa</legend>
                                     <select name="RegistroTipoTarifa" id="MovimientoReservaTipoTarifa" class="form-control">
                                      <?php
                                        include('../controles/TipoTarifa.php');
                                        ?>
                                     </select>
                                </div>
    
                                <div class="form-group">
                                    <!--<legend>Reserva</legend>-->
                                    <div class="row">                                       
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <label for="RegistroEstado">Estado</label>
                                                  <select name="RegistroEstado" id="RegistroEstado" class="form-control" disabled>
                                                      <option value="ACTIVA">ACTIVA</option>
                                                      <option value="FINALIZADA">FINALIZADA</option>
                                                      <option value="CANCELADA">CANCELADA</option>
                                                  </select>
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <label for="RegistroFormaPago">Forma de Pago</label>
                                                  <select name="RegistroFormaPago" id="RegistroFormaPago" class="form-control">
                                                      <option value="EFECTIVO">EFECTIVO</option>
                                                      <option value="TARJETACREDITO">TARJETA CREDITO</option>
                                                      <option value="TARJETADEBITO">TARJETA DEBITO</option>
                                                      <option value="CHEQUE">CHEQUE</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <label for="RegistroAbono" class="col-xs-12 col-sm-2 col-md-2 control-label">Abonos</label>
                                            <div class="col-xs-12 col-sm-10 col-md-10">
                                                <input type="number" class="form-control" name="RegistroAbono" id="RegistroAbono" placeholder="$" >   
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                          <div class="panel-body">
                                              <div class="col-xs-12 col-sm-6 col-md-6">
                                                  <label for="RegistroFechaEntrada">Fecha Entrada</label>
                                                  <div class='input-group date' id='RegistroFechaEntrada'>
                                                      <input type='text' id="RegistroFechaEntrada" class="form-control" />
                                                      <span class="input-group-addon">
                                                          <span class="glyphicon glyphicon-calendar"></span>
                                                      </span>
                                                  </div>
                                              </div>

                                              <div class="col-xs-12 col-sm-6 col-md-6">
                                                  <label for="RegistroFechaSalida">Fecha Salida</label>
                                                  <div class='input-group date' id='RegistroFechaSalida'>
                                                      <input type='text' id="RegistroFechaSalida" class="form-control" />
                                                      <span class="input-group-addon">
                                                          <span class="glyphicon glyphicon-calendar"></span>
                                                      </span>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>

                                    <div class="row">

                                          <div class="panel-body">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <label for="RegistroMotovoViaje">Motivo Viaje</label>
                                                      <select name="RegistroMotivoViaje" id="RegistroMotivoViaje" class="form-control">
                                                          <option value="ESTUDIO">ESTUDIO</option>
                                                          <option value="TRABAJO">TRABAJO</option>
                                                          <option value="TURISMO">TURISMO</option>
                                                      </select>
                                                </div>

                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <label for="RegistroTipoTransporte">Tipo Transporte</label>
                                                      <select name="RegistroTipoTransporte" id="RegistroTipoTransporte" class="form-control">
                                                          <option value="AEREO">AEREO</option>
                                                          <option value="TERRESTRE">TERRESTRE</option>
                                                          <option value="MARITIMO">MARITIMO</option>
                                                      </select>
                                                </div>
                                          </div>
                                    </div> 

                                    <div class="row">
                                            <div class="panel-body">
                                                  <div class="col-sm-12">
                                                      <label for="RegistroObservaciones">Observaciones</label>
                                                      <textarea class="form-control" rows="3" id="RegistroObservaciones" name="RegistroObservaciones" placeholder="Observaciones"></textarea>
                                                  </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label for="RegistroAgencia">Agencia</label>
                                            <select name="RegistroAgencia" id="RegistroAgencia" class="form-control">
                                                <option value="">Seleccione Agencia</option>
                                                <option value="NINGUNA">NINGUNA</option>
                                                <?php
                                                include('../controles/AgenciaSelect.php');
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label for="RegistroIdHabitacion">Habitacion</label>
                                            <input type="text" name="RegistroIdHabitacion" id="RegistroIdHabitacion" class="form-control">
                                        </div>

                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label for="">Rack grafico</label>
                                            <button type="button"  type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-rack">Rack Grafico <i class="glyphicon glyphicon-th"></i> </button>
                                        </div>
                                        
                                    </div>

                                </div>
                        
                            </div>
                        </div>
                  </div>
  
                  <div class="panel-body">
                        <div class="row">
                          <div class="col-xs-12 col-sm-4 col-md-4">
                          </div>
                          <button type="button" class="btn btn-primary col-xs-12 col-sm-4 col-md-4" onclick="">Guardar</button>
                          <div class="col-xs-12 col-sm-4 col-md-4">
                          </div>
                        </div>
                  </div>
               <br><br>
            </form>
          
        </div>
      </div>
    </div>
  </div>    
</div>
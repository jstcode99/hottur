<script src="../js/ActivarToggle.js"></script>
<script src="../js/ActivarDateTimes.js"></script>
<div class="container-fluid" id="ReservaIngresar">
  <div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-body">
           
                <form id="Forms" class="form-horizontal">

                    <legend>Reserva</legend>
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-5">
                            <legend>&nbsp;Datos Cliente</legend>
                            <div class="from-group">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <label for="ClienteTipoReserva" class ="">Tipo Cliente</label>
                                        <select name="ClienteTipoReserva" id="ClienteTipoReserva" class="form-control" onchange="TraerFormularioDatosClienteReserva();">
                                                <option value="">Seleecione tipo Cliente</option>
                                                <?php
                                                    include('../controles/TipoCliente.php');
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body" id="ContenedorDatosClienteReserva">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7">
                            <legend>Datos Reserva</legend>
                            <div class="form-group">
                                <div class="row">
                                    <label class="checkbox-inline">
                                      ¿ Viene en grupo ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <input type="checkbox" id="GrupoSiNoMovimiento" data-toggle="toggle" data-onstyle="success"> 
                                    </label>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                                <label for="">Estado</label>
                                                    <select name="MovimientoReservaEstado" id="MovimientoReservaEstado" class="Dato form-control" disabled>
                                                        <option value="ACTIVO">ACTIVO</option>
                                                        <option value="FINALIZADA">FINALIZADA</option>
                                                        <option value="CANCELADA">CANCELADA</option>
                                                    </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4" id="ContenedorFechaEntradaReserva">
                                                <label for="FechaEntradaReserva">Fecha Entrada</label>
                                                    <div class='input-group date' id='FechaEntradaReserva'>
                                                        <input type='text' id="MovimientoReservaFechaEntrada" onblur="ValidarFechasOnchange(this.value,$('#MovimientoReservaFechaSalida').val());" class="Dato form-control" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4" id="ContenedorFechaSalidaReserva">
                                                <label for="FechaSalidaReserva">Fecha Salida</label>
                                                    <div class='input-group date' id='FechaSalidaReserva'>
                                                        <input type='text' id="MovimientoReservaFechaSalida" onblur="ValidarFechasOnchange($('#MovimientoReservaFechaEntrada').val(),this.value);" class="Dato form-control" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                            <div class="col-xs-12 col-sm-8 col-md-4">
                                                <label for="">Tarifa</label>
                                                    <select name="MovimientoReservaTipoTarifa" id="MovimientoReservaTipoTarifa" class="Dato form-control">
                                                        <?php
                                                        include('../controles/TipoTarifa.php');
                                                        ?>
                                                    </select>
                                            </div>
                                            <div class="col-xs-6 col-sm-12 col-md-4">
                                                <label for="MovimientoReservaMotovoViaje">Motivo Viaje</label>
                                                    <select name="MovimientoReservaMotivoViaje" id="MovimientoReservaMotivoViaje" class="Dato form-control">
                                                        <option value="ESTUDIO">ESTUDIO</option>
                                                        <option value="TRABAJO">TRABAJO</option>
                                                        <option value="TURISMO">TURISMO</option>
                                                    </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                                <label for="MovimientoReservaTipoTransporte">Tipo Transporte</label>
                                                    <select name="MovimientoReservaTipoTransporte" id="MovimientoReservaTipoTransporte" class="Dato form-control">
                                                        <option value="AEREO">AEREO</option>
                                                        <option value="TERRESTRE">TERRESTRE</option>
                                                        <option value="MARITIMO">MARITIMO</option>
                                                    </select>
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <label for="MovimientoReservaObservaciones">Observaciones</label>
                                            <textarea class="Dato form-control" rows="6" id="MovimientoReservaObservaciones" name="MovimientoObservaciones" placeholder="Observaciones" length="120"></textarea>
                                        </div>           
                                    </div>
                                </div>     
                            </div>
                        
                        </div>
                    </div>
                        &nbsp;&nbsp;&nbsp;<button  type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-rack" style="margin-top:5px">Rack Grafico<i class="glyphicon glyphicon-th"></i> </button>
                    <br><br>
                    <div class="row" id="Contenedor">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="col-xs-12 col-sm-3 col-md-4">
                                <label for="NombreHabitacion">Habitacion</label>
                            <input type="text" name="NombreHabitacion" id="NombreHabitacion" class="form-control" onblur="CantMaxAdultos(this.value,'RESERVA');">
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-4">
                                <label for="CantidadAdultos">Adultos</label>
                                <input type="number" name="CantidadAdultos" id="CantidadAdultos"  onblur="CantMaxNinos(this.value,this.max);" class="form-control">
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-4">
                                <label for="CantidadNinos">Niños</label>
                                <input type="number" name="CantidadNinos" id="CantidadNinos" class="form-control" value="0" min="0" onblur="ValidarCantNinos(this.value,this.max);">
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-2">
                                <label class="checkbox">Desayuno</label>
                                    &nbsp;&nbsp;<input type="checkbox" id="Desayuno" data-toggle="toggle" data-onstyle="success">  
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-5" name="ContenedorDesayuno" id="ContenedorDesayuno">
                                <label for="SelectDesayuno">Tipo desayuno</label>
                                    <select class="form-control" name="SelectDesayuno" id="SelectDesayuno">
                                          <option value="">Tipo Desayuno</option>
                                        <?php
                                            require_once('../controles/DesayunosSelect.php');
                                        ?>
                                    </select>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-5">
                                <label for="ValorEstadiaHabitacion">Valor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                            <input type="text" disabled class="form-control" id="ValorEstadiaHabitacion" placeholder="Amount" value="0">
                                        <div class="input-group-addon">.00</div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <label for="NitResponsable">Nit Responsable</label>
                                <input type="text" name="NitResponsable" id="NitResponsable" class="form-control" onkeypress="return ValidarSoloNumeros(event);">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <label for="NombreResponsable">Nombres</label>
                                <input type="text" name="NombreResponsable" id="NombreResponsable" class="form-control" onkeypress="return ValidarSoloLetras(event);">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="ApelldisoResponsable">Apellidos</label>
                                <input type="text" name="ApelldisoResponsable" id="ApelldisoResponsable" class="form-control" onkeypress="return ValidarSoloLetras(event);">
                            </div>
                        </div>
                        <div class="con-xs-12 col-sm-12 col-md-12">
                            <div class="panel-body">
                                <label for="ObservacionesHabitacion">Observaciones Habitacion</label>
                                <textarea name="ObservacionesHabitacion" class="form-control" id="ObservacionesHabitacion" cols="30" rows="2"></textarea>
                            </div>
                        </div>
                        <br><br>
                        <div class="con-xs-12 col-sm-12 col-md-12">
                                <div class="col-xs-12 col-sm-4 col-md-4"></div>
                                <button type="button" id="BtnAgregar"  onclick="AgregarRow('RESERVA');" class="col-xs-12 col-sm-4 col-md-4 btn btn-primary" style="margin-top:5px">Agregar Habitacion</button>
                                <div class="col-xs-12 col-sm-4 col-md-4"></div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row" id="ContenedorHabitaciones">
                       <div class="col-xs-12 col-sm-11 col-md-11" id="TablaRecarga">
                        <br><br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <td>N°</td>
                                            <td>Habitacion</td>
                                            <td>Adultos</td>
                                            <td>Niños</td>
                                            <td>Desayuno</td>
                                            <td>Nit Responsable</td>
                                            <td>Nombre</td>
                                            <td>Apellidos</td>
                                            <td>Observaciones</td>
                                            <td>Valor</td>
                                            <td>Eliminar</td>
                                        </tr>
                                    </thead>
                                    <tbody id="TablaHabitacion">
                                    </tbody>
                                </table>
                            </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-8"></div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="ValorTotalReserva">Valor Total</label>
                                <div class="input-group">
                                    <div class="input-group-addon">$</div>
                                        <input type="text" disabled class="Dato form-control" id="ValorTotalReserva" placeholder="Amount">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>                             
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4"></div>
                                <button type="button" class="btn btn-primary col-xs-12 col-sm-4 col-md-4" id="IngresarReserva"onclick="ContaryAsignarValor();">Guardar</button>
                            <div class="col-xs-12 col-sm-4 col-md-4"></div>
                        </div>
                    </div>
                    <br><br>
                </form>        
            </div>
        </div>
    </div>
  </div>    
</div>
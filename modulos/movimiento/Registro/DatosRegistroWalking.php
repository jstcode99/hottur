<script src="../js/ActivarDateTimes.js"></script>
<div class="panel-body">
    <div class="form-group">
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <label for="">Estado</label>
                        <select name="MovimientoRegistroEstado" id="MovimientoRegistroEstado" class="form-control" disabled>
                            <option value="ACTIVO">ACTIVA</option>
                            <option value="FINALIZADA">FINALIZADA</option>
                            <option value="CANCELADA">CANCELADA</option>
                        </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <label for="FechaEntradaRegistro">Fecha Entrada</label>
                        <div class='input-group date' id='FechaEntradaRegistro'>
                            <input type='text' id="MovimientoRegistroFechaEntrada" onblur="ValidarFechasOnchange(this.value,$('#MovimientoRegistroFechaSalida').val());" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <label for="FechaSalidaRegistro">Fecha Salida</label>
                        <div class='input-group date' id='FechaSalidaRegistro'>
                            <input type='text' id="MovimientoRegistroFechaSalida" onblur="ValidarFechasOnchange($('#MovimientoRegistroFechaEntrada').val(),this.value);" class="form-control" />
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
                        <select name="MovimientoRegistroTipoTarifa" id="MovimientoRegistroTipoTarifa" class="form-control">
                        <?php
                            require_once('../../conexion.php');
                            $ComandoSql="SELECT * from tarifa";
                                $resultado=$conexion->query($ComandoSql);
                                  while($fila=$resultado->fetch_array())
                                  {
                                     echo"<option value='".$fila['IdTarifa']."'>".$fila['NombreTarifa']."</option>"; 
                                 }
                         ?>
                        </select>
                </div>
                <div class="col-xs-6 col-sm-12 col-md-4">
                    <label for="MovimientoRegistroMotovoViaje">Motivo Viaje</label>
                        <select name="MovimientoRegistroMotivoViaje" id="MovimientoRegistroMotivoViaje" class="form-control">
                            <option value="ESTUDIO">ESTUDIO</option>
                            <option value="TRABAJO">TRABAJO</option>
                            <option value="TURISMO">TURISMO</option>
                        </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <label for="MovimientoRegistroTipoTransporte">Tipo Transporte</label>
                        <select name="MovimientoRegistroTipoTransporte" id="MovimientoRegistroTipoTransporte" class="form-control">
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
                <label for="MovimientoRegistroObservaciones">Observaciones</label>
                <textarea class="form-control" rows="6" id="MovimientoRegistroObservaciones" name="MovimientoObservaciones" placeholder="Observaciones" length="120"></textarea>
            </div>           
        </div>
    </div>     
</div>
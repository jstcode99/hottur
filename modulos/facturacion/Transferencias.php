<div style="padding:20px;" class="col-sm-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Cliente que transfiere abono</h4>
            <div class="col-sm-9">
                <label for="">Nit o Cedula</label>
                <input class="form-control" id="NitTransferenciasEmisor" placeholder="Nit" requeride>
            </div>
            <br>
            
            <div style="padding: 5px">
                <button type="button" onclick="BuscarClienteTransfiere('EMISOR');" class="btn btn-primary btn-sm">Buscar</button>
            </div>
            <div class="col-sm-11">
                <label for="">Nombre</label>
                <input type="text" id="NombreClienteTransferenciasEmisor" onchange="MostrarHabitacionesFormularioTransferencia('EMISOR');" disabled class="form-control">
            </div>
            <div class="col-sm-11">
                <label for="">Listado Movimiento Activos</label>
                <select name="" id="ListadoMovimientosTransferenciaEmisor" onchange="MostrarHabitacionesFormularioTransferencia('EMISOR');" class="form-control">
                    
                </select>
            </div>
            <div class="col-sm-11">
                <label for="">Habitaciones</label>
                <input type="text" id="HabitacionesTransferenciasEmisor" disabled class="form-control">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="AbonoTotalEmisor">Abono Total</label>
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" disabled id="AbonoTotalEmisor" placeholder="Amount">
                        <div class="input-group-addon">.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="padding:20px;" class ="col-sm-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Cliente que recibe abono</h4>
            <div class="col-sm-9">
                <label for="">Nit o Cedula</label>
                <input class="form-control" id="NitTransferenciasReceptor" placeholder="Nit" requeride>
            </div>
            <br>
            <div style="padding: 5px">
                <button type="button" class="btn btn-primary btn-sm" onclick="BuscarClienteTransfiere('RECEPTOR');">Buscar</button>
            </div>
            <div class="col-sm-11">
                <label for="">Nombre</label>
                <input type="text" id="NombreClienteTransferenciasReceptor" disabled class="form-control">
            </div>
            <div class="col-sm-11">
                <label for="">Listado Movimiento Activos</label>
                <select name="" id="ListadoMovimientosTransferenciaReceptor" onchange="MostrarHabitacionesFormularioTransferencia('RECEPTOR');" class="form-control">
                    
                </select>
            </div>
            <div class="col-sm-11">
                <label for="">Habitaciones</label>
                <input type="text" id="HabitacionesTransferenciasReceptor" disabled class="form-control">
            </div>
            <div class="col-sm-11">
                <div class="form-group">
                    <label for="AbonoTotalReceptor">Abono Total</label>
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" disabled id="AbonoTotalReceptor" placeholder="Amount">
                        <div class="input-group-addon">.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <label for="">valor a transferir</label>
                <input class="form-control" id="ValorATransferir"  requeride>
                <br>
                <button type="button" class="btn btn-primary col-sm-12" onclick="InsertFormularioTransferencia();">Transferir</button>
            </div>
            <div class="col-sm-4"></div>
            <br>
            <br><br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>


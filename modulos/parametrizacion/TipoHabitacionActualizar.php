<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal">

                        <legend>Actualizar Tipo de Habitaciones</legend>
                            <div class="form-group">
                                <label for="TipoHabitacionCodigoActualizar" class="col-sm-3 control-label">Codigo </label>
                                <div class="col-sm-9">
                                    <input type="text" name="TipoHabitacionCodigoActualizar" id="TipoHabitacionCodigoActualizar" class="form-control" disabled="disabled" placeholder="Codigo Tipo Habitación">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="TipoHabitacionNombreActualizar" class="col-sm-3 control-label">Nombre Tipo Habitación</label>
                                <div class="col-sm-9">
                                    <input type="text" name="TipoHabitacionNombreActualizar" id="TipoHabitacionNombreActualizar" class="form-control" placeholder="Nombre Tipo Habitación">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="TipoHabitacionCantidadPaxActualizar" class="col-sm-3 control-label">Cantidad Pax Tipo Habitación </label>
                                <div class="col-sm-9">
                                    <input type="text" name="TipoHabitacionCantidadPaxActualizar" id="TipoHabitacionCantidadPaxActualizar" class="form-control" placeholder="Cantidad Pax Tipo Habitación">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="TipoHabitacionValorPaxActualizar" class="col-sm-3 control-label">Valor Pax Tipo Habitación</label>
                                <div class="col-sm-9">
                                    <input type="text" name="TipoHabitacionValorPaxActualizar" id="TipoHabitacionValorPaxActualizar" class="form-control" placeholder="Valor Pax Tipo Habitación">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="TipoHabitacionValorAdicionalActualizar" class="col-sm-3 control-label">Valor Adicional Tipo Habitación</label>
                                <div class="col-sm-9">
                                    <input type="text" name="TipoHabitacionValorAdicionalActualizar" id="TipoHabitacionValorAdicionalActualizar" class="form-control" placeholder="Valor Adicional Tipo Habitación">
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-9">
                            </div>
                            <button type="button" onclick="TipoHabitacionActualizar();" class="btn btn-warning btn-md">Actualizar</button>
                            
                        </div>
                    </form>

                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
       
            <?php 
            require_once('TipoHabitacionListarDatos.php');
            ?>
        
        

    </div>
</div>
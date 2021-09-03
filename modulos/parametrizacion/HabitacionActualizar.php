<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal">

                        <legend>Actualizar de Habitaciones</legend>
                            <div class="form-group">
                                <label for="HabitacionCodigoActualizar" class="col-sm-3 control-label">Codigo Habitación</label>
                                <div class="col-sm-9">
                                    <input type="text"  disabled="disabled"  name="HabitacionCodigoActualizar" id="HabitacionCodigoActualizar" class="form-control" placeholder="Codigo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HabitacionNombreAcutalizar" class="col-sm-3 control-label">Nombre Habitación</label>
                                <div class="col-sm-9">
                                    <input type="text" name="HabitacionNombreAcutalizar" id="HabitacionNombreAcutalizar" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HabitacionEstadoActualizar" class="col-sm-3 control-label">Estado Habitación</label>
                                <div class="col-sm-9">
                                    <select name="" id="HabitacionEstadoActualizar" class="form-control">
                                        <option value="Seleccione del Listado">Seleccione del Listado</option>
                                        <option value="OCUPADA">OCUPADA</option>
                                        <option value="SUCIA">SUCIA</option>
                                        <option value="MANTENIMIENTO">MANTENIMIENTO</option>
                                        <option value="DISPONIBLE">DISPONIBLE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HabitacionEstado" class="col-sm-3 control-label">Tipo Habitación</label>
                                <div class="col-sm-9">
                                    <select name="" id="HabitacionTipoActualizar" class="form-control">
                                        <?php 
                                        include('TipoHabitacion.php');
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HabitacionObservacionActualizar" class="col-sm-3 control-label">Observación</label>
                                <div class="col-sm-9">
                                    <textarea name="" class="form-control" id="HabitacionObservacionActualizar" cols="30" rows="5" placeholder="Observaciones"></textarea>
                                </div>
                            </div>

                           
                            <div class="form-group">
                            <div class="col-sm-9">

                            </div>
                            <button type="button" onclick="HabitacionActualizar();" class="btn btn-warning btn-md">Actualizar</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <?php 
        require_once('HabitacionListarDatos.php');
        ?>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal">

                        <legend>Registro de Habitaciones</legend>
                            <div class="form-group">
                                <label for="HabitacionNombre" class="col-sm-3 control-label">Nombre Habitación</label>
                                <div class="col-sm-9">
                                    <input type="text" name="HabitacionNombre" id="HabitacionNombre" class="form-control" placeholder="Nombre Habitación">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HabitacionEstado" class="col-sm-3 control-label">Estado Habitación</label>
                                <div class="col-sm-9">
                                    <select name="" id="HabitacionEstado" class="form-control">
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
                                    <select name="" id="HabitacionTipo" class="form-control">
                                        <?php 
                                        include('TipoHabitacion.php');
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HabitacionObservacion" class="col-sm-3 control-label">Observación</label>
                                <div class="col-sm-9">
                                    <textarea name="" class="form-control" id="HabitacionObservacion" cols="30" rows="5" placeholder="Observaciones"></textarea>
                                </div>
                            </div>

                           
                            <div class="form-group">
                            <div class="col-sm-9">

                            </div>
                            <button type="button" onclick="HabitacionRegistrar();" class="btn btn-primary btn-md">Guardar</button>
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
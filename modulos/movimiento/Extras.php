<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div class="row" style="padding:25px" id="TablaRecarga">
  

    <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Cambio de Habitción</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
      
      
      <div class="container">
      <!-- form-inline -->
        <form class="">
            <div class="row">
                        
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="HabitacionActual">Habitación Actual:</label>
                                    
                                    <select onchange="QuitarOption('HabitacionActual','HabitacionCambio');" name="HabitacionActual"  id="HabitacionActual" class="form-control">
                                        <option value="">Seleccione Habitación</option>
                                        <?php 
                                         include('../conexion.php');
                                         $ComandoSql="SELECT mh.IdMovimientoHabitacion, h.IdHabitacion, h.NombreHabitacion, ht.NombreHabitacionTipo, mh.ObservacionesMovimientoHabitacion  FROM movimientohabitacion mh, habitacion h, habitaciontipo ht WHERE mh.EstadoMovimientoHabitacion = 'ACTIVO' AND mh.TipoMovimientoHabitacion = 'CHECK IN' AND mh.IdHabitacion = h.IdHabitacion AND h.IdHabitacionTipo = ht.IdHabitacionTipo";
                                         $resultado=$conexion->query($ComandoSql);
       
                                         while($fila=$resultado->fetch_array())
                                         {
                                            echo"<option value='". json_encode($fila)."'>".$fila['NombreHabitacion']." - ".$fila['NombreHabitacionTipo']. "</option>"; 
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-1">
                                <label for="HabitacionActual"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <label type="button" disabled class="btn btn-default"> --></label>
                                </div>

                                <div class="col-md-3">
                                    <label for="HabitacionCambio">Habitación a Cambiar:</label>
                                    
                                    <select name="HabitacionCambio"  id="HabitacionCambio" class="form-control">
                                        <option value="">Seleccione Habitación</option>
                                        <?php 
                                         /* include('../conexion.php'); */
                                         //$ComandoSql="SELECT mh.IdMovimientoHabitacion, h.IdHabitacion, h.NombreHabitacion, ht.NombreHabitacionTipo  FROM movimientohabitacion mh, habitacion h, habitaciontipo ht WHERE (mh.EstadoMovimientoHabitacion = 'FINALIZADO' OR mh.EstadoMovimientoHabitacion = 'CANCELADO') AND mh.TipoMovimientoHabitacion = 'CHECK OUT' AND mh.IdHabitacion = h.IdHabitacion AND h.IdHabitacionTipo = ht.IdHabitacionTipo GROUP BY h.NombreHabitacion";
                                         $ComandoSql="SELECT habitacion.IdHabitacion,habitacion.NombreHabitacion,habitaciontipo.NombreHabitacionTipo, movimientohabitacion.IdMovimientoHabitacion FROM habitacion , habitaciontipo, movimientohabitacion WHERE habitacion.IdHabitacion not in(SELECT movimientohabitacion.IdHabitacion FROM movimientohabitacion WHERE movimientohabitacion.TipoMovimientoHabitacion='CHECK IN' AND movimientohabitacion.EstadoMovimientoHabitacion='ACTIVO') AND habitacion.IdHabitacionTipo= habitaciontipo.IdHabitacionTipo GROUP by habitacion.IdHabitacion";
                                         $resultado=$conexion->query($ComandoSql);
       
                                         while($fila=$resultado->fetch_array())
                                         {
                                            echo"<option value='".json_encode($fila)."'>".$fila['NombreHabitacion']." - ".$fila['NombreHabitacionTipo']. "</option>"; 
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-5">
                                    <label for="Observaciones">Observaciones:</label>
                                    <textarea name="" class="form-control" id="ObservacionesCambio" cols="30" rows="3" placeholder="Observaciones"></textarea>
                                </div>

                            </div>

                            
                            <button type="button" class="btn btn-warning" onclick="ActualizarCambioHabitacion()">Actualizar</button>
            </div>
        </form>
      </div>



      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Huesped</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
                <?php
                    require_once('ActualizarHuespedes.php');
                ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Pasadía </a>
      </h4>
    </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
      
                  <?php
                      require_once('Pasadia.php');
                  ?>                           
        
        </div>
      </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        Movimientos Especificos </a>
      </h4>
    </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
                 
                  <?php
                      require_once('MovimientoEspecifico.php');
                  ?>                           
        
        </div>
      </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        Actualizar Huespedes </a>
      </h4>
    </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
                 
                  <?php
                      require_once('HistorialHuespedes.php');
                  ?> 
                  <?php
                      require_once('ActualizarHuespedesFormulario.php');
                  ?> 
        
        </div>
      </div>
  </div>


</div>


</div>


                        
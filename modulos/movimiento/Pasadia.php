<script src="../js/AutoCompletar.JS"></script>
        <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="panel-body">
                                <form action="" class="form-inline">
                                        <label for="SelecHabitacionesActualizarHuespedePasadia">Habitación</label>
                                        <select name="" id="SelecHabitacionesActualizarHuespedePasadia" onchange="CargarDatosHuespedPasadia()" class="form-control">
                                                <option value="">Seleccione Habitacion</option>
                                                <?php
                                                        include('HabitacionesSelectActualizarHuespedes.php');
                                                ?>
                                        </select>
                                </form>
                        </div>
                </div>
        </div>
        <div class="panel-default">
                <div class="panel-heading">
                        
                           Capacidad pax :<a class="text-primary" id="CantidadPaxHuespedPasadias"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                           Estado: <a class="text-primary" id="EstadoPaxHuespedPasadias"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Entrada: <a class="text-primary" id="FechaEntradaHuespedPasadias"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Salida: <a class="text-primary" id="FechaSalidaHuespedPasadias"></a><br>
                           Actualmente hay Adultos:<a class="text-primary" id="CantAdultosHuespedPasadias"></a>&nbsp;&nbsp;&nbsp;Niños:<a class="text-primary" id="CantNinosHuespedPasadias"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acidionales:<a class="text-primary" id="CantPasadiaHuespedAdicionales"></a><br>
                           Nit:<a class="text-primary" id="NitResponsableHuespedPasadias"></a><br>
                           Responsable:<a class="text-primary" id="NombreResponsableHuespedPasadias"></a><br>
                        
                </div>
                  
                <div id="CargarTablaPasadia">
                </div>

                <?php 
              //  include('PasadiaListarDatos.php');
                ?>
        </div>  
        <br>
        <br>
        <br>
        <br>
        <br>
<script src="../js/ActivarDateTimes.js"></script>



                        
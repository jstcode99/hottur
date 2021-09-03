<script src="../js/AutoCompletar.JS"></script>
        <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="panel-body">
                                <form action="" class="form-inline">
                                        <label for="SelecHabitacionesActualizarHuespedes">Habitación</label>
                                        <select name="" id="SelecHabitacionesActualizarHuespedes" onchange="CargarDatosHuespedExtra()" class="form-control">
                                                <option value="">Seleccione Habitacion</option>
                                                <?php
                                                        require_once('HabitacionesSelectActualizarHuespedes.php');
                                                ?>
                                        </select>
                                </form>
                        </div>
                </div>
        </div>
        <div class="panel-default">
                <div class="panel-heading">
                        
                           Capacidad pax :<a class="text-primary" id="CantidadPaxHuespedExtras"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                           Estado: <a class="text-primary" id="EstadoPaxHuespedExtras"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Entrada: <a class="text-primary" id="FechaEntradaHuespedExtras"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Salida: <a class="text-primary" id="FechaSalidaHuespedExtras"></a><br>
                           Actualmente hay Adultos:<a class="text-primary" id="CantAdultosHuespedExtras"></a>&nbsp;&nbsp;&nbsp;Niños:<a class="text-primary" id="CantNinosHuespedExtras"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adicionales:<a class="text-primary" id="CantExtrasHuespedAdicionales"></a><br>
                           Nit:<a class="text-primary" id="NitResponsableHuespedExtras"></a><br>
                           Responsable:<a class="text-primary" id="NombreResponsableHuespedExtras"></a><br>
                        
                </div>
                  
                <div class="panel-body">                                 
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                        <br><legend>&nbsp;&nbsp;Huesped(es)</legend>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="col-xs-12 col-sm-4 col-md-3">
                                                                <div class="form-group">
                                                                        <label for="HuespesTipoExtra" class="label-control">Tipo Huespe</label>
                                                                         <input class="form-control" required value="ADICIONAL" disabled  placeholder="Tipo Huesped" id="TipoHuespedExtras" />
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-5">
                                                                <div class="form-group">
                                                                        <label class="label-control" for="TipoDocumentoHuespedExtras">Tipo Documento</label>
                                                                        <select  class="form-control HuespedTipoDocumento" id="TipoDocumentoHuespedExtras">
                                                                                <option value="CEDULA DE CIUDADANIA">CEDULA DE CIUDADANIA</option>
                                                                                <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                                                                                <option value="CEDULA DE EXTRANJERIA">CEDULA DE EXTRANJERIA</option>
                                                                                <option value="PASAPORTE">PASAPORTE</option>
                                                                        </select>
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                         <label class="label-control">Numero Documento</label>                                                        
                                                                        <input class="form-control HuespedId" onblur="ConultaHuespedExtra()"  placeholder="Numero Documento" id="NumeroDocumentoHuespedHuespedExtras" />
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-5 col-md-4">
                                                                <div class="form-group">
                                                                        <label class="label-control">Nombre</label>                       
                                                                        <input class="form-control HuespedNombre"    placeholder="Nombre" id="NombreHuespedHuespedExtras" />                                                                                           
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-7 col-md-8">
                                                                <div class="form-group">
                                                                        <label class="label-control">Apellidos</label>                           
                                                                        <input  class="form-control HuespedApellido"   placeholder="Apellido" id="ApellidoHuespedHuespedExtras" />                                                    
                                                                </div>
                                                </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="col-xs-12 col-sm-5 col-md-5">
                                                                <div class="form-group">
                                                                        <label class="label-control">Nacionalidad</label>  
                                                                        <input class="form-control HuespedNacionalidad"   placeholder="Nacionalidad" id="NacionalidadHuespedHuespedExtras" />                                                                
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-5 col-md-5">
                                                                <div class="form-group">
                                                                        <label for="FechaEntrada">Fecha Nacimiento</label>
                                                                        <div class='input-group date' id='FechaNacimiento'>
                                                                                <input type='text' id="FechaNacimientoHuespedExtras" class="form-control" />
                                                                                <span class="input-group-addon">
                                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                                </span>
                                                                        </div>             
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2 col-md-1">
                                                                <div class="form-group" style="padding:5px">
                                                                        <label for="">
                                                                        Seguro<input type="checkbox" data-width="110" id="SeguroRegistroHuespedExtras" data-toggle="toggle" data-onstyle="success">  
                                                                        </label>
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                        <label class="label-control">Observaciones</label>  
                                                                        <textarea class="form-control HuespedObservaciones"   placeholder="Observaciones" id="ObservacionesHuespedHuespedExtras"/></textarea> 
                                                                </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="con-xs-12 col-sm-12 col-md-12">
                                        <div class="col-xs-12 col-sm-4 col-md-4"></div>
                                        <button type="button" id="BtnAgregarHuespedesHuespedExtras"  onclick="RegistrarHuespedExtras();" class="col-xs-12 col-sm-4 col-md-4 btn btn-success" style="margin-top:5px">Guardar</button>
                                        <div class="col-xs-12 col-sm-4 col-md-4"></div>
                                </div>
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
        </div>  
        <br>
        <br>
        <br>
        <br>
        <br>
<script src="../js/ActivarDateTimes.js"></script>
                        
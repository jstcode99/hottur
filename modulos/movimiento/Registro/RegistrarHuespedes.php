<script src="../js/AutoCompletar.JS"></script>


        <div class="panel-default" id="SegundoContenedorHuespedesRegistroConReserva">
                <div class="panel-heading">
                        <?php
                           echo 'Habitación:<a class="text-primary" id="">'.$_POST['NombreHabitacion'].'</a>&nbsp;&nbsp;&nbsp;Estado: <a class="text-primary" id="">'.$_POST['TipoMovimiento'].'</a>&nbsp;&nbsp;&nbsp;Adultos:<a class="text-primary" id="CantAdultRHuespe">'.$_POST['CantAdultos'].'</a>&nbsp;&nbsp;&nbsp;Niños:<a class="text-primary" id="CantNinosRHuespe">'.$_POST['CantNinos'].'</a><br>';
                           echo 'Nit:<a class="text-primary" id="">'.$_POST['NitResponsable'].'</a><br>';
                           echo 'Responsable:<a class="text-primary" id="">'.$_POST['NombreResponsable'].'</a><br>';
                        ?>
                </div>
        
                <!-- <buttom type="button" class="btn btn-primary" onclick="RegistrarHuespedes();">Registrar Huespedes</buttom>                    
                <buttom type="button" class="btn btn-primary" onclick="AgregarFila();">Agregar Fila <i class="glyphicon glyphicon-plus"></i></buttom>                     -->
        	 <!--	<button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>
                       TABLA A CLONAR-->              
                <div class="panel-body">                                 
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                        <br><legend>&nbsp;&nbsp;Huesped(es)</legend>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="col-xs-12 col-sm-4 col-md-3">
                                                                <div class="form-group">
                                                                        <label for="HuespesTipoConReserva" class="label-control">Huesped</label>
                                                                        <select name="" id="HuespesTipoConReserva" class="form-control HuespedTipo">
                                                                                  <option value="">Tipo Huesped</option>
                                                                                  <option value="ADULTO">Adulto</option>
                                                                                  <option value="NINO">Niño</option>
                                                                        </select>
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-5">
                                                                <div class="form-group">
                                                                        <label class="label-control" for="TipoDocumentoHuespedConReserva">Tipo Documento</label>
                                                                        <select  class="form-control HuespedTipoDocumento" id="TipoDocumentoHuespedConReserva">
                                                                                <option value="CEDULA DE CIUDADANIA">CEDULA DE CIUDADANIA</option>
                                                                                <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                                                                                <option value="CEDULA DE EXTRANJERIA">CEDULA DE EXTRANJERIA</option>
                                                                                <option value="PASAPORTE">PASAPORTE</option>
                                                                                <option value='TARJETA EXTRANJERIA'>TARJETA EXTRANJERIA</option>
                                                                                <option value='REGISTRO CIVIL'>REGISTRO CIVIL</option>
                                                                        </select>
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                         <label class="label-control">Numero Documento</label>                                                        
                                                                        <!-- <input class="form-control HuespedId" required  placeholder="Cedula" onblur="ExisteHuesped($('#TipoDocumento<?php //echo $i; ?>').val(),this.value,Nombre<?php //echo $i;?>,Apellido<?php //echo $i; ?>,Nacionalidad<?php //echo $i; ?>,FechaNaciomiento<?php //echo $i; ?>);" onkeypress="return ValidarSoloNumeros(event);"/> -->
                                                                        <input class="form-control HuespedId" required  placeholder="Numero Documento" id="NumeroDocumentoHuespedConReserva" onblur="ExisteHuesped('HuespesTipoConReserva','NumeroDocumentoHuespedConReserva','TipoDocumentoHuespedConReserva','NombreHuespedConReserva','ApellidoHuespedConReserva','NacionalidadHuespedConReserva','FechaNacimientoHuespedConReserva');" onkeypress="return ValidarSoloNumeros(event);"/>
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-5 col-md-4">
                                                                <div class="form-group">
                                                                        <label class="label-control">Nombre</label>                       
                                                                        <input class="form-control HuespedNombre"  required  placeholder="Nombre" id="NombreHuespedConReserva" onkeypress="return ValidarSoloLetras(event);"/>                                                                                           
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-7 col-md-8">
                                                                <div class="form-group">
                                                                        <label class="label-control">Apellidos</label>                           
                                                                        <input  class="form-control HuespedApellido" required  placeholder="Apellido" id="ApellidoHuespedConReserva" onkeypress="return ValidarSoloLetras(event);"/>                                                    
                                                                </div>
                                                </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="col-xs-12 col-sm-5 col-md-5">
                                                                <div class="form-group">
                                                                        <label class="label-control">Nacionalidad</label>  
                                                                        <input class="form-control HuespedNacionalidad" required  placeholder="Nacionalidad" id="NacionalidadHuespedConReserva" onkeypress="return ValidarSoloLetras(event);"/>                                                                
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-5 col-md-5">
                                                                <div class="form-group">
                                                                        <label for="FechaEntrada">Fecha Nacimiento</label>
                                                                        <div class='input-group date' id='FechaNacimiento'>
                                                                                <input type='text' id="FechaNacimientoHuespedConReserva" class="form-control" />
                                                                                <span class="input-group-addon">
                                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                                </span>
                                                                        </div>             
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2 col-md-1">
                                                                <div class="form-group" style="padding:5px">
                                                                        <label for="">
                                                                        Seguro<input type="checkbox" data-width="110" id="SeguroRegistroConReserva" data-toggle="toggle" data-onstyle="success">  
                                                                        </label>
                                                                </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                        <label class="label-control">Observaciones</label>  
                                                                        <textarea class="form-control HuespedObservaciones" required  placeholder="Observaciones" id="ObservacionesHuespedConReserva"/></textarea> 
                                                                </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="con-xs-12 col-sm-12 col-md-12">
                                        <div class="col-xs-12 col-sm-4 col-md-4"></div>
                                        <button type="button" id="BtnAgregarHuespedesConReserva"  onclick="AgregarRow('REGISTROCONRESERVA');" class="col-xs-12 col-sm-4 col-md-4 btn btn-primary" style="margin-top:5px">Agregar Huesped</button>
                                        <div class="col-xs-12 col-sm-4 col-md-4"></div>
                                </div>
                                
                                <br><br>
                                <div class="col-xs-12 col-sm-11 col-md-11">
                                 <br><br>
                                     <div class="table-responsive">
                                         <table class="table table-striped table-bordered">
                                             <thead>
                                                 <tr class="text-center">
                                                        <td>N°</td>
                                                        <td>Tipo Huesped</td>
                                                        <td>Tipo Documento</td>
                                                        <td>Cedula</td>
                                                        <td>Nombres</td>
                                                        <td>Apellidos</td>
                                                        <td>Nacionalidad</td>
                                                        <td>Fecha Nacimiento</td>
                                                        <td>Seguro</td>
                                                        <td>Observaciones</td>
                                                        <td>Eliminar</td>
                                                 </tr>
                                             </thead>
                                             <tbody id="TablaHuespedConReserva">
                                             </tbody>
                                         </table>
                                     </div>
                                </div>
                                
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
        </div>  
<script src="../js/ActivarDateTimes.js"></script>
<!-- <script src="../js/ActivarToggle.js"></script>  -->


                        
<script src="../js/ActivarToggle.js"></script>
<script src="../js/AutoCompletar.JS"></script>
<script src="../js/ActivarDateTimes.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <form id="Form" class="form-horizontal">
                    <div class="form-group">
                        
                    </div>
                    <div class="form-group">
                        <div class="panel">
                        <!--Formulario Cliente-->
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <!--Row 1-->
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <label for="ClienteTipoRegistro">Tipo Cliente</label>
                                        <select name="ClienteTipoRegistro" id="ClienteTipoRegistro" class="form-control" onchange="TraerFormularioDatosClienteRegistro();">
                                            <option value="">Seleccione Tipo Cliente</option>
                                            <?php
                                              include('../controles/TipoCliente.php');
                                            ?>
                                        </select>
                                    </div> 
                                    <div class="col-xs-12 col-sm-5 col-md-4" id="ConteCodigoMagic">
                                        <label for="CodigoMagico" class="control-label">Codigo</label>
                                        <input type="text" disabled name="CodigoMagico" id="CodigoMagico" class="form-control">
                                    </div>                         
                                </div>   
                                <div class="row" id="ContenedorDatosClienteRegistro">
                                    
                                </div>
                                
                            </div>
                            <!--Datos Registro/Check in-->
                            <div class="col-xs-12 col-sm-6 col-md-6" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <legend><label class="checkbox-inline" id="Checkreserva">
                                         ¿ Tiene Reserva ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <input type="checkbox" id="ReservaSiNo"  data-toggle="toggle" data-onstyle="success"> 
                                        </label></legend>
                                    </div>
                                </div>
                                <!--Row  1-->
                                <!-- Tabla Movimiento-->
                                <div class="row" id="Contenedor1Registros">
                                </div>
                               
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12" id="ContenedorHab">
                                <br>
                                <legend>&nbsp;&nbsp;Habitacion(es)</legend>
                                
            &nbsp;&nbsp;&nbsp;<button  type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-rack" style="margin-top:5px">Rack Grafico<i class="glyphicon glyphicon-th"></i> </button>
                                <br><br>
                                <div class="row" id="Contenedor">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="col-xs-12 col-sm-3 col-md-4">
                                            <label for="NombreHabitacion">Habitacion</label>
                                        <input type="text" name="NombreHabitacion" id="NombreHabitacionRegistro" class="form-control" onblur="CantMaxAdultos(this.value,'REGISTRO');">
                                        </div>
                                        <div class="col-xs-12 col-sm-2 col-md-4">
                                            <label for="CantidadAdultos">Adultos</label>
                                            <input type="number" name="CantidadAdultos" id="CantidadAdultosRegistro"  onblur="CantMaxNinos(this.value,this.max);" class="form-control">
                                        </div>
                                        <div class="col-xs-12 col-sm-2 col-md-4">
                                            <label for="CantidadNinos">Niños</label>
                                            <input type="number" name="CantidadNinos" id="CantidadNinosRegistro" class="form-control" value="0" min="0" onblur="ValidarCantNinos(this.value,this.max);">
                                        </div>
                                        <div class="col-xs-12 col-sm-2 col-md-2">
                                            <label class="checkbox">Desayuno</label>
                                                &nbsp;&nbsp;<input type="checkbox" id="DesayunoRegistro" data-toggle="toggle" data-onstyle="success">  
                                        </div>
                                        <div class="col-xs-12 col-sm-2 col-md-5" name="ContenedorDesayunoRegistro" id="ContenedorDesayunoRegistro">
                                            <label for="SelectDesayunoRegistro">Tipo desayuno</label>
                                            <select class="form-control" name="SelectDesayunoRegistro" id="SelectDesayunoRegistro">
                                                      <option value="">Tipo Desayuno</option>
                                                        <?php
                                                           $ComandoSql="SELECT NombreProductos,ValorProductos FROM `productos` WHERE NombreProductos LIKE '%DESAYUNO%'";


                                                           $resultado=$conexion->query($ComandoSql);
                                                           
                                                    
                                                             while($fila=$resultado->fetch_array())
                                                             {
                                                                echo"<option value='".$fila['NombreProductos']."-".$fila['ValorProductos']."'>".$fila['NombreProductos']."</option>"; 
                                                            }
                                                        ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-5">
                                            <label for="ValorEstadiaHabitacionRegistro">Valor</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                        <input type="text" disabled class="form-control" id="ValorEstadiaHabitacionRegistro" placeholder="Amount" value="0">
                                                    <div class="input-group-addon">.00</div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <label for="NitResponsable">Nit Responsable</label>
                                            <input type="text" name="NitResponsable" id="NitResponsableRegistro" class="form-control" onkeypress="return ValidarSoloNumeros(event);">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <label for="NombreResponsable">Nombres</label>
                                            <input type="text" name="NombreResponsable" id="NombreResponsableRegistro" class="form-control" onkeypress="return ValidarSoloLetras(event);">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <label for="ApelldisoResponsable">Apellidos</label>
                                            <input type="text" name="ApelldisoResponsable" id="ApelldisoResponsableRegistro" class="form-control" onkeypress="return ValidarSoloLetras(event);">
                                        </div>
                                    </div>
                                    <div class="con-xs-12 col-sm-12 col-md-12">
                                        <div class="panel-body">
                                            <label for="ObservacionesHabitacion">Observaciones Habitacion</label>
                                            <textarea name="ObservacionesHabitacion" class="form-control" id="ObservacionesHabitacionRegistro" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                            <br><legend>&nbsp;&nbsp;Huesped(es)</legend>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                        <div class="form-group">
                                                              <label for="HuespesTipo" class="label-control">Huesped</label>
                                                              <select name="" id="HuespesTipo" class="form-control HuespedTipo">
                                                                        <option value="">Tipo Huesped</option>
                                                                        <option value="ADULTO">Adulto</option>
                                                                        <option value="NINO">Niño</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4 col-md-5">
                                                        <div class="form-group">
                                                                <label class="label-control" for="TipoDocumentoHuesped">Tipo Documento</label>
                                                                <select  class="form-control HuespedTipoDocumento" id="TipoDocumentoHuesped">
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
                                                                <input class="form-control HuespedId" required  placeholder="Numero Documento" id="NumeroDocumentoHuesped" onblur="ExisteHuesped('HuespesTipo','NumeroDocumentoHuesped','TipoDocumentoHuesped','NombreHuesped','ApellidoHuesped','NacionalidadHuesped','FechaNacimientoHuesped');" onkeypress="return ValidarSoloNumeros(event);"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-5 col-md-4">
                                                        <div class="form-group">
                                                                <label class="label-control">Nombre</label>                       
                                                                <input class="form-control HuespedNombre"  required  placeholder="Nombre" id="NombreHuesped" onkeypress="return ValidarSoloLetras(event);"/>                                                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-7 col-md-8">
                                                        <div class="form-group">
                                                                <label class="label-control">Apellidos</label>                           
                                                                <input  class="form-control HuespedApellido" required  placeholder="Apellido" id="ApellidoHuesped" onkeypress="return ValidarSoloLetras(event);"/>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="col-xs-12 col-sm-5 col-md-5">
                                                        <div class="form-group">
                                                                <label class="label-control">Nacionalidad</label>  
                                                                <input class="form-control HuespedNacionalidad" required  placeholder="Nacionalidad" id="NacionalidadHuesped" onkeypress="return ValidarSoloLetras(event);"/>                                                                
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-5 col-md-5">
                                                        <div class="form-group">
                                                            <label for="FechaEntrada">Fecha Nacimiento</label>
                                                            <div class='input-group date' id='FechaNacimiento'>
                                                                <input type='text' id="FechaNacimientoHuesped" class="form-control" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>             
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-2 col-md-1">
                                                        <div class="form-group" style="padding:5px">
                                                        <br>
                                                                <input type="checkbox" data-width="110" id="SeguroRegistro" data-toggle="toggle" data-onstyle="success">  
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <label class="label-control">Observaciones</label>  
                                                                <textarea class="form-control HuespedObservaciones" required  placeholder="Observaciones" id="ObservacionesHuesped"/></textarea> 
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="con-xs-12 col-sm-12 col-md-12">
                                            <div class="col-xs-12 col-sm-4 col-md-4"></div>
                                            <button type="button" id="BtnAgregarHuespedesRegistro"  onclick="AgregarRow('REGISTRO');" class="col-xs-12 col-sm-4 col-md-4 btn btn-primary" style="margin-top:5px">Agregar Huesped</button>
                                            <div class="col-xs-12 col-sm-4 col-md-4"></div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
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
                                                <tbody id="TablaHuesped">
                                                </tbody>
                                            </table>
                                        </div>
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                             <!--Row  2-->
                                <!-- Tabla de Habitaciones Ligadas al Movimiento-->
                                <div class="row" id="ContenedorTablaHab">
                                    
                                </div>
                                <br><br>
                                <!--Row 3-->
                                <!--Huespedes-->
                                <div class="row" id="ContenedorRegistroHuespedes">

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="col-xs-12 col-sm-4 col-md-4"></div>
                          <button type="button" class="col-xs-12 col-sm-4 col-md-4 btn btn-primary" disabled id="GuardarRegistro" onclick="CargarDatosRegistros();">Guardar</button>
                          <div class="col-xs-12 col-sm-4 col-md-4"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
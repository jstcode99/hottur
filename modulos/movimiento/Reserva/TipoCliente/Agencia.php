<script src="../js/ActivarToggle.js"></script>
        <div class="form-group"> 
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-6">
                        <label class="checkbox-inline">
                                          ¿ Tiene Convenio ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <input type="checkbox" id="Convenio" data-toggle="toggle" data-onstyle="success"> 
                        </label>
                        <br><br>
                    </div>
                </div>
                <div class="row" id="ContenedorConvenios">
                    <div class="col-xs-12 col-sm-12 col-md-10">
                        <label for="ConveniosSelect" class ="">Agencias en convenio</label>
                            <select name="ConveniosSelect" id="ConveniosSelect" class="Dato form-control">
                                    <option value="">Seleecione Agencia</option>
                                    <?php
                                        //Con Relaciones
                                        //require_once('../../../ConvenioSelect.php');
                                        // sin relaciones
                                         require_once('../../../conexion.php');
                                         $ComandoSql="SELECT cliente.IdCliente, cliente.NombreCliente, cliente.IdConvenio FROM cliente, clientetipo WHERE  clientetipo.IdClienteTipo = 3 AND clientetipo.IdClienteTipo = cliente.IdClienteTipo AND cliente.IdConvenio !=''";
                                         $resultado=$conexion->query($ComandoSql);
                                             // echo"<option value=''>Selecciones Convenio</option>";
                                               while($fila=$resultado->fetch_array())
                                               {
                                                  //Sin Relaciones
                                                  $ComandoSql1 = "SELECT CodigoConvenio,NombreConvenio FROM convenio WHERE IdConvenio = ".$fila['IdConvenio'].";";
                                                  $resultado1=$conexion->query($ComandoSql1);
                                                  $fila1=$resultado1->fetch_array();
                                                //   var_dump($fila1);
                                                  echo"<option value='".$fila['IdCliente']."'>".$fila1['CodigoConvenio']."-".$fila['NombreCliente']."</option>"; 
                                              }
                                    ?>
                            </select>
                    </div>
                </div>
               <div class="row" id="ContenedorDatosReserva">
                    <div class="col-xs-12 col-sm-12 col-md-10" id="ContenedorNitAgenciaReserva"> 
                            <div class="panel">
                                    <label for="NitClienteAgenciaReserva" class="">Número</label>
                                    <input type="text" name="NitClienteAgenciaReserva" id="NitClienteAgenciaReserva" class="Dato form-control" placeholder="Nit" onkeypress="return ValidarSoloNumeros(event);"> 
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2" style="padding:5px">
                          <div class="panel">
                                <br>
                                <button type="button" class="btn btn-primary btn-md" id="BtnVerificarReserva" onclick="VerificarCajaNitSiEstaVacia('RESERVA');">Verificar</button>
                          </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" id="ContenedorNombreAgenciaReserva">
                        <div class="panel">
                            <label for="NombresClienteAgenciaReserva" class="">Nombres</label>
                            <input type="text" name="NombresClienteAgenciaReserva" id="NombresClienteAgenciaReserva" class="Dato form-control" placeholder="Nombres" onkeypress="return ValidarSoloLetras(event);" disabled="true">
                        </div>           
                    </div>           
                    <div class="col-xs-12 col-sm-12 col-md-4" id="ContenedorTelefonoAgenciaReserva">
                        <div class="panel">
                            <label for="Telefono1ClienteAgenciaReserva" class="">Telefono</label>
                            <input type="tel" name="Telefono1ClienteAgenciaReserva" id="Telefono1ClienteAgenciaReserva" class="Dato form-control" placeholder="Telefono 1" onkeypress="return ValidarSoloNumeros(event);" disabled="true">
                        </div>           
                    </div>     
                    <div class="col-xs-12 col-sm-12 col-md-8" id="CotenedorCorreoAgenciaReserva">
                        <div class="panel">
                            <label for="CorreoClienteAagenciaReserva" class="">Correo</label>
                            <input type="email" name="CorreoClienteAagenciaReserva" id="CorreoClienteAagenciaReserva" class="Dato form-control" placeholder="Correo" disabled="true">        
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-6" id="ContenedorComisionAgencia">
                        <label class="checkbox-inline">
                                          ¿ Por Comision ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <input type="checkbox" id="ComisionAgencia" data-toggle="toggle" data-onstyle="success"> 
                        </label>
                        <br><br>
                    </div>
                </div>
        </div>
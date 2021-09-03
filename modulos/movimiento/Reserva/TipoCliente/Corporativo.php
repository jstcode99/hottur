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
                        <label for="ConveniosSelect" class ="">Empresas en convenio</label>
                            <select name="ConveniosSelect" id="ConveniosSelect" class="Dato form-control">
                                    <option value="">Seleecione empresa</option>
                                    <?php
                                        // Con Relacion
                                        //require_once('../../../ConvenioSelect.php');
                                        // sin relaciones
                                        require_once('../../../conexion.php');
                                        $ComandoSql="SELECT cliente.IdCliente, cliente.NombreCliente, cliente.IdConvenio FROM cliente, clientetipo WHERE  clientetipo.IdClienteTipo = 2 AND clientetipo.IdClienteTipo = cliente.IdClienteTipo AND cliente.IdConvenio !=''";
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
                    <div class="col-xs-12 col-sm-12 col-md-10" id="ContenedorNitCorporatiReserva"> 
                            <div class="panel">
                                    <label for="NitClienteCorporativoReserva" class="">Número</label>
                                    <input type="text" name="NitClienteCorporativoReserva" id="NitClienteCorporativoReserva" class="Dato form-control" placeholder="Nit" onkeypress="return ValidarSoloNumeros(event);"> 
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2" style="padding:5px">
                          <div class="panel">
                                <br>
                                <button type="button" class="btn btn-primary btn-md" id="BtnVerificarReserva" onclick="VerificarCajaNitSiEstaVacia('RESERVA');">Verificar</button>
                          </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" id="ContenedorNombrCorporatiReserva">
                        <div class="panel">
                            <label for="NombreClienteCorporativoReserva" class="">Nombre</label>
                            <input type="text" name="NombreClienteCorporativoReserva" id="NombreClienteCorporativoReserva" class="Dato form-control" placeholder="Nombres" onkeypress="return ValidarSoloLetras(event);" disabled="true">
                        </div>           
                    </div>           
                    <div class="col-xs-12 col-sm-12 col-md-4" id="ContenedorTelfCorpoReserva">
                        <div class="panel">
                            <label for="Telefono1ClienteCorporativoReserva" class="">Telefono</label>
                            <input type="tel" name="Telefono1ClienteCorporativoReserva" id="Telefono1ClienteCorporativoReserva" class="Dato form-control" placeholder="Telefono 1" onkeypress="return ValidarSoloNumeros(event);" disabled="true">
                        </div>           
                    </div>     
                    <div class="col-xs-12 col-sm-12 col-md-8" id="ContenedorCorreoCorporatiReserva">
                        <div class="panel">
                            <label for="CorreoClienteCorporativoReserva" class="">Correo</label>
                            <input type="email" name="CorreoClienteCorporativoReserva" id="CorreoClienteCorporativoReserva" class="Dato form-control" placeholder="Correo" disabled="true">        
                        </div> 
                    </div>
                </div>
        </div>
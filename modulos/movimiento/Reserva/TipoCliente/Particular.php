
        <div class="form-group"> 
               <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                                <label for="TipoDocumentoClienteParticularReserva" class="">Tipo Documento</label>
                                <select name="TipoDocumentoClienteParticularReserva" id="TipoDocumentoClienteParticularReserva" class="Dato form-control">
                                    <?php
                                        include('../../../controles/TipoDocumento.php');
                                    ?>
                                </select>
                        </div>
                      <div class="col-xs-12 col-sm-12 col-md-4" id="ContenedorNumDocumentoReserva"> 
                              <div class="panel">
                                      <label for="NitClienteParticularReserva" class="">Número</label>
                                      <input type="text" name="NitClienteParticularReserva" id="NitClienteParticularReserva" class="Dato form-control" placeholder="Numero Documento" onkeypress="return ValidarSoloNumeros(event);"> 
                              </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-2" style="padding:5px">
                            <div class="panel">
                                  <br>
                                  <button type="button" class="btn btn-primary btn-md" id="BtnVerificarReserva" onclick="VerificarCajaNitSiEstaVacia('RESERVA');">Verificar</button>
                            </div>
                      </div>
               </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12" id="ContenedorNombrePartiReserva">
                        <div class="panel">
                            <label for="ClienteParticularNombresReserva" class="">Nombres</label>
                            <input type="text" name="ClienteParticularNombresReserva" id="ClienteParticularNombresReserva" class="Dato form-control" placeholder="Nombres" onkeypress="return ValidarSoloLetras(event);" disabled="true">
                        </div>           
                    </div>

                  
                    <div class="col-xs-12 col-sm-12 col-md-12" id="ConetenedorApellidParticuReserva">
                        <div class="panel">
                            <label for="ClienteParticularApellidosReserva" class="">Apellidos</label>
                            <input type="text" name="ClienteParticularApellidosReserva" id="ClienteParticularApellidosReserva" class="Dato form-control" placeholder="Apellidos" onkeypress="return ValidarSoloLetras(event);" disabled="true">
                            
                        </div> 
                    </div>             
                </div>

                <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-4" id="ContenedorTelefoReserParticu">
                        <div class="panel">
                            <label for="ClienteParticularTelefono1Reserva" class="">Telefono 1</label>
                            <input type="tel" name="ClienteParticularTelefono1Reserva" id="ClienteParticularTelefono1Reserva" class="Dato form-control" placeholder="Telefono 1" onkeypress="return ValidarSoloNumeros(event);" disabled="true">
                        </div>           
                    </div>     
                    <div class="col-xs-12 col-sm-12 col-md-8" id="ContenedorCorreoParticuReserva">
                        <div class="panel">
                            <label for="ClienteParticularCorreoReserva" class="">Correo</label>
                            <input type="email" name="ClienteParticularCorreoReserva" id="ClienteParticularCorreoReserva" class="Dato form-control" placeholder="Correo" disabled="true">        
                        </div> 
                    </div>
                </div>
        </div>
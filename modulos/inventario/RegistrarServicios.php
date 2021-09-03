            <div class="row" style="padding:30px;">                
                <form>
                <h3 style="padding:15px;">Registrar Servicios</h3>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="nombre">Nombre*</label>
                            <input type="text" class="form-control" id="ServiciosNombre" >
                        </div>                            
                    </div>      
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="ServiciosImpuesto">Impuesto*</label>
                            <input type="number" class="form-control" id="ServiciosImpuesto">   
                        </div>                            
                    </div>        
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="ServiciosValor">Valor*</label>
                            <input onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="ServiciosValor">
                        </div>                            
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="ServcioTipoServicio">Tipo de servicio*</label>
                            <select id="ServcioTipoServicio" class="form-control">
                                <option value="">Seleccione un tipo de servicio</option>
                                <?php
                                    require_once ('../conexion.php');
                                    $ComandoSql="SELECT * FROM `serviciotipo`";
                                    $Resultado=$conexion->query($ComandoSql);                                                                 
                                    while($fila= $Resultado->fetch_array())
                                        {
                                        echo '<option value="'.$fila['IdServicioTipo'].'">'.$fila['NombreServicioTipo'].'</option>';
                                        }                                                                                               
                                ?>                                
                            </select>
                        </div>                            
                    </div>
                    <div class="form-group">            
                        <div class="col-sm-5">
                            <label for="ServiciosObservaciones">Observaciones*</label>
                            <textarea id="ServiciosObservaciones" class="form-control" rows="3"></textarea>
                        </div>     
                    </div>              
                    <div class="form-group">
                        <div class="col-sm-5">            
                            <label for="ServiciosDescripcion">Descripción*</label>
                            <textarea class="form-control" id="ServiciosDescripcion" rows="3"></textarea>
                        </div> 
                    </div> 
                    <div class="form-group">
                        <div class="col-sm-2">  
                        <br>
                        <br>
                        <br>                         
                            <button type="button" onclick="RegistrarServicios();"  class="btn btn-primary">Enviar</button>        
                        </div>                
                    </div>                                                                                                                                           
                </form>
            </div>
            

                <form  style="padding:15px;">                
                    <h3  style="padding:15px;">Actualizar Servicios</h3>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="ServiciosId">Codigo</label>
                            <input type="text" class="form-control" id="ServiciosId" disabled>
                        </div>                            
                    </div> 
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="nombre">Nombre*</label>
                            <input type="text" class="form-control" id="NuevoServiciosNombre" onkeypress="return ValidarSoloLetras(event);" >
                        </div>                            
                    </div>      
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="NuevoServiciosImpuesto">Impuesto*</label>
                            <input type="number" class="form-control" id="NuevoServiciosImpuesto">   
                        </div>                            
                    </div>        
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="NuevoServiciosValor">Valor*</label>
                            <input onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="NuevoServiciosValor">
                        </div>                            
                    </div>                    
                    <div class="form-group">            
                        <div class="col-sm-3">
                            <label for="NuevoServiciosObservaciones">Observaciones*</label>
                            <textarea id="NuevoServiciosObservaciones" class="form-control" rows="3"></textarea>
                        </div>     
                    </div>              
                    <div class="form-group">
                        <div class="col-sm-3">            
                            <label for="NuevoServiciosDescripcion">Descripción*</label>
                            <textarea class="form-control" id="NuevoServiciosDescripcion" rows="3"></textarea>
                        </div>  
                    </div> 
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="ServiciosNuevoTipoServicio">Tipo de servicio*</label>
                            <select id="ServiciosNuevoTipoServicio" class="form-control">
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
                         <div class="col-sm-3">  
                        <br>
                        <br>
                        <br>  
                    
                            <button type="button" onclick="ActualizarServicios();"  class="btn btn-warning">Enviar</button>                                            
                        </div>
                    </div>                                                                                                                                            
                </form>
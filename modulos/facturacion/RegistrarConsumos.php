<script>
TraerFolios();
</script>  
                  
                    <div class="col-sm-4">    
                        <div class="panel panel-default">
                            <div class="panel panel heading">

                            </div>
                            <div class="panel panel-body">                    
                                    <div class="col-sm-12">
                                    <label for="RegistrarConsumosHabitacion">Numero de habitación</label>
                                        <select class="form-control" id="ConsultarFolioSelectFolios" onchange="RegristrarConsumosConsultarFolios();">
                                            <option value="">Seleccione la Habitacion</option>                                           
                                        </select>
                                    </div>                                    
                                    <div class="col-sm-12">
                                        <br>
                                        <button id="AplicaraFolio" type="buttom" class="btn btn-primary" onclick="RegistrarConsumosAgendarDatos();" disabled>Consultar</button>
                                    </div>                                    
                            </div>
                        </div>
                    </div>
                             
                                
                        
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel panel-body">
                                <form>
                                    <div class="form-group">
                                        <label for="RegistratConsumosNombreProducto">Tipo de producto</label>
                                        <select type="text" class="form-control" id="RegistrarConsumosTipoProducto" onchange="CargarSelectProducto();">                              
                                                <option value="">Seleccione un tipo de producto</option>
                                            <?php
                                                require_once ('../conexion.php');
                                                $ComandoSql='SELECT * FROM `productotipo` WHERE 1';
                                                $Resultado=$conexion->query($ComandoSql);                                             
                                                /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                                                /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                                                while($fila= $Resultado->fetch_array())
                                                {
                                                    echo '<option value="'.$fila['IdProductoTipo'].'">'.$fila['NombreProductoTipo'].'</option>';
                                                }   
                                                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="RegistratConsumosNombreProducto">Nombre producto</label>
                                        <select type="text" class="form-control" id="RegistrarConsumosNombreProducto" disabled>                              
                                           <option value="">Seleccione el producto</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="RegistratConsumosCantidad">Cantidad</label>
                                        <input type="number" class="form-control" id="RegistrarConsumosCantidadProducto" placeholder="Cantidad de productos" disabled>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" id="RegistrarProductoCortesia"> Cortesia
                                        </label>
                                    </div>
                                    <button  id="AplicaraProductos"  type="button" class="btn btn-primary" onclick="AggConsumoTabla();" disabled>Aplicar</button>
                                    
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel panel-body">
                                <form>
                                    <div class="form-group">
                                        <label for="RegistratConsumosNombreProducto">Tipo de servicio</label>
                                        <select type="text" class="form-control" id="RegistrarConsumosTipoServicio" onchange="CargarSelectServicios();">                              
                                                <option value="">Seleccione un tipo de servicio</option>
                                        <?php
                                                require_once ('../conexion.php');
                                                $ComandoSql='SELECT * FROM `serviciotipo` WHERE 1';
                                                $Resultado=$conexion->query($ComandoSql);                                             
                                                /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                                                /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                                                while($fila= $Resultado->fetch_array())
                                                {
                                                    echo '<option value="'.$fila['IdServicioTipo'].'">'.$fila['NombreServicioTipo'].'</option>';
                                                    echo "Sentencia".$ComandoSql;
                                                }   
                                                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="RegistrarConsumosNombreServio">Nombre Servicio</label>
                                        <select class="form-control" id="RegistrarConsumosNombreServicio" disabled>
                                            <option value="">Seleccione el servicio</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="RegistrarConsumosCantidad">Cantidad</label>
                                        <input type="number" class="form-control" id="RegistrarConsumosCantidadServicio" placeholder="Canitidad" disabled>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" id="RegistrarServicioCortesia"> Cortesia
                                        </label>
                                    </div>
                                    <button  id="AplicaraServicios" type="button" class="btn btn-primary"  onclick="AggConsumoTablaServicio();" disabled>Aplicar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                        
                    <div class="col-sm-12">
                       
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Folio:<a class="text-primary" id="RegistrarConsumosFolioMostrar">NN</a>
                            <br>
                            Habitación:<a class="text-primary" id="RegistrarConsumosInfoHabitacion">000</a>
                            <br>
                            Nombre:<a class="text-primary" id="RegistrarConsumosNombre">NN</a>
                            </div>
                            <div class="panel panel-body">
                                <div class="bs-example" data-example-id="simple-responsive-table" style="padding:60px;">                              
                                    <h4 class="text-center">Listado de consumos ingresados</h6>    
                                    <div class="table-responsive">
                                            <table class="table table-bordered" >
                                                <br>
                                                <thead>
                                                    <tr> 
                                                        <th>#</th>                                                                                                
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>
                                                        <th>Cantidad</th>
                                                        <th>Valor</th>
                                                        <th>Cortesia</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="TablaConsumos">
                                                </tbody>
                                                
                                            </table>       
                                    </div>
                                    <button   id="AplicaraConsumos" type="button" class="btn btn-primary"  onclick="RegistrarCS();" disabled>Guardar</button>   
                                </div>
                            </div>
                        </div>
                    </div> 
                    <br><br><br><br><br>                          
               
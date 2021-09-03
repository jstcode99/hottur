                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel panel-body">
                                <form>
                                    <div class="form-group">
                                        <label for="RegistratConsumosNombreProducto">Tipo de producto</label>
                                        <select type="text" class="form-control" id="RegistrarConsumosExternosTipoProducto" onchange="CargarSelectProductoExternos();">                              
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
                                        <select type="text" class="form-control" id="RegistrarConsumosExternosNombreProducto" disabled>                              
                                           <option value="">Seleccione el producto</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="RegistratConsumosCantidad">Cantidad</label>
                                        <input type="number" class="form-control" id="RegistrarConsumosExternosCantidadProducto" placeholder="Cantidad de productos" disabled>
                                    </div>                                
                                    <button  id="AplicaraProductos"  type="button" class="btn btn-primary pull-right" onclick="AggConsumoExternosTabla();">Aplicar</button>
                                    
                                </form>
                                
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel panel-body">
                                <form>
                                    <div class="form-group">
                                        <label for="RegistratConsumosNombreProducto">Tipo de servicio</label>
                                        <select type="text" class="form-control" id="RegistrarConsumosExternosTipoServicio" onchange="CargarSelectServiciosExternos();">                              
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
                                        <label for="RegistrarConsumosExternosNombreServicio">Nombre Servicio</label>
                                        <select class="form-control" id="RegistrarConsumosExternosNombreServicio" disabled>
                                            <option value="">Seleccione el servicio</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="RegistrarConsumosExternosCantidad">Cantidad</label>
                                        <input type="number" class="form-control" id="RegistrarConsumosExternosCantidadServicio" placeholder="Canitidad" disabled>
                                    </div>
                                    <button  id="AplicarServicosExternos"  type="button" class="btn btn-primary pull-right" onclick="AggConsumoExternosTablaServicio();">Aplicar</button>
                                </form>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-8">
                        <div class="panel panel-default">                                                                              
                            <div class="panel panel-body">
                                <form class="form">
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputName2">Nit</label>
                                        <input type="text" class="form-control" id="NitclienteConsumoExterno" placeholder="# - ######">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputName2">Nombre</label>
                                        <input type="text" class="form-control" id="NombreclienteConsumoExterno" placeholder="Jane Doe">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail2">Telèfono</label>
                                        <input type="email" class="form-control" id="TelefonoClienteConsumoExterno" placeholder="jane.doe@example.com">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail2">Direcciòn</label>
                                        <input type="email" class="form-control" id="DireccionClienteConsumoExterno" placeholder="Cll # a # - #">
                                    </div>                                
                                </form>
                                <div class="bs-example" data-example-id="simple-responsive-table" style="padding:70px;">                              
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
                                                        <th>Impuesto</th>
                                                        <th>Valor</th>
                                                        <th><i class="glyphicon glyphicon-remove"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="TablaConsumosExternos">
                                                </tbody>
                                                
                                            </table>       
                                    </div>
                                    <button   id="AplicaraConsumos" type="button" class="btn btn-primary"  onclick="FacturarConsumosExternos();">Facturar</button>   
                                </div>
                            </div>
                        </div>
                    </div> 
                    <br><br><br><br><br><br> 
                    <div style="display:none">
                    <?php
                    include "ImpresionFactura.php";
                    ?> 
                    </div>    
                                        
               
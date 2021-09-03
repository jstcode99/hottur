<div style="padding:20px;">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Datos de la empresa</h4>
            <div class="col-sm-3">                             
                <label for="">Nombre</label>
                <input class="form-control" id="RegiatrarCotizacionNombre" placeholder="Nombre" requeride>
            </div>
            <div class="col-sm-3">
                <label for="">Nit o Cedula</label>
                <input class="form-control" id="RegiatrarCotizacionNit" placeholder="Nit" requeride>
            </div>
            <div class="col-sm-3">
                <label for="">Telèfono</label>
                <input type="email" class="form-control" id="RegiatrarCotizacionTelefono" placeholder="Telefono" requeride> 
            </div> 
            <div class="col-sm-3">
                <label for="">Correo</label>
                <input type="email" class="form-control" id="RegiatrarCotizacionCorreo" placeholder="example@example.com" requeride> 
            </div> 
        </div>
    </div>
</div>
<div style="padding:20px;">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Estadia</h4>
            <div class="col-sm-3">
                <label for="">Tipo de Habitaciòn</label>
                <select class="form-control"  id="RegiatrarCotizacionTipoHabitacion" requeride>
                <option value="">Tipo de habitación</option>
                <?php
                                                require_once ('../conexion.php');
                                                $ComandoSql='SELECT * FROM `habitaciontipo`';
                                                $Resultado=$conexion->query($ComandoSql);                                             
                                                /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                                                /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                                                while($fila= $Resultado->fetch_array())
                                                {
                                                    echo '<option value="'.$fila['IdHabitacionTipo'].'">'.$fila['NombreHabitacionTipo'].'</option>';
                                                }   
                                                ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="">Cantidad de Pax</label>
                <input class="form-control" id="RegiatrarCotizacionPax" placeholder="Cantidad de pax" requeride>
            </div>
            <div class="col-sm-3">
                <label for="">Fecha de  Entrada</label>
                <div class='input-group date'>
                    <input type='text' id='RegiatrarCotizacionFechasEntrada' class="form-control" placeholder="Fecha de salida" requeride />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-sm-3">
                <label for="">Fecha de Salida</label>
                <div class='input-group date' >
                    <input type='text'  id='RegiatrarCotizacionFechasSalida' class="form-control" placeholder="Fecha de entrada" requeride />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            
            <br><br>
            <div class="col-sm-3">
                <label for="">Tarifa</label>
                <select class="form-control"  id="RegiatrarCotizacionTarifa">
                <option value="">Tarifa</option>
                <?php
                                                require_once ('../conexion.php');
                                                $ComandoSql='SELECT * FROM `tarifa`';
                                                $Resultado=$conexion->query($ComandoSql);                                             
                                                /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                                                /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                                                while($fila= $Resultado->fetch_array())
                                                {
                                                    echo '<option value="'.$fila['PorcentajeTarifa'].'">'.$fila['NombreTarifa'].' - %'.$fila['PorcentajeTarifa'].'</option>';
                                                }   
                                                ?>
                </select>
            </div>
                <div class="col-sm-3">
                    <label for="">Producto</label>
                    <select id="RegiatrarCotizacionIdProducto1" class="form-control" disabled>
                    <?php
                                                require_once ('../conexion.php');
                                                $ComandoSql='SELECT * from productos where 1';
                                                $Resultado=$conexion->query($ComandoSql);                                             
                                                /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                                                /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                                                while($fila= $Resultado->fetch_array())
                                                {
                                                    echo '<option value="'.$fila['IdProductos'].'">'.$fila['NombreProductos'].'</option>';
                                                }   
                                                ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="">Tiempo de plazo</label>
                    <select id="RegistroCotizacionPlazo" class="form-control">
                        <option value="">Plazo de cotizacion</option>
                        <option value="5">5 Dias</option>
                        <option value="10">10 Dias</option>
                        <option value="15">15 Dias</option>
                        <option value="20">20 Dias</option>
                        <option value="25">25 Dias</option>
                        <option value="30">30 Dias</option>
                        <option value="35">35 Dias</option>
                        <option value="40">40 Dias</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="">Incluye desayuno</label>
                    <div class="checkbox">
                      <input id="RegiatrarCotizacionDesayuno" type="checkbox">     
                      si
                    </div>
                </div>    
                <div class="col-sm-12">
                    <button type="button" onclick="AgregarEstadiaList();" id="BtnAgregarEstadiaList" class="btn btn-primary">+ Agregar Estadia</button>      
                    <button type="button" id="AgregarProductos" class="btn btn-success" data-toggle="modal" data-target="#AgregarProctosList">+ Agregar productos</button>                          
                    <button type="button" id="AgregarServicios" class="btn btn-default" data-toggle="modal" data-target="#AgregarServiciosList">+ Agregar servicios</button>                          
                </div>
                <br>
            
            <div class="col-sm-12">
                <div class="bs-example" data-example-id="simple-responsive-table " id="ListadoProductosCotizacion" style="padding:30px;">  
                    <div class="table-responsive hidden" id="ContTabla">                                                  
                        <table class="table table-bordered" id="TablaEnviada">
                            <h3 class="text-center">Listado de consumos</h3>  
                            <br>
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" id="GuardarCotizacion" onclick="GuardarCotizacion();" class="btn btn-primary">Guardar</button>
                                <button id="BotonImprimir" class="btn btn-primary" onclick='imprSelecCotizacion("Cabereca");' type="buttom" disabled>Imprimir</button>                     
                                <button id="BotonOferta" class="btn btn-primary" onclick='AgregarOferta();' type="buttom">Agrear otra oferta</button>                     
                            </div>                       
                            <div class="col-sm-3">
                                <div class="input-group">                               
                                    <div class="input-group-addon">Calculadora</div>
                                        <input id="CotizacionCalculadora"  placeholder="Calculadora: 5+1" class="form-control"/>
                                    </div>
                                </div>
                            </div>    
                                <div class="col-sm-3">
                                    <div class="form-group" id="TotalPrint">                        
                                        <div class="input-group">
                                            <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control" id="TotalCotizado" placeholder="00.000.00" disabled> 
                                        </div>
                                    </div>
                                </div>                                              
                            <br>
                            <thead>                                
                                <tr>                           
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Impuesto / Iva</th>
                                    <th>Valor</th>                                    
                                </tr>
                            </thead>
                            <tbody id="Registroproductos">
                            
                            </tbody>             
                        </table>  
                        <br>
                <br>
                <br>
                <br>
                <br>     
                    </div>
                </div>                      
        </div>
            
            </div>
        </div>   
    </div>
            
                                                       
        


        

<div class="modal fade bs-example-modal-producto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="AgregarProctosList">
    <div class="modal-dialog modal-prodcutos" role="document">
        <div class="modal-content">
            <div style="padding:40px;">
                <form>                 
                    <div class="form-group">
                    <label for="">Producto</label>
                    <select id="RegiatrarCotizacionIdProducto" class="form-control">
                        <option value="">Productos</option>
                        <?php
                                                    require_once ('../conexion.php');
                                                    $ComandoSql='SELECT * from productos where 1';
                                                    $Resultado=$conexion->query($ComandoSql);                                             
                                                    /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                                                    /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                                                    while($fila= $Resultado->fetch_array())
                                                    {
                                                        echo '<option value="'.$fila['IdProductos'].'">'.$fila['NombreProductos'].'</option>';
                                                    }   
                                                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input class="form-control" id="RegiatrarCotizacionCantidadProducto" placeholder="Cantidad">
                    </div>
                    <button type="button" id="AgregarProductosLista" onclick="CotizacionAgregarProductoList();" class="btn btn-primary">+</button>
                </form>
            </div>
	    </div>
    </div>
</div>

<div class="modal fade bs-example-modal-servicios" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="AgregarServiciosList">
    <div class="modal-dialog modal-servicios" role="document">
        <div class="modal-content">
            <div style="padding:40px;">
                <form>                 
                    <div class="form-group">
                    <label for="">Servicios</label>
                    <select id="RegiatrarCotizacionIdServicio" class="form-control">
                        <option value="">Seleccione el servicio</option>
                        <?php
                                                    require_once ('../conexion.php');
                                                    $ComandoSql='SELECT * from servicios where 1';
                                                    $Resultado=$conexion->query($ComandoSql);                                             
                                                    /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                                                    /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                                                    while($fila= $Resultado->fetch_array())
                                                    {
                                                        echo '<option value="'.$fila['IdServicios'].'">'.$fila['NombreServicios'].'</option>';
                                                    }   
                                                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input class="form-control" id="RegiatrarCotizacionCantidadServicio" placeholder="Cantidad">
                    </div>
                    <button type="button" id="AgregarProductosLista" onclick="CotizacionAgregarServiciosList();" class="btn btn-primary">+</button>
                </form>
            </div>
	    </div>
    </div>
</div>

<script>
$('#RegiatrarCotizacionDesayuno').click(function() {
    if($("#RegiatrarCotizacionDesayuno").is(':checked')) {  
        $('#RegiatrarCotizacionIdProducto1').prop( "disabled", false ); 
        } else {  
            $('#RegiatrarCotizacionIdProducto1').prop( "disabled", true ); 
        }  
    
});
$('#CotizacionCalculadora').abacus();
</script>


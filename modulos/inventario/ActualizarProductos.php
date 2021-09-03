<div class="col-lg-12">
    <h1 class="page-header">Actualizar</h1>
</div> 
    <div class="row" style="padding:25px;">
        <form lass="form-inline">
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="ProductoId">Codigo</label>
                    <input type="text" class="form-control" id="ProductoId" onkeypress="return ValidarSoloLetras(event);" placeholder="#" disabled>
                </div>                            
            </div>  
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProductoNombre">Nombre</label>
                    <input type="text" class="form-control" id="NuevoProductoNombre" placeholder="Nombre*">
                </div>                            
            </div>        
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProductoMarca">Marca</label>                
                    <input type="text" class="form-control" id="NuevoProductoMarca" placeholder="Marca*">
                </div>                     
            </div>
            <div class="form-group">       
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProductoValor">Valor</label>         
                    <input type="number" class="form-control" id="NuevoProductoValor" placeholder="Valor*">     
                </div>     
            </div>
            <br>
            <div class="form-group">            
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProductoObservaciones">Observaciones</label>
                    <input id="NuevoProductoObservaciones" class="form-control"  placeholder="Observaciones*">
                </div>     
            </div> 
            <div class="form-group">            
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProductoDescripcion">Descripcion</label>
                    <input id="NuevoProductoDescripcion" class="form-control"  placeholder="Descripcion*">
                </div>     
            </div>
            <div class="form-group">               
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProductoTipoProducto">Clases de productos</label>
                    <select id="NuevoProductoIdTipoProducto" class="form-control">                    
                    <?php
                    include ('TipodeProductos.php');  
                    ?>
                    </select>
                </div>     
            </div>                    
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">
                    <label for="NuevoProductoIdProveedores">Proveedor</label>            
                    <select id="NuevoProductoIdProveedores" class="form-control">
                    <option value="">Proveedor</option>
                    <?php
                    include ('Provedores.php');  
                    ?>
                    </select>
                </div>         
            </div>  
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;">                
                    <label for="NuevoProductoCantidad">Cantidad</label>
                    <input type="number" onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="NuevoProductoCantidad" placeholder="Cantidad">
                </div>     
            </div>
            <div class="form-group">
                <div class="col-sm-4" style="padding:5px;"> 
                    <label for="NuevoProductoMedida">Medida</label>                 
                    <select id="NuevoProductoMedida" class="form-control">
                    <option value="">Medida</option>
                    <option value="g">Gramos</option>
                    <option value="kg">Kilogramos</option>
                    <option value="mg">Miligramos</option>
                    <option value="Oz">Onzas</option>
                    <option value="lt">Litro</option>
                    <option value="ml">Mililitro</option>
                    <option value="u">Unidad</option>
                    <option value="cj">Caja</option>
                    </select>
                </div>                
            </div>
            <div class="form-group">
                <div class="col-sm-4" style="padding:17px;">   
                    <button type="button" onclick="ActualizarDatosProductos();"  class="btn btn-warning">Enviar</button>        
                </div>                
            </div>
        </form>
        <br>
        <div class="col-lg-12" style="padding:5px;">
            <span id="ProductosResultadoActualizacion"></span>
        </div>        
    </div>                             
                                                               

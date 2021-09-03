<div class="col-lg-12">
    <h1 class="page-header">Registrar productos</h1>
</div>
<div class="row">
    <div class="col-lg-6" style="padding: 45px;">                                
        <form>
            <div class="form-group">
                <label for="ProductoNombre">Nombre*</label>
                <input type="text" class="form-control" id="ProductoNombre" >
            </div>
            <div class="form-group">
                <label for="ProductoMarca">Marca*</label>
                <input type="text" class="form-control" id="ProductoMarca" >
            </div>
            <div class="form-group">
                <label for="ProductoValor">Valor*</label>
                <input type="number" class="form-control" id="ProductoValor">     
            </div>
            <div class="form-group">
                <label for="ProductoObservaciones">Observaciones*</label>
                <textarea id="ProductoObservaciones" class="form-control" rows="3"></textarea>
            </div> 
            <div class="form-group">
                <label for="ProductoDescripcion">Descripciòn*</label>
                <textarea id="ProductoDescripcion" class="form-control" rows="3"></textarea>
            </div> 
            <div class="form-group">
                <label for="ProductoIdTipoProducto">Tipo de producto*</label>
                <select id="ProductoIdTipoProducto" class="form-control">
                <?php
                include ('TipodeProductos.php');  
                ?>
                </select>
            </div>                    
            <div clProvedor>
                <label for="ProductoIdProveedores">Proveedor*</label>
                <select id="ProductoIdProveedores" class="form-control">
                <?php
                include ('Provedores.php');  
                ?>
                </select>
            </div>  
            <div class="form-group">
                <label for="ProductoCantidad">Cantidad*</label>
                <input onkeypress="return ValidarSoloNumeros(event);" class="form-control" id="ProductoCantidad">
            </div>
            <div class="form-group">
                <label for="ProductoMedida">Medida*</label>
                <select id="ProductoMedida" class="form-control">
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
                <button type="button" onclick="RegistrarProductos();"  class="btn btn-primary">Enviar</button>
        
        </form>
        <br>
        <span id="ProductosResultadoRegistro"></span>                                                        
   </div>    
    <br>
</div> 
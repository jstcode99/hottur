<div class="col-lg-12">
    <h1 class="page-header">Actualizar clases de productos</h1>
</div>
<div class="row">
    <div class="col-lg-6" style="padding: 45px;">                                
        <form>
            <div class="form-group">
                <label for="TipoProductoId">Codigo</label>
                <input type="text" class="form-control" id="NuevoTipoProductoId" onkeypress="return ValidarSoloLetras(event);" disabled>
            </div>        
            <div class="form-group">
                <label for="TipoProductoNombre">Nombre</label>
                <input type="text" class="form-control" id="NuevoTipoProductoNombre" onkeypress="return ValidarSoloLetras(event);" >
            </div>
            <div class="form-group">
                <label for="TipoProductosObservaciones">Observaciones</label>
                <textarea id="NuevoTipoProductosObservaciones" class="form-control" rows="3"></textarea>
            </div>        
            <div class="form-group">
                <label for="TipoProductosImpuesto">Impuesto</label>
                <input type="text" class="form-control" id="NuevoTipoProductosImpuesto" onkeypress="return ValidarSoloNumeros(event);">     
            </div>
            <div class="form-group">
                <label for="TipoProductosCentroContable">Centro contable</label>
                <input  class="form-control" id="NuevoTipoProductosCentroContable">
            </div>
            <div class="form-group">
                <label for="TipoProductosCuentaContable">Cuenta contable</label>
                <input  class="form-control" id="NuevoTipoProductosCuentaContable">
            </div>
            <div class="form-group">
                <label for="TipoProductosConceptoContable">Concepto contable</label>
                <input  class="form-control" id="NuevoTipoProductosConceptoContable">
            </div>
                <button type="button" onclick="ActualizarDatosTipoProductos();"  class="btn btn-warning">Enviar</button>
        
        </form>
        <br>    
   </div>    
    <br>
</div>
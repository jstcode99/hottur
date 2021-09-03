<div class="col-lg-12">
    <h1 class="page-header">Registro de clases de productos</h1>
</div>
<div class="row">
    <div class="col-lg-6" style="padding: 45px;">                                
        <form id="FormulaRegistroTipos">
            <div class="form-group">
                <label for="nombre">Nombre*</label>
                <input type="text" class="form-control" id="TipoProductoNombre" onkeypress="return ValidarSoloLetras(event);" >
            </div>
            <div class="form-group">
                <label for="TipoProductosObservaciones">Observaciones*</label>
                <textarea id="TipoProductosObservaciones" class="form-control" rows="3"></textarea>
            </div>        
            <div class="form-group">
                <label for="TipoProductosImpuesto">Impuesto*</label>
                <input type="number" class="form-control" id="TipoProductosImpuesto">     
            </div>
            <div class="form-group">
                <label for="TipoProductosCentroContable">Centro contable*</label>
                <input onkeypress="return ValidarSoloLetras(event);" class="form-control" id="TipoProductosCentroContable">
            </div>
            <div class="form-group">
                <label for="TipoProductosCuentaContable">Cuenta contable*</label>
                <input onkeypress="return ValidarSoloLetras(event);" class="form-control" id="TipoProductosCuentaContable">
            </div>
            <div class="form-group">
                <label for="TipoProductosConceptoContable">Concepto contable*</label>
                <input onkeypress="return ValidarSoloLetras(event);" class="form-control" id="TipoProductosConceptoContable">
            </div>
                <button type="button" onclick="RegistrarTipoProductos();"  class="btn btn-primary">Enviar</button>
        
        </form>                                                      
   </div>    
    <br>
</div>        
       
<div class="container">
  <div class="row">
      <div class="col-sm-6">
          <div class="panel panel-default">
                <div class="panel-body">
                  
                  <form class="form-horizontal">

                    <legend>Ingrezar Tarifa</legend>
                    
                        <div class="form-group">
                            <label for="TarifaNombre" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-9">
                              <input type="text" name="TarifaNombre" id="TarifaNombre" class="form-control" placeholder="Tarifa" onkeypress="return ValidarSoloLetras(event);">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TarifaPorcentaje" class="col-sm-3 coltrol-label">Porcentaje</label>
                            <div class="col-sm-9">
                              <input type="number" name="TarifaPorcentaje" id="TarifaPorcentaje" class="form-control" placeholder="%" min="0" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-sm-9"></div>  
                                <button type="button" class="btn btn-primary btn-md" onclick="TarifaIngresar();">Guardar</button>
                        </div>
                  </form>
                </div>
          </div>
      </div>
  </div>
</div>

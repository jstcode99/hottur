<div class="container">
  <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-body">
            
            <form>

              <legend>Actualizar Tarifa</legend>
              
              <div class="form-group">

                  <label for="TarifaIdActualizar">N° Tarifa</label>
                  <input type="number" name="TarifaIdActualizar" id="TarifaIdActualizar" class="form-control" readonly>
                 
              </div>

              <div class="form-group">
                 
                  <label for="TarifaNombreActualizar">Nombre</label>
                  <input type="text" name="TarifaNombreActualizar" id="TarifaNombreActualizar" class="form-control" placeholder="Tarifa" onkeypress="return ValidarSoloLetras(event);" length="45">
              
              </div> 

              <div class="form-group">

                  <label for="TarifaPorcentajeActualizar">Porcentaje</label>
                  <input type="number" name="TarifaPorcentajeActualziar" id="TarifaPorcentajeActualizar" class="form-control" placeholder="%" min="0">
                  
              </div>
           
              <div class="form-group">
                      <div class="col-sm-10"></div>  
                      <button type="button" class="btn btn-warning btn-md" onclick="TarifaActualizar();">Actualizar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>    
</div>
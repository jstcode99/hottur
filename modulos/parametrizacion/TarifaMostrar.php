<script type="text/javascript" language="javascript" src="../js/ListarTablas.js"></script>
<div class="container-fluid" id="TablaRecarga">
  <div class="row">
    <div class="col-sm-10">
      <div class="panel">
        <div class="panel-body">
             <h3>Consultar Tarifas</h3>
                  <div class="table-responsive">
                    <table class="table display table-bordered" id="Tabla1">
                          <thead>
                              <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Porcentaje</th>
                                <th>Actualizar</th>                                
                              </tr>
                          </thead>

                          <tbody>
                                <?php
                                require_once('../conexion.php');

                                $ComandoSql="SELECT * FROM tarifa";
                                if($Resultado = $conexion->query($ComandoSql))
                                  {
                                    while($fila = $Resultado->fetch_array())
                                    {
                                      echo "
                                        <tr>
                                            <td>".mb_convert_encoding($fila['IdTarifa'],"UTF-8")."</td>
                                            <td>".mb_convert_encoding($fila['NombreTarifa'],"UTF-8")."</td>
                                            <td>".mb_convert_encoding($fila['PorcentajeTarifa'],"UTF-8")."</td>                                            
                                            <td>
                                                <button class='btn btn-warning btn-md' onclick='TarifaCargarDatosActualizar(".mb_convert_encoding($fila['IdTarifa'],"UTF-8").");'>
                                                    Actualizar
                                                </button>
                                            </td>
                                        </tr> ";
                                      }
                                  }
                              ?>
                        </tbody>                                  
                    </table>
                  </div>
        </div>
      </div>
    </div>
  </div>
</div>


                      

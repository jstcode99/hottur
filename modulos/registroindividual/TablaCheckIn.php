<script type="text/javascript" src="../js/ListarTablas.js"></script>
<div class="container-fluid" id="TablaRecarga">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel">
        <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table display table-bordered" id="TablaCheckIn">
                          <thead>
                              <tr>
                                <th>#</th>
                                <th>Cantidad Pax</th>
                                <th>Tipo Habitacion</th>
                                <th>Valor Pax</th>
                                <th>Valor Adicional</th>
                                <th>Editar</th>
                              </tr>
                          </thead>

                          <tbody>
                                <?php
                                require_once('../conexion.php');

                                $ComandoSql="SELECT * FROM pax";
                                if($Resultado = $conexion->query($ComandoSql))
                                  {
                                    while($fila = $Resultado->fetch_array())
                                    {
                                      echo "
                                        <tr>
                                            <td>".mb_convert_encoding($fila['IdPax'],"UTF-8")."</td>
                                            <td>".mb_convert_encoding($fila['CantidadPax'],"UTF-8")."</td>
                                            <td>".mb_convert_encoding($fila['TipoHabitacionPax'],"UTF-8")."</td>
                                            <td>".mb_convert_encoding($fila['ValorPax'],"UTF-8")."</td>
                                            <td>".mb_convert_encoding($fila['AdicionalPax'],"UTF-8")."</td>
                                            <td>
                                                <button class='btn btn-warning btn-md' onclick='PaxCargarDatosActualizar(".mb_convert_encoding($fila['IdPax'],"UTF-8").");'>
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


                      

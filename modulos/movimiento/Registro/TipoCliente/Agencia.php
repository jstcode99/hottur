<script src="../js/ActivarToggle.js"></script>
<br>
<div class="col-xs-12 col-sm-12 col-md-12">
    <label class="checkbox-inline">
        ¿  Tiene Convenio ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" id="ConvenioRegistro" data-toggle="toggle" data-onstyle="success"> 
    </label>
</div>
<br>
<div class="col-xs-12 col-sm-12 col-md-12" id="ContenedorConvenioRegistro">
    <br>
    <label for="">Agencias en convenio</label>
    <select name="" id="ConveniosSelectRegistro" class="form-control" onchange="TraerCodigoCorporativoYAgencia();">
        <option value="">Seleccione Empresa</option>
            <?php
                //Con Relaciones
                //require_once('../../../ConvenioSelect.php');
                // sin relaciones
                 require_once('../../../conexion.php');
                 $ComandoSql="SELECT cliente.IdCliente, cliente.NombreCliente, cliente.IdConvenio FROM cliente, clientetipo WHERE  clientetipo.IdClienteTipo = 3 AND clientetipo.IdClienteTipo = cliente.IdClienteTipo AND cliente.IdConvenio !=''";
                 $resultado=$conexion->query($ComandoSql);
                     // echo"<option value=''>Selecciones Convenio</option>";
                       while($fila=$resultado->fetch_array())
                       {
                          //Sin Relaciones
                          $ComandoSql1 = "SELECT CodigoConvenio,NombreConvenio FROM convenio WHERE IdConvenio = ".$fila['IdConvenio'].";";
                          $resultado1=$conexion->query($ComandoSql1);
                          $fila1=$resultado1->fetch_array();
                        //   var_dump($fila1);
                          echo"<option value='".$fila['IdCliente']."'>".$fila1['CodigoConvenio']."-".$fila['NombreCliente']."</option>"; 
                      }
            ?>
    </select>
</div>
<div class="col-xs-12 col-sm-12 col-md-12" id="ContenedorClienteRegistro">
    <br>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <label for="NitClienteAgenciaRegistro">Numero Documento</label>
        <input type="text" name="NitClienteAgenciaRegistro" id="NitClienteAgenciaRegistro" class="form-control">
    </div>
    <br>
    <div class="col-xs-12 col-sm-2 col-md-2" style="padding:5px">
        <button type="button" class="btn btn-primary" onclick="VerificarCajaNitSiEstaVacia('REGISTRO');"><li class="glyphicon glyphicon-search"></li></button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <label for="NombreClienteAgenciaRegisgtro">Nombre Cliente</label>
        <input type="text" name="NombreClienteAgenciaRegisgtro" id="NombreClienteAgenciaRegisgtro" class="form-control">
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-sm-6" id="ContenedorComisionAgencia">
        <label class="checkbox-inline">
                          ¿ Por Comision ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="checkbox" id="ComisionAgencia" data-toggle="toggle" data-onstyle="success"> 
        </label>
</div>
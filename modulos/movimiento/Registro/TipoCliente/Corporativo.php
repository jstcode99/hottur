<script src="../js/ActivarToggle.js"></script>
<div class="panel">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <label class="checkbox-inline">
            ¿  Tiene Convenio ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" id="ConvenioRegistro" data-toggle="toggle" data-onstyle="success"> 
        </label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" id="ContenedorConvenioRegistro">
        <br>
        <label for="">Corporativos en convenio</label>
        <select name="" id="ConveniosSelectRegistro" class="form-control" onchange="TraerCodigoCorporativoYAgencia();">
            <option value="">Seleccione Empresa</option>
                    <?php
                        // Con Relacion
                        //require_once('../../../ConvenioSelect.php');
                        // sin relaciones
                        require_once('../../../conexion.php');
                        $ComandoSql="SELECT cliente.IdCliente, cliente.NombreCliente, cliente.IdConvenio FROM cliente, clientetipo WHERE  clientetipo.IdClienteTipo = 2 AND clientetipo.IdClienteTipo = cliente.IdClienteTipo AND cliente.IdConvenio !=''";
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
        <div class="col-xs-12 col-sm-6 col-md-6" id="ContNitCorporaRegistr">
            <label for="NitClienteCorporativoRegistro">Nit Empresa</label>
            <input type="text" name="NitClienteCorporativoRegistro" id="NitClienteCorporativoRegistro" class="form-control" onkeypress="return ValidarSoloNumeros(event);">
        </div>
        <br>
        <div class="col-xs-12 col-sm-2 col-md-2" style="padding:5px">
            <button type="button" class="btn btn-primary" onclick="VerificarCajaNitSiEstaVacia('REGISTRO');"><li class="glyphicon glyphicon-search"></li></button>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" id="ContNombreCorporativo">
            <label for="NombreClienteCorporativoRegistro">Nombre Cliente</label>
            <input type="text" name="NombreClienteCorporativoRegistro" id="NombreClienteCorporativoRegistro" class="form-control">
        </div>
    </div>
</div>
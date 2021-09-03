<script src="../js/ActivarDateTimes.js"></script>
<script src="../js/Imprimir.js"></script>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Habitaciones para limpieza
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
          <?php
            include('InformeHabitacionesParaLimpieza.php');
          ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Extrangeros alojados
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
          <form action="" class="form-inline">
            <label for="">Desde</label>&nbsp;&nbsp;
              <div class='input-group date col-xs-6 col-sm-2 col-md-2' id='Fecha1'>
                  <input type='text' id="Fecha1EstrangerosAlojados" class="form-control" />
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>&nbsp;&nbsp;&nbsp;
            <label for="">al</label>&nbsp;&nbsp;&nbsp;
              <div class='input-group date col-xs-6 col-sm-2 col-md-2' id='Fecha2'>
                    <input type='text' id="Fecha2EstrangerosAlojados" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
              </div>
              <button type="button" class="btn btn-primary" onclick="CajasParaHacerConsultaInformes('ExtrangerosAlojados')">Buscar</button>
          </form>
          <div Id="ContenedorInformeEstrangerosAlojados">
          </div>
          <br>
          <br>
          <br>
          <br><br>
          <br>
          <br>
          <br><br>
          <br>
          <br>
          <br>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Llegadas Esperadas
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
          <form action="" class="form-inline">
                <label for="">Desde</label>&nbsp;&nbsp;
                  <div class='input-group date col-xs-6 col-sm-2 col-md-2' id='Fecha1'>
                      <input type='text' id="Fecha1LlegadasEsperadas" class="form-control" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>&nbsp;&nbsp;&nbsp;
                <label for="">al</label>&nbsp;&nbsp;&nbsp;
                  <div class='input-group date col-xs-6 col-sm-2 col-md-2' id='Fecha2'>
                        <input type='text' id="Fecha2LlegadasEsperadas" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                  </div>
                  <button type="button" class="btn btn-primary" onclick="CajasParaHacerConsultaInformes('LlegadasEsperadas')">Buscar</button>
          </form>
          <div Id="ContenedorInformeLlegadasEsperadas">
          </div>
            <br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
            <br>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingFour">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            Salidas Esperadas
          </a>
        </h4>
      </div>
      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <div class="panel-body">
            <?php
              include('InformeSalidasEsperadas.php');
            ?>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingFive">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFour">
            Desayunos a preparar
          </a>
        </h4>
      </div>
      <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
        <div class="panel-body">
            <?php
              include('InformeDesayunosApreparar.php');
            ?>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingSix">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            Lista Check in
          </a>
        </h4>
      </div>
      <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
        <div class="panel-body">
        <form action="" class="form-inline">
                <label for="">Desde</label>&nbsp;&nbsp;
                  <div class='input-group date col-xs-6 col-sm-2 col-md-2' id='Fecha1'>
                      <input type='text' id="Fecha1MovimientosParaImprimir" class="form-control" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Hasta hoy</label>&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="button" class="btn btn-primary" onclick="CajasParaHacerConsultaInformes('ListadoMovimientosParaImprimir')">Buscar</button>
          </form>
          <div Id="ContenedorMovimientosParaImprimir">
          </div>
            <br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
            <br>
            <div id="ContenedorImpresion" >
              <?php
                include('FormatoDeImpresionChechIn.php');
              ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
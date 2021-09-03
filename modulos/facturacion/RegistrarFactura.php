<div class="container-fluid" style="padding:30px;">
		<div class="col-md-8">
		<div class="panel panel-info">
		<div class="panel-heading">
				<h3>Datos del cliente</h3>
		</div>
		
		<div class="panel-body">
			<form class="form-horizontal"  id="DatosFacturaCliente">					
					<div class="form-group">
					<label for="nombre" class="col-sm-3 control-label">Nit</label>
					<div class="col-sm-8">
						<input type="text"  class="form-control" id="RegistrarFacturaNit" required="">
						<br>
					<button type="button" class="btn btn-primary pull-right" onclick="BuscarClienteFacturacion();"><i class="glyphicon glyphicon-search"></i></button>					
					</div>
					</div>
					<div class="form-group">
					<label for="nombre" class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="RegistrarFacturaNombre" name="Nombre" required="">
					</div>
					</div>
					<div class="form-group">
					<label for="telefono" class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="RegistrarFacturaTelefono">
					</div>
					</div>
					
					<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="RegistraFacturaDireccion">
					</div>
					</div>			  				  		
				</form>
		</div>
		</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-danger">
				<div class="panel-body">
					<h2>Selección de Habitaciones</h2>		
				<br>
				<div class="alert alert-info" role="alert">Recuerde que antes de facturar debe realizar los traslados de consumos y servicios en folio.</div>
				<table class="table table-bordered" id="TablaFacturacion">
								<thead>
								<tr> 
									<th>Hab</th>
									<th>Hab</th>
									<th>Hab</th>
									<th>Hab</th>
								</tr>
								</thead>
								<tbody>
									<div class="btn-toolbar" role="toolbar" aria-label="...">	
											<?php
											require_once ('../conexion.php');										
													$ComandoSql="SELECT habitacion.IdHabitacion,habitacion.NombreHabitacion,folio.IdFolio from movimientohabitacion,habitacion,folio WHERE folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and movimientohabitacion.IdHabitacion=habitacion.IdHabitacion and movimientohabitacion.EstadoMovimientoHabitacion='ACTIVO'GROUP by habitacion.IdHabitacion";
													$resultado = $conexion->query($ComandoSql);
													$i=0;	
													while($fila=$resultado->fetch_array())
													{
														
														if($i>3)
														{
															echo "<tr>";
															$i=0;
														}	
														
															echo '<td><buttom type="button" id="IdFolioBtn'.$fila['IdFolio'].'" onclick="TraerFolioFacturacion('.$fila['IdFolio'].')" value="'.$fila['IdFolio'].'" class="btn btn-primary btn-lg btn-block">'.$fila['NombreHabitacion'].'</buttom></td>';
															$i++;
														}
																				
											?>
									</div>
								<tbody>	
							</table>		
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
		<div class="col-md-8">
		<div class="table-responsive">
		 <table class="table table-bordered">
		     <thead>
		         <tr>				 		
					 <th>F</th>
		             <th>Codigo</th>
		             <th>Concepto</th>
		             <th>Cantidad</th>
		             <th>Impuesto / Iva</th>		                          
		             <th>Valor total</th>
		             <th>Facturar</th>      
		         </tr>
		     </thead>
		     <tbody id="TablaResumen">
			 
			 </tbody>	   
		 </table>
    </div>
		</div>
		<div class="col-md-4">
		<div class="panel panel-success">
				<div class="panel-body">
					Sumatorias
				</div>
				<div class="panel-footer">
					<ul class="list-group">
						<li class="list-group-item"><a>Abonado:<strong><a id="SumAbonado">0</a></strong></a></li>						
						<li class="list-group-item"><a>Iva:<strong><a id="SumIva">0</a></strong></a></li>
						<li class="list-group-item"><a>SubTotal:<strong><a id="SumSubTotal">0</a></strong></a></li>						
						<li class="list-group-item"><a>Total Facturado:<strong><a id="SumTotalFact">0</a></strong></a></li>
						<li class="list-group-item"><a>Total a Pagar:<strong><a id="SunTotalPagar">0</a></strong></a></li>
					</ul>
					<form class="form-horizontal">
					<div class="form-group">
						<div class="col-md-8">
						<div class="checkbox">
							<label>
							<input type="checkbox" id="RegistrarFacturaPagoT"> TARJETA DE DÉBITO O CRÉDITO
							</label>
						</div>
						</div>
					</div>
					
					<div class="form-group col-md-12">
						<label class="sr-only" for="exampleInputAmount"></label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
								<input disabled ype="text" class="form-control" id="RegistrarFacturaPagoValor" placeholder="">
							</div>
						</div>										
					</form>
					<br>
					<button onclick="FacturarSeleccionados();"  type="button" class="btn btn-primary btn-lg btn-block"><i class="glyphicon glyphicon-usd"></i> Facturar</button>				
 
					
					
				</div>
				</div>	
		</div>
		
</div>
<br>
<br>
<br>
<br>
<br>
<br>	
<?php
require_once ('ImpresionFactura.php');
?>

<!-- entrega de dinero -->
<script>
$('#RegistrarFacturaPagoT').click(function() {
	if( $('#RegistrarFacturaPagoT').prop('checked') ) {
		$('#RegistrarFacturaPagoValor').prop("disabled",false);
}else{
	$('#RegistrarFacturaPagoValor').prop("disabled",true);
	$('#RegistrarFacturaPagoValor').val(0);
}	

});
</script>
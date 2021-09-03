<div class="modal fade bs-example-modal-rack" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="RackModal">
    <div class="modal-dialog modal-rack" role="document">
        <div class="modal-content">
		    <div class="row" style="padding:55px">
			    <h2  class="page-header">Rack Grafico</h2>
				    <div class="panel panel-default">
					    <div class="panel-heading">
						    <div class="card-footer" style="padding:25px">						
							<div class="card-footer-item">
							<i class="fa fa-fw fa-circle text-danger"></i>OCUPADAS
							</div>
							<div class="card-footer-item">
							<i class="fa fa-fw fa-circle text-success"></i>DISPONIBLE
							</div>
							<div class="card-footer-item">
							<i class="fa fa-fw fa-circle text-info"></i>MANTENIMIENTO
							</div>
							<div class="card-footer-item">
							<i class="fa fa-fw fa-circle text-default active"></i>SUCIA
							</div>
						</div>				
					</div>
					<div class="panel-body">
						<div class="col-md-4-centered">
							<table class="table table-bordered">
								<thead>
								<tr> 
									<th>Hab</th>
									<th>Hab</th>
									<th>Hab</th>
									<th>Hab</th>
								</tr>
								</thead>
								<tbody>								
											<?php
											require_once ('../modulos/conexion.php');
											$ComandoSql="SELECT habitacion.IdHabitacion,habitacion.NombreHabitacion,habitaciontipo.NombreHabitacionTipo,movimientohabitacion.TipoMovimientoHabitacion FROM movimientohabitacion,habitaciontipo,habitacion WHERE movimientohabitacion.EstadoMovimientoHabitacion='ACTIVO' AND movimientohabitacion.IdHabitacion=habitacion.IdHabitacion AND  habitaciontipo.IdHabitacionTipo=habitacion.IdHabitacionTipo AND movimientohabitacion.TipoMovimientoHabitacion='CHECK IN' GROUP BY habitacion.IdHabitacion ASC UNION SELECT habitacion.IdHabitacion,habitacion.NombreHabitacion,habitaciontipo.NombreHabitacionTipo,habitacion.EstadoHabitacion as 'TipoMovimientoHabitacion' FROM movimientohabitacion,habitaciontipo,habitacion WHERE habitacion.IdHabitacion NOT IN (SELECT movimientohabitacion.IdHabitacion FROM movimientohabitacion WHERE movimientohabitacion.EstadoMovimientoHabitacion='ACTIVO' and movimientohabitacion.TipoMovimientoHabitacion='CHECK IN') and habitaciontipo.IdHabitacionTipo=habitacion.IdHabitacionTipo GROUP BY habitacion.IdHabitacion ASC";
											if($Resultado=$conexion->query($ComandoSql))
											{											
											/* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
											/* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
											$i=0;
											$Tipo;
											if($Resultado==false)
											{

											$SelectAlternativo="SELECT habitacion.NombreHabitacion,habitacion.IdHabitacion,habitaciontipo.NombreHabitacionTipo, habitacion.EstadoHabitacion as TipoMovimientoHabitacion FROM `habitacion`,habitaciontipo WHERE habitacion.IdHabitacionTipo=habitaciontipo.IdHabitacionTipo";
											$Resultado=$conexion->query($SelectAlternativo);
											while($fila= $Resultado->fetch_array())
												{
													if($i>3)
													{
														echo "<tr>";	
														$i=0;
													}																																					
													switch($fila["NombreHabitacionTipo"])
													{
														case "ESTANDAR":
															switch($fila["TipoMovimientoHabitacion"])
																	{
																		case "CHECK IN":
																			echo '<td><button type="button" class="btn btn-danger">'.$fila["NombreHabitacion"].' E</button></td>';
																		break;																

																		case "DISPONIBLE":
																			echo '<td><button type="button" class="btn btn-success">'.$fila["NombreHabitacion"].' E</button></td>';
																		break;
																		
																		case "MANTENIMIENTO":
																			echo '<td><button type="button" class="btn btn-info">'.$fila["NombreHabitacion"].' E</button></td>';
																		break;

																		case "SUCIA":
																			echo '<td><button type="button" class="btn btn-default">'.$fila["NombreHabitacion"].' E</button></td>';
																		break;
																		default:
																		
																		break;
																	}
														break;

														case "ESTANDAR ESPECIAL":
																switch($fila["TipoMovimientoHabitacion"])
																		{
																			case "CHECK IN":
																			echo '<td><button type="button" class="btn btn-danger">'.$fila["NombreHabitacion"].' ES</button></td>';
																		break;

																
																		case "DISPONIBLE":
																			echo '<td><button type="button" class="btn btn-success">'.$fila["NombreHabitacion"].' ES</button></td>';
																		break;
																		
																		case "MANTENIMIENTO":
																			echo '<td><button type="button" class="btn btn-info">'.$fila["NombreHabitacion"].' ES</button></td>';
																		break;

																		case "SUCIA":
																			echo '<td><button type="button" class="btn btn-Default">'.$fila["NombreHabitacion"].' ES</button></td>';
																		break;
																		default:
																		
																		break;
																		}
														break;

														case "JUNIOR SUITE":
															switch($fila["TipoMovimientoHabitacion"])
																	{
																		case "CHECK IN":
																			echo '<td><button type="button" class="btn btn-danger">'.$fila["NombreHabitacion"].' JS</button></td>';
																		break;																	

																		case "DISPONIBLE":
																			echo '<td><button type="button" class="btn btn-success">'.$fila["NombreHabitacion"].' JS</button></td>';
																		break;
																		
																		case "MANTENIMIENTO":
																			echo '<td><button type="button" class="btn btn-info">'.$fila["NombreHabitacion"].' JS</button></td>';
																		break;

																		case "SUCIA":
																			echo '<td><button type="button" class="btn btn-Default">'.$fila["NombreHabitacion"].' JS</button></td>';
																		break;
																		default:
																		
																		break;
																	}
														break;
														case "SUITE":
															switch($fila["TipoMovimientoHabitacion"])
																	{
																		case "CHECK IN":
																			echo '<td><button type="button" class="btn btn-danger">'.$fila["NombreHabitacion"].' S</button></td>';
																		break;

																		case "DISPONIBLE":
																			echo '<td><button type="button" class="btn btn-success">'.$fila["NombreHabitacion"].' S</button></td>';
																		break;
																		
																		case "MANTENIMIENTO":
																			echo '<td><button type="button" class="btn btn-info">'.$fila["NombreHabitacion"].' S</button></td>';
																		break;

																		case "SUCIA":
																			echo '<td><button type="button" class="btn btn-Default">'.$fila["NombreHabitacion"].' S</button></td>';
																		break;
																		default:
																		
																		break;
																	}
														break;
														default:
																		
														break;
														
													}
													$i++;
												}
											}else{
												while($fila= $Resultado->fetch_array())
												{
													if($i>3)
													{
														echo "<tr>";	
														$i=0;
													}																																					
													switch($fila["NombreHabitacionTipo"])
													{
														case "ESTANDAR":
															switch($fila["TipoMovimientoHabitacion"])
																	{
																		case "CHECK IN":
																			echo '<td><button type="button" class="btn btn-danger">'.$fila["NombreHabitacion"].' E</button></td>';
																		break;																

																		case "DISPONIBLE":
																			echo '<td><button type="button" class="btn btn-success">'.$fila["NombreHabitacion"].' E</button></td>';
																		break;
																		
																		case "MANTENIMIENTO":
																			echo '<td><button type="button" class="btn btn-info">'.$fila["NombreHabitacion"].' E</button></td>';
																		break;

																		case "SUCIA":
																			echo '<td><button type="button" class="btn btn-default">'.$fila["NombreHabitacion"].' E</button></td>';
																		break;
																		default:
																		
																		break;
																	}
														break;

														case "ESTANDAR ESPECIAL":
																switch($fila["TipoMovimientoHabitacion"])
																		{
																			case "CHECK IN":
																			echo '<td><button type="button" class="btn btn-danger">'.$fila["NombreHabitacion"].' ES</button></td>';
																		break;

																
																		case "DISPONIBLE":
																			echo '<td><button type="button" class="btn btn-success">'.$fila["NombreHabitacion"].' ES</button></td>';
																		break;
																		
																		case "MANTENIMIENTO":
																			echo '<td><button type="button" class="btn btn-info">'.$fila["NombreHabitacion"].' ES</button></td>';
																		break;

																		case "SUCIA":
																			echo '<td><button type="button" class="btn btn-Default">'.$fila["NombreHabitacion"].' ES</button></td>';
																		break;
																		default:
																		
																		break;
																		}
														break;

														case "JUNIOR SUITE":
															switch($fila["TipoMovimientoHabitacion"])
																	{
																		case "CHECK IN":
																			echo '<td><button type="button" class="btn btn-danger">'.$fila["NombreHabitacion"].' JS</button></td>';
																		break;																	

																		case "DISPONIBLE":
																			echo '<td><button type="button" class="btn btn-success">'.$fila["NombreHabitacion"].' JS</button></td>';
																		break;
																		
																		case "MANTENIMIENTO":
																			echo '<td><button type="button" class="btn btn-info">'.$fila["NombreHabitacion"].' JS</button></td>';
																		break;

																		case "SUCIA":
																			echo '<td><button type="button" class="btn btn-Default">'.$fila["NombreHabitacion"].' JS</button></td>';
																		break;
																		default:
																		
																		break;
																	}
														break;
														case "SUITE":
															switch($fila["TipoMovimientoHabitacion"])
																	{
																		case "CHECK IN":
																			echo '<td><button type="button" class="btn btn-danger">'.$fila["NombreHabitacion"].' S</button></td>';
																		break;

																		case "DISPONIBLE":
																			echo '<td><button type="button" class="btn btn-success">'.$fila["NombreHabitacion"].' S</button></td>';
																		break;
																		
																		case "MANTENIMIENTO":
																			echo '<td><button type="button" class="btn btn-info">'.$fila["NombreHabitacion"].' S</button></td>';
																		break;

																		case "SUCIA":
																			echo '<td><button type="button" class="btn btn-Default">'.$fila["NombreHabitacion"].' S</button></td>';
																		break;
																		default:
																		
																		break;
																	}
														break;
														default:
																		
														break;
														
													}
													$i++;
													
												} 
											}
											}													
										
		
											?>
									
								<tbody>	
							</table>					
						</div>
					</div>
				</div>
		    </div>
	    </div>
    </div>
</div>




<div class="modal fade" id="Egreso" tabindex="-1" role="dialog" aria-labelledby="EgresoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="index.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Comprobante de Egreso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					
				<form>
				
				<div class="form-group">
					<label for="ComprobanteEgresoNitCliente">Nit Cliente:</label>
					<input type="text" disabled name="ComprobanteEgresoNitCliente" id="ComprobanteEgresoNitCliente" class="form-control" placeholder="Nit Cliente">
				</div>
				
				<div class="form-group">
					<label for="ComporobanteEgresoNombreCliente">Nombre Cliente:</label>
					<input type="text"  name="ComporobanteEgresoNombreCliente" id="ComporobanteEgresoNombreCliente" class="form-control" placeholder="Nombre Cliente" disabled>
				</div>
				
				<div class="form-group">
					<label for="ComporobanteEgresoValor">Valor Comprobante:</label>
					<input type="text"  name="ComporobanteEgresoValor" id="ComporobanteEgresoValor" disabled class="form-control" placeholder="Valor Comprobante" >
				</div>
				
				<div class="form-group">
					<label for="ComporobanteEgresoConcepto">Concepto:</label>
					<textarea name="ComporobanteEgresoConcepto"  class="form-control" id="ComporobanteEgresoConcepto" cols="30" rows="5" placeholder="Concepto"></textarea>
				</div>
				
				</form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" name="submitSave" onclick="IsertarComprobanteEgreso();" class="btn btn-success btn-md">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// include('../modulos/facturacion/ReciboEgreso.php');
?>

<div class="modal fade modal-lg" id="ReciboEgreso" tabindex="-1" role="dialog" aria-labelledby="EgresoLabel" aria-hidden="true">
    
        <div class="modal-content">
            <form action="index.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Comprobante de Egreso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
				<div id="AreaImprimirComprobanteIngresoListado">							
						<?php
							echo "<center>";
							include('../modulos/facturacion/ReciboEgreso.php');
							echo "</center>";
						?>
				</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" name="submitSave" onclick="imprSelec('AreaImprimirComprobanteIngresoListado')"  class="btn btn-primary btn-md">Imprimir</button>
                </div>
            </form>
        </div>
 
</div>
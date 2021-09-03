<?php 
if($_POST['NombreProceso']!="")
{
    require_once ('../conexion.php');
    $NombreProceso = isset($_POST['NombreProceso']) ? trim($_POST['NombreProceso']) : $_GET['NombreProceso']; 
  
switch($NombreProceso)
{
    case "TraerFolios":

    $ComandoSql="SELECT habitacion.IdHabitacion,habitacion.NombreHabitacion,folio.IdFolio from movimientohabitacion,
    habitacion,folio WHERE folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and 
    movimientohabitacion.IdHabitacion=habitacion.IdHabitacion and movimientohabitacion.EstadoMovimientoHabitacion='ACTIVO' 
    GROUP by habitacion.IdHabitacion ASC;";
    $resultado = $conexion->query($ComandoSql);

    while($fila=$resultado->fetch_array())
    {
        echo '<option value="'.$fila['IdFolio'].'">'.$fila['NombreHabitacion'].'</option>';
    }


    break;
    case "TraerCompendioFolio":

        $Debito=0;
        /***   inicio:     Trae los consumos y sus impuesto para mostrarlos             */
        $IdFolio=$conexion->real_escape_string($_POST['IdFolio']);
        $ComandoSql="SELECT consumos.IdConsumos,consumos.TipoConsumos,consumos.ValorConsumos,consumos.CantidadConsumos,consumos.EstadoConsumos,consumos.IdProductos,productos.NombreProductos,productotipo.ImpuestoProductoTipo FROM folio,consumos,productos,productotipo WHERE consumos.IdFolio=".$IdFolio." and consumos.IdProductos=productos.IdProductos and productotipo.IdProductoTipo=productos.IdProductoTipo GROUP by consumos.IdConsumos";
        $resultado = $conexion->query($ComandoSql);
        $i=0;
        //glyphicon glyphicon-star
        while($fila=$resultado->fetch_array())
        {
            $i++;
            echo '<tr id="fila'.$i.'">';
            echo '<td>'.$i.'</td>';

            if($fila['TipoConsumos']=="CORTESIA") 
            {
                echo '<td>'.mb_convert_encoding($fila['IdProductos'], "UTF-8").' <i class="glyphicon glyphicon-star"></i></td>';                             
                echo '<td>'.mb_convert_encoding($fila['NombreProductos'], "UTF-8").'</td>';
                echo '<td>'.$fila['CantidadConsumos'].'</td>';
                $SubTotal=($fila['ValorConsumos'] * $fila['ImpuestoProductoTipo']) / 100;
                echo '<td>'.$SubTotal.'</td>';     
                echo '<td>'.$SubTotal.'</td>';                  
                $Debito=$Debito+$SubTotal;
                $ConsumoForm="'".$fila['NombreProductos']."'";
                echo '<td><i class="glyphicon glyphicon-share-alt" onclick="TraladarConsumosForm('.$fila['IdConsumos'].','.$ConsumoForm.','.$SubTotal.','.$i.');" data-toggle="modal" data-target="#TrasladoForm"></i></td>';
            }else{
                echo '<td>'.mb_convert_encoding($fila['IdProductos'], "UTF-8").'</td>';
                echo '<td>'.mb_convert_encoding($fila['NombreProductos'], "UTF-8").'</td>';                 
                echo '<td>'.$fila['CantidadConsumos'].'</td>';
                $SubTotal=($fila['ValorConsumos'] * $fila['ImpuestoProductoTipo']) / 100;
                echo '<td>'.$SubTotal.'</td>';     
                $Total=($fila['ValorConsumos'] + $SubTotal);
                echo '<td>'.$Total.'</td>';                 
                $Debito=$Debito+$Total;
                $ConsumoForm="'".$fila['NombreProductos']."'";
                echo '<td><i class="glyphicon glyphicon-share-alt" onclick="TraladarConsumosForm('.$fila['IdConsumos'].','.$ConsumoForm.','.$Total.','.$i.');" data-toggle="modal" data-target="#TrasladoForm"></i></td>';    
            }                          
                
        
        }


            $ComandoSqlServicio="SELECT consumos.IdConsumos ,consumos.TipoConsumos,consumos.ValorConsumos,consumos.CantidadConsumos,consumos.EstadoConsumos,consumos.IdServicios,servicios.NombreServicios,serviciotipo.ImpuestoServicioTipo FROM serviciotipo,folio,consumos,servicios WHERE consumos.IdFolio=".$IdFolio." and consumos.IdServicios=servicios.IdServicios and servicios.IdServicioTipo=serviciotipo.IdServicioTipo GROUP by consumos.IdConsumos";
            $resultado = $conexion->query($ComandoSqlServicio);
        //glyphicon glyphicon-star
        while($fila=$resultado->fetch_array())
        {
            $i++;
            echo '<tr id="fila'.$i.'">';
            echo '<td>'.$i.'</td>';

            if($fila['TipoConsumos']=="CORTESIA") 
            {
                echo '<td>'.mb_convert_encoding($fila['IdServicios'], "UTF-8").'<i class="glyphicon glyphicon-star"></i></td>';                                             
                echo '<td>'.mb_convert_encoding($fila['NombreServicios'], "UTF-8").'</td>';
                echo '<td>'.$fila['CantidadConsumos'].'</td>'; 
                $SubTotal=($fila['ValorConsumos'] * $fila['ImpuestoServicioTipo']) / 100;
                echo '<td>'.$SubTotal.'</td>';     
                echo '<td>'.$SubTotal.'</td>';
                $Total=$SubTotal;     
                $Debito=$Debito+$SubTotal;
                $ConsumoForm="'".$fila['NombreServicios']."'"; 
                echo '<td><i class="glyphicon glyphicon-share-alt" onclick="TraladarConsumosForm('.$fila['IdConsumos'].','.$ConsumoForm.','.$Total.','.$i.');" data-toggle="modal" data-target="#TrasladoForm"></i></td>';
            }else{
                        echo '<td>'.mb_convert_encoding($fila['IdServicios'], "UTF-8").'</td>'; 
                        echo '<td>'.mb_convert_encoding($fila['NombreServicios'], "UTF-8").'</td>';
                        echo '<td>'.$fila['CantidadConsumos'].'</td>';                                                                                
                        $SubTotal=($fila['ValorConsumos'] * $fila['ImpuestoServicioTipo']) / 100;
                        echo '<td>'.$SubTotal.'</td>';     
                        $Total=($fila['ValorConsumos'] + $SubTotal);
                        echo '<td>'.$Total.'</td>';                       
                        $Debito=$Debito+$Total;
                        $ConsumoForm="'".$fila['NombreServicios']."'"; 
                        echo '<td><i class="glyphicon glyphicon-share-alt" onclick="TraladarConsumosForm('.$fila['IdConsumos'].','.$ConsumoForm.','.$Total.','.$i.');" data-toggle="modal" data-target="#TrasladoForm"></i></td>';
                }
                
               
                 
        }
                
        
        /***   fin:     Trae los consumos y sus impuesto para mostrarlos             */



        /*** Trae los valores del seguro de todo los huespedes de ese folio seleccionado y se cargan 
         *   a la tabla como un cosumo mas.
         */
        $ComandoSqlSeguros="SELECT SUM(huesped.SeguroHuesped) as 'ValorSeguros',COUNT(huesped.SeguroHuesped) as 'CantidadSeguros' FROM huesped,movimientohabitacion,folio WHERE huesped.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion AND folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and folio.IdFolio=".$IdFolio.";";
        $resultado = $conexion->query($ComandoSqlSeguros);
        //glyphicon glyphicon-star
        while($fila=$resultado->fetch_array())
        {
            if($fila['CantidadSeguros']==0 || $fila['ValorSeguros']==0 || $fila['ValorSeguros'] < 0)
            {                
            }else{
                $i++;
                echo '<tr id="fila'.$i.'">';
                echo '<td>'.$i.'</td>';
                echo '<td>00001</td>';
                echo '<td>SEGURO HOTELERO</td>';
                echo '<td>'.$fila['CantidadSeguros'].'</td>';                
                echo '<td>0</td>';
                echo '<td>'.$fila['ValorSeguros'].'</td>';  
                $Debito=$Debito+$fila['ValorSeguros'];
            }
                         
        }
         
            $ComandoSqlAbonos='SELECT movimientohabitacion.IdHabitacion,ingresocomprobante.ValorIngresoComprobante FROM `folio`,movimientohabitacion,movimiento,ingresocomprobante WHERE folio.IdFolio='.$IdFolio.' and folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and movimientohabitacion.IdMovimiento=movimiento.IdMovimiento and movimiento.IdMovimiento=ingresocomprobante.IdMovimiento and movimientohabitacion.IdHabitacion=ingresocomprobante.IdHabitacion';
            $resultado = $conexion->query($ComandoSqlAbonos);
            $Abono=0;
            while($fila=$resultado->fetch_array())
            {
            $Abono+=$fila['ValorIngresoComprobante'];          
            }
            echo $Abono;

        /***   inicio:     Trae las fecha de entra y salida 
         * para obtener el valor de la estadia y tambien se trae el porcetaje de iva  */

        $Iva; 
        $Noches;
        $ValorEstadiaSinIva;

        $ComandoSqlIva='SELECT PorcentajeIva FROM `iva` WHERE `NombreIva`="IVA"';
        $resultado = $conexion->query($ComandoSqlIva);
        while($fila=$resultado->fetch_array())
        {
           $Iva=$fila['PorcentajeIva'];
        }

        $ComandoSqlEstadia="SELECT DATEDIFF(movimientohabitacion.FechaSalidaMovimientoHabitacion,movimientohabitacion.FechaEntradaMovimientoHabitacion) AS 'NOCHES',folio.ValorEstadiaFolio FROM folio,movimientohabitacion WHERE folio.IdFolio=".$IdFolio." AND folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion";        
        $resultado = $conexion->query($ComandoSqlEstadia);


        while($fila=$resultado->fetch_array())
        {
            $Noches=$fila['NOCHES'];
            $ValorEstadiaSinIva=$fila['ValorEstadiaFolio'];
            $i++;
            $SubTotalEstadia=($ValorEstadiaSinIva * $Iva) / 100;
            $ValorTotalEstadia=$ValorEstadiaSinIva + $SubTotalEstadia;
            $Debito=$Debito+$ValorTotalEstadia;
            echo '<tr id="fila'.$i.'">';  
            echo '<td>'.$i.'</td>';
            echo '<td>00000</td>';
            echo '<td>SERVICIO DE HOSPEDAJE Y ESTADIA</td>';         
            echo '<td>'.$Noches.'/Dias</td>';                
            echo '<td>'.$SubTotalEstadia.'</td>';     
            echo '<td>'.$ValorTotalEstadia.'</td>';
            echo '</tr>
                </tr>
                <td class="list-group-item list-group-item-danger">Debito:'.$Debito.'</td>
                <td class="list-group-item list-group-item-success">Credito:'.($Debito - $Abono).'</td>
                <td class="list-group-item list-group-item-info">Abonos:'.$Abono.'</td>
                </tr>
            ';
           
        }    

    break;

    case "DatosFolio":
        $IdFolio=$conexion->real_escape_string($_POST['IdFolio']);
        $ComandoSqlDatosFolio='SELECT habitacion.NombreHabitacion,folio.FechaFolio,movimientohabitacion.NombreResponsableMovimientoHabitacion FROM `folio`,habitacion,movimientohabitacion WHERE folio.IdFolio='.$IdFolio.' and folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and movimientohabitacion.IdHabitacion=habitacion.IdHabitacion';
        $resultado = $conexion->query($ComandoSqlDatosFolio);
        $DatosFolio=array();       
        while($fila=$resultado->fetch_array())
        {
            $DatosFolio[]=$fila;
        }
        echo json_encode($DatosFolio);
        break;

        case "TraladarConsumos":
        $IdFolioNuevo=$_POST['FolioNuevo'];
        $IdFolioAntiguo=$_POST['FolioAntiguo'];
        $IdConsumo=$_POST['IdConsumo'];
        $ComandoSqlTrasladar="UPDATE `consumos` SET `IdFolio`=".$IdFolioNuevo." WHERE `IdFolio`=".$IdFolioAntiguo." and `IdConsumos`=".$IdConsumo.";";
        $resultado = $conexion->query($ComandoSqlTrasladar);
        if($resultado==true)
        {
            echo "TRASLADO";
        }else{
            echo "NOTRASLADO";
        }
    
    break;
    
    case "TraerValorEstadia":
    $IdFolio=$_POST['IdFolio'];
    $ComandoSql="SELECT DATEDIFF(movimientohabitacion.FechaSalidaMovimientoHabitacion,movimientohabitacion.FechaEntradaMovimientoHabitacion) AS 'NOCHES',folio.ValorEstadiaFolio FROM folio,movimientohabitacion WHERE folio.IdFolio=".$IdFolio." AND folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion";
    $resultado = $conexion->query($ComandoSqlTrasladar);
    $Datos=array();       
        while($fila=$resultado->fetch_array())
        {
            $Datos[]=$fila;
        }
        echo json_encode($Datos);
        $ComandoSqlIva='SELECT PorcentajeIva FROM `iva` WHERE `NombreIva`="IVA"';
        $resultado = $conexion->query($ComandoSqlIva);
        while($fila=$resultado->fetch_array())
        {
           $Iva=$fila['PorcentajeIva'];

        }
    break;

    default:

    
    break;
}

}



?>
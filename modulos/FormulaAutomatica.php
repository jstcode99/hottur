<?php
 
    include('conexion.php');
    
    //$ComandoActualizarFechas = "UPDATE movimiento m , movimientohabitacion mh , huesped hd  SET hd.FechaSalidaHuesped = (SELECT Date_format(now(),'%Y-%m-%d 13:00:00')) , mh.FechaSalidaMovimientoHabitacion = (SELECT Date_format(now(),'%Y-%m-%d 13:00:00'))  WHERE m.IdMovimiento = mh.IdMovimiento AND m.EstadoMovimiento = 'ACTIVO' AND m.TipoMovimiento = 'CHECK IN' AND mh.EstadoMovimientoHabitacion = 'ACTIVO' AND mh.TipoMovimientoHabitacion = 'CHECK IN' AND mh.IdMovimientoHabitacion = hd.IdMovimientoHabitacion AND (mh.FechaSalidaMovimientoHabitacion = '0000-00-00 00:00:00' AND  hd.FechaSalidaHuesped = '0000-00-00 00:00:00' OR mh.FechaSalidaMovimientoHabitacion < (SELECT Date_format(now(),'%Y-%m-%d 13:00:00')) AND  hd.FechaSalidaHuesped < (SELECT Date_format(now(),'%Y-%m-%d 13:00:00')))";
    $ComandoActualizarFechas = "UPDATE movimiento m , movimientohabitacion mh , huesped hd  SET hd.FechaSalidaHuesped = (SELECT DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)) , mh.FechaSalidaMovimientoHabitacion = (select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY))  WHERE m.IdMovimiento = mh.IdMovimiento AND m.EstadoMovimiento = 'ACTIVO' AND m.TipoMovimiento = 'CHECK IN' AND mh.EstadoMovimientoHabitacion = 'ACTIVO' AND mh.TipoMovimientoHabitacion = 'CHECK IN' AND mh.IdMovimientoHabitacion = hd.IdMovimientoHabitacion AND ( mh.FechaSalidaMovimientoHabitacion < (SELECT Date_format(now(),'%Y-%m-%d 13:00:00')) AND  hd.FechaSalidaHuesped < (SELECT Date_format(now(),'%Y-%m-%d 13:00:00')))";
    if($Resultado = $conexion->query($ComandoActualizarFechas))
    {
            /*---------------------------------------------------------------------------*/
            $ConsultarPorcentajeDescuentoNinos = "SELECT PorcentajeDescuentoNinosParametros FROM parametros LIMIT 1";
            $Resultado1 = $conexion->query($ConsultarPorcentajeDescuentoNinos);
            
            $PorcentajeDescuentoNinos = $Resultado1->fetch_array();
            
            // echo "Porcentaje Descuento Ninos:  ".$PorcentajeDescuentoNinos[0]."<br>";
            
            /*-------------------------------------------------------------------- */
            $ConsultarDatosHuespedes = "SELECT tr.PorcentajeTarifa,tr.IdTarifa,mh.IdMovimientoHabitacion,ht.IdHabitacionTipo,hd.IdHuesped ,hd.TipoHuesped , hd.FechaSalidaHuesped , hd.FechaEntradaHuesped , ht.ValorPaxHabitacionTipo,ht.ValorAdicionalHabitacionTipo FROM tarifa tr,habitaciontipo ht,huesped hd,movimiento m,movimientohabitacion mh,habitacion h WHERE tr.IdTarifa = m.IdTarifa AND m.IdMovimiento = mh.IdMovimiento AND m.EstadoMovimiento = 'ACTIVO' AND m.TipoMovimiento = 'CHECK IN' AND mh.EstadoMovimientoHabitacion = 'ACTIVO' AND mh.TipoMovimientoHabitacion = 'CHECK IN' AND hd.IdMovimientoHabitacion = mh.IdMovimientoHabitacion and hd.EstadoOcupacionHuesped='ACTIVO' and ht.IdHabitacionTipo = h.IdHabitacionTipo GROUP by hd.IdHuesped ORDER BY mh.IdMovimientoHabitacion";
            $Resultado3 = $conexion->query($ConsultarDatosHuespedes);
            $ArrayDatosHuespedes = array();
            $MovimientoAnterior = '';
            $ValorTotalAnterio = 0;
            while($DatosParaFormula = $Resultado3->fetch_array())
            {
                $PorcentajeTarifa = $DatosParaFormula['PorcentajeTarifa'];
                $ValorPax = $DatosParaFormula['ValorPaxHabitacionTipo'];
                $ValorAdicional = $DatosParaFormula['ValorAdicionalHabitacionTipo'];
                $FechaSalidaHuesped = date_create($DatosParaFormula['FechaSalidaHuesped']);
                $FechaEntradaHuesped = date_create($DatosParaFormula['FechaEntradaHuesped']);
                $DiferenciaDias = date_diff($FechaEntradaHuesped,$FechaSalidaHuesped);
                
                /**Validar si la hora de fecha de entrada es mayor  a las 13:00:00 */
                $date = date_create($DatosParaFormula['FechaEntradaHuesped']);
                if($DatosParaFormula['FechaEntradaHuesped'] > date_format($date, 'Y-m-d 13:00:00'))
                {
                    $DiferenciaDias = $DiferenciaDias->format("%a") + 1;
                }
                else
                {
                    $DiferenciaDias = $DiferenciaDias->format("%a");
                }
                // echo "Fecha Entrada huesped  ".$DatosParaFormula['FechaEntradaHuesped']."  ,Fecha Salida Huesped ".$DatosParaFormula['FechaSalidaHuesped'];
                // echo "Noches  ".$DiferenciaDias;
                if($MovimientoAnterior == $DatosParaFormula['IdMovimientoHabitacion'])
                {
                    switch($DatosParaFormula['TipoHuesped'])
                    {
                        case 'ADULTO':
                                //  echo "<br> mismo Adulto <br>         ";
                                //  echo "(".intval($ValorPax)."  -  (".intval($ValorPax)."  *  ".intval($PorcentajeTarifa).")/100) *  ".$DiferenciaDias."      <br>";
                    
                                $ValorTotalEstadia = (intval($ValorPax)-(intval($ValorPax)*intval($PorcentajeTarifa))/100)*$DiferenciaDias;
                                
                                // echo "valor Adulto    ".$DatosParaFormula['IdHuesped']."       ".$ValorTotalEstadia."<br><br>";
                                // echo "Actualize el estadia Con el Mismo IdMovimiento, Adulto";
                                $MovimientoAnterior = $DatosParaFormula['IdMovimientoHabitacion'];
                                // echo "Valor Estadia Anterior    ".$ValorTotalAnterio."  +  ".$ValorTotalEstadia."<br>";
                                $ValorTotalEstadia = intval($ValorTotalAnterio) + intval($ValorTotalEstadia);
                                // echo "Valor Total estadia mismo movimientoHab       ".$ValorTotalEstadia."<br>";
                                    $ComandoSql2 = "UPDATE folio SET ValorEstadiaFolio = '".$ValorTotalEstadia."'  WHERE IdMovimientoHabitacion = ".$MovimientoAnterior.";";
                                    $ResultadoUpdateValorEstadia = $conexion->query($ComandoSql2);
                                    // if($ResultadoUpdateValorEstadia==true)
                                    // {
                                    //     echo "Actualizo";
                                    // }
                                    // else
                                    // {
                                    //     echo "No Actualizo";
                                    // }
                                    // echo "Adulto mismo movimiento      ".$ComandoSql2."       <br>";
                                    $ValorTotalAnterio = intval($ValorTotalEstadia);
                                // echo "despues de cargar conmando en Adulto, Valor total anterior  ".$ValorTotalAnterio."     <br>";
                            break;
                        case 'NINO':
                                // echo " mismo movimientohab Nino <br>";
                                $MovimientoAnterior = $DatosParaFormula['IdMovimientoHabitacion'];
                                $ValorDescuentoNino = ($ValorAdicional*intval($PorcentajeDescuentoNinos[0]))/100;
                    
                                // echo "(".$ValorAdicional."  *  ".$PorcentajeDescuentoNinos[0].")/100 <br>";
                                
                                // echo "Valor Descuento Nino:   ".$ValorDescuentoNino." <br>";
                                // echo "Diferencia Dias     ".$DiferenciaDias."<br>";
                                // echo "((".$ValorAdicional."  -  ".$ValorDescuentoNino.")  - ( ".$ValorAdicional."   *  ".intval($PorcentajeTarifa).")/100)  * ".$DiferenciaDias."";
                                $ValorTotalEstadia = (($ValorAdicional-$ValorDescuentoNino)-($ValorAdicional*intval($PorcentajeTarifa))/100)*$DiferenciaDias;
                                // echo "Valor Estadia Nino    ".$ValorTotalEstadia."<br>";
                                // echo "Valor total anterior mismo movimiento  ".$ValorTotalAnterio;
                                // echo "   ".$ValorTotalAnterio."  +  ".$ValorTotalEstadia;
                                $ValorTotalEstadia = intval($ValorTotalAnterio) + intval($ValorTotalEstadia);

                                $ComandoSql2 = "UPDATE folio SET ValorEstadiaFolio = '".$ValorTotalEstadia."'  WHERE IdMovimientoHabitacion = ".$MovimientoAnterior.";";
                                $ResultadoUpdateValorEstadia = $conexion->query($ComandoSql2);
                                // if($ResultadoUpdateValorEstadia==true)
                                // {
                                //     echo "Actualizo";
                                // }
                                // else
                                // {
                                //     echo "No Actualizo1";
                                // }
                                
                                // echo "NINO mismo movimiento      ".$ComandoSql2;
                                $ValorTotalAnterio = $ValorTotalEstadia;
                                // echo "ValorTotal anterior despues de cargar update en Nino mismo movimiento   ".$ValorTotalAnterio;
                            break;
                        case 'ADICIONAL':
                                // echo "con el mismo movimiento hab adicional    ";
                                $ValorTotalEstadia = (intval($ValorAdicional)-(intval($ValorAdicional)*intval($PorcentajeTarifa))/100)*$DiferenciaDias;
                                // echo "Adicional <br>";
                                // echo "Actualize el estadia Con el Mismo IdMovimiento, Adicional";
                                $MovimientoAnterior = $DatosParaFormula['IdMovimientoHabitacion'];
                                // echo "Valor Estadia Anterior    ".$ValorTotalAnterio."  +  ".$ValorTotalEstadia."";
                                $ValorTotalEstadia = $ValorTotalAnterio + $ValorTotalEstadia;
                                $ComandoSql2 = "UPDATE folio SET ValorEstadiaFolio = '".$ValorTotalEstadia."'  WHERE IdMovimientoHabitacion = ".$MovimientoAnterior.";";
                                $ResultadoUpdateValorEstadia = $conexion->query($ComandoSql2);
                                // if($ResultadoUpdateValorEstadia==true)
                                // {
                                //     echo "Actualizo";
                                // }
                                // else
                                // {
                                //     echo "No Actualizo1";
                                // }
                            break;
                    }
                }
                else
                {
                    switch($DatosParaFormula['TipoHuesped'])
                    {
                        case 'ADULTO':
                                $ValorTotalEstadia = (intval($ValorPax)-(intval($ValorPax)*intval($PorcentajeTarifa))/100)*$DiferenciaDias;

                                $MovimientoAnterior = $DatosParaFormula['IdMovimientoHabitacion'];
                                $ValorTotalAnterio = $ValorTotalEstadia;
                                $ComandoSql2 = "UPDATE folio SET ValorEstadiaFolio = '".$ValorTotalEstadia."'  WHERE IdMovimientoHabitacion = ".$MovimientoAnterior.";";                                
                                $ResultadoUpdateValorEstadia = $conexion->query($ComandoSql2);
                                // if($ResultadoUpdateValorEstadia==true)
                                // {
                                //     echo "Actualizo";
                                // }
                                // else
                                // {
                                //     echo "No Actualizo1";
                                // }
                        break;
                        case 'NINO':                               
                                $MovimientoAnterior = $DatosParaFormula['IdMovimientoHabitacion'];
                                $ValorDescuentoNino = ($ValorAdicional*intval($PorcentajeDescuentoNinos[0]))/100;                    
                                $ValorTotalEstadia = (($ValorAdicional-$ValorDescuentoNino)-($ValorAdicional*intval($PorcentajeTarifa))/100)*$DiferenciaDias;                                
                                $ValorTotalAnterio = $ValorTotalEstadia;
                                $ComandoSql2 = "UPDATE folio SET ValorEstadiaFolio = '".$ValorTotalEstadia."'  WHERE IdMovimientoHabitacion = ".$MovimientoAnterior.";";
                                $ResultadoUpdateValorEstadia = $conexion->query($ComandoSql2);
                                // if($ResultadoUpdateValorEstadia==true)
                                // {
                                //     echo "Actualizo";
                                // }
                                // else
                                // {
                                //     echo "No Actualizo2";
                                // }
                        break;
                        case 'ADICIONAL':                                
                                $ValorTotalEstadia = (intval($ValorAdicional)-(intval($ValorAdicional)*intval($PorcentajeTarifa))/100)*$DiferenciaDias;                        
                                $MovimientoAnterior = $DatosParaFormula['IdMovimientoHabitacion'];
                                $ValorTotalAnterio = $ValorTotalEstadia;
                                $ComandoSql2 = "UPDATE folio SET ValorEstadiaFolio = '".$ValorTotalEstadia."'  WHERE IdMovimientoHabitacion = ".$MovimientoAnterior.";";
                                $ResultadoUpdateValorEstadia = $conexion->query($ComandoSql2);
                                // if($ResultadoUpdateValorEstadia==true)
                                // {
                                //     echo "Actualizo";
                                // }
                                // else
                                // {
                                //     echo "No Actualizo3";
                                // }
                        break;
                        default:
                        break;                            
                    }      
                }
            }
            if($ResultadoUpdateValorEstadia==true)
            {
                echo "Actualizo";
            }
            else
            {
                echo "No Actualizo";
            } 
    }
    else
    {
        echo "No se actualizo nada";
    }
?>
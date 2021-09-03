<?php

require_once ('../conexion.php');
include('../NumeroALetras.php');
$NombreProceso = isset($_POST['NombreProceso']) ? trim($_POST['NombreProceso']) : $_GET['NombreProceso']; 
    switch ($NombreProceso ) {

        case "BuscarIdHabitacionOcupacion":
            
                $IdHabitacion=$_POST['IdHabitacion'];
                $ComandoSql="SELECT movimientohabitacion.IdMovimiento,movimientohabitacion.FechaEntradaMovimientoHabitacion,movimientohabitacion.FechaSalidaMovimientoHabitacion from movimientohabitacion WHERE movimientohabitacion.IdHabitacion=".$IdHabitacion."";
                if($Resultado=$conexion->query($ComandoSql))
                {
                    $rows=array();
                    while($fila= $Resultado->fetch_array())
                        {
                        $rows[] = $fila;
                        }
                        echo json_encode($rows);        
                }
            
            break;
        
            

        case "ConsultaClienteComprobante":
               
                $nit = $_POST['nit'];
                $ComandoSql="SELECT cliente.NombreCliente,cliente.ApellidoCliente,clientetipo.IdClienteTipo,cliente.IdConvenio,clientetipo.NombreClienteTipo FROM `cliente`,clientetipo WHERE cliente.NitCliente='".$nit."' and clientetipo.IdClienteTipo=cliente.IdClienteTipo";
                if($Resultado=$conexion->query($ComandoSql))
                {
                    $rows=array();
                    while($fila= $Resultado->fetch_array())
                        {
                        $rows[] = $fila;
                        }
                        echo json_encode($rows);        
                }
        break;
        
        case "ConsultaConvenioComprobante":
        $nit = $_POST['nit'];
        $ComandoSql="SELECT cn.EstadoConvenio, cn.CodigoConvenio, cn.NombreConvenio FROM convenio cn, cliente c WHERE cn.IdConvenio = c.IdConvenio AND c.NitCliente = '".$nit."'";
        if($Resultado=$conexion->query($ComandoSql))
        {
            $rows=array();
            while($fila= $Resultado->fetch_array())
                {
                $rows[] = $fila;
                }
                echo json_encode($rows);        
        }

        break;
        
        case "ConsultaDatosClienteTransfiere":
        $Nit = $_POST['Nit'];
        $EmisorOReceptorTransferencias = $_POST['EmisorOReceptorTransferencias'];
        if($EmisorOReceptorTransferencias == "EMISOR")
            {
                $ComandoSql="SELECT c.IdClienteTipo, c.NombreCliente, c.ApellidoCliente,m.IdMovimiento,m.TipoMovimiento  FROM cliente c , movimiento m , movimientohabitacion mh , habitacion h WHERE c.IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente = '".$Nit."') AND c.IdCliente = m.IdCliente AND m.EstadoMovimiento = 'ACTIVO' AND mh.EstadoMovimientoHabitacion = 'ACTIVO' AND m.IdMovimiento = mh.IdMovimiento AND mh.IdHabitacion = h.IdHabitacion AND m.AbonoMovimiento != '0' GROUP BY m.IdMovimiento";
            }
        else
            {
                $ComandoSql="SELECT c.IdClienteTipo, c.NombreCliente, c.ApellidoCliente,m.IdMovimiento,m.TipoMovimiento  FROM cliente c , movimiento m , movimientohabitacion mh , habitacion h WHERE c.IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente = '".$Nit."') AND c.IdCliente = m.IdCliente AND m.EstadoMovimiento = 'ACTIVO' AND mh.EstadoMovimientoHabitacion = 'ACTIVO' AND m.IdMovimiento = mh.IdMovimiento AND mh.IdHabitacion = h.IdHabitacion  GROUP BY m.IdMovimiento";
            }
        if($Resultado=$conexion->query($ComandoSql))
        {
            $rows=array();
            while($fila= $Resultado->fetch_array())
                {
                $rows[] = $fila;
                }
               
                echo json_encode($rows);              
        }

        break;

        case "ConsultaHabitacionesClienteTransfiere":
        $IdMovimiento = $_POST['IdMovimiento'];
    
        $ComandoSql="SELECT h.NombreHabitacion , m.AbonoMovimiento FROM movimiento m , movimientohabitacion mh, habitacion h WHERE m.IdMovimiento = ".$IdMovimiento." AND m.IdMovimiento = mh.IdMovimiento AND mh.IdHabitacion = h.IdHabitacion";
        
        if($Resultado=$conexion->query($ComandoSql))
        {
            $rows=array();
            while($fila= $Resultado->fetch_array())
                {
                $rows[] = $fila;
                }
               
                echo json_encode($rows);              
        }

        break;

        case "TransferenciaInsert":
            $IdMovimientoEmisor = $_POST['IdMovimientoEmisor'];
            $IdMovimientoReceptor = $_POST['IdMovimientoReceptor'];
            
            $ValorTransferencia = $_POST['ValorTranferencia'];
            $ComandoSql="INSERT INTO `transferenciacomporbanteingreso`(`IdMovimientoReceptorTransferencia`, `ValorTransferencia`, `FechaTransferencia`, `IdMovimiento`) VALUES (".$IdMovimientoReceptor.",'".$ValorTransferencia."',(SELECT NOW()),".$IdMovimientoEmisor.")";     
            // echo $ComandoSql;
            if($Resultado=$conexion->query($ComandoSql))
            {
            /*Despues insert toca preguntar si el tipo de movimiento es reserva no garantizada para actualizar a recerva garantizada */
            
                $ComandoSql2 = "SELECT TipoMovimiento , AbonoMovimiento FROM `movimiento` WHERE IdMovimiento = ".$IdMovimientoReceptor.";";
                if($Resultado2 = $conexion->query($ComandoSql2))
                {
                    $fila2=$Resultado2->fetch_array();
                    if ($fila2['TipoMovimiento'] == "RESERVA NO GARANTIZADA" && $fila2['AbonoMovimiento'] == 0)
                        {
                            $ComandoSql3 = "UPDATE movimiento SET TipoMovimiento = 'RESERVA GARANTIZADA', AbonoMovimiento = '".$ValorTransferencia."' WHERE IdMovimiento = ".$IdMovimientoReceptor.";";
                        }
                    else if($fila2['TipoMovimiento'] == "RESERVA NO GARANTIZADA" && $fila2['AbonoMovimiento'] != 0)
                        {
                            $ValorSumatoria = intval($fila2['AbonoMovimiento']) + intval($ValorTransferencia);
                            $ComandoSql3 = "UPDATE movimiento SET TipoMovimiento = 'RESERVA GARANTIZADA', AbonoMovimiento = '".$ValorSumatoria."' WHERE IdMovimiento = ".$IdMovimientoReceptor.";";
                        }
                    else if($fila2['TipoMovimiento'] != "RESERVA NO GARANTIZADA" && $fila2['AbonoMovimiento'] != 0)
                        {
                            $ValorSumatoria = intval($fila2['AbonoMovimiento']) + intval($ValorTransferencia);
                            $ComandoSql3 = "UPDATE movimiento SET  AbonoMovimiento = '".$ValorSumatoria."' WHERE IdMovimiento = ".$IdMovimientoReceptor.";";
                        }
                    else{
                        $ComandoSql3 = "UPDATE movimiento SET  AbonoMovimiento = '".$ValorTransferencia."' WHERE IdMovimiento = ".$IdMovimientoReceptor.";";
                        } 

                        if($Resultado3 = $conexion->query($ComandoSql3))
                        {
                            /*Toca Restarle el direno que se transfirio */
                            $ComandoSql4 = "SELECT AbonoMovimiento FROM `movimiento` WHERE IdMovimiento = ".$IdMovimientoEmisor.";";
                            if($Resultado4 = $conexion->query($ComandoSql4))
                            {
                                $fila3=$Resultado4->fetch_array();
                                
                                $ValorDespuesdeRestar = intval($fila3['AbonoMovimiento']) - intval($ValorTransferencia);
                                $ComandoSql5 = "UPDATE movimiento SET  AbonoMovimiento = '".$ValorDespuesdeRestar."' WHERE IdMovimiento = ".$IdMovimientoEmisor.";";
                                if($Rsultado5 = $conexion->query($ComandoSql5))
                                {
                                    echo "CORRECTO";
                                }
                                else
                                {
                                    echo "INCORRECTO";
                                }
                            }
                            else
                            {
                                echo "INCORRECTO 3";
                            }
                            
                        }
                        else
                        {
                            echo "INCORRECTO 2";
                        }
                }
            }
            else{
                echo "INCORRECTO 1";
            }

                        
            

        break;
        
        
        case "ConsultaValorHabitacion":


        $NumeroReserva = $_POST['NumeroReserva'];
        $numeroHabitacion = $_POST['NumeroHabitacion'];
        $DocumentoCliente = $_POST['DocumentoCliente'];

        $Envio=array();

        $ComandoSql="SELECT m.FechaEntradaMovimiento,m.FechaSalidaMovimiento,mv.CantidadNinosMovimientoHabitacion,mv.CantidadAdultosMovimientoHabitacion,ht.ValorPaxHabitacionTipo,ht.ValorAdicionalHabitacionTipo FROM movimiento m,movimientohabitacion mv,habitacion h,habitaciontipo ht, cliente c WHERE c.IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente = '".$DocumentoCliente."') AND c.IdCliente = m.IdCliente  AND m.IdMovimiento = '".$NumeroReserva."' AND m.IdMovimiento = mv.IdMovimiento  AND mv.IdHabitacion = h.IdHabitacion AND h.IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion = '".$numeroHabitacion."')AND ht.IdHabitacionTipo = (SELECT IdHabitacionTipo FROM habitacion WHERE NombreHabitacion = '".$numeroHabitacion."')  AND h.IdHabitacionTipo = ht.IdHabitacionTipo";
        if($Resultado=$conexion->query($ComandoSql))
        {
            $FechaEntradaMovimiento ="";
            $FechaSalidaMovimiento = "";
            $CantidadNinosMovimientoHabitacion = ""; 
            $CantidadAdultosMovimientoHabitacion = "";
            $ValorPaxHabitacionTipo = "";
            $ValorAdicionalHabitacionTipo = "";

            $SQLValor = "SELECT SUM(ValorIngresoComprobante) AS 'ValorAbonos' FROM `ingresocomprobante` WHERE IdHabitacion = '".$numeroHabitacion."' AND IdMovimiento = '".$NumeroReserva."'";
            $Resultados=$conexion->query($SQLValor);
            $filas= $Resultados->fetch_array();
            $ValorAbono = $filas['ValorAbonos'] + 0;
            while($fila= $Resultado->fetch_array())
                {
                $FechaEntradaMovimiento = $fila['FechaEntradaMovimiento'];
                $FechaSalidaMovimiento = $fila['FechaSalidaMovimiento'];
                $CantidadNinosMovimientoHabitacion = $fila['CantidadNinosMovimientoHabitacion'];
                $CantidadAdultosMovimientoHabitacion = $fila['CantidadAdultosMovimientoHabitacion'];
                $ValorPaxHabitacionTipo = $fila['ValorPaxHabitacionTipo'];
                $ValorAdicionalHabitacionTipo = $fila['ValorAdicionalHabitacionTipo'];
                }
                $dias= dias_transcurridos($FechaEntradaMovimiento,$FechaSalidaMovimiento);  
                $valorHabitacion =  $dias * $ValorPaxHabitacionTipo;
                $Envio[1] = array('ValorHabitacion'=>$valorHabitacion,'ValorAbono'=>$ValorAbono); 
                //
        }

        $ComandoSql1= "SELECT ic.ValorIngresoComprobante FROM ingresocomprobante ic,cliente c,movimiento m WHERE c.IdCliente = (SELECT idCliente FROM cliente WHERE NitCliente = '".$DocumentoCliente."') AND c.IdCliente = m.IdCliente AND m.IdMovimiento = '".$NumeroReserva."' AND m.IdMovimiento = ic.IdMovimiento AND ic.IdIngresoComprobante = (SELECT IdIngresoComprobante FROM ingresocomprobante WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion = '".$numeroHabitacion."'))";
        if($Resultado2=$conexion->query($ComandoSql1))
        $valor = "";
        {
            while($fila1= $Resultado2->fetch_array())
            {
                $valor = $fila1['ValorIngresoComprobante'];
            }
            
            $Envio[2] = array('ValorIngresoComprobante'=>$valor);
        }

        // echo var_dump($Envio);
        echo json_encode($Envio);   

        

        break;
            

        case "ConsultarEstadoActualCaja":
        $ComandoSqlEstadoCaja="SELECT * FROM `caja` ORDER by  `IdCaja` DESC LIMIT 1";
        $Resultado=$conexion->query($ComandoSqlEstadoCaja);                
        $rows=array();                        
            while($fila= $Resultado->fetch_array())
                {
                   $rows[]=$fila;
                   echo json_encode($rows);   
                }                
                        
        break;
        
        case "LecturaFecha":
            $ComandoSqlFechaLectura = "SELECT * FROM prueba p WHERE p.FechaPrueba = CURDATE()";
            $Resultado=$conexion->query($ComandoSqlFechaLectura);
            $cantidadFilas = mysqli_num_rows($Resultado);                
                if($cantidadFilas >= 1 ){
                    echo "Existe";
                }else{
                    $InsertarFecha = "INSERT INTO `prueba`(`FechaPrueba`, `EstadoPrueba`) VALUES (CURDATE(),'ACTIVO')";
                    $Resultado2 = $conexion->query($InsertarFecha);
                        if($Resultado2 == true){
                            echo "InsertoFecha";
                        }else{
                            echo "ERRORInsertoFecha";
                        }

                }              
                        
        break;
        
        case "IsertarComprobante":

        
        $NumeroReserva = $_POST['NumeroReserva'];
        $NumeroHabitacion = $_POST['NumeroHabitacion'];
        $DocumentoCliente = $_POST['DocumentoCliente'];
        $NombreCliente = $_POST['NombreCliente'];
        $ComporobanteIngresoValor = $_POST['ComporobanteIngresoValor'];
        $FormaPago = $_POST['FormaPago'];
        $Concepto = $_POST['Concepto'];
        $Abono = $_POST['Abono'];
        $TipoComprobante = $_POST['TipoComprobante'];
        $ComprobanteIngresoValorLetras = NumeroALetras::convertir($ComporobanteIngresoValor);
        $hoy = date("Y-m-d H:i:s");  
        $AbonoActual = $Abono + $ComporobanteIngresoValor;
        // echo $AbonoActual;
        /* echo $NumeroReserva. "\n";
        echo $NumeroHabitacion. "\n";
        echo $DocumentoCliente. "\n";
        echo $NombreCliente. "\n";
        echo $ComporobanteIngresoValor. "\n";
        echo $FormaPago. "\n";
        echo $Concepto. "\n";
        echo $TipoComprobante. "\n";
        echo $ComprobanteIngresoValorLetras. "\n";
        echo $hoy. "\n";
        echo $AbonoActual. "\n";  */
        
                

        if($TipoComprobante == "GENERAL"){

            
            $SQLInsertarHistorial =  "INSERT INTO `historialcomprobanteingreso`
            (
                  `FechaHistorialComprobanteIngreso`,
                 `IdHistorialComprobanteIngreso`,
                   `NombreComprobanteIngreso`,
                    `ValorComprobanteIngreso`, 
                    `CedulaComprobanteIngreso`,
                     `FormaPagoComprobaanteIngreso`,
                      `ConceptoComprobanteIngreso`, 
                      `ValorLetrasComprobanteIngreso`,
                       `IdMovimiento`, 
                       `IdHabitacion`) VALUES 
                       ('".$hoy."',
                       '',
                       '".$NombreCliente."',
                       '".$ComporobanteIngresoValor."',
                       '".$DocumentoCliente."',
                       '".$FormaPago."',
                       '".strtoupper($Concepto)."',
                       '".$ComprobanteIngresoValorLetras."',
                       '".$NumeroReserva."',
                       '".$NumeroHabitacion."')";
           
            $Resultado2=$conexion->query($SQLInsertarHistorial); 
            if($Resultado2==true)
            {
                /* echo 'REGISTROCOMPROBANTE_HISTORIAL'."\n";  */

            }else{
                echo 'NOREGISTROCOMPROBANTE_HISTORIAL'."\n"; 
            }
            
            $SQLInsertar = "INSERT INTO `ingresocomprobante`(`FechaIngresoComprobante`, `NombreClienteIngresoComprobante`, `CedulaIngresoComprobante`, `ValorIngresoComprobante`, `FormaPagoIngresoComprobante`, `ConceptoIngresoComprobante`, `ValorLetrasIngresoComprobante`, `IdHabitacion`, `IdMovimiento`) VALUES ('".$hoy."','".$NombreCliente."','".$DocumentoCliente."','".$ComporobanteIngresoValor."','".$FormaPago."','".strtoupper($Concepto)."','".$ComprobanteIngresoValorLetras."','".$NumeroHabitacion."','".$NumeroReserva."')";
           /*  echo $SQLInsertar.'<br>'; */
            $Resultado=$conexion->query($SQLInsertar); 
            if($Resultado==true)
            {
                echo $ComprobanteIngresoValorLetras;

                /* se consulta el Tipo de Movimiento con respecto a el numero de la $NumeroReserva */
                $ConsultaReserva = "SELECT TipoMovimiento FROM `movimiento` WHERE `IdMovimiento` = $NumeroReserva ";
                $reultadoReserva = $conexion->query($ConsultaReserva);
                $filaTipo = $reultadoReserva->fetch_array();
                $TipoMovimiento = $filaTipo['TipoMovimiento'];

                if($TipoMovimiento == "CHECK IN")
                {
                    /* Colocar esto en el when despues de cliente
                    AND TipoMovimiento = "CHECK IN" AND EstadoMovimiento = "ACTIVO" .
                    si liga Movimiento habitacion agregar esto

                    AND IdMovimiento = MovimientoHabitacion.IdMovimiento AND TipoMovimientoHabitacion = "CHECK IN" AND EstadoMovimientoHabitacion = "ACTIVO"
                    */
                    $ActualizarMovimiento = "UPDATE movimiento,cliente SET  movimiento.AbonoMovimiento = '".$AbonoActual."'  WHERE movimiento.IdMovimiento= '".$NumeroReserva."' AND  movimiento.IdCliente = (SELECT IdCliente FROM `cliente` WHERE NitCliente = '".$DocumentoCliente."' AND TipoMovimiento = 'CHECK IN' AND EstadoMovimiento = 'ACTIVO' )";    
                }
                else if($TipoMovimiento == "RESERVA NO GARANTIZADA"){
                    $ActualizarMovimiento = "UPDATE movimientohabitacion, movimiento,cliente SET  movimiento.TipoMovimiento = 'RESERVA GARANTIZADA', movimientohabitacion.TipoMovimientoHabitacion = 'RESERVA GARANTIZADA',movimiento.AbonoMovimiento =  '".$AbonoActual."'  WHERE movimiento.IdMovimiento= '".$NumeroReserva."' AND movimiento.IdMovimiento = movimientohabitacion.IdMovimiento AND  movimiento.IdCliente = (SELECT IdCliente FROM `cliente` WHERE NitCliente = '".$DocumentoCliente."' AND TipoMovimiento = 'RESERVA NO GARANTIZADA'  AND EstadoMovimiento = 'ACTIVO' )";
                }else{
                    $ActualizarMovimiento = "UPDATE movimiento,cliente SET  movimiento.AbonoMovimiento = '".$AbonoActual."'  WHERE movimiento.IdMovimiento= '".$NumeroReserva."' AND  movimiento.IdCliente = (SELECT IdCliente FROM `cliente` WHERE NitCliente = '".$DocumentoCliente."' AND TipoMovimiento = 'RESERVA GARANTIZADA'  AND EstadoMovimiento = 'ACTIVO' )";    
                }
            
                //echo $ActualizarMovimiento;
                /*      echo '<br>'.$ActualizarMovimiento;  */
                $Resultado2=$conexion->query($ActualizarMovimiento); 
                    if($Resultado2==true)
                    {
                       /*  echo 'ACTUALIZAMOVIMIENTO_GENERAL'."\n";   */
                    }else{
                        echo 'NOACTUALIZAMOVIMIENTO_GENERAL'."\n"; 
                    }
            }
            else
            {
                echo 'NOREGISTRO_GENERAL'."\n"; 
                
            }
        }else if($TipoComprobante ==  "HABITACION"){

            $SQLInsertarHistorial =  "INSERT INTO `historialcomprobanteingreso`
            (
                  `FechaHistorialComprobanteIngreso`,
                 `IdHistorialComprobanteIngreso`,
                   `NombreComprobanteIngreso`,
                    `ValorComprobanteIngreso`, 
                    `CedulaComprobanteIngreso`,
                     `FormaPagoComprobaanteIngreso`,
                      `ConceptoComprobanteIngreso`, 
                      `ValorLetrasComprobanteIngreso`,
                       `IdMovimiento`, 
                       `IdHabitacion`) VALUES 
                       ('".$hoy."',
                       '',
                       '".$NombreCliente."',
                       '".$ComporobanteIngresoValor."',
                       '".$DocumentoCliente."',
                       '".$FormaPago."',
                       '".strtoupper($Concepto)."',
                       '".$ComprobanteIngresoValorLetras."',
                       '".$NumeroReserva."',
                       '".$NumeroHabitacion."')";
            //echo $SQLInsertarHistorial;
            $Resultado2=$conexion->query($SQLInsertarHistorial); 
            if($Resultado2==true)
            {
                /* echo 'REGISTROCOMPROBANTE_HISTORIAL'."\n";  */

            }else{
                echo 'NOREGISTROCOMPROBANTE_HISTORIAL'."\n"; 
            }



            $SQLInsertar = "INSERT INTO `ingresocomprobante`(`FechaIngresoComprobante`, `NombreClienteIngresoComprobante`, `CedulaIngresoComprobante`, `ValorIngresoComprobante`, `FormaPagoIngresoComprobante`, `ConceptoIngresoComprobante`, `ValorLetrasIngresoComprobante`, `IdHabitacion`, `IdMovimiento`) VALUES ('".$hoy."','".$NombreCliente."','".$DocumentoCliente."','".$ComporobanteIngresoValor."','".$FormaPago."','".strtoupper($Concepto)."','".$ComprobanteIngresoValorLetras."','".$NumeroHabitacion."','".$NumeroReserva."')";
            //echo "IMPRESION CONSULTA". $SQLInsertar;
            $Resultado=$conexion->query($SQLInsertar); 
            if($Resultado==true)
            {
                /* echo 'REGISTROCOMPROBANTE_HABITACION'."\n";  */
                //  echo $ComprobanteIngresoValorLetras;

                 $ConsultaReserva = "SELECT TipoMovimiento FROM `movimiento` WHERE `IdMovimiento` = $NumeroReserva ";
                 $reultadoReserva = $conexion->query($ConsultaReserva);
                 $filaTipo = $reultadoReserva->fetch_array();
                 $TipoMovimiento = $filaTipo['TipoMovimiento'];

                /*if  tipomovimiento == a reserA NO garantizada se ejecuta el update de abajo, el estado del movimiento y movimiento habitacion deben estar activo */
                
                //$ActualizarMovimientoHabitacion = "UPDATE `movimientohabitacion` SET `TipoMovimientoHabitacion`= 'RESERVA GARANTIZADA' WHERE `IdMovimiento`= '".$NumeroReserva."' and `NitResponsableMovimientoHabitacion` = '".$DocumentoCliente."'";
                if($TipoMovimiento == "CHECK IN")
                {
                    $ActualizarMovimientoHabitacion = "UPDATE movimiento m, movimientohabitacion mh SET m.AbonoMovimiento = '".$AbonoActual."' WHERE m.IdMovimiento = '".$NumeroReserva."'";
                    /* AND TipoMovimiento = 'RESERVA NO GARANTIZADA'  AND EstadoMovimiento = 'ACTIVO' */
                }else if($TipoMovimiento == "RESERVA NO GARANTIZADA"){
                    $ActualizarMovimientoHabitacion = "UPDATE movimientohabitacion, movimiento,cliente SET  movimiento.TipoMovimiento = 'RESERVA GARANTIZADA', movimientohabitacion.TipoMovimientoHabitacion = 'RESERVA GARANTIZADA',movimiento.AbonoMovimiento =  '".$AbonoActual."'  WHERE movimiento.IdMovimiento= '".$NumeroReserva."' AND movimiento.IdMovimiento = movimientohabitacion.IdMovimiento AND  movimiento.IdCliente = (SELECT IdCliente FROM `cliente` WHERE NitCliente = '".$DocumentoCliente."' AND TipoMovimiento = 'RESERVA NO GARANTIZADA'  AND EstadoMovimiento = 'ACTIVO' )";
                }else
                {
                    $ActualizarMovimientoHabitacion = "UPDATE movimiento m, movimientohabitacion mh SET m.AbonoMovimiento = '".$AbonoActual."' WHERE m.IdMovimiento= '".$NumeroReserva."'";
                }
               // echo $ActualizarMovimientoHabitacion;
                $Resultado1=$conexion->query($ActualizarMovimientoHabitacion); 
                    if($Resultado1==true)
                    {
                        echo $ComprobanteIngresoValorLetras; 
                        // echo 'ACTUALIZAMOVIMIENTOHABITACION_HABITACION'."\n";
                    }else{
                        echo 'NOACTUALIZAMOVIMIENTOHABITACION_HABITACION'."\n"; 
                    }
               
                 /*else if TipoMovimieto == a CHECK IN se ejecuta update que solo actualize el valor del abono ne tabla movimiento, el estado de movmiento y movimiento debe ser activo y DE TIPO CHECK IN */    
            }
            else
            {
                echo 'NOREGISTRO_HABITACION'."\n"; 
                
            }

        }else{
            echo "ERROR AL REALIZAR EL PROCESO";
        }
                
                        
        break;

        case "RegistarAberturaCaja":

            $ValorBase=$conexion->real_escape_string($_POST['CajaValorBase']);
            $Observaciones=$conexion->real_escape_string($_POST['CajaObservaciones']);
            $ComandoSqlEstadoCaja="INSERT INTO `caja`(`ValorBaseCaja`, `ValorActualCaja`, `FechaCaja`, `HoraAperturaCaja`, `HoraCierreCaja`, `ObservacionesCaja`, `IdUsuario`) VALUES (".$ValorBase.",0,CURDATE(),CURTIME(),'00:00:00','".$Observaciones."',1)";
            $Resultado=$conexion->query($ComandoSqlEstadoCaja);
            if($Resultado==true)
            {
                echo 'REGISTRO';    
            }
            else
            {
                echo 'NOREGISTRO'; 
                
            }        
        
        break;
        case "RegistarCerradoCaja":
            $ComandoSqlDatosCaja="SELECT * FROM `caja` LIMIT 1";
            $Resultado=$conexion->query($ComandoSqlDatosCaja);
            $ValorBaseCaja;
            $ValorActualHistorialCaja;
            $HoraHistorialCaja;
            $FechaCaja;
            $HoraCierre;
            $IdCaja;
            $ObservacionesHistorialCaja;
            while($fila= $Resultado->fetch_array())
                {
                    $IdCaja=$fila['IdCaja'];
                    $ValorBaseCaja=$fila['ValorBaseCaja'];
                    $ValorActualHistorialCaja=$fila['ValorActualCaja'];
                    $FechaCaja=$fila['FechaCaja'];
                    $HoraCierre=$fila['HoraCierreCaja'];
                    $ObservacionesHistorialCaja=$fila['ObservacionesCaja'];
                } 
            $ComandoSqlActualizarCaja="UPDATE `caja` SET `HoraCierreCaja`=CURTIME() WHERE `IdCaja`=".$IdCaja.";";
            $Resultado=$conexion->query($ComandoSqlActualizarCaja);
            $ComandoSqlCerrarCaja="INSERT INTO `historialcaja`(`ValorBaseCaja`, `ValorActualHistorialCaja`, `FechaHistorialCaja`, `HoraHistorialCaja`, `ObservacionesHistorialCaja`, `IdCaja`) VALUES (".$ValorBaseCaja.",".$ValorActualHistorialCaja.",'".$FechaCaja."','".$HoraCierre."','".$ObservacionesHistorialCaja."',".$IdCaja.");";
            $Resultado=$conexion->query($ComandoSqlCerrarCaja);
            if($Resultado==true)
            {
                echo 'ACTUALIZO';
            }
            else
            {
                echo 'NOACTULIZO'; 
                
            }
        break;
        
        case 'TraerValorProducto':

        $IdProducto=$_POST['IdProducto'];
        $ComandoSqlValorProducto="SELECT ValorProductos FROM `productos` WHERE IdProductos=".$IdProducto.";";
        $Resultado=$conexion->query($ComandoSqlValorProducto);
        $rows=array();                        
        while($fila=$Resultado->fetch_array())
            {
               echo $fila['ValorProductos'];
               
            }  
            

        break;
        
        case 'ValorTotalAbonos':

        $CodigoReservaMovimiento = $_POST['CodigoReservaMovimiento'];
        $ComandoSqlValorAbonos="SELECT SUM(ingresocomprobante.ValorIngresoComprobante) as 'ValorAbonos' FROM `ingresocomprobante` WHERE ingresocomprobante.IdMovimiento = '".$CodigoReservaMovimiento."'";
        $Resultado=$conexion->query($ComandoSqlValorAbonos);
                              
        $fila=$Resultado->fetch_array();
        $ValorTotal = $fila['ValorAbonos'] + 0;
        

        $ComandoSqlValorAbonosHabitacion="SELECT SUM(ingresocomprobante.ValorIngresoComprobante) as 'ValorAbonosHabitaciones' FROM `ingresocomprobante` WHERE ingresocomprobante.IdMovimiento = '".$CodigoReservaMovimiento."'  AND ingresocomprobante.IdHabitacion > 0 ";
        $Resultado2=$conexion->query($ComandoSqlValorAbonosHabitacion);                      
        $fila2=$Resultado2->fetch_array();
        $ValorTotalHabitaciones = $fila2['ValorAbonosHabitaciones'] + 0;
        
        $Abonos = array(
                    "AbonoTotal" => $ValorTotal,
                    "AbonoTotalHabitaciones" => $ValorTotalHabitaciones
                );  
        echo json_encode($Abonos);
        
        break;


        case 'TraerValorServicio':

        $IdServicio=$_POST['IdServicio'];
        $ComandoSqlValorServicio="SELECT ValorServicios FROM `Servicios` WHERE IdServicios=".$IdServicio.";";
        $Resultado=$conexion->query($ComandoSqlValorServicio);
        $rows=array();                        
        while($fila=$Resultado->fetch_array())
            {
               echo $fila['ValorServicios'];
               
            }  
        break;


        case 'ConsultaClienteComprobanteEgreso':

        $NumeroReserva=$_POST['NumeroReserva'];
        $ComandoSqlValorServicio="SELECT ValorServicios FROM `Servicios` WHERE IdServicios=".$IdServicio.";";
        echo $ComandoSqlValorServicio;
        $Resultado=$conexion->query($ComandoSqlValorServicio);
        $rows=array();                        
        while($fila=$Resultado->fetch_array())
            {
               echo $fila['ValorServicios'];
               
            }  
        break;

        case "RegristrarConsumosConsultarFolios":
        $IdHabitacion=$_POST['IdHabitacion'];
        $ComandoFolios="SELECT folio.IdFolio,folio.TipoFolio from folio,movimientohabitacion where movimientohabitacion.IdMovimientoHabitacion=folio.IdMovimientoHabitacion and movimientohabitacion.IdHabitacion=".$IdHabitacion." and folio.EstadoFolio='ACTIVO';";
        if($Resultado=$conexion->query($ComandoFolios))
        {        
            while($fila= $Resultado->fetch_array())
                {
                    echo '<option value="'.$fila['IdFolio'].'">'.$fila['IdFolio'].'--'.$fila['TipoFolio'].'</option>';
                }
                       
        }
        
        
        break;


        case "RegistrarConsumosProductos":
        $registradosP=0;
        $IdProducto=$_POST['CodigoProducto'];
        $ValoresTotales=count($IdProducto);
        $CantidadConsumos=$_POST['CantidadProducto'];
        $ValorConsumos=$_POST['ValorProducto'];
        $TipoConsumos=$_POST['CortesiaProducto'];
        $IdFolio=$_POST['IdFolio'];

        for($i=0;$i<$ValoresTotales;$i++)
        {
            $CodigoProducto=$conexion->real_escape_string($IdProducto[$i]);
            $CantidadProducto=$conexion->real_escape_string($CantidadConsumos[$i]);        
            $ValorProducto=$conexion->real_escape_string($ValorConsumos[$i]);
            if($TipoConsumos[$i]=="NO APLICA")
            {
                $CortesiaProducto="NULL";
            }else{
                $CortesiaProducto="CORTESIA";
            }
            $VerificarExistentes="SELECT `CantidadProductos` FROM `productos` WHERE `IdProductos`=".$CodigoProducto.";";
            $Resultado=$conexion->query($VerificarExistentes);
            while($fila= $Resultado->fetch_array())
            {
               if($fila['CantidadProductos']<$CantidadProducto)
               {
                 echo "NOHAY";
                 exit();
               }
            } 
            $ComandoSqlRegistrarConsumos='INSERT INTO `consumos`(`TipoConsumos`, `ValorConsumos`, `CantidadConsumos`, `EstadoConsumos`, `IdFolio`,`IdProductos`) VALUES ("'.$CortesiaProducto.'",'.$ValorProducto.','.$CantidadProducto.',"NO CANCELADO",'.$IdFolio.','.$CodigoProducto.');';
            if($Resultado=$conexion->query($ComandoSqlRegistrarConsumos))
            {        
                $registradosP++;
                $ComandoActualiarProductos="UPDATE `productos` SET `CantidadProductos`=`CantidadProductos`-".$CantidadProducto." WHERE `IdProductos`=".$CodigoProducto.";";
                $Resultado=$conexion->query($ComandoActualiarProductos);
                        
            }else
            {
                echo "NOREGISTRO";
                exit();
            }
        }
        if($registradosP==$ValoresTotales)
        {
            echo "REGISTRO";
        }

        
        break;

        case "RegistrarConsumosServicios":
        $registradosS=0;
        $IdServicio=$_POST['CodigoServicio'];
        $ValoresTotales=count($IdServicio);
        $CantidadConsumos=$_POST['CantidadServicio'];
        $ValorConsumos=$_POST['ValorServicio'];
        $TipoConsumos=$_POST['CortesiaServicio'];
        $IdFolio=$_POST['IdFolio'];

        for($i=0;$i<$ValoresTotales;$i++)
        {
            $CodigoServicio=$conexion->real_escape_string($IdServicio[$i]);
            $CantidadServicio=$conexion->real_escape_string($CantidadConsumos[$i]);        
            $ValorServicio=$conexion->real_escape_string($ValorConsumos[$i]);
            if($TipoConsumos[$i]=="NO APLICA")
            {
                $CortesiaServicio="NULL";
            }else{
                $CortesiaServicio="CORTESIA";
            }
            
            $ComandoSqlRegistrarConsumos='INSERT INTO `consumos`(`TipoConsumos`, `ValorConsumos`, `CantidadConsumos`, `EstadoConsumos`, `IdFolio`,`IdServicios`) VALUES ("'.$CortesiaServicio.'",'.$ValorServicio.','.$CantidadServicio.',"NO CANCELADO",'.$IdFolio.','.$CodigoServicio.');';
            if($Resultado=$conexion->query($ComandoSqlRegistrarConsumos))
            {        
                $registradosS++;
               
            }else
            {
                echo "NOREGISTRO";
                exit();
            }
        }
        if($registradosS==$ValoresTotales)
        {
            echo "REGISTRO";
        }

        break;

        case 'TraerValorProductos':

        $IdProducto=$_POST['IdProducto'];
        $ComandoTraerProduct='SELECT productotipo.ImpuestoProductoTipo,productos.ValorProductos FROM `productos`,productotipo WHERE `IdProductos`='.$IdProducto.' and productotipo.IdProductoTipo=productos.IdProductoTipo';
        $Resultado=$conexion->query($ComandoTraerProduct);
                    $rows=array();
                    while($fila= $Resultado->fetch_array())
                        {
                        $rows[] = $fila;
                        }
                        echo json_encode($rows);  
        break;

        case 'TraerValorServicios':

        $IdServicio=$_POST['IdServicio'];
        $ComandoTraerProduct='SELECT Servicios.ImpuestoServicios,servicios.ValorServicios FROM `servicios`,Serviciotipo WHERE servicios.idservicios='.$IdServicio.' and Servicios.idserviciotipo=serviciotipo.idserviciotipo';
        $Resultado=$conexion->query($ComandoTraerProduct);
                    $rows=array();
                    while($fila= $Resultado->fetch_array())
                        {
                        $rows[] = $fila;
                        }
                        echo json_encode($rows);  


        break;
        case 'CotizarEstadia':
        $IdProducto=$_POST['IdProducto'];
        $IdTipoHabitacion=$_POST['IdTipoHabitacion'];
        $FechaSalida=$_POST['FechaSalida'];
        $FechaEntrada=$_POST['FechaEntrada'];
        $ComandoSqlCotizarEstadia="SELECT `ValorPaxHabitacionTipo` FROM `habitaciontipo` WHERE `IdHabitacionTipo`=".$IdTipoHabitacion.";";
                        $Resultado=$conexion->query($ComandoSqlCotizarEstadia);
                    $rows=array();
                    while($fila=$Resultado->fetch_array())
                        {
                        $rows[] = $fila;
                        }
                        $ConsultarIVa='SELECT `PorcentajeIva` FROM `iva` WHERE `NombreIva`="IVA"';
                        $Resultado=$conexion->query($ConsultarIVa);
                        while($fila= $Resultado->fetch_array())
                        {
                        $rows[] = $fila;
                        }
                        $DiasTotales=dias_transcurridos($FechaEntrada,$FechaSalida);
                        $rows[] = $DiasTotales; 

                        $ConsultarValorDesayuno="SELECT `ValorProductos` FROM `productos` WHERE `IdProductos`=".$IdProducto.";";
                        $Resultado=$conexion->query($ConsultarValorDesayuno);
                        while($fila= $Resultado->fetch_array())
                        {
                            $rows[] = $fila;
                        }
                        echo json_encode($rows); 
        break;

        case "GuardarCotizacion":
        $DatosCliente=$_POST["DatosCliente"];
        $FechaEntrada=$_POST["FechaEntrada"];
        $FechaSalida=$_POST["FechaSalida"];                            
        $TipoHabitacion=$_POST["TipoHabitacion"];
        $PlazoCotizacion=$_POST["PlazoCotizacion"];                        
        $ValorCotizizacion=$_POST["ValorCotizizacion"];
        $Obervacionescotizacion="";
        $Obervacionescotizacion1=$_POST['Obervacionescotizacion'];
        $ContadorObs=count($Obervacionescotizacion1);
        for($i=0;$i<$ContadorObs;$i++)
        {
            $Obervacionescotizacion=$Obervacionescotizacion."-".$Obervacionescotizacion1[$i];
        }
        
        $ComandoRegistrarCotizacion='INSERT INTO `cotizacion`(`DatosClienteCotizacion`, `TipoHabitacionCotizacion`, `FechaCotizacion`, `FechaInicioCotizacion`, `FechaSalidaCotizacion`, `PlazoCotizacion`, `ObservacionesCotizacion`, `ValorCotizacion`) VALUES ("'.strtoupper($DatosCliente).'","'.$TipoHabitacion.'",CURRENT_DATE(),"'.$FechaEntrada.'","'.$FechaSalida.'","'.$PlazoCotizacion.'","'.$Obervacionescotizacion.'","'.$ValorCotizizacion.'");';
        $Resultado=$conexion->query($ComandoRegistrarCotizacion);
        if($Resultado==true)
        {
            echo "REGISTRO";
        }else
        {
            echo "NOREGISTRO".$ComandoRegistrarCotizacion;
            exit();
        }
        
        break;

        
        case "RegistrarProductosCotizacion":
        $registradosP=0;
        $IdProductos=$_POST['IdProductos'];
        $ValoresTotales=count($IdProductos);
        $CotizacionTdCantidadProducto=$_POST['CotizacionTdCantidadProducto'];
        $CotizacionTdValorProducto=$_POST['CotizacionTdValorProducto'];        
        $IdCotizacion=0;
        $ComandoTraerCotizacion="select * from cotizacion order by `IdCotizacion` asc limit 1";
        $Resultado=$conexion->query($ComandoTraerCotizacion);
            while($fila= $Resultado->fetch_array())
            {
                $IdCotizacion=$fila['IdCotizacion'];  
            }
        for($i=0;$i<$ValoresTotales;$i++)
        {
            $CodigoProducto=$conexion->real_escape_string($IdProductos[$i]);
            $CantidadProducto=$conexion->real_escape_string($CotizacionTdCantidadProducto[$i]);        
            $ValorProducto=$conexion->real_escape_string($CotizacionTdValorProducto[$i]);
            $ComandoRegistarProductosCotizacion='INSERT INTO `consumos`(`TipoConsumos`, `ValorConsumos`, `CantidadConsumos`, `EstadoConsumos`,`IdCotizacion`,`IdProductos`) VALUES ("NULL",'.$ValorProducto.','.$CantidadProducto.',"COTIZADO",'.$IdCotizacion.','.$CodigoProducto.');';
            $Resultado=$conexion->query($ComandoRegistarProductosCotizacion);
            if($Resultado==true)
            {
                $registradosP++;
            }else
            {
                echo "NOREGISTRO";
                exit();
            }
            if($registradosP=$ValoresTotales)
            {
                echo "OK";
            }
        }
        break;
        case "RegistrarServiciosCotizacion":
        $registradosS=0;
        $IdServicios=$_POST['IdServicios'];
        $ValoresTotales=count($IdServicios);
        $CotizacionTdCantidadProducto=$_POST['CantidadServicios'];
        $CotizacionTdValorProducto=$_POST['ValorServicios'];        
        $IdCotizacion=0;
        $ComandoTraerCotizacion="select * from cotizacion order by `IdCotizacion` asc limit 1";
        $Resultado=$conexion->query($ComandoTraerCotizacion);
            while($fila= $Resultado->fetch_array())
            {
                $IdCotizacion=$fila['IdCotizacion'];  
            }
        for($i=0;$i<$ValoresTotales;$i++)
        {
            $CodigoProducto=$conexion->real_escape_string($IdServicios[$i]);
            $CantidadProducto=$conexion->real_escape_string($CotizacionTdCantidadProducto[$i]);        
            $ValorProducto=$conexion->real_escape_string($CotizacionTdValorProducto[$i]);
            $ComandoRegistarServiciosCotizacion='INSERT INTO `consumos`(`TipoConsumos`, `ValorConsumos`, `CantidadConsumos`, `EstadoConsumos`,`IdCotizacion`,`IdServicios`) VALUES ("NULL",'.$ValorProducto.','.$CantidadProducto.',"COTIZADO",'.$IdCotizacion.','.$CodigoProducto.');';
            $Resultado=$conexion->query($ComandoRegistarServiciosCotizacion);
            if($Resultado==true)
            {
                $registradosS++;
            }else
            {
                echo "NOREGISTRO";
                exit();
            }
            if($registradosS=$ValoresTotales)
            {
                echo "OK";
            }
        }
        break;


        /**
         * Cambioss-----------------------------------------------------
         */
        case "CargarSelectServicios":
            $IdTipoServicio=$_POST['IdTipoServicio'];
            $ComandoSql="SELECT servicios.IdServicios,servicios.NombreServicios FROM `servicios`,serviciotipo WHERE serviciotipo.IdServicioTipo=servicios.IdServicioTipo and serviciotipo.IdServicioTipo=".$IdTipoServicio.";";        
            $Resultado=$conexion->query($ComandoSql);                                        
            while($fila= $Resultado->fetch_array())
            {                            
                echo '<option value="'.$fila['IdServicios'].'">'.$fila['NombreServicios'].'</option>';                            
            } 
                               
        break;


        case "CargarSelectProductos":
            $IdTipoProducto=$_POST['IdTipoProducto'];
            $ComandoSql="SELECT productos.IdProductos,productos.NombreProductos FROM `productos`,productotipo WHERE productotipo.IdProductoTipo=productos.IdProductoTipo and productotipo.IdProductoTipo=".$IdTipoProducto.";";        
            $Resultado=$conexion->query($ComandoSql);                                        
                    while($fila= $Resultado->fetch_array())
                        {
                            echo ' <option value="'.$fila['IdProductos'].'">'.$fila['NombreProductos'].'</option>';
                        }
        break;

        case "TraerFolioFacturacion":
        $IdFolio=$conexion->real_escape_string($_POST['IdFolio']);
        $ComandoSql="SELECT consumos.IdConsumos,consumos.TipoConsumos,consumos.ValorConsumos,consumos.CantidadConsumos,consumos.EstadoConsumos,consumos.IdProductos as 'CodigoConsumo',productos.NombreProductos as 'NombreConsumo',productotipo.ImpuestoProductoTipo as 'ImpuestoConsumo' FROM folio,consumos,productos,productotipo WHERE consumos.IdFolio=".$IdFolio." and consumos.IdProductos=productos.IdProductos and productotipo.IdProductoTipo=productos.IdProductoTipo GROUP by consumos.IdConsumos";
        $resultado = $conexion->query($ComandoSql);
        $rows=array();
        while($fila=$resultado->fetch_array())
        {        
            $rows[] = $fila;
        }
       
        $ComandoSqlServicio="SELECT consumos.IdConsumos,consumos.TipoConsumos,consumos.ValorConsumos,consumos.CantidadConsumos,consumos.EstadoConsumos,consumos.IdServicios as 'CodigoConsumo',servicios.NombreServicios as 'NombreConsumo',serviciotipo.ImpuestoServicioTipo as 'ImpuestoConsumo' FROM serviciotipo,folio,consumos,servicios WHERE consumos.IdFolio=".$IdFolio." and consumos.IdServicios=servicios.IdServicios and servicios.IdServicioTipo=serviciotipo.IdServicioTipo GROUP by consumos.IdConsumos";
        $resultado = $conexion->query($ComandoSqlServicio);
        while($fila=$resultado->fetch_array())
        {
            $rows[] = $fila;
        } 
        echo json_encode($rows);
        break;

        case "TraerValorEstadiaFacturacion":

        $IdFolio=$_POST['IdFolio'];
        $ComandoSql="SELECT DATEDIFF(movimientohabitacion.FechaSalidaMovimientoHabitacion,movimientohabitacion.FechaEntradaMovimientoHabitacion) AS 'NOCHES',folio.ValorEstadiaFolio FROM folio,movimientohabitacion WHERE folio.IdFolio=".$IdFolio." AND folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion";
        $resultado = $conexion->query($ComandoSql);
        $Datos=array();       
            while($fila=$resultado->fetch_array())
            {
                $Datos[]=$fila;
            }

            $ComandoSqlIva='SELECT PorcentajeIva FROM `iva` WHERE `NombreIva`="IVA"';
            $resultado = $conexion->query($ComandoSqlIva);
            while($fila=$resultado->fetch_array())
            {
                    $Datos[] = $fila;
            }
            echo json_encode($Datos);
        break;
        case "TraerAbonosFolioFacturacion":
            $IdFolio=$_POST['IdFolio'];
            $ComandoSqlAbonos='SELECT movimientohabitacion.IdHabitacion,ingresocomprobante.ValorIngresoComprobante FROM `folio`,movimientohabitacion,movimiento,ingresocomprobante WHERE folio.IdFolio='.$IdFolio.' and folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and movimientohabitacion.IdMovimiento=movimiento.IdMovimiento and movimiento.IdMovimiento=ingresocomprobante.IdMovimiento and movimientohabitacion.IdHabitacion=ingresocomprobante.IdHabitacion';
            $resultado = $conexion->query($ComandoSqlAbonos);
            $Abono=0;
            while($fila=$resultado->fetch_array())
            {
            $Abono+=$fila['ValorIngresoComprobante'];          
            }
            echo $Abono;
        break;
        case "TraerValorSeguroFacturacion":
        $IdFolio=$_POST['IdFolio'];
        $ComandoSqlSeguros="SELECT SUM(huesped.SeguroHuesped) as 'ValorSeguros',COUNT(huesped.SeguroHuesped) as 'CantidadSeguros' FROM huesped,movimientohabitacion,folio WHERE huesped.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion AND folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and folio.IdFolio=".$IdFolio.";";
        $resultado = $conexion->query($ComandoSqlSeguros);
        //glyphicon glyphicon-star
        $Datos=array();       
        while($fila=$resultado->fetch_array())
        {            
                $Datos[]=$fila;            
            
        }
        echo json_encode($Datos);
        break;
        case "CreacionFactura":
        $IdFolios=0;
        $IvaFacturaExterna=$_POST['Iva'];
        $SubTotalFacturaExterna=$_POST['SubTotal'];
        $ValorTotalFacturaExterna=$_POST['ValorTotal'];
        $ValorCreditoFacturaExterna=$_POST['ValorCredito'];
        $ValorLetrasFacturaExterna;
        
        $ValorLetrasFacturaExterna=NumeroALetras::convertir($ValorTotalFacturaExterna);
        $IdFolios="";
        $IdFolios=$_POST['IdFolios'];
        $CantidadFolio=0;
        $CantidadFolio=count($IdFolios);
        $IdFoliosArreglo="";
        for($i=0;$i<$CantidadFolio;$i++)
        {
            $FinalizarFolio='UPDATE `folio`,movimientohabitacion,movimiento SET `EstadoFolio`="FINALIZADO",movimientohabitacion.EstadoMovimientoHabitacion="FINALIZADO",movimiento.EstadoMovimiento="FINALIZADO" WHERE movimiento.IdMovimiento=movimientohabitacion.IdMovimiento AND folio.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion AND folio.IdFolio='.$IdFolios[$i].';';
            $Resultado=$conexion->query($FinalizarFolio);
            $IdFoliosArreglo=$IdFoliosArreglo+"[".$IdFolios[$i]."]";
            
        }
        $ComandoRegistrarFactura='INSERT INTO `facturaexterna`(`FechaFacturaExterna`, `IvaFacturaExterna`, `SubTotalFacturaExterna`, `ValorTotalFacturaExterna`, `ValorLetrasFacturaExterna`, `IdFolios`,ValorCreditoFacturaExterna) VALUES (CURRENT_DATE(),'.$IvaFacturaExterna.','.$SubTotalFacturaExterna.','.$ValorTotalFacturaExterna.',"'.$ValorLetrasFacturaExterna.'","'.$IdFoliosArreglo.'",'.$ValorCreditoFacturaExterna.');';
        $Resultado=$conexion->query($ComandoRegistrarFactura);
        if($Resultado==true)
        {
            $ComandoUltimaFact="SELECT *
            FROM facturaexterna
            ORDER by `IdFacturaExterna` DESC
            LIMIT 1";
            $resultado = $conexion->query($ComandoUltimaFact);
  
            while($fila=$resultado->fetch_array())
            {
                echo $fila[0];
            }
        }
        break;

        case "FacturarConsumos":
        $IdFactura=$_POST['IdFactura'];
        $IdConsumo=$_POST['IdConsumo'];
        $IdFolio=$_POST['IdFolio'];
        $ComandoFacturarConsumo='UPDATE `consumos` SET `EstadoConsumos`="CANCELADO",`IdFacturaExterna`='.$IdFactura.' WHERE `IdConsumos`='.$IdConsumo;
        $resultado = $conexion->query($ComandoFacturarConsumo);
        if($resultado==true)
            {
                echo "2";
            }else
            {
                echo $ComandoFacturarConsumo;
            }
        $ComandoActualiarMov='UPDATE `movimientohabitacion`,movimiento,folio,huesped SET huesped.EstadoOcupacionHuesped="FINALIZADO", movimiento.EstadoMovimiento="FINALIZADO",movimientohabitacion.EstadoMovimientoHabitacion="FINALIZADO",folio.EstadoFolio="FINALIZADO" WHERE
        huesped.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and movimientohabitacion.IdMovimiento=movimiento.IdMovimiento and movimientohabitacion.IdMovimientoHabitacion=folio.IdMovimientoHabitacion AND folio.IdFolio='.$IdFolio.';';
        $resultado = $conexion->query($ComandoActualiarMov);
        if($resultado==true)
            {
                echo "1";
            }else
            {
                echo $ComandoActualiarMov;
            }
        break;
        case "FacturarSoloEstadia":
        $IdFolio=$_POST['IdFolio'];
        $ComandoActualiarMov='UPDATE `movimientohabitacion`,movimiento,folio,huesped SET huesped.EstadoOcupacionHuesped="FINALIZADO", movimiento.EstadoMovimiento="FINALIZADO",movimientohabitacion.EstadoMovimientoHabitacion="FINALIZADO" WHERE
        huesped.IdMovimientoHabitacion=movimientohabitacion.IdMovimientoHabitacion and movimiento.IdMovimiento=movimientohabitacion.IdMovimiento and movimientohabitacion.IdMovimientoHabitacion=folio.IdMovimientoHabitacion AND folio.IdFolio='.$IdFolio.';';
        $resultado = $conexion->query($ComandoActualiarMov);
        if($resultado==true)
            {
                echo "1";
            }else
            {
                echo $ComandoActualiarMov;
            }
        break;
        
        
        case "RegistroComprobanteEgreso":
       
        $ValorComprobanteEgreso = $_POST['ValorComprobanteEgreso'];
        $ConceptoComprobanteEgreso = $_POST['ConceptoComprobanteEgreso'];
    
        $ComandoConsultaEgreso = "SELECT MAX(IdCaja) AS 'NUMEROCAJA' FROM caja";
        $ResultadoComandoConsultaEgreso = $conexion->query($ComandoConsultaEgreso);
        $filaCaja = $ResultadoComandoConsultaEgreso->fetch_array();
        
        $ultimaja = $filaCaja["NUMEROCAJA"];
        $ComprobanteEgresoValorLetras = NumeroALetras::convertir($ValorComprobanteEgreso);

        $ComandoInsertarEgreso = "INSERT INTO comprobanteegreso( 
        FechaComprobanteEgreso,
        ConceptoComprobanteEgreso,
        ValorComprobanteEgreso,
        ValorLetrasComprobanteEgreso,
         IdCaja
         ) VALUES (
         NOW(),
        '".$ConceptoComprobanteEgreso."',
        '".$ValorComprobanteEgreso."',
        '".$ComprobanteEgresoValorLetras."',
        '.$ultimaja.')";

        $resultado = $conexion->query($ComandoInsertarEgreso);

        $consultaComprobanteEgreso = "SELECT MAX(IdComprobanteEgreso) AS 'IdComprobanteEgreso' FROM comprobanteegreso WHERE ConceptoComprobanteEgreso = '".$ConceptoComprobanteEgreso."' AND ValorComprobanteEgreso = '".$ValorComprobanteEgreso."' AND ValorLetrasComprobanteEgreso = '".$ComprobanteEgresoValorLetras."' AND IdCaja = '".$ultimaja."'";
        $resultado2 = $conexion->query($consultaComprobanteEgreso);
        $filaNumeroComprobante = $resultado2->fetch_array();
        $CodigoComprobanteEgreso = $filaNumeroComprobante['IdComprobanteEgreso'];

        $RetornoDatos = array(
            "ValorLetras" => $ComprobanteEgresoValorLetras,
            "ValorComprobante" => $ValorComprobanteEgreso,
            "Concepto" => $ConceptoComprobanteEgreso,
            "CodigoComprobante" => $CodigoComprobanteEgreso,
        );
        if($resultado==true)
            {
                echo json_encode($RetornoDatos);
            }else
            {
                echo $ComandoInsertarEgreso;
            }
        break;
        case "BuscarClienteFacturacion":
            $NitCliente=$_POST['NitCliente'];
            $SqlBuscarClienteFacturacion="SELECT CONCAT(CONCAT(`NombreCliente`,' '),`ApellidoCliente`) as NombresCompleto,`Telefono1Cliente`,`DireccionCliente`  FROM `cliente` WHERE `NitCliente`='".$NitCliente."';";
            $Datos=array();  
            $resultado = $conexion->query($SqlBuscarClienteFacturacion);     
            while($fila=$resultado->fetch_array())
            {
                    $Datos[]=$fila;            
            }
                echo json_encode($Datos);    
        break;  




        case "RegistrarConsumosProductosExternos":
        $registradosP=0;
        $IdProducto=$_POST['CodigoProducto'];
        $ValoresTotales=count($IdProducto);
        $CantidadConsumos=$_POST['CantidadProducto'];
        $ValorConsumos=$_POST['ValorProducto'];
        $IdFacturaExterna=$_POST['IdFacturaExterna'];
        for($i=0;$i<$ValoresTotales;$i++)
        {
            $CodigoProducto=$conexion->real_escape_string($IdProducto[$i]);
            $CantidadProducto=$conexion->real_escape_string($CantidadConsumos[$i]);        
            $ValorProducto=$conexion->real_escape_string($ValorConsumos[$i]);
            $VerificarExistentes="SELECT `CantidadProductos` FROM `productos` WHERE `IdProductos`=".$CodigoProducto.";";
            $Resultado=$conexion->query($VerificarExistentes);
            while($fila= $Resultado->fetch_array())
            {
               if($fila['CantidadProductos']<$CantidadProducto)
               {
                 echo "NOHAY";
                 exit();
               }
            } 
            $ComandoSqlRegistrarConsumos='INSERT INTO `consumos`(`TipoConsumos`, `ValorConsumos`, `CantidadConsumos`, `EstadoConsumos`, `IdFacturaExterna`,`IdProductos`) VALUES ("NULL",'.$ValorProducto.','.$CantidadProducto.',"CANCELADO",'.$IdFacturaExterna.','.$CodigoProducto.');';
            if($Resultado=$conexion->query($ComandoSqlRegistrarConsumos))
            {        
                $registradosP++;
                $ComandoActualiarProductos="UPDATE `productos` SET `CantidadProductos`=`CantidadProductos`-".$CantidadProducto." WHERE `IdProductos`=".$CodigoProducto.";";
                $Resultado=$conexion->query($ComandoActualiarProductos);
                        
            }else
            {
                echo "NOREGISTRO";
                exit();
            }
        }
        if($registradosP==$ValoresTotales)
        {
            echo "REGISTRO";
        }

        
        break; 

        case "RegistrarConsumosServiciosExternos":
        $registradosS=0;
        $IdServicio=$_POST['CodigoServicio'];
        $ValoresTotales=count($IdServicio);
        $CantidadConsumos=$_POST['CantidadServicio'];
        $ValorConsumos=$_POST['ValorServicio'];    
        $IdFacturaExterna=$_POST['IdFacturaExterna'];

        for($i=0;$i<$ValoresTotales;$i++)
        {
            $CodigoServicio=$conexion->real_escape_string($IdServicio[$i]);
            $CantidadServicio=$conexion->real_escape_string($CantidadConsumos[$i]);        
            $ValorServicio=$conexion->real_escape_string($ValorConsumos[$i]);
            $ComandoSqlRegistrarConsumos='INSERT INTO `consumos`(`TipoConsumos`, `ValorConsumos`, `CantidadConsumos`, `EstadoConsumos`, `IdFacturaExterna`,`IdServicios`) VALUES ("NULL",'.$ValorServicio.','.$CantidadServicio.',"CANCELADO",'.$IdFacturaExterna.','.$CodigoServicio.');';
            if($Resultado=$conexion->query($ComandoSqlRegistrarConsumos))
            {        
                $registradosS++;               
            }else
            {
                echo "NOREGISTRO";
                exit();
            }
        }
        if($registradosS==$ValoresTotales)
        {
            echo "REGISTRO";
        }

        break;

        case "CreacionFacturaExterna":
        $IdFolios=0;
        $IvaFacturaExterna=$_POST['Iva'];
        $SubTotalFacturaExterna=$_POST['SubTotal'];
        $ValorTotalFacturaExterna=$_POST['ValorTotal'];
        $ValorLetrasFacturaExterna;
        
        $ValorLetrasFacturaExterna=NumeroALetras::convertir($ValorTotalFacturaExterna);
        $IdFolios=$_POST['IdFolios'];
        $ComandoRegistrarFactura='INSERT INTO `facturaexterna`(`FechaFacturaExterna`, `IvaFacturaExterna`, `SubTotalFacturaExterna`, `ValorTotalFacturaExterna`, `ValorLetrasFacturaExterna`, `IdFolios`) VALUES (CURRENT_DATE(),'.$IvaFacturaExterna.','.$SubTotalFacturaExterna.','.$ValorTotalFacturaExterna.',"'.$ValorLetrasFacturaExterna.'","'.$IdFolios.'");';
        $Resultado=$conexion->query($ComandoRegistrarFactura);
        if($Resultado==true)
        {
            $ComandoUltimaFact="SELECT *
            FROM facturaexterna
            ORDER by `IdFacturaExterna` DESC
            LIMIT 1";
            $resultado = $conexion->query($ComandoUltimaFact);
  
            while($fila=$resultado->fetch_array())
            {
                echo $fila[0];
            }
        }
        break;
        
            default:
            echo "se jodio mijo";
             break;

    }

    function dias_transcurridos($fecha_i,$fecha_f)
                {
                    $dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
                    $dias 	= abs($dias); $dias = floor($dias);		
                    return $dias;
                } 
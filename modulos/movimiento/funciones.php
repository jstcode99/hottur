<?php
 require_once('../conexion.php');
/*------- Inicio funcion Cliente Existe ---------*/
session_start();
$NombreProceso = isset($_POST['NombreProceso']) ? trim($_POST['NombreProceso']) : $_GET['NombreProceso']; 
switch ($NombreProceso) 
{
    case 'ConsultarClienteExiste':
           // funcion consultar si el cliente existe
            $TipoCliente = $conexion->real_escape_string($_POST['TipoCliente']);
            $ClienteNit = $conexion->real_escape_string($_POST['NitCliente']);
            if($TipoCliente == "1")
            {
                $ClienteTipoDocumento = $conexion->real_escape_string($_POST['TipoDocumento']);
                $ComandoSqlConsultarClienteExiste ="SELECT * FROM `cliente` WHERE cliente.IdClienteTipo  = ".$TipoCliente." and cliente.TipoDocumentoCliente = '".$ClienteTipoDocumento."' and cliente.NitCliente = '".$ClienteNit."'";
            }
             else if($TipoCliente == "2" || $TipoCliente == "3")
            {
                $ComandoSqlConsultarClienteExiste ="SELECT * FROM `cliente` WHERE cliente.IdClienteTipo  = ".$TipoCliente." and cliente.NitCliente  = '".$ClienteNit."'"; 
            }
            
            $resultado =  $conexion->query($ComandoSqlConsultarClienteExiste);            
                $Datos=array();       
                while($fila=$resultado->fetch_array())
                {            
                        if($fila['IdCliente'] != "")
                        {
                        //$Datos = array_map("utf8_encode", $fila );
                            $Datos[]= array_map("utf8_encode", $fila );
                            echo json_encode($Datos);
                        }
                        else{
                            echo "";
                        }
                }

        break;
    
    case 'ActualizarCambioHabitacion':

        $IdMovimientoHabitacionTraido = $_POST['IdMovimientoHabitacionTraido'];
        $IdHabitacionTrada = $_POST['IdHabitacionTrada'];
        $observacionFinal = strtoupper($_POST['observacionFinal']);

        $ConsultaSQL = "UPDATE movimientohabitacion SET IdHabitacion ='".$IdHabitacionTrada."', ObservacionesMovimientoHabitacion = '".$observacionFinal."' WHERE IdMovimientoHabitacion = '".$IdMovimientoHabitacionTraido."' ";
        /* echo $ConsultaSQL; */
        $Resultado = $conexion->query($ConsultaSQL);
        
        if($Resultado == true){
            echo "ACTUALIZO";
        }else{
            echo "NOACTUALIZO";
        }


    break;

    case 'ActualizarMovimientoEspecifico':

        $ESTADO = $_POST['ESTADO'];
        $IdMovimiento = $_POST['IdMovimiento'];
        $IdMovimientoHabitacion = $_POST['IdMovimientoHabitacion'];

        $ConsultaSQL = "UPDATE movimiento m, movimientohabitacion mh SET m.EstadoMovimiento = '".$ESTADO."', mh.EstadoMovimientoHabitacion = '".$ESTADO."' WHERE m.IdMovimiento = '".$IdMovimiento."' AND m.IdMovimiento = mh.IdMovimiento AND mh.IdMovimientoHabitacion = '".$IdMovimientoHabitacion."' ";
        /* echo $ConsultaSQL; */
        $Resultado = $conexion->query($ConsultaSQL);
        
        if($Resultado == true){
            echo "ACTUALIZO";
        }else{
            echo "NOACTUALIZO";
        }


    break;
    
    case 'RegistrarHuespedExtras':

            $NumeroDocumentoHuespedHuespedExtras = $_POST['NumeroDocumentoHuespedHuespedExtras'];
            $NombreHuespedHuespedExtras = $_POST['NombreHuespedHuespedExtras'];
            $ApellidoHuespedHuespedExtras = $_POST['ApellidoHuespedHuespedExtras'];
            $NacionalidadHuespedHuespedExtras = $_POST['NacionalidadHuespedHuespedExtras'];
            $TipoDocumentoHuespedExtras = $_POST['TipoDocumentoHuespedExtras'];
            $FechaNacimientoHuespedExtras = $_POST['FechaNacimientoHuespedExtras'];
            $TipoHuespedExtras = $_POST['TipoHuespedExtras'];
            $SeguroRegistroHuespedExtras = $_POST['SeguroRegistroHuespedExtras'];
            $ObservacionesHuespedHuespedExtras = $_POST['ObservacionesHuespedHuespedExtras'];
            $IdMovimientoHabitacionHuespedExtras = $_POST['IdMovimientoHabitacionHuespedExtras'];

        if($SeguroRegistroHuespedExtras == "on"){
            $ConsultaSQL = "INSERT INTO `huesped`(
                `NumeroDocumentoHuesped`,
                `IdMovimientoHabitacion`,
                `FechaEntradaHuesped`,
                `NombreHuesped`,
                `ApellidoHuesped`,
                `NacionalidadHuesped`,
                `TipoDocumentoHuesped`,
                `FechaNacimientoHuesped`,
                `TipoHuesped`,
                `SeguroHuesped`,
                `ObservacionesHuesped`) VALUES (
                '".$NumeroDocumentoHuespedHuespedExtras."',
                '".$IdMovimientoHabitacionHuespedExtras."',
                ( SELECT NOW() ),
                '".strtoupper($NombreHuespedHuespedExtras)."',
                '".strtoupper($ApellidoHuespedHuespedExtras)."',
                '".strtoupper($NacionalidadHuespedHuespedExtras)."',
                '".strtoupper($TipoDocumentoHuespedExtras)."',
                '".$FechaNacimientoHuespedExtras."',
                '".$TipoHuespedExtras."',
                (SELECT ValorSeguroParametros FROM parametros),
                '".strtoupper($ObservacionesHuespedHuespedExtras)."')";
        }else{
            $ConsultaSQL = "INSERT INTO `huesped`(
                `NumeroDocumentoHuesped`,
                `IdMovimientoHabitacion`,
                `FechaEntradaHuesped`,
                `NombreHuesped`,
                `ApellidoHuesped`,
                `NacionalidadHuesped`,
                `TipoDocumentoHuesped`,
                `FechaNacimientoHuesped`,
                `TipoHuesped`,
                `SeguroHuesped`,
                `ObservacionesHuesped`) VALUES (
                '".$NumeroDocumentoHuespedHuespedExtras."',
                '".$IdMovimientoHabitacionHuespedExtras."',
                ( SELECT NOW() ),
                '".strtoupper($NombreHuespedHuespedExtras)."',
                '".strtoupper($ApellidoHuespedHuespedExtras)."',
                '".strtoupper($NacionalidadHuespedHuespedExtras)."',
                '".strtoupper($TipoDocumentoHuespedExtras)."',
                '".$FechaNacimientoHuespedExtras."',
                '".$TipoHuespedExtras."',
                0,
                '".strtoupper($ObservacionesHuespedHuespedExtras)."')";
        }
               /*  echo $ConsultaSQL;   */
               $Resultado = $conexion->query($ConsultaSQL);
               
               if($Resultado == true){
                   echo "INSERTO";
               }else{
                   echo "NOINSERTO";
               }
    break;

    case 'CapacidadPaxPorHabitacion':

            $NombreHabitacion = $conexion->real_escape_string($_POST['NombreHabitacion']);
            $ConsultaCapacidadHabiacion = "SELECT CantidadPaxHabitacionTipo FROM habitaciontipo WHERE IdHabitacionTipo = (SELECT IdHabitacionTipo FROM habitacion WHERE NombreHabitacion ='".$NombreHabitacion."')";
            $ResultadoConsulta = $conexion->query($ConsultaCapacidadHabiacion);
            while($CapacidadHabitacion = mysqli_fetch_array($ResultadoConsulta))
            {
                echo json_encode($CapacidadHabitacion[0]);
            }
    break;

    case 'ConsultaCantidadPax':

            $IdMovimientohabitacion = $_POST['IdMovimientohabitacion'];
            $ComandoSql = "SELECT SUM(h.IdHuesped AND h.TipoHuesped = 'ADULTO') AS 'ADULTOS', SUM(h.IdHuesped AND h.TipoHuesped = 'NINO') AS 'NINOS', SUM(h.IdHuesped AND h.TipoHuesped = 'ADICIONAL') AS 'ADICIONALES', COUNT(h.IdHuesped) AS 'TOTALPAX' FROM huesped h WHERE h.IdMovimientoHabitacion  ='".$IdMovimientohabitacion."'";
            $resultado=$conexion->query($ComandoSql);
            while($fila=$resultado->fetch_array())
            { 
               echo json_encode($fila);
            }

    break;


    case 'CantMaximaAdultos':
        $TipoYCantidad = array();
        $NombreHabitacion =  $_POST['NombreHabitacion'];
        $ConsultaCantAdult = "SELECT ht.NombreHabitacionTipo ,ht.CantidadPaxHabitacionTipo,ht.ValorPaxHabitacionTipo,ht.ValorAdicionalHabitacionTipo FROM habitaciontipo ht WHERE ht.IdHabitacionTipo = (SELECT IdHabitacionTipo FROM habitacion WHERE NombreHabitacion = ".strtoupper($NombreHabitacion).")";
        $ResultadoCantAdult = $conexion->query($ConsultaCantAdult);
        while($Almacenar = mysqli_fetch_array($ResultadoCantAdult))
        {
            if($Almacenar != "")
              {
                $TipoYCantidad[] = $Almacenar;
              }
        }
        echo json_encode($TipoYCantidad);
    break;

    case 'TraerIvaEstadia':
                $ConsultaIva = "SELECT PorcentajeIva FROM iva WHERE NombreIva = 'IVA'";
                $ResultadoIva = $conexion->query($ConsultaIva);
                while($filas=$ResultadoIva->fetch_array())
                  {
                     echo $filas[0];       
                  }
           break;
    
    case 'ActualizarFechaPasadia':

           $IdHuesped = $_POST['IdHuesped'];
           $ComandoSql = "UPDATE huesped SET FechaSalidaHuesped = (SELECT NOW()), EstadoOcupacionHuesped ='FINALIZADO'  WHERE IdHuesped  ='".$IdHuesped."'";
           $Resultado = $conexion->query($ComandoSql);
              
              if($Resultado == true){
                  echo "ACTUALIZO";
              }else{
                  echo "NOACTUALIZO";
              }

       break;
    case 'TraerDatosHuespedExtras':

       $NumeroDocumento = $_POST['NumeroDocumento'];
       $ComandoSql = "SELECT * FROM huesped h WHERE h.NumeroDocumentoHuesped ='".$NumeroDocumento."'";
       /* echo $ComandoSql; */
       $resultado=$conexion->query($ComandoSql);
       while($fila=$resultado->fetch_array())
       { 
          echo json_encode($fila);
       }

   break;
              
    case 'ConsultarDescuentoNinos':
            $ConsultaPorcentajeDescuentoNinos = "SELECT PorcentajeDescuentoNinosParametros FROM `parametros`";
            $ResultadoPorcentajeDescuentoNinos = $conexion->query($ConsultaPorcentajeDescuentoNinos);
                while($Almacenar = mysqli_fetch_array($ResultadoPorcentajeDescuentoNinos))
                {
                    if($Almacenar != "")
                      {
                        echo json_encode($Almacenar);
                      }
                }
            break;
    case 'Desayuno':
            $ConsultaPorcentajeDescuentoNinos = "SELECT PorcentajeDescuentoNinosParametros FROM `parametros`";
            $ResultadoPorcentajeDescuentoNinos = $conexion->query($ConsultaPorcentajeDescuentoNinos);
                while($Almacenar = mysqli_fetch_array($ResultadoPorcentajeDescuentoNinos))
                {
                    if($Almacenar != "")
                      {
                        echo json_encode($Almacenar);
                      }
                }
            break;
    
    case 'ReservaIngresar':
              $TipoCliente = $_POST['TipoCliente'];
              $IdUsuario = $_SESSION['IdUsuario'];

              switch($TipoCliente)
              {
                  case '1':
                      $DatosClienteYReserva = $_POST['DatosClienteYReserva'];
                      // datos del cliente
                      $TipoDocumento = $conexion->real_escape_string($DatosClienteYReserva[0]);
                      $NumeroDocumento = $conexion->real_escape_string($DatosClienteYReserva[1]);
                      $Nombre = $conexion->real_escape_string($DatosClienteYReserva[2]);
                      $Apellidos = $conexion->real_escape_string($DatosClienteYReserva[3]);
                      $Telefono = $conexion->real_escape_string($DatosClienteYReserva[4]);
                      $Correo = $conexion->real_escape_string($DatosClienteYReserva[5]);
                      
                      // Consultamos nuevamente si el cliente existe
                      $ClienteExiste = "SELECT * FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND TipoDocumentoCliente = '".$TipoDocumento."' AND NitCliente = '".$NumeroDocumento."'";
                      $ResultClientExist = $conexion->query($ClienteExiste);
                      $Datos = mysqli_fetch_array($ResultClientExist);
                      if($Datos[0] == ""){
                              $InsertClient = "INSERT INTO `cliente`(`NitCliente`, `TipoDocumentoCliente`,`NombreCliente`, `ApellidoCliente`,`Telefono1Cliente`, `CorreoCliente`, `IdClienteTipo`) VALUES ('".$NumeroDocumento."','".strtoupper($TipoDocumento)."','".strtoupper($Nombre)."','".strtoupper($Apellidos)."','".$Telefono."','".strtoupper($Correo)."',".$TipoCliente.")";
                              $InsertClient = $conexion->query($InsertClient);
                            }
                      
                    
                      // datos de la reserva
                      $Grupo = $conexion->real_escape_string($_POST['Grupo']);
                      $EstadoReserva = $conexion->real_escape_string($DatosClienteYReserva[6]);
                      $FechaEntrada = $conexion->real_escape_string($DatosClienteYReserva[7]);
                      $FechaSalida = $conexion->real_escape_string($DatosClienteYReserva[8]);
                      $Tarifa = $conexion->real_escape_string($DatosClienteYReserva[9]);
                      $MotivoViaje = $conexion->real_escape_string($DatosClienteYReserva[10]);
                      $TipoTransporte = $conexion->real_escape_string($DatosClienteYReserva[11]);
                      $Observaciones = $conexion->real_escape_string($DatosClienteYReserva[12]);
                      $ValorTotalEstadia = $conexion->real_escape_string($DatosClienteYReserva[13]);

                      
                      $ContadorHabitacion = count($_POST['NombreHabitacion']);
                      $Habitacion = $_POST['NombreHabitacion'];
                      $Adultos = $_POST['CantidadAdultos'];
                      $Ninos = $_POST['CantidadNinos'];
                      $Desayuno = $_POST['Desayuno'];
                      $Nit = $_POST['NitResponsable'];
                      $Nombre = $_POST['NombreResponsable'];
                      $Apellidos = $_POST['ApellidosResponsable'];
                      $ObservacionesHabita = $_POST['ObservacionesHabitacion'];
                      $VHabitacion = $_POST['ValorHabitacion'];
                    /*Grupo */
                    if($Grupo == "true")
                    {
                             // For para sacar la cantidad de adultos, niños y hacer el insert de movimiento
                             $SumaAdultos = 0;
                             $SumaNinos = 0;
                             for ($j = 0 ; $j < $ContadorHabitacion ; $j++)
                             {
                                 $SumaAdultos = $SumaAdultos + $conexion->real_escape_string($Adultos[$j]);
                                 $SumaNinos = $SumaNinos + $conexion->real_escape_string($Ninos[$j]);
                             }
                            $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`, `FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`, `TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`, `ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA NO GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$SumaAdultos."','".$SumaNinos."','".$ValorTotalEstadia."','".$Tarifa."',(SELECT IdCliente FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$NumeroDocumento."'),".$IdUsuario.")";
                            $ResultInsertMovimiento = $conexion->query($InsetMovimiento);
                            // echo "hice un insert movimiento";
                                 for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                             {
                                   $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                   $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                   $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                   $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                   $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                   $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                   $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                   $ObservacionesHabitacion = $ObservacionesHabita[$i];
                                //    echo " Observaciones ".$ObservacionesHabita[$i];
                                   $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);
                                   // Insert movimiento habitacion
                                   $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`, `ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`, `CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`, `NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`, `IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA NO GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente ='".$NumeroDocumento."' AND cliente.IdClienteTipo = ".$TipoCliente.") ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".$NombreHabitacion."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".$TipoDesayuno."'))";
                                //    echo($InserMovHabitacion);
                                // echo "Hice insert Movimientohabitacion con 1 mismo movimiento";
                                   $ResultInsertMovHabita = $conexion->query($InserMovHabitacion); 
                                    
                             }
                             if($ResultInsertMovHabita == true)
                             {
                                 echo "GUARDO";
                             }
                             else{
                                echo "NO GUARDO";
                             }
                    }
                    else
                    {
                            for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                             {
                                    
                                    $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                    $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                    $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                    $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                    $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                    $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                    $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                    $ObservacionesHabitacion = $conexion->real_escape_string($ObservacionesHabita[$i]);
                                    $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);

                                    $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`, `FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`, `TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`, `ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA NO GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$CantidadAdultos."','".$CantidadNinos."','".$ValorTotalEstadia."','".$Tarifa."',(SELECT IdCliente FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$NumeroDocumento."'),".$IdUsuario.")";
                                    $ResultInsertMovimiento = $conexion->query($InsetMovimiento);
                                    
                                    // Insert movimiento habitacion
                                    $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`, `ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`, `CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`, `NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`, `IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA NO GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente ='".$NumeroDocumento."' AND cliente.IdClienteTipo = ".$TipoCliente.") ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".$NombreHabitacion."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".$TipoDesayuno."'))";
                                    // echo($InserMovHabitacion);
                                    
                                    $ResultInsertMovHabita = $conexion->query($InserMovHabitacion);  
                             }
                             if($ResultInsertMovHabita == true)
                             {
                                 echo "GUARDO";
                             }
                             else{
                                echo "NO GUARDO";
                             }
                    }
                    break;

                    case '2':
                    
                        $DatosClienteYReserva = $_POST['DatosClienteYReserva'];
                        $Convenio = $_POST['Convenio'];
                        // echo($Convenio);
                        // toca cargar vairable de la tabla primero para que recorrara el siguiente for
                        $ContadorHabitacion = count($_POST['NombreHabitacion']);
                        $Habitacion = $_POST['NombreHabitacion'];
                        $Adultos = $_POST['CantidadAdultos'];
                        $Ninos = $_POST['CantidadNinos'];
                        $Desayuno = $_POST['Desayuno'];
                        $Nit = $_POST['NitResponsable'];
                        $Nombre = $_POST['NombreResponsable'];
                        $Apellidos = $_POST['ApellidosResponsable'];
                        $ObservacionesHabita = $_POST['ObservacionesHabitacion'];
                        $VHabitacion = $_POST['ValorHabitacion'];

                         // For para sacar la cantidad de adultos, niños y hacer el insert de movimiento
                        $SumaAdultos = 0;
                        $SumaNinos = 0;
                        for ($j = 0 ; $j < $ContadorHabitacion ; $j++)
                        {
                            $SumaAdultos = $SumaAdultos + $conexion->real_escape_string($Adultos[$j]);
                            $SumaNinos = $SumaNinos + $conexion->real_escape_string($Ninos[$j]);
                        }
                        if($Convenio == 'true')
                        {
                          $IdCliente = $conexion->real_escape_string($DatosClienteYReserva[0]);
                        
                          $Grupo = $conexion->real_escape_string($_POST['Grupo']);
                          $EstadoReserva = $conexion->real_escape_string($DatosClienteYReserva[5]);
                          $FechaEntrada = $conexion->real_escape_string($DatosClienteYReserva[6]);
                          $FechaSalida = $conexion->real_escape_string($DatosClienteYReserva[7]);
                          $Tarifa = $conexion->real_escape_string($DatosClienteYReserva[8]);
                          $MotivoViaje = $conexion->real_escape_string($DatosClienteYReserva[9]);
                          $TipoTransporte = $conexion->real_escape_string($DatosClienteYReserva[10]);
                          $Observaciones = $conexion->real_escape_string($DatosClienteYReserva[11]);
                          $ValorTotalEstadia = $conexion->real_escape_string($DatosClienteYReserva[12]);

                            if($Grupo == "true")
                            {
                                  $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`,`TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`,`ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$SumaAdultos."','".$SumaNinos."','".$ValorTotalEstadia."','".$Tarifa."',".$IdCliente.",".$IdUsuario.")";
                                    
                                  $ResultInsertMovimiento = $conexion->query($InsetMovimiento)  ;   

                                  for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                                  {
                                      $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                      $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                      $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                      $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                      $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                      $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                      $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                      $ObservacionesHabitacion = $conexion->real_escape_string($ObservacionesHabita[$i]);
                                      $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);
                                      // Insert movimiento habitacion
                                    
                                     $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`,`ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`,`CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`,`IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = ".$IdCliente." AND cliente.IdClienteTipo = ".$TipoCliente." ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".strtoupper($NombreHabitacion)."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".strtoupper($TipoDesayuno)."'))";
                                     $ResultInsertMovHabita = $conexion->query($InserMovHabitacion);  
                                }
                            }
                            else
                            {
                                for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                                {
                                    $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                    $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                    $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                    $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                    $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                    $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                    $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                    $ObservacionesHabitacion = $conexion->real_escape_string($ObservacionesHabita[$i]);
                                    $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);


                                    $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`,`TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`,`ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$CantidadAdultos."','".$CantidadNinos."','".$ValorHabitacion."','".$Tarifa."',".$IdCliente.",".$IdUsuario.")";   
                                   
                                    $ResultInsertMovimiento = $conexion->query($InsetMovimiento);
                                    // Insert movimiento habitacion
                                  
                                   $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`,`ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`,`CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`,`IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = ".$IdCliente." AND cliente.IdClienteTipo = ".$TipoCliente." ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".strtoupper($NombreHabitacion)."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".strtoupper($TipoDesayuno)."'))";
                                   $ResultInsertMovHabita = $conexion->query($InserMovHabitacion);  
                               }
                            }
                            if($ResultInsertMovHabita == true)
                            {
                                echo "GUARDO";
                            }
                            else{
                                echo "NO GUARDO 1";
                            }
                        }
                        else
                        {
                            $NitCliente = $conexion->real_escape_string($DatosClienteYReserva[1]);
                            // echo"<pre>";
                            // echo var_dump($NitCliente);
                            // echo "</pre>";
                            $Grupo = $conexion->real_escape_string($_POST['Grupo']);
                            $EstadoReserva = $conexion->real_escape_string($DatosClienteYReserva[5]);
                            $FechaEntrada = $conexion->real_escape_string($DatosClienteYReserva[6]);
                            $FechaSalida = $conexion->real_escape_string($DatosClienteYReserva[7]);
                            $Tarifa = $conexion->real_escape_string($DatosClienteYReserva[8]);
                            $MotivoViaje = $conexion->real_escape_string($DatosClienteYReserva[9]);
                            $TipoTransporte = $conexion->real_escape_string($DatosClienteYReserva[10]);
                            $Observaciones = $conexion->real_escape_string($DatosClienteYReserva[11]);
                            $ValorTotalEstadia = $conexion->real_escape_string($DatosClienteYReserva[12]);

                            if($Grupo == "true")
                            {
                                $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`, `FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`, `TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`, `ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA NO GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$SumaAdultos."','".$SumaNinos."','".$ValorTotalEstadia."','".$Tarifa."',(SELECT IdCliente FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$NitCliente."'),".$IdUsuario.")";
                                //echo($InsetMovimiento);
                                $ResultInsertMovimiento = $conexion->query($InsetMovimiento);
                            
                                for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                                {
                                    $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                    $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                    $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                    $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                    $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                    $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                    $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                    $ObservacionesHabitacion = $conexion->real_escape_string($ObservacionesHabita[$i]);
                                    $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);
                                    // Insert movimiento habitacion
                                            $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`,`ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`,`CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`,`IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA NO GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente ='".$NitCliente."' AND cliente.IdClienteTipo = ".$TipoCliente.")ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".strtoupper($NombreHabitacion)."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".strtoupper($TipoDesayuno)."'))";
                                    //echo($InserMovHabitacion);
                                    $ResultInsertMovHabita = $conexion->query($InserMovHabitacion);  
                                }
                            }
                            else
                            {
                                for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                                {
                                    

                                    $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                    $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                    $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                    $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                    $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                    $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                    $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                    $ObservacionesHabitacion = $conexion->real_escape_string($ObservacionesHabita[$i]);
                                    $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);

                                    $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`, `FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`, `TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`, `ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA NO GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$CantidadAdultos."','".$CantidadNinos."','".$ValorHabitacion."','".$Tarifa."',(SELECT IdCliente FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$NitCliente."'),".$IdUsuario.")";
                                    //echo("   1   ".$InsetMovimiento);
                                    $ResultInsertMovimiento = $conexion->query($InsetMovimiento);
                                    // Insert movimiento habitacion
                                            $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`,`ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`,`CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`,`IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA NO GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente ='".$NitCliente."' AND cliente.IdClienteTipo = ".$TipoCliente.")ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".strtoupper($NombreHabitacion)."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".strtoupper($TipoDesayuno)."'))";
                                    //echo($InserMovHabitacion);
                                    $ResultInsertMovHabita = $conexion->query($InserMovHabitacion);  
                                }
                            }
                            if($ResultInsertMovHabita == true)
                            {
                                echo "GUARDO";
                            }
                            else{
                                echo "NO GUARDO";
                            }
                    }
                    break;

                    case '3':
                        $DatosClienteYReserva = $_POST['DatosClienteYReserva'];
                        $Convenio = $_POST['Convenio'];
                        $Comision = $_POST['Comision'];
                        
                        // toca cargar vairable de la tabla primero para que recorrara el siguiente for
                        $ContadorHabitacion = count($_POST['NombreHabitacion']);
                        $Habitacion = $_POST['NombreHabitacion'];
                        $Adultos = $_POST['CantidadAdultos'];
                        $Ninos = $_POST['CantidadNinos'];
                        $Desayuno = $_POST['Desayuno'];
                        $Nit = $_POST['NitResponsable'];
                        $Nombre = $_POST['NombreResponsable'];
                        $Apellidos = $_POST['ApellidosResponsable'];
                        $ObservacionesHabita = $_POST['ObservacionesHabitacion'];
                        $VHabitacion = $_POST['ValorHabitacion'];
    
                         // For para sacar la cantidad de adultos, niños y hacer el insert de movimiento
                        $SumaAdultos = 0;
                        $SumaNinos = 0;
                        for ($j = 0 ; $j < $ContadorHabitacion ; $j++)
                        {
                            $SumaAdultos = $SumaAdultos + $conexion->real_escape_string($Adultos[$j]);
                            $SumaNinos = $SumaNinos + $conexion->real_escape_string($Ninos[$j]);
                        }
                        if($Convenio == 'true')
                        {
                          $IdCliente = $conexion->real_escape_string($DatosClienteYReserva[0]);
                            
                          $Grupo = $conexion->real_escape_string($_POST['Grupo']);
                          $EstadoReserva = $conexion->real_escape_string($DatosClienteYReserva[5]);
                          $FechaEntrada = $conexion->real_escape_string($DatosClienteYReserva[6]);
                          $FechaSalida = $conexion->real_escape_string($DatosClienteYReserva[7]);
                          $Tarifa = $conexion->real_escape_string($DatosClienteYReserva[8]);
                          $MotivoViaje = $conexion->real_escape_string($DatosClienteYReserva[9]);
                          $TipoTransporte = $conexion->real_escape_string($DatosClienteYReserva[10]);
                          $Observaciones = $conexion->real_escape_string($DatosClienteYReserva[11]);
                          $ValorTotalEstadia = $conexion->real_escape_string($DatosClienteYReserva[12]);
    
    
                            if($Grupo == "true")
                            {
                                  $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`,`TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`,`ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$SumaAdultos."','".$SumaNinos."','".$ValorTotalEstadia."','".$Tarifa."',".$IdCliente.",".$IdUsuario.")";

                                  $ResultInsertMovimiento = $conexion->query($InsetMovimiento)  ;   

                                  for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                                  {
                                      $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                      $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                      $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                      $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                      $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                      $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                      $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                      $ObservacionesHabitacion = $conexion->real_escape_string($ObservacionesHabita[$i]);
                                      $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);
                                      // Insert movimiento habitacion
                                    
                                     $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`,`ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`,`CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`,`IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = ".$IdCliente." AND cliente.IdClienteTipo = ".$TipoCliente." ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".strtoupper($NombreHabitacion)."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".strtoupper($TipoDesayuno)."'))";
                                     $ResultInsertMovHabita = $conexion->query($InserMovHabitacion);  
                                }
                            }
                            else
                            {
                                for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                                {

                                    $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                    $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                    $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                    $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                    $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                    $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                    $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                    $ObservacionesHabitacion = $conexion->real_escape_string($ObservacionesHabita[$i]);
                                    $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);



                                    $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`,`TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`,`ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$CantidadAdultos."','".$CantidadNinos."','".$ValorHabitacion."','".$Tarifa."',".$IdCliente.",".$IdUsuario.")";   

                                    $ResultInsertMovimiento = $conexion->query($InsetMovimiento);
                                    // Insert movimiento habitacion

                                   $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`,`ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`,`CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`,`IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = ".$IdCliente." AND cliente.IdClienteTipo = ".$TipoCliente." ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".strtoupper($NombreHabitacion)."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".strtoupper($TipoDesayuno)."'))";
                                   $ResultInsertMovHabita = $conexion->query($InserMovHabitacion);  
                               }
                            }
                            if($ResultInsertMovHabita == true)
                            {
                                echo "GUARDO";
                            }
                            else{
                                echo "NO GUARDO 1";
                            }
                          

                        }
                        else
                        {
                            
                            $NitCliente = $conexion->real_escape_string($DatosClienteYReserva[1]);
    
                            $Grupo = $conexion->real_escape_string($_POST['Grupo']);
                            $EstadoReserva = $conexion->real_escape_string($DatosClienteYReserva[5]);
                            $FechaEntrada = $conexion->real_escape_string($DatosClienteYReserva[6]);
                            $FechaSalida = $conexion->real_escape_string($DatosClienteYReserva[7]);
                            $Tarifa = $conexion->real_escape_string($DatosClienteYReserva[8]);
                            $MotivoViaje = $conexion->real_escape_string($DatosClienteYReserva[9]);
                            $TipoTransporte = $conexion->real_escape_string($DatosClienteYReserva[10]);
                            $Observaciones = $conexion->real_escape_string($DatosClienteYReserva[11]);
                            $ValorTotalEstadia = $conexion->real_escape_string($DatosClienteYReserva[12]);
                        
                                if($Grupo == "true")
                                {
                                    $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`, `FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`, `TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`, `ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA NO GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$SumaAdultos."','".$SumaNinos."','".$ValorTotalEstadia."','".$Tarifa."',(SELECT IdCliente FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$NitCliente."'),".$IdUsuario.")";
                                    //echo($InsetMovimiento);
                                    $ResultInsertMovimiento = $conexion->query($InsetMovimiento);
                                
                                    for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                                    {
                                        $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                        $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                        $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                        $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                        $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                        $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                        $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                        $ObservacionesHabitacion = $conexion->real_escape_string($ObservacionesHabita[$i]);
                                        $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);
                                        // Insert movimiento habitacion
                                                $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`,`ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`,`CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`,`IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA NO GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente ='".$NitCliente."' AND cliente.IdClienteTipo = ".$TipoCliente.")ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".strtoupper($NombreHabitacion)."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".strtoupper($TipoDesayuno)."'))";
                                        //echo($InserMovHabitacion);
                                        $ResultInsertMovHabita = $conexion->query($InserMovHabitacion);  
                                    }
                                }
                                else
                                {
                                    for ($i = 0 ; $i < $ContadorHabitacion ; $i++)
                                    {
                                        $NombreHabitacion = $conexion->real_escape_string($Habitacion[$i]);
                                        $CantidadAdultos = $conexion->real_escape_string($Adultos[$i]);
                                        $CantidadNinos = $conexion->real_escape_string($Ninos[$i]);
                                        $TipoDesayuno = $conexion->real_escape_string($Desayuno[$i]);
                                        $NitResponsable = $conexion->real_escape_string($Nit[$i]);
                                        $NombreResponsabe = $conexion->real_escape_string($Nombre[$i]);
                                        $ApellidosResponsable = $conexion->real_escape_string($Apellidos[$i]);
                                        $ObservacionesHabitacion = $conexion->real_escape_string($ObservacionesHabita[$i]);
                                        $ValorHabitacion = $conexion->real_escape_string($VHabitacion[$i]);



                                        $InsetMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`, `FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`, `TipoTransporteMovimiento`, `GrupoMovimiento`,`ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`, `ValorTotalMovimiento`, `IdTarifa`,`IdCliente`, `IdUsuario`) VALUES ('RESERVA NO GARANTIZADA','".$EstadoReserva."',0,'".date('Y-m-d')."','".$FechaEntrada."','".$FechaSalida."','".strtoupper($Observaciones)."','".strtoupper($MotivoViaje)."','".strtoupper($TipoTransporte)."','".strtoupper($Grupo)."','FALSE','".$CantidadAdultos."','".$CantidadNinos."','".$ValorHabitacion."','".$Tarifa."',(SELECT IdCliente FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$NitCliente."'),".$IdUsuario.")";
                                        // echo($InsetMovimiento);
                                        $ResultInsertMovimiento = $conexion->query($InsetMovimiento);

                                        // Insert movimiento habitacion
                                                $InserMovHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`,`ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`,`CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`,`ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`,`IdHabitacion`, `IdDesayuno`) VALUES ('".$FechaEntrada."','','".strtoupper($ObservacionesHabitacion)."','','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','RESERVA NO GARANTIZADA','".$NitResponsable."','".strtoupper($NombreResponsabe)."','".strtoupper($ApellidosResponsable)."',(SELECT IdMovimiento FROM movimiento,cliente WHERE movimiento.IdCliente = cliente.IdCliente AND cliente.IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente ='".$NitCliente."' AND cliente.IdClienteTipo = ".$TipoCliente.")ORDER BY IdMovimiento DESC LIMIT 1),(SELECT `IdHabitacion` FROM `habitacion` WHERE NombreHabitacion = '".strtoupper($NombreHabitacion)."'),(SELECT IdProductos FROM productos WHERE NombreProductos = '".strtoupper($TipoDesayuno)."'))";
                                        //echo($InserMovHabitacion);
                                        $ResultInsertMovHabita = $conexion->query($InserMovHabitacion);  
                                    }
                                }
                                if($ResultInsertMovHabita == true)
                                {
                                    echo "GUARDO";
                                }
                                else{
                                    echo "NO GUARDO";
                                } 
                        }
                     break;
            }
        break;

        case 'CargarSelectDepartamento':
                $ComandoSql="SELECT * from departamento";
                $resultado=$conexion->query($ComandoSql);
                $ArrayDepartamentos = array();
                while($fila=$resultado->fetch_array())
                    {
                        $ArrayDepartamentos[]=$fila;
                    }
               echo json_encode($ArrayDepartamentos);
        break;

        case 'CargarSeleccCiudadesConIdDepartamento':
          $IdDepartamento = $_POST['IdDepartamento'];
          
                $ComandoSql="SELECT IdCiudad,NombreCiudad FROM `ciudad` WHERE IdDepartamento = ".$IdDepartamento.";";
                $resultado=$conexion->query($ComandoSql);
                $ArrayCiudades = array();
                while($fila=$resultado->fetch_array())
                    {
                        $ArrayCiudades[]=$fila;
                    }
                echo json_encode($ArrayCiudades);
        break;

       case 'CargarSelectDepartamentoConIdCiuadad':
           $IdCiudad = $_POST['IdCiudad'];
           $ComandoSql="SELECT IdDepartamento FROM `ciudad` WHERE IdCiudad = ".$IdCiudad.";";
           $resultado=$conexion->query($ComandoSql);
           while($fila=$resultado->fetch_array())
               {
                   echo $fila['IdDepartamento'];
               }
       break;

       case 'TraerPorcenjaeTarifa':

             $IdTarifa = $_POST['IdTarifa'];
            //  echo $IdTarifa;
             $ComandoSql="SELECT PorcentajeTarifa FROM `tarifa` WHERE IdTarifa = ".$IdTarifa.";";
            //echo $ComandoSql;
             $Resultado=$conexion->query($ComandoSql);
             $ArrayPorcentajeTarifa = array();
            
              while($filas=$Resultado->fetch_array())
                  {
                     echo $filas[0];       
                  }
                //   echo json_encode($ArrayPorcentajeTarifa);             
        break;

        case 'UpdateMovimiento':
                $IdMovimiento = $_POST['IdMovimiento'];
                $UpdateMovimiento = "UPDATE movimiento SET TipoMovimiento ='CHECK IN' WHERE IdMovimiento = ".$IdMovimiento.";";
                $ResultUpdateMovimiento = $conexion->query($UpdateMovimiento);  
        break;
       
        case 'TraerDatosHuesped':
            $TipoDocumento = $_POST['TipoDocumento'];
            $NumeroDocumento = $_POST['NumeroDocumento'];
            $ComandoSql="SELECT NombreHuesped,ApellidoHuesped,NacionalidadHuesped,FechaNacimientoHuesped FROM `huesped` WHERE NumeroDocumentoHuesped = '".$NumeroDocumento."' AND TipoDocumentoHuesped = '".$TipoDocumento."';";
            //echo $ComandoSql;
            $resultado=$conexion->query($ComandoSql);
            $ArrayHuesped = array();
            while($fila=$resultado->fetch_array())
                {
                    $ArrayHuesped[]=$fila;
                }
            echo json_encode($ArrayHuesped);

            break;
        case 'RegistroMovimiento':
                        $DatosClienteRegistro = $_POST['DatosClienteRegistro'];
                        //  echo "<pre>";
                        //  echo var_dump($DatosClienteRegistro);
                        //  echo "</pre>";
                        
                        $TipoCliente = $conexion->real_escape_string($DatosClienteRegistro["TipoCliente"]);
                        // echo "hola-->".$TipoCliente;
                    switch($TipoCliente)
                    {
                        case '1':
                                $TipoDocumento = $conexion->real_escape_string($DatosClienteRegistro["TipoDocumento"]);
                                $NumeroDocumento = $conexion->real_escape_string($DatosClienteRegistro["NumeroDocumento"]);
                                $Nombre = $conexion->real_escape_string($DatosClienteRegistro["Nombre"]);
                                $Apellido = $conexion->real_escape_string($DatosClienteRegistro["Apellidos"]);
                                $Direccion = $conexion->real_escape_string($DatosClienteRegistro["Direccion"]);
                                $Correo = $conexion->real_escape_string($DatosClienteRegistro["Correo"]);
                                $Telefono1 = $conexion->real_escape_string($DatosClienteRegistro["Telefono1"]);
                                $Telefono2 = $conexion->real_escape_string($DatosClienteRegistro["Telefono2"]);
                                $Preferencias = $conexion->real_escape_string($DatosClienteRegistro["Preferencias"]);
                                // $NumeroCuenta = $conexion->real_escape_string($DatosClienteRegistro["NumeroCuenta"]);
                                $ActividadEconomica = $conexion->real_escape_string($DatosClienteRegistro["ActividadEconomica"]);
                                $Nacionalidad = $conexion->real_escape_string($DatosClienteRegistro["Nacionalidad"]);
                                $Ciudad = $conexion->real_escape_string($DatosClienteRegistro["Ciudad"]);
                                // $CodigoMagico = $conexion->real_escape_string($DatosClienteRegistro["CodigoMagico"]);
                                $TipoPersona = $conexion->real_escape_string($DatosClienteRegistro["TipoPersona"]);
                                $TipoContribuyente = $conexion->real_escape_string($DatosClienteRegistro["TipoContribuyente"]);

                                // Consultar si el Cliente Existe
                                $ComandoSqlConsultarClienteExiste ="SELECT * FROM `cliente`WHERE IdClienteTipo = '".$TipoCliente."' and TipoDocumentoCliente = '".$TipoDocumento."' and NitCliente = '".$NumeroDocumento."'";
                                // echo $ComandoSqlConsultarClienteExiste;
                                $ResultadoClienteExiste =  $conexion->query($ComandoSqlConsultarClienteExiste);

                                $ArrayDatos =  array();
                                while($AlmacenarDatosCliente=$ResultadoClienteExiste->fetch_array())
                                {
                                         $ArrayDatos[]=$AlmacenarDatosCliente;
                                }
                                //  echo $AlmacenarDatosCliente[0];
                                //  echo "<pre>";
                                //  echo var_dump(empty($ArrayDatos[0]));
                                //  echo "</pre>";
                                // el emty verifica si el vector trae algo , si trae algo hagalo == 1 sino hagalo == 0
                                if(empty($ArrayDatos[0]) == 0)
                                    {
                                        $ComandoInsertyUpdate = "UPDATE `cliente` SET `NitCliente`='".$NumeroDocumento."',`TipoDocumentoCliente`= '".$TipoDocumento."',`NombreCliente`='".strtoupper($Nombre)."',`ApellidoCliente`='".strtoupper($Apellido)."',`DireccionCliente`='".strtoupper($Direccion)."',`Telefono1Cliente`='".$Telefono1."',`Telefono2Cliente`='".$Telefono2."',`CorreoCliente`='".strtoupper($Correo)."',`PreferenciasCliente`='".strtoupper($Preferencias)."',`NumeroCuentaCliente`='',`ActividadEconomicaCliente`='".strtoupper($ActividadEconomica)."',`NacionalidadCliente`='".strtoupper($Nacionalidad)."',`CodigoMagicoCliente`='',`IdCiudad`='".$Ciudad."',`IdClienteTipo`=$TipoCliente,`IdPersonaTipo`=$TipoPersona,`IdContribuyenteTipo`=$TipoContribuyente WHERE  NitCliente = '".$NumeroDocumento."' AND TipoDocumentoCliente = '".$TipoDocumento."' AND IdClienteTipo = ".$TipoCliente.";";
                                        //La consulta de abajo es la antiga, ahora se quita el codigo magico, porq lo que se usa es el Id del Cliente

                                        // $ComandoInsertyUpdate = "UPDATE `cliente` SET `NitCliente`='".$NumeroDocumento."',`TipoDocumentoCliente`= '".$TipoDocumento."',`NombreCliente`='".strtoupper($Nombre)."',`ApellidoCliente`='".strtoupper($Apellido)."',`DireccionCliente`='".strtoupper($Direccion)."',`Telefono1Cliente`='".$Telefono1."',`Telefono2Cliente`='".$Telefono2."',`CorreoCliente`='".strtoupper($Correo)."',`PreferenciasCliente`='".strtoupper($Preferencias)."',`NumeroCuentaCliente`='',`ActividadEconomicaCliente`='".strtoupper($ActividadEconomica)."',`NacionalidadCliente`='".strtoupper($Nacionalidad)."',`CodigoMagicoCliente`='".$CodigoMagico."',`IdCiudad`='".$Ciudad."',`IdClienteTipo`=$TipoCliente,`IdPersonaTipo`=$TipoPersona,`IdContribuyenteTipo`=$TipoContribuyente WHERE  NitCliente = '".$NumeroDocumento."' AND TipoDocumentoCliente = '".$TipoDocumento."' AND IdClienteTipo = ".$TipoCliente.";";
                                        // echo $ComandoInsertyUpdate;
                                    }
                                    else
                                    {
                                        $ComandoInsertyUpdate = "INSERT INTO `cliente`(`NitCliente`, `TipoDocumentoCliente`, `NombreCliente`,`ApellidoCliente`, `DireccionCliente`, `Telefono1Cliente`, `Telefono2Cliente`, `CorreoCliente`,`PreferenciasCliente`,`NumeroCuentaCliente`, `ActividadEconomicaCliente`,`NacionalidadCliente`,`CodigoMagicoCliente`, `IdCiudad`,`IdClienteTipo`, `IdPersonaTipo`, `IdContribuyenteTipo`)VALUES ('".$NumeroDocumento."','".$TipoDocumento."','".strtoupper($Nombre)."','".strtoupper($Apellido)."','".strtoupper($Direccion)."','".$Telefono1."','".$Telefono2."','".strtoupper($Correo)."','".strtoupper($Preferencias)."','','".strtoupper($ActividadEconomica)."','".$Nacionalidad."','',".$Ciudad.",".$TipoCliente.",".$TipoPersona.",".$TipoContribuyente.");";
                                        //La consulta de abajo es la antiga, ahora se quita el codigo magico, porq lo que se usa es el Id del Cliente

                                        //$ComandoInsertyUpdate = "INSERT INTO `cliente`(`NitCliente`, `TipoDocumentoCliente`, `NombreCliente`,`ApellidoCliente`, `DireccionCliente`, `Telefono1Cliente`, `Telefono2Cliente`, `CorreoCliente`,`PreferenciasCliente`,`NumeroCuentaCliente`, `ActividadEconomicaCliente`,`NacionalidadCliente`,`CodigoMagicoCliente`, `IdCiudad`,`IdClienteTipo`, `IdPersonaTipo`, `IdContribuyenteTipo`)VALUES ('".$NumeroDocumento."','".$TipoDocumento."','".strtoupper($Nombre)."','".strtoupper($Apellido)."','".strtoupper($Direccion)."','".$Telefono1."','".$Telefono2."','".strtoupper($Correo)."','".strtoupper($Preferencias)."','','".strtoupper($ActividadEconomica)."','".$Nacionalidad."','".$CodigoMagico."',".$Ciudad.",".$TipoCliente.",".$TipoPersona.",".$TipoContribuyente.");";
                                        // echo "no jodas".$ComandoInsertyUpdate;
                                    }
                                    $ResultadoInsertyUpdate =  $conexion->query($ComandoInsertyUpdate);
                                // Fin de consulta, registro y actualizacion
                                if($ResultadoInsertyUpdate == true)
                                {

                                         $TieneReserva = $conexion->real_escape_string($_POST['Reserva']);
                                         if($TieneReserva == 'true'){
                                            
                                             $IdMovimiento = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);
                                             $ComandoUpdateMovimientoHabitacion = "UPDATE `movimientohabitacion` SET `FechaEntradaMovimientoHabitacion`= (SELECT NOW()),`FechaSalidaMovimientoHabitacion`=(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),`EstadoMovimientoHabitacion`='ACTIVO',`TipoMovimientoHabitacion`='CHECK IN' WHERE IdMovimientoHabitacion =".$IdMovimiento.";";
                                             //echo $ComandoUpdateMovimientoHabitacion;
                                             $ResultadoUpdateMovimientoHabitacion =  $conexion->query($ComandoUpdateMovimientoHabitacion);
                                            
                                             if($ResultadoUpdateMovimientoHabitacion == true){
                                                
                                                 $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO',(SELECT CONCAT(NombreResponsableMovimientoHabitacion,' ',ApellidoResponsableMovimientoHabitacion) AS NOMBRECOMPLETO FROM movimientohabitacion WHERE IdMovimientoHabitacion = ".$IdMovimiento."),'TITULAR',0,".$IdMovimiento.")";
                                                 $ResultadoInsertFolio = $conexion->query($InsertFolio);
                                                
                                                 echo "ACTUALIZOMOVIMIENTOHABITACION";
                                             }else{
                                                 echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                             }
                                         
                                         }
                                         else
                                         {
                                             //datos del usuario
                                             $IdUsuario = $_SESSION['IdUsuario'];
                                            
                                             //Datos Registro
                                             // el IdMovimiento es 0 por defecto
                                             $IdMovimientoHabitacion = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);
                                            
                                             $EstadoRegistro = $conexion->real_escape_string($_POST["EstadoRegistro"]);
                                             $FechaEntradaRegistro = $conexion->real_escape_string($_POST["FechaEntradaRegistro"]);
                                             $FechaSalidaRegistro = $conexion->real_escape_string($_POST["FechaSalidaRegistro"]);
                                             $TarifaRegistro = $conexion->real_escape_string($_POST["TarifaRegistro"]);
                                             $MotivoViajeRegistro = $conexion->real_escape_string($_POST["MotivoViajeRegistro"]);
                                             $TipoTransporteRegistro = $conexion->real_escape_string($_POST["TipoTransporteRegistro"]);
                                             $ObservacionesRegistro = $conexion->real_escape_string($_POST["ObservacionesRegistro"]);
                                            
                                             //Datos MovimientoHabitacion
                                             $NombreHabitacion = $conexion->real_escape_string($_POST["NombreHabitacion"]);
                                             $CantidadAdultos = $conexion->real_escape_string($_POST["CantidadAdultos"]);
                                             $CantidadNinos = $conexion->real_escape_string($_POST["CantidadNinos"]);
                                             $DesayunoNombre = $conexion->real_escape_string($_POST["DesayunoNombre"]);
                                             $ValorEstadiaMovimiento = $conexion->real_escape_string($_POST["ValorEstadiaMovimiento"]);
                                             $NitResponsableMovimientoHabitacion = $conexion->real_escape_string($_POST["NitResponsableMovimientoHabitacion"]);
                                             $NombreResponsableMovimientoHab = $conexion->real_escape_string($_POST["NombreResponsableMovimientoHab"]);
                                             $ApellidoResponsableMovimientoHab = $conexion->real_escape_string($_POST["ApellidoResponsableMovimientoHab"]);
                                             $ObservacionesMovimientoHab = $conexion->real_escape_string($_POST["ObservacionesMovimientoHab"]);
                                            
                                             $InsertMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`, `FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`,`TipoTransporteMovimiento`,`CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`,`ValorTotalMovimiento`, `IdTarifa`, `IdCliente`, `IdUsuario`) VALUES ('CHECK IN','".$EstadoRegistro."','0',(SELECT NOW()),'".$FechaEntradaRegistro."','".$FechaSalidaRegistro."','".strtoupper($ObservacionesRegistro)."','".$MotivoViajeRegistro."','".$TipoTransporteRegistro."','".$CantidadAdultos."','".$CantidadNinos."','".$ValorEstadiaMovimiento."',".$TarifaRegistro.",(SELECT IdCliente FROM `cliente`WHERE IdClienteTipo = ".$TipoCliente." AND TipoDocumentoCliente = '".$TipoDocumento."' AND NitCliente = '".$NumeroDocumento."'),".$IdUsuario.")";
                                             $ResultadoIngresarMovimiento =  $conexion->query($InsertMovimiento);
                                            //  echo $InsertMovimiento."     ";
                                            
                                             if($ResultadoIngresarMovimiento == true)
                                             {
                                                 $InsertMovimientoHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`, `ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`, `CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`, `ApellidoResponsableMovimientoHabitacion`,`IdMovimiento`,`IdHabitacion`,`IdDesayuno`) VALUES ('".$FechaEntradaRegistro."',(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),'".strtoupper($ObservacionesMovimientoHab)."','0','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','CHECK IN','".$NitResponsableMovimientoHabitacion."','".strtoupper($NombreResponsableMovimientoHab)."','".strtoupper($ApellidoResponsableMovimientoHab)."',(SELECT IdMovimiento FROM movimiento WHERE IdCliente = (SELECT IdCliente FROM `cliente`WHERE IdClienteTipo = ".$TipoCliente."  AND TipoDocumentoCliente = '".$TipoDocumento."' AND NitCliente = '".$NumeroDocumento."') ORDER BY IdMovimiento DESC LIMIT 1),(SELECT IdHabitacion FROM `habitacion` WHERE NombreHabitacion = '".strtoupper($NombreHabitacion)."'),(SELECT IdProductos FROM `productos` WHERE NombreProductos = '".strtoupper($DesayunoNombre)."'))";
                                                 $ResultadoInsertMovimientoHabitacion =  $conexion->query($InsertMovimientoHabitacion);
                                                 //echo $InserMovHabitacion;
                                                
                                                 if($ResultadoInsertMovimientoHabitacion == true){
                                                    
                                                     $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO','".$NombreResponsableMovimientoHab." ".$ApellidoResponsableMovimientoHab."','TITULAR',0,(SELECT IdMovimientoHabitacion FROM movimientohabitacion WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion = '".$NombreHabitacion."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1))";
                                                     $ResultadoInsertFolio = $conexion->query($InsertFolio);
                                                    
                                                     echo "ACTUALIZOMOVIMIENTOHABITACION";
                                                 }else{
                                                     echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                                 }
                                             }
                                             else
                                             {
                                                 echo "NO";
                                             }
                                    }
                                }
                                else
                                {
                                    echo "NO 2";
                                }
                                
                            break;
                        case '2':
                                $Convenio = $conexion->real_escape_string($DatosClienteRegistro["Convenio"]);
                                if($Convenio == 'true')
                                {
                                    $IdCliente = $conexion->real_escape_string($DatosClienteRegistro["IdCliente"]);

                                    $ConsultaSiExiste = "SELECT * FROM `cliente` WHERE IdCliente = ".$IdCliente.";";
                                    $ResultadoCorportavioEiste = $conexion->query($ConsultaSiExiste);
                                    if($ResultadoCorportavioEiste == true)
                                    {
                                        $TieneReserva = $conexion->real_escape_string($_POST['Reserva']);
                                        if($TieneReserva == 'true'){
                                    
                                            $IdMovimiento = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);
                                            $ComandoUpdateMovimientoHabitacion = "UPDATE `movimientohabitacion` SET `FechaEntradaMovimientoHabitacion`= (SELECT NOW()),`FechaSalidaMovimientoHabitacion`=(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),`EstadoMovimientoHabitacion`='ACTIVO',`TipoMovimientoHabitacion`='CHECK IN' WHERE IdMovimientoHabitacion =".$IdMovimiento.";";
                                            //echo $ComandoUpdateMovimientoHabitacion;
                                            $ResultadoUpdateMovimientoHabitacion =  $conexion->query($ComandoUpdateMovimientoHabitacion);
                                            
                                            if($ResultadoUpdateMovimientoHabitacion == true){
                                               
                                                $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO',(SELECT CONCAT(NombreResponsableMovimientoHabitacion,' ',ApellidoResponsableMovimientoHabitacion) AS NOMBRECOMPLETO FROM movimientohabitacion WHERE IdMovimientoHabitacion = ".$IdMovimiento."),'TITULAR',0,".$IdMovimiento.")";
                                                $ResultadoInsertFolio = $conexion->query($InsertFolio);
                                                
                                                echo "ACTUALIZOMOVIMIENTOHABITACION";
                                            }else{
                                                echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                            }
        
                                        }
                                        else {
                                                        //datos del usuario
                                                        $IdUsuario = $_SESSION['IdUsuario'];

                                                        //Datos Registro
                                                        // el IdMovimiento es 0 por defecto
                                                        $IdMovimientoHabitacion = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);

                                                        $EstadoRegistro = $conexion->real_escape_string($_POST["EstadoRegistro"]);
                                                        $FechaEntradaRegistro = $conexion->real_escape_string($_POST["FechaEntradaRegistro"]);
                                                        $FechaSalidaRegistro = $conexion->real_escape_string($_POST["FechaSalidaRegistro"]);
                                                        $TarifaRegistro = $conexion->real_escape_string($_POST["TarifaRegistro"]);
                                                        $MotivoViajeRegistro = $conexion->real_escape_string($_POST["MotivoViajeRegistro"]);
                                                        $TipoTransporteRegistro = $conexion->real_escape_string($_POST["TipoTransporteRegistro"]);
                                                        $ObservacionesRegistro = $conexion->real_escape_string($_POST["ObservacionesRegistro"]);

                                                        //Datos MovimientoHabitacion
                                                        $NombreHabitacion = $conexion->real_escape_string($_POST["NombreHabitacion"]);
                                                        $CantidadAdultos = $conexion->real_escape_string($_POST["CantidadAdultos"]);
                                                        $CantidadNinos = $conexion->real_escape_string($_POST["CantidadNinos"]);
                                                        $DesayunoNombre = $conexion->real_escape_string($_POST["DesayunoNombre"]);
                                                        $ValorEstadiaMovimiento = $conexion->real_escape_string($_POST["ValorEstadiaMovimiento"]);
                                                        $NitResponsableMovimientoHabitacion = $conexion->real_escape_string($_POST["NitResponsableMovimientoHabitacion"]);
                                                        $NombreResponsableMovimientoHab = $conexion->real_escape_string($_POST["NombreResponsableMovimientoHab"]);
                                                        $ApellidoResponsableMovimientoHab = $conexion->real_escape_string($_POST["ApellidoResponsableMovimientoHab"]);
                                                        $ObservacionesMovimientoHab = $conexion->real_escape_string($_POST["ObservacionesMovimientoHab"]);

                                                        $InsertMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`, `FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`,`TipoTransporteMovimiento`,`CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`,`ValorTotalMovimiento`, `IdTarifa`, `IdCliente`, `IdUsuario`) VALUES ('CHECK IN','".$EstadoRegistro."','0',(SELECT NOW()),'".$FechaEntradaRegistro."','".$FechaSalidaRegistro."','".$ObservacionesRegistro."','".$MotivoViajeRegistro."','".$TipoTransporteRegistro."','".$CantidadAdultos."','".$CantidadNinos."','".$ValorEstadiaMovimiento."',".$TarifaRegistro.",".$IdCliente.",".$IdUsuario.")";
                                                        $ResultadoIngresarMovimiento =  $conexion->query($InsertMovimiento);
                                                        //echo $InsertMovimiento;

                                                        if($ResultadoIngresarMovimiento == true)
                                                        {
                                                            $InsertMovimientoHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`, `ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`, `CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`, `ApellidoResponsableMovimientoHabitacion`,`IdMovimiento`,`IdHabitacion`,`IdDesayuno`) VALUES ('".$FechaEntradaRegistro."',(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),'".$ObservacionesMovimientoHab."','0','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','CHECK IN','".$NitResponsableMovimientoHabitacion."','".$NombreResponsableMovimientoHab."','".$ApellidoResponsableMovimientoHab."',(SELECT IdMovimiento FROM movimiento WHERE IdCliente = '".$IdCliente."' ORDER BY IdMovimiento DESC LIMIT 1),(SELECT IdHabitacion FROM `habitacion` WHERE NombreHabitacion = '".$NombreHabitacion."'),(SELECT IdProductos FROM `productos` WHERE NombreProductos = '".$DesayunoNombre."'))";
                                                            $ResultadoInsertMovimientoHabitacion =  $conexion->query($InsertMovimientoHabitacion);
                                                            //echo $InserMovHabitacion;
                                                        
                                                            if($ResultadoInsertMovimientoHabitacion == true){

                                                                    $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO','".$NombreResponsableMovimientoHab." ".$ApellidoResponsableMovimientoHab."','TITULAR',0,(SELECT IdMovimientoHabitacion FROM movimientohabitacion WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion = '".$NombreHabitacion."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1))";
                                                                    $ResultadoInsertFolio = $conexion->query($InsertFolio);

                                                                echo "ACTUALIZOMOVIMIENTOHABITACION";
                                                            }else{
                                                                echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                                            }
                                                        }
                                        }
                                    }
                                }
                                else
                                {
                                    $Nit = $conexion->real_escape_string($DatosClienteRegistro["NitCorportaivo"]);
                                    $NombreCliente = $conexion->real_escape_string($DatosClienteRegistro["NombreCorporativo"]);


                                    $ConsultaSiExiste = "SELECT * FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$Nit."'";
                                    $ResultadoCorportavioEiste = $conexion->query($ConsultaSiExiste);
                                    if($ResultadoCorportavioEiste == true)
                                    {
                                        $TieneReserva = $conexion->real_escape_string($_POST['Reserva']);
                                        if($TieneReserva == 'true'){
                                    
                                            $IdMovimiento = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);
                                            $ComandoUpdateMovimientoHabitacion = "UPDATE `movimientohabitacion` SET `FechaEntradaMovimientoHabitacion`= (SELECT NOW()),`FechaSalidaMovimientoHabitacion`=(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),`EstadoMovimientoHabitacion`='ACTIVO',`TipoMovimientoHabitacion`='CHECK IN' WHERE IdMovimientoHabitacion =".$IdMovimiento.";";
                                            //echo $ComandoUpdateMovimientoHabitacion;
                                            $ResultadoUpdateMovimientoHabitacion =  $conexion->query($ComandoUpdateMovimientoHabitacion);
                                            
                                            if($ResultadoUpdateMovimientoHabitacion == true){

                                                        $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO',(SELECT CONCAT(NombreResponsableMovimientoHabitacion,' ',ApellidoResponsableMovimientoHabitacion) AS NOMBRECOMPLETO FROM movimientohabitacion WHERE IdMovimientoHabitacion = ".$IdMovimiento."),'TITULAR',0,".$IdMovimiento.")";
                                                        $ResultadoInsertFolio = $conexion->query($InsertFolio);
                                                echo "ACTUALIZOMOVIMIENTOHABITACION";
                                            }else{
                                                echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                            }
        
                                        }
                                        else {
                                                        //datos del usuario
                                                        $IdUsuario = $_SESSION['IdUsuario'];

                                                        //Datos Registro
                                                        // el IdMovimiento es 0 por defecto
                                                        $IdMovimientoHabitacion = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);

                                                        $EstadoRegistro = $conexion->real_escape_string($_POST["EstadoRegistro"]);
                                                        $FechaEntradaRegistro = $conexion->real_escape_string($_POST["FechaEntradaRegistro"]);
                                                        $FechaSalidaRegistro = $conexion->real_escape_string($_POST["FechaSalidaRegistro"]);
                                                        $TarifaRegistro = $conexion->real_escape_string($_POST["TarifaRegistro"]);
                                                        $MotivoViajeRegistro = $conexion->real_escape_string($_POST["MotivoViajeRegistro"]);
                                                        $TipoTransporteRegistro = $conexion->real_escape_string($_POST["TipoTransporteRegistro"]);
                                                        $ObservacionesRegistro = $conexion->real_escape_string($_POST["ObservacionesRegistro"]);

                                                        //Datos MovimientoHabitacion
                                                        $NombreHabitacion = $conexion->real_escape_string($_POST["NombreHabitacion"]);
                                                        $CantidadAdultos = $conexion->real_escape_string($_POST["CantidadAdultos"]);
                                                        $CantidadNinos = $conexion->real_escape_string($_POST["CantidadNinos"]);
                                                        $DesayunoNombre = $conexion->real_escape_string($_POST["DesayunoNombre"]);
                                                        $ValorEstadiaMovimiento = $conexion->real_escape_string($_POST["ValorEstadiaMovimiento"]);
                                                        $NitResponsableMovimientoHabitacion = $conexion->real_escape_string($_POST["NitResponsableMovimientoHabitacion"]);
                                                        $NombreResponsableMovimientoHab = $conexion->real_escape_string($_POST["NombreResponsableMovimientoHab"]);
                                                        $ApellidoResponsableMovimientoHab = $conexion->real_escape_string($_POST["ApellidoResponsableMovimientoHab"]);
                                                        $ObservacionesMovimientoHab = $conexion->real_escape_string($_POST["ObservacionesMovimientoHab"]);

                                                        $InsertMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`, `FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`,`TipoTransporteMovimiento`,`CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`,`ValorTotalMovimiento`, `IdTarifa`, `IdCliente`, `IdUsuario`) VALUES ('CHECK IN','".$EstadoRegistro."','0',(SELECT NOW()),'".$FechaEntradaRegistro."','".$FechaSalidaRegistro."','".$ObservacionesRegistro."','".$MotivoViajeRegistro."','".$TipoTransporteRegistro."','".$CantidadAdultos."','".$CantidadNinos."','".$ValorEstadiaMovimiento."',".$TarifaRegistro.",(SELECT IdCliente FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$Nit."'),".$IdUsuario.")";
                                                        $ResultadoIngresarMovimiento =  $conexion->query($InsertMovimiento);
                                                        // echo "1       ".$InsertMovimiento;

                                                        if($ResultadoIngresarMovimiento == true)
                                                        {
                                                            $InsertMovimientoHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`, `ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`, `CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`, `ApellidoResponsableMovimientoHabitacion`,`IdMovimiento`,`IdHabitacion`,`IdDesayuno`) VALUES ('".$FechaEntradaRegistro."',(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),'".$ObservacionesMovimientoHab."','0','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','CHECK IN','".$NitResponsableMovimientoHabitacion."','".$NombreResponsableMovimientoHab."','".$ApellidoResponsableMovimientoHab."',(SELECT IdMovimiento FROM movimiento WHERE IdCliente = (SELECT IdCliente FROM `cliente`WHERE IdClienteTipo = ".$TipoCliente."  AND NitCliente = '".$Nit."') ORDER BY IdMovimiento DESC LIMIT 1),(SELECT IdHabitacion FROM `habitacion` WHERE NombreHabitacion = '".$NombreHabitacion."'),(SELECT IdProductos FROM `productos` WHERE NombreProductos = '".$DesayunoNombre."'))";
                                                            $ResultadoInsertMovimientoHabitacion =  $conexion->query($InsertMovimientoHabitacion);
                                                            //echo $InserMovHabitacion;
                                                        
                                                            if($ResultadoInsertMovimientoHabitacion == true){

                                                                $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO','".$NombreResponsableMovimientoHab." ".$ApellidoResponsableMovimientoHab."','TITULAR',0,(SELECT IdMovimientoHabitacion FROM movimientohabitacion WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion = '".$NombreHabitacion."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1))";
                                                                $ResultadoInsertFolio = $conexion->query($InsertFolio);

                                                                echo "ACTUALIZOMOVIMIENTOHABITACION";
                                                            }else{
                                                                echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                                            }
                                                        }
                                        }
                                    }

                                }
                            break;
                            case '3':
                                $Convenio = $conexion->real_escape_string($DatosClienteRegistro["Convenio"]);
                                if($Convenio == 'true')
                                {
                                    $IdCliente = $conexion->real_escape_string($DatosClienteRegistro["IdCliente"]);

                                    $ConsultaSiExiste = "SELECT * FROM `cliente` WHERE IdCliente = ".$IdCliente.";";
                                    $ResultadoCorportavioEiste = $conexion->query($ConsultaSiExiste);
                                    if($ResultadoCorportavioEiste == true)
                                    {
                                        $TieneReserva = $conexion->real_escape_string($_POST['Reserva']);
                                        if($TieneReserva == 'true'){
                                        
                                            $IdMovimiento = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);
                                            $ComandoUpdateMovimientoHabitacion = "UPDATE `movimientohabitacion` SET `FechaEntradaMovimientoHabitacion`= (SELECT NOW()),`FechaSalidaMovimientoHabitacion`=(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),`EstadoMovimientoHabitacion`='ACTIVO',`TipoMovimientoHabitacion`='CHECK IN' WHERE IdMovimientoHabitacion =".$IdMovimiento.";";
                                            //echo $ComandoUpdateMovimientoHabitacion;
                                            $ResultadoUpdateMovimientoHabitacion =  $conexion->query($ComandoUpdateMovimientoHabitacion);

                                            if($ResultadoUpdateMovimientoHabitacion == true){
                                                        $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO',(SELECT CONCAT(NombreResponsableMovimientoHabitacion,' ',ApellidoResponsableMovimientoHabitacion) AS NOMBRECOMPLETO FROM movimientohabitacion WHERE IdMovimientoHabitacion = ".$IdMovimiento."),'TITULAR',0,".$IdMovimiento.")";
                                                        $ResultadoInsertFolio = $conexion->query($InsertFolio);
                                                echo "ACTUALIZOMOVIMIENTOHABITACION";
                                            }else{
                                                echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                            }
                                        
                                        }
                                        else {
                                                        //datos del usuario
                                                        $IdUsuario = $_SESSION['IdUsuario'];

                                                        //Datos Registro
                                                        // el IdMovimiento es 0 por defecto
                                                        $IdMovimientoHabitacion = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);

                                                        $EstadoRegistro = $conexion->real_escape_string($_POST["EstadoRegistro"]);
                                                        $FechaEntradaRegistro = $conexion->real_escape_string($_POST["FechaEntradaRegistro"]);
                                                        $FechaSalidaRegistro = $conexion->real_escape_string($_POST["FechaSalidaRegistro"]);
                                                        $TarifaRegistro = $conexion->real_escape_string($_POST["TarifaRegistro"]);
                                                        $MotivoViajeRegistro = $conexion->real_escape_string($_POST["MotivoViajeRegistro"]);
                                                        $TipoTransporteRegistro = $conexion->real_escape_string($_POST["TipoTransporteRegistro"]);
                                                        $ObservacionesRegistro = $conexion->real_escape_string($_POST["ObservacionesRegistro"]);

                                                        //Datos MovimientoHabitacion
                                                        $NombreHabitacion = $conexion->real_escape_string($_POST["NombreHabitacion"]);
                                                        $CantidadAdultos = $conexion->real_escape_string($_POST["CantidadAdultos"]);
                                                        $CantidadNinos = $conexion->real_escape_string($_POST["CantidadNinos"]);
                                                        $DesayunoNombre = $conexion->real_escape_string($_POST["DesayunoNombre"]);
                                                        $ValorEstadiaMovimiento = $conexion->real_escape_string($_POST["ValorEstadiaMovimiento"]);
                                                        $NitResponsableMovimientoHabitacion = $conexion->real_escape_string($_POST["NitResponsableMovimientoHabitacion"]);
                                                        $NombreResponsableMovimientoHab = $conexion->real_escape_string($_POST["NombreResponsableMovimientoHab"]);
                                                        $ApellidoResponsableMovimientoHab = $conexion->real_escape_string($_POST["ApellidoResponsableMovimientoHab"]);
                                                        $ObservacionesMovimientoHab = $conexion->real_escape_string($_POST["ObservacionesMovimientoHab"]);

                                                        $InsertMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`, `FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`,`TipoTransporteMovimiento`,`CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`,`ValorTotalMovimiento`, `IdTarifa`, `IdCliente`, `IdUsuario`) VALUES ('CHECK IN','".$EstadoRegistro."','0',(SELECT NOW()),'".$FechaEntradaRegistro."','".$FechaSalidaRegistro."','".$ObservacionesRegistro."','".$MotivoViajeRegistro."','".$TipoTransporteRegistro."','".$CantidadAdultos."','".$CantidadNinos."','".$ValorEstadiaMovimiento."',".$TarifaRegistro.",".$IdCliente.",".$IdUsuario.")";
                                                        $ResultadoIngresarMovimiento =  $conexion->query($InsertMovimiento);
                                                        //echo $InsertMovimiento;

                                                        if($ResultadoIngresarMovimiento == true)
                                                        {
                                                            $InsertMovimientoHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`, `ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`, `CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`, `ApellidoResponsableMovimientoHabitacion`,`IdMovimiento`,`IdHabitacion`,`IdDesayuno`) VALUES ('".$FechaEntradaRegistro."',(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),'".$ObservacionesMovimientoHab."','0','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','CHECK IN','".$NitResponsableMovimientoHabitacion."','".$NombreResponsableMovimientoHab."','".$ApellidoResponsableMovimientoHab."',(SELECT IdMovimiento FROM movimiento WHERE IdCliente = '".$IdCliente."' ORDER BY IdMovimiento DESC LIMIT 1),(SELECT IdHabitacion FROM `habitacion` WHERE NombreHabitacion = '".$NombreHabitacion."'),(SELECT IdProductos FROM `productos` WHERE NombreProductos = '".$DesayunoNombre."'))";
                                                            $ResultadoInsertMovimientoHabitacion =  $conexion->query($InsertMovimientoHabitacion);
                                                            //echo $InserMovHabitacion;
                                                        
                                                            if($ResultadoInsertMovimientoHabitacion == true){

                                                                        $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO','".$NombreResponsableMovimientoHab." ".$ApellidoResponsableMovimientoHab."','TITULAR',0,(SELECT IdMovimientoHabitacion FROM movimientohabitacion WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion = '".$NombreHabitacion."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1))";
                                                                        $ResultadoInsertFolio = $conexion->query($InsertFolio);
                                                                echo "ACTUALIZOMOVIMIENTOHABITACION";
                                                            }else{
                                                                echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                                            }
                                                        }
                                        }
                                    }
                                }
                                else
                                {
                                    $Nit = $conexion->real_escape_string($DatosClienteRegistro["NitCorportaivo"]);
                                    $NombreCliente = $conexion->real_escape_string($DatosClienteRegistro["NombreCorporativo"]);


                                    $ConsultaSiExiste = "SELECT * FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$Nit."'";
                                    $ResultadoCorportavioEiste = $conexion->query($ConsultaSiExiste);
                                    if($ResultadoCorportavioEiste == true)
                                    {
                                        $TieneReserva = $conexion->real_escape_string($_POST['Reserva']);
                                        if($TieneReserva == 'true'){
                                        
                                            $IdMovimiento = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);
                                            $ComandoUpdateMovimientoHabitacion = "UPDATE `movimientohabitacion` SET `FechaEntradaMovimientoHabitacion`= (SELECT NOW()),`FechaSalidaMovimientoHabitacion`=(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),`EstadoMovimientoHabitacion`='ACTIVO',`TipoMovimientoHabitacion`='CHECK IN' WHERE IdMovimientoHabitacion =".$IdMovimiento.";";
                                            //echo $ComandoUpdateMovimientoHabitacion;
                                            $ResultadoUpdateMovimientoHabitacion =  $conexion->query($ComandoUpdateMovimientoHabitacion);

                                            if($ResultadoUpdateMovimientoHabitacion == true){

                                                        $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO',(SELECT CONCAT(NombreResponsableMovimientoHabitacion,' ',ApellidoResponsableMovimientoHabitacion) AS NOMBRECOMPLETO FROM movimientohabitacion WHERE IdMovimientoHabitacion = ".$IdMovimiento."),'TITULAR',0,".$IdMovimiento.")";
                                                        $ResultadoInsertFolio = $conexion->query($InsertFolio);

                                                echo "ACTUALIZOMOVIMIENTOHABITACION";
                                            }else{
                                                echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                            }
                                        
                                        }
                                        else {
                                                    //datos del usuario
                                                    $IdUsuario = $_SESSION['IdUsuario'];
                                    
                                                    //Datos Registro
                                                    // el IdMovimiento es 0 por defecto
                                                    $IdMovimientoHabitacion = $conexion->real_escape_string($_POST["IdMovimientoHabitacion"]);
                                    
                                                    $EstadoRegistro = $conexion->real_escape_string($_POST["EstadoRegistro"]);
                                                    $FechaEntradaRegistro = $conexion->real_escape_string($_POST["FechaEntradaRegistro"]);
                                                    $FechaSalidaRegistro = $conexion->real_escape_string($_POST["FechaSalidaRegistro"]);
                                                    $TarifaRegistro = $conexion->real_escape_string($_POST["TarifaRegistro"]);
                                                    $MotivoViajeRegistro = $conexion->real_escape_string($_POST["MotivoViajeRegistro"]);
                                                    $TipoTransporteRegistro = $conexion->real_escape_string($_POST["TipoTransporteRegistro"]);
                                                    $ObservacionesRegistro = $conexion->real_escape_string($_POST["ObservacionesRegistro"]);
                                    
                                                    //Datos MovimientoHabitacion
                                                    $NombreHabitacion = $conexion->real_escape_string($_POST["NombreHabitacion"]);
                                                    $CantidadAdultos = $conexion->real_escape_string($_POST["CantidadAdultos"]);
                                                    $CantidadNinos = $conexion->real_escape_string($_POST["CantidadNinos"]);
                                                    $DesayunoNombre = $conexion->real_escape_string($_POST["DesayunoNombre"]);
                                                    $ValorEstadiaMovimiento = $conexion->real_escape_string($_POST["ValorEstadiaMovimiento"]);
                                                    $NitResponsableMovimientoHabitacion = $conexion->real_escape_string($_POST["NitResponsableMovimientoHabitacion"]);
                                                    $NombreResponsableMovimientoHab = $conexion->real_escape_string($_POST["NombreResponsableMovimientoHab"]);
                                                    $ApellidoResponsableMovimientoHab = $conexion->real_escape_string($_POST["ApellidoResponsableMovimientoHab"]);
                                                    $ObservacionesMovimientoHab = $conexion->real_escape_string($_POST["ObservacionesMovimientoHab"]);
                                    
                                                    $InsertMovimiento = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`, `FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`,`TipoTransporteMovimiento`,`CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`,`ValorTotalMovimiento`, `IdTarifa`, `IdCliente`, `IdUsuario`) VALUES ('CHECK IN','".$EstadoRegistro."','0',(SELECT NOW()),'".$FechaEntradaRegistro."','".$FechaSalidaRegistro."','".$ObservacionesRegistro."','".$MotivoViajeRegistro."','".$TipoTransporteRegistro."','".$CantidadAdultos."','".$CantidadNinos."','".$ValorEstadiaMovimiento."',".$TarifaRegistro.",(SELECT IdCliente FROM `cliente` WHERE IdClienteTipo = ".$TipoCliente." AND NitCliente = '".$Nit."'),".$IdUsuario.")";
                                                    $ResultadoIngresarMovimiento =  $conexion->query($InsertMovimiento);
                                                    //echo $InsertMovimiento;
                                    
                                                    if($ResultadoIngresarMovimiento == true)
                                                    {
                                                        $InsertMovimientoHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`,`FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`, `ValorPenalizacionMovimientoHabitacion`,`EstadoPenalizacionMovimientoHabitacion`, `CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`,`EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`,`NombreResponsableMovimientoHabitacion`, `ApellidoResponsableMovimientoHabitacion`,`IdMovimiento`,`IdHabitacion`,`IdDesayuno`) VALUES ('".$FechaEntradaRegistro."',(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),'".$ObservacionesMovimientoHab."','0','INACTIVO','".$CantidadAdultos."','".$CantidadNinos."','ACTIVO','CHECK IN','".$NitResponsableMovimientoHabitacion."','".$NombreResponsableMovimientoHab."','".$ApellidoResponsableMovimientoHab."',(SELECT IdMovimiento FROM movimiento WHERE IdCliente = (SELECT IdCliente FROM `cliente`WHERE IdClienteTipo = ".$TipoCliente."  AND NitCliente = '".$Nit."') ORDER BY IdMovimiento DESC LIMIT 1),(SELECT IdHabitacion FROM `habitacion` WHERE NombreHabitacion = '".$NombreHabitacion."'),(SELECT IdProductos FROM `productos` WHERE NombreProductos = '".$DesayunoNombre."'))";
                                                        $ResultadoInsertMovimientoHabitacion =  $conexion->query($InsertMovimientoHabitacion);
                                                        //echo $InserMovHabitacion;
                                                    
                                                        if($ResultadoInsertMovimientoHabitacion == true){

                                                                    $InsertFolio = "INSERT INTO `folio`(`FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES ((SELECT NOW()),'ACTIVO','".$NombreResponsableMovimientoHab." ".$ApellidoResponsableMovimientoHab."','TITULAR',0,(SELECT IdMovimientoHabitacion FROM movimientohabitacion WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion = '".$NombreHabitacion."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1))";
                                                                    $ResultadoInsertFolio = $conexion->query($InsertFolio);
                                                            echo "ACTUALIZOMOVIMIENTOHABITACION";
                                                        }else{
                                                            echo "NOACTUALIZOMOVIMIENTOHABITACION";
                                                        }
                                                    }
                                        }
                                    }

                                }
                            break;
                    }
             break;

        case "RegistrarHuespedes":
             
                $TieneReserva = $_POST['Reserva'];
                $contador=0;
                $registrados=0;
                
                $IdMovmientoHabitacion = $_POST['IdMovimientoHabitacion'];
                
                $HuespedTipoDocumento=$_POST['HuespedTipoDocumento'];
                $ValoresTotales=count($HuespedTipoDocumento);
                // echo $ValoresTotales;

                $TipoHuesped = $_POST['HuespedTipo'];
                $HuespedId=$_POST['HuespedId'];
                $HuespedNombre=$_POST['HuespedNombre'];
                $HuespedApellido=$_POST['HuespedApellido'];
                $HuespedNacionalidad=$_POST['HuespedNacionalidad'];
                $HuespedFechaNaciento=$_POST['HuespedFechaNaciento']; 
                $HuespedSeguro=$_POST['HuespedSeguro']; 

                $HuespedObservaciones=$_POST['Observaciones'];
                 
                //  echo "<pre>";
                //  var_dump($HuespedId);
                //  echo "</pre>";
                //  echo "<br>"."\n";
                // echo "<pre>";
                // var_dump($HuespedObservaciones);
                // echo "</pre>";


                 for($i=0;$i<$ValoresTotales;$i++)
                 {
                    //  echo "posicion    ".$i."   Observaciones   ".$conexion->real_escape_string($HuespedObservaciones[$i])."<br>";  
                     $TipoHuespe = $conexion->real_escape_string($TipoHuesped[$i]);
                     $Cedula=$conexion->real_escape_string($HuespedId[$i]);
                     $TipoDocumento=$conexion->real_escape_string($HuespedTipoDocumento[$i]);        
                     $Documento=$conexion->real_escape_string($HuespedId[$i]);
                     $Nombre=$conexion->real_escape_string($HuespedNombre[$i]);
                     $Apellido=$conexion->real_escape_string($HuespedApellido[$i]);
                     $Nacionalidad=$conexion->real_escape_string($HuespedNacionalidad[$i]);
                     $Nacimiento=$conexion->real_escape_string($HuespedFechaNaciento[$i]);
                     $Seguro=$conexion->real_escape_string($HuespedSeguro[$i]);
                     //$HuespedObservaciones=$conexion->real_escape_string($HuespedObservaciones[$i]);
                     $HuespedObservacion = $conexion->real_escape_string($HuespedObservaciones[$i])."";

                    //  echo $TipoHuespe. "\n";
                    //  echo $Cedula. "\n";
                    //  echo $TipoDocumento. "\n";
                    //  echo $Documento. "\n";
                    //  echo $Nombre. "\n";
                    //  echo $Apellido. "\n";
                    //  echo $Nacionalidad. "\n";
                    //  echo $Nacimiento. "\n";
                    //  echo $Seguro. "\n";
                      //echo $HuespedObservaciones. "\n";
                 

                         if($TipoHuespe == "" || $TipoDocumento=="" || $Documento=="" || $Nombre==""  || $Apellido=="" || $Nacionalidad=="" || $Nacimiento=="" )
                         {
                             echo "FALTAN";
                             exit();
                         }
                         else
                         {     
                                $HuespedExiste ="SELECT NombreHuesped,ApellidoHuesped,NacionalidadHuesped,FechaNacimientoHuesped FROM `huesped` WHERE NumeroDocumentoHuesped = '".$Cedula."' AND TipoDocumentoHuesped = '".$TipoDocumento."';";
                                //echo $HuespedExiste;
                                $ResultadoHuespedExiste=$conexion->query($HuespedExiste);
                                $ArrayHuesped = array();
                                while($fila=$ResultadoHuespedExiste->fetch_array())
                                    {
                                        $ArrayHuesped[]=$fila;
                                    }
                                /* echo "<pre>";
                                echo var_dump($ArrayHuesped); 
                                echo "</pre>"; */
                                $InsertHuespedYUpdate = "";
                                if(empty($ArrayHuesped[0]) == 1)
                                {
                                    if($IdMovmientoHabitacion == '0')
                                    {
                                        if($Seguro == "SI"){
                                            // echo "entre al IDmOvimiento hab = 0";
                                            $NombreHabitacion = $conexion->real_escape_string($_POST['NombreHabitacion']);
                                            // echo "entre al on, el nombre de la habitacion es: ".$NombreHabitacion;
                                            $InsertHuespedYUpdate = "INSERT INTO `huesped`(`NumeroDocumentoHuesped`, `NombreHuesped`, `ApellidoHuesped`,`NacionalidadHuesped`, `TipoDocumentoHuesped`,`EstadoOcupacionHuesped`, `FechaNacimientoHuesped`,`TipoHuesped`,`SeguroHuesped`, `FechaEntradaHuesped`,`FechaSalidaHuesped`,`ObservacionesHuesped`,`IdMovimientoHabitacion`)VALUES ('".$Cedula."','".strtoupper($Nombre)."','".strtoupper($Apellido)."','".strtoupper($Nacionalidad)."','".strtoupper($TipoDocumento)."','ACTIVO','".$Nacimiento."','".strtoupper($TipoHuespe)."',(SELECT ValorSeguroParametros FROM `parametros`),(SELECT NOW()),(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),'".$HuespedObservacion."',(SELECT IdMovimientoHabitacion FROM `movimientohabitacion` WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion ='".strtoupper($NombreHabitacion)."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1))";
                                            // echo $InsertHuespedYUpdate;
                                        }else{
                                            // echo "entre al off, el nombre de la habitacion es: ".$NombreHabitacion;
                                            //$InsertHuespedYUpdate = "INSERT INTO `huesped`(`NumeroDocumentoHuesped`, `NombreHuesped`, `ApellidoHuesped`,`NacionalidadHuesped`, `TipoDocumentoHuesped`,`EstadoOcupacionHuesped`, `FechaNacimientoHuesped`,`TipoHuesped`,`SeguroHuesped`, `FechaEntradaHuesped`,`FechaSalidaHuesped`,`ObservacionesHuesped`,`IdMovimientoHabitacion`)VALUES ('".$Cedula."','".strtoupper($Nombre)."','".strtoupper($Apellido)."','".strtoupper($Nacionalidad)."','".strtoupper($TipoDocumento)."','ACTIVO','".$Nacimiento."','".strtoupper($TipoHuespe)."',0,(SELECT NOW()),'0000-00-00 00:00:00','".$HuespedObservaciones."',(SELECT IdMovimientoHabitacion FROM `movimientohabitacion` WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion ='".strtoupper($NombreHabitacion)."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1))";
                                            $InsertHuespedYUpdate = "INSERT INTO `huesped`(`NumeroDocumentoHuesped`, `NombreHuesped`, `ApellidoHuesped`,`NacionalidadHuesped`, `TipoDocumentoHuesped`,`EstadoOcupacionHuesped`, `FechaNacimientoHuesped`,`TipoHuesped`,`SeguroHuesped`, `FechaEntradaHuesped`,`FechaSalidaHuesped`,`ObservacionesHuesped`,`IdMovimientoHabitacion`)VALUES ('".$Cedula."','".strtoupper($Nombre)."','".strtoupper($Apellido)."','".strtoupper($Nacionalidad)."','".strtoupper($TipoDocumento)."','ACTIVO','".$Nacimiento."','".strtoupper($TipoHuespe)."',0,(SELECT NOW()),(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),'".$HuespedObservacion."',(SELECT IdMovimientoHabitacion FROM `movimientohabitacion` WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion ='".strtoupper($NombreHabitacion)."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1))";
                                            // echo "1";
                                            // echo $InsertHuespedYUpdate;
                                        }
                                    }
                                    else
                                    {
                                        if($Seguro == "SI"){
                                        $InsertHuespedYUpdate = "INSERT INTO `huesped`(`NumeroDocumentoHuesped`, `NombreHuesped`, `ApellidoHuesped`,`NacionalidadHuesped`, `TipoDocumentoHuesped`,`EstadoOcupacionHuesped`, `FechaNacimientoHuesped`,`TipoHuesped`,`SeguroHuesped`, `FechaEntradaHuesped`,`FechaSalidaHuesped`,`ObservacionesHuesped`,`IdMovimientoHabitacion`)VALUES ('".$Cedula."','".strtoupper($Nombre)."','".strtoupper($Apellido)."','".strtoupper($Nacionalidad)."','".strtoupper($TipoDocumento)."','ACTIVO','".$Nacimiento."','".strtoupper($TipoHuespe)."',(SELECT ValorSeguroParametros FROM `parametros`),(SELECT NOW()),(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),'".$HuespedObservacion."',".$IdMovmientoHabitacion.")";    
                                        }else
                                        {
                                            
                                            $InsertHuespedYUpdate = "INSERT INTO `huesped`(`NumeroDocumentoHuesped`, `NombreHuesped`, `ApellidoHuesped`,`NacionalidadHuesped`, `TipoDocumentoHuesped`,`EstadoOcupacionHuesped`, `FechaNacimientoHuesped`,`TipoHuesped`,`SeguroHuesped`, `FechaEntradaHuesped`,`FechaSalidaHuesped`,`ObservacionesHuesped`,`IdMovimientoHabitacion`)VALUES ('".$Cedula."','".strtoupper($Nombre)."','".strtoupper($Apellido)."','".strtoupper($Nacionalidad)."','".strtoupper($TipoDocumento)."','ACTIVO','".$Nacimiento."','".strtoupper($TipoHuespe)."',0,(SELECT NOW()),(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)),'".$HuespedObservacion."',".$IdMovmientoHabitacion.")";
                                             //echo "    2";
                                        }
                                    }
                                }
                                else
                                {   
                                    //echo "Entro en el false";
                                    if($IdMovmientoHabitacion == '0')
                                    {
                                        $NombreHabitacion = $conexion->real_escape_string($_POST['NombreHabitacion']);
                                        if($Seguro == "SI"){
                                        $InsertHuespedYUpdate = "UPDATE `huesped` SET `IdMovimientoHabitacion`= (SELECT IdMovimientoHabitacion FROM `movimientohabitacion` WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion ='".strtoupper($NombreHabitacion)."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1), ObservacionesHuesped ='".$HuespedObservacion."', FechaEntradaHuesped =(SELECT NOW()), FechaSalidaHuesped =(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)), SeguroHuesped=(SELECT ValorSeguroParametros FROM `parametros`),EstadoOcupacionHuesped = 'ACTIVO',TipoHuesped = '".strtoupper($TipoHuespe)."'  WHERE NumeroDocumentoHuesped = '".$Cedula."' AND TipoDocumentoHuesped = '".strtoupper($TipoDocumento)."'";
                                        //echo $InsertHuespedYUpdate; 
                                        }else{
                                            $InsertHuespedYUpdate = "UPDATE `huesped` SET `IdMovimientoHabitacion`= (SELECT IdMovimientoHabitacion FROM `movimientohabitacion` WHERE IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion ='".strtoupper($NombreHabitacion)."') ORDER BY IdMovimientoHabitacion DESC LIMIT 1), ObservacionesHuesped ='".$HuespedObservacion."', FechaEntradaHuesped =(SELECT NOW()), FechaSalidaHuesped =(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)), SeguroHuesped=0 , EstadoOcupacionHuesped='ACTIVO' ,TipoHuesped = '".strtoupper($TipoHuespe)."'  WHERE NumeroDocumentoHuesped = '".$Cedula."' AND TipoDocumentoHuesped = '".strtoupper($TipoDocumento)."'";
                                            // echo "       3";
                                        }
                                    }
                                    else
                                    {
                                        if($Seguro == "SI"){
                                            $InsertHuespedYUpdate = "UPDATE `huesped` SET `IdMovimientoHabitacion`= ".$IdMovmientoHabitacion.", ObservacionesHuesped ='".$HuespedObservacion."', FechaEntradaHuesped =(SELECT NOW()), FechaSalidaHuesped =(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)), SeguroHuesped=(SELECT ValorSeguroParametros FROM `parametros`),EstadoOcupacionHuesped = 'ACTIVO',TipoHuesped = '".strtoupper($TipoHuespe)."'  WHERE NumeroDocumentoHuesped = '".$Cedula."' AND TipoDocumentoHuesped = '".strtoupper($TipoDocumento)."'";
                                            //echo $InsertHuespedYUpdate; 
                                            }else{
                                                $InsertHuespedYUpdate = "UPDATE `huesped` SET `IdMovimientoHabitacion`= ".$IdMovmientoHabitacion.", ObservacionesHuesped ='".$HuespedObservacion."', FechaEntradaHuesped =(SELECT NOW()), FechaSalidaHuesped =(select DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-%d 13:00'),INTERVAL 1 DAY)), SeguroHuesped=0 , EstadoOcupacionHuesped='ACTIVO' ,TipoHuesped = '".strtoupper($TipoHuespe)."'  WHERE NumeroDocumentoHuesped = '".$Cedula."' AND TipoDocumentoHuesped = '".strtoupper($TipoDocumento)."'";
                                                // echo "       4";
                                            }
                                    }
                                }
                                //  echo $InsertHuespedYUpdate;
                                $resultado=$conexion->query($InsertHuespedYUpdate);
                                if($resultado == true)
                                {
                                    $registrados++;
                                }
                         }
                    }
                // 
                if($registrados == $ValoresTotales)
                {
                    echo "REGISTRO";
                }
             
        break;
        
        case 'TraerCodigoClietneRegistroCorporativoYAgencias':
                $IdCliente = $conexion->real_escape_string($_POST['IdCliente']);

                $SelectCodigo ="SELECT `CodigoMagicoCliente` FROM `cliente` WHERE IdCliente = ".$IdCliente.";";
                $ResultadoCodigo = $conexion->query($SelectCodigo);
                while($fila=$ResultadoCodigo->fetch_array())
                {
                    echo $fila['CodigoMagicoCliente'];
                }
        break;

        case 'TraerDatosHabitacionFormularioActualizarHuespedes':
                //$IdMovimientoFormularioActualizarHuespedes = $conexion->real_escape_string($_POST['IdMovimientoSelectFormularioActualizarHuespedes']);

        break;

        case 'DatosHuespedesParaImprimir':
                    $IdMovimientoHabitacion = $_POST["IdMovimientoHabitacion"];
                    $ConsultaHuespedes = "SELECT * FROM `huesped` WHERE IdMovimientoHabitacion = ".$IdMovimientoHabitacion.";"; 
                    $Resultado = $conexion->query($ConsultaHuespedes);
                    $ArrayHuesped = array();

                    /*Inicio while */
                    while($filas1=$Resultado->fetch_array())
                    {
                        $ArrayHuesped[]=$filas1;
                    }
                    echo json_encode($ArrayHuesped);
        break;

        case 'TraerFechaNinosParametros':

                    $ConsultaParametros = "SELECT * FROM parametros"; 
                    $Resultado = $conexion->query($ConsultaParametros);
                    $ArrayParametros = array();

                    while($filas=$Resultado->fetch_array())
                    {
                        $ArrayParametros[]=$filas;
                    }
                    echo json_encode($ArrayParametros);
        break;

        case 'VerficarOcupacionHabitacion':
                    $Habitacion = $_POST['Habitacion'];
                    $FechaEntrada = $_POST['FechaEntrada'];
                    $FechaSalida = $_POST['FechaSalida'];
                    //$ConsultaSql = "SELECT m.EstadoMovimiento , m.TipoMovimiento , mh.IdMovimientoHabitacion , mh.EstadoMovimientoHabitacion FROM movimiento m , movimientohabitacion mh , habitacion h WHERE h.IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion = '".$Habitacion."') AND mh.IdHabitacion = h.IdHabitacion AND (m.FechaEntradaMovimiento BETWEEN '".$FechaEntrada."' AND '".$FechaSalida."') AND m.EstadoMovimiento = 'ACTIVO' GROUP by mh.IdMovimientoHabitacion ORDER BY mh.IdMovimientoHabitacion DESC LIMIT 1";
                    $ConsultaSql = "SELECT m.EstadoMovimiento , m.TipoMovimiento , mh.IdMovimientoHabitacion , mh.EstadoMovimientoHabitacion FROM movimiento m , movimientohabitacion mh , habitacion h WHERE h.IdHabitacion = (SELECT IdHabitacion FROM habitacion WHERE NombreHabitacion = '".$Habitacion."') AND mh.IdHabitacion = h.IdHabitacion AND (m.FechaEntradaMovimiento BETWEEN (select DATE_ADD('".$FechaEntrada."',INTERVAL -5 DAY))  AND '".$FechaSalida."') AND m.EstadoMovimiento = 'ACTIVO' GROUP by mh.IdMovimientoHabitacion ORDER BY mh.IdMovimientoHabitacion DESC LIMIT 1";
                    //echo $ConsultaSql;
                    $ArrayHabitacion= array();
                    $Resultado = $conexion->query($ConsultaSql);
                    $filas=$Resultado->fetch_array();
                    
                    if($filas['EstadoMovimiento'] == "")
                    {
                        echo "NADA";
                    }
                    else
                    {

                        $ArrayHabitacion[]= $filas;
                    echo json_encode($ArrayHabitacion);
                    }
                    
            break;

            case 'ActualizarHuespedFormulario':
                    $NombreProceso = $_POST['NombreProceso'];
                    $TipoHuesped = $_POST['TipoHuesped'];
                    $TipoDocumento = $_POST['TipoDocumento'];
                    $NumeroDocumento = $_POST['NumeroDocumento'];
                    $Nacionalidad = $_POST['Nacionalidad'];
                    $FechaNaciomiento = $_POST['FechaNaciomiento'];
                    $Nombre = $_POST['Nombre'];
                    $Apellido = $_POST['Apellido'];

                    $ComandoSql = "UPDATE huesped SET NumeroDocumentoHuesped = '".$NumeroDocumento."', NombreHuesped = '".strtoupper($Nombre)."', ApellidoHuesped = '".strtoupper($Apellido)."', NacionalidadHuesped = '".strtoupper($Nacionalidad)."', TipoDocumentoHuesped = '".strtoupper($TipoDocumento)."', FechaNacimientoHuesped = '".$FechaNaciomiento."', TipoHuesped = '".strtoupper($TipoHuesped)."' WHERE TipoDocumentoHuesped = '".$TipoDocumento."' AND NumeroDocumentoHuesped = '".$NumeroDocumento."'";
                    $Resultado = $conexion->query($ComandoSql);

                    if($Resultado == true)
                    {
                        echo "ACTUALIZO";
                    }
                    else
                    {
                        echo "NO ACTUALIZO";
                    }
            break;
    default:
        # code...
        break;
}

// Funcion Capacidad Maxima Pax por habitacion

?>
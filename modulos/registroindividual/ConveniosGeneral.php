<?php
require_once ('../conexion.php');
$NombreProceso = isset($_POST['NombreProceso']) ? trim($_POST['NombreProceso']) : $_GET['NombreProceso']; 
    switch ($NombreProceso ) {
case "RegistrarHuespedes":
{
    $contador=0;
    $registrados=0;
    $HuespedTipoDocumento=$_POST['HuespedTipoDocumento'];
    $ValoresTotales=count($HuespedTipoDocumento);
    $HuespedId=$_POST['HuespedId'];
    $HuespedNombre=$_POST['HuespedNombre'];
    $HuespedApellido=$_POST['HuespedApellido'];
    $HuespedNacionalidad=$_POST['HuespedNacionalidad'];
    $HuespedFechaNaciento=$_POST['HuespedFechaNaciento']; 
    $HuespedSeguro=$_POST['HuespedSeguro']; 
    for($i=0;$i<$ValoresTotales;$i++)
    {
        $Cedula=$conexion->real_escape_string($HuespedId[$i]);
        $TipoDocumento=$conexion->real_escape_string($HuespedTipoDocumento[$i]);        
        $Documento=$conexion->real_escape_string($HuespedId[$i]);
        $Nombre=$conexion->real_escape_string($HuespedNombre[$i]);
        $Apellido=$conexion->real_escape_string($HuespedApellido[$i]);
        $Nacionalidad=$conexion->real_escape_string($HuespedNacionalidad[$i]);
        $Nacimiento=$conexion->real_escape_string($HuespedFechaNaciento[$i]);
        $Seguro=$conexion->real_escape_string($HuespedSeguro[$i]);
        if($TipoDocumento=="" || $Documento=="" || $Nombre==""  || $Apellido=="" || $Nacionalidad=="" || $Nacimiento=="" )
        {
            echo "FALTAN";
            exit();
        }else
        {
            
            
            $HuespedFechaEntrada=$_POST['HuespedFechaEntrada'];
            $HuespedFechaSalida=$_POST['HuespedFechaSalida'];
            if($HuespedFechaEntrada>=$HuespedFechaSalida)
            {
                echo "IRREGULARFECHA";
                exit();
            }
            $HuespedIdMoviemintoHabitacion=$_POST['HuespedIdMoviemintoHabitacion'];
            $ComandoSql="SELECT `IdMovimientoHabitacion` FROM `movimientohabitacion` WHERE `IdMovimientoHabitacion`=".$HuespedIdMoviemintoHabitacion;                                   
            $Resultado=$conexion->query($ComandoSql);
            $n= mysqli_num_rows($Resultado);
            if($n==0)
            {
                echo "NOEXISTE";
            }else{
                $contador++;
                $HuespedTelefono=$_POST['HuespedTelefono'];
                $IdDeparatamento=$_POST['SelectDepartamentos'];
                $IdCiudad=$_POST['SelectCiudades'];
                $HuespedTipoSangre=$_POST['HuespedTipoSangre'];
                $HuespedDireccion=$_POST['HuespedDireccion'];
                $HuespedProfesion=$_POST['HuespedProfesion'];
                if($contador==1)
                {
                    $Select="INSERT INTO `huesped`(`DocumentoHuesped`, `NombreHuesped`, `ApellidoHuesped`, `TelefonoHuesped`, `IdMovimientoHabitacion`, `IdCiudad`, `NacionalidadHuesped`, `TipoSangreHuesped`, `TipoDocumentosHuesped`, `DireccionHuesped`, `EstadoOcupacionHuesped`, `FechaNacimientoHuesped`, `TipoHuesped`, `ProfesionHuesped`, `SeguroHuesped`, `FechaEntradaHuesped`, `FechaSalidaHuesped`)";
                    $Values="VALUES ('".$Cedula."','".strtoupper($Nombre)."','".strtoupper($Apellido)."','".$HuespedTelefono."','".$HuespedIdMoviemintoHabitacion."','".$IdCiudad."','".strtoupper($Nacionalidad)."','".$HuespedTipoSangre."','".$TipoDocumento."','".$HuespedDireccion."','ACTIVO','".$Nacimiento."','RESPONSABLE','".strtoupper($HuespedProfesion)."','".$Seguro."','".$HuespedFechaEntrada."','".$HuespedFechaSalida."')"; 
                    $ComandoSql=$Select.$Values;    
                   // echo "Sentencia: ".$ComandoSql;                                
                    $Resultado=$conexion->query($ComandoSql);
                    if($Resultado==true)
                    {                    
                        $registrados++;
                       
                    }
                    else
                    {
                        echo 'NOREGISTRO';   
                        exit();  
                    }
                    
                }else{
                    $Select="INSERT INTO `huesped`(`DocumentoHuesped`,`NombreHuesped`, `ApellidoHuesped`, `TelefonoHuesped`, `IdMovimientoHabitacion`, `IdCiudad`, `NacionalidadHuesped`, `TipoSangreHuesped`, `TipoDocumentosHuesped`, `DireccionHuesped`, `EstadoOcupacionHuesped`, `FechaNacimientoHuesped`, `TipoHuesped`, `ProfesionHuesped`, `SeguroHuesped`, `FechaEntradaHuesped`, `FechaSalidaHuesped`)";
                    $Values="VALUES ('".$Cedula."','".strtoupper($Nombre)."','".strtoupper($Apellido)."','".$HuespedTelefono."','".$HuespedIdMoviemintoHabitacion."','".$IdCiudad."','".strtoupper($Nacionalidad)."','".$HuespedTipoSangre."','".$TipoDocumento."','".$HuespedDireccion."','ACTIVO','".$Nacimiento."','HUESPED','".strtoupper($HuespedProfesion)."','".$Seguro."','".$HuespedFechaEntrada."','".$HuespedFechaSalida."')"; 
                    $ComandoSql=$Select.$Values;            
                 //   echo "<br>Sentencia: ".$ComandoSql;                       
                    $Resultado=$conexion->query($ComandoSql);
                    if($Resultado==true)
                    {
                        
                        $registrados++;                    
                    }
                    else
                    {
                        echo 'NOREGISTRO';   
                        exit();  
                    }
                }            
                
            }

        
        }
    }
    if($registrados==$ValoresTotales)
    {
        echo 'REGISTRO'; 
    }
}
break;
case "TraerEventosRack":
{
    $ComandoSql='SELECT movimientohabitacion.IdHabitacion, habitacion.NombreHabitacion,movimientohabitacion.IdMovimiento,movimientohabitacion.FechaEntradaMovimientoHabitacion,movimientohabitacion.FechaSalidaMovimientoHabitacion FROM `movimientohabitacion`, movimiento,habitacion WHERE movimientohabitacion.IdMovimiento=movimiento.IdMovimiento and movimiento.TipoMovimiento="RESERVA GARANTIZADA" and movimiento.EstadoMovimiento="ACTIVO" AND habitacion.IdHabitacion=movimientohabitacion.IdHabitacion';
    if($Resultado=$conexion->query($ComandoSql))
    {
        $titulo="";
    while($row= $Resultado->fetch_array())
        {      
            $data[] = array(
                'id'   => $row["IdMovimiento"],
                'title'   => $row["NombreHabitacion"],
                'start'   => $row["FechaEntradaMovimientoHabitacion"],
                'end'   => $row["FechaSalidaMovimientoHabitacion"],
               );
        }
        echo json_encode($data);
    }
}
break;
case "BuscarIdHabitacionOcupacion":
{
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
}
break;

/*---------------------- jose luis ----------------------- */
case "ClienteExisteConsultar1":
{
    $TipoCliente = $conexion->real_escape_string($_POST['TipoCliente']);
    $ClienteTipoDocumento = $conexion->real_escape_string($_POST['ClienteTipoDocumentoReserva']);
    $ClienteNit = $conexion->real_escape_string($_POST['ClienteNitReserva']);



    if($TipoCliente == "PARTICULAR")
     {
        $ComandoSqlConsultarClienteExiste ="SELECT * FROM `cliente`WHERE TipoCliente = '".$TipoCliente."' and TipoDocumentoCliente = '".$ClienteTipoDocumento."' and NitCliente = '".$ClienteNit."'";
    }
     else if($TipoCliente == "CORPORATIVO")
     {
        $ComandoSqlConsultarClienteExiste ="SELECT * FROM `cliente`WHERE TipoCliente = '".$TipoCliente."' and NitCliente = '".$ClienteNit."'"; 
    }
    $ResultadoClienteExiste =  $conexion->query($ComandoSqlConsultarClienteExiste);

    $Array = array();

    //$AlmacenarDatosCliente = "";
    //echo "sentencia: ".$ComandoSqlConsultarClienteExiste;
    while($AlmacenarDatosCliente = mysqli_fetch_array($ResultadoClienteExiste))
    {
        if($AlmacenarDatosCliente[0] != "")
        {
            $Array[] = $AlmacenarDatosCliente;
            echo json_encode($Array);
            break;
        }
        else
        {
            echo "";
        }
             
    }
}
break;
/*--------------------- Fin Funcion Cliente Existe ----------------------------*/

/*--------- Inicio Funcion Cargar Select Departamento Despues de Cargar Ciudad --------------------*/
case "CargarSelectDepartamentoDespuesDeCargarCiudad":
{
    $Ciudad = $_POST['Ciudad'];
    
    $ComandoSqlConsultarDepartamentoPosCiudad = "SELECT IdDepartamentos FROM ciudad WHERE IdCiudad = '".$Ciudad."'";

    $ResultadoCargarDepartamentoConCiudad = $conexion->query($ComandoSqlConsultarDepartamentoPosCiudad);

    while($CargarDepartamento = $ResultadoCargarDepartamentoConCiudad->fetch_array())
    {
        echo $CargarDepartamento['IdDepartamentos'];
    }
}
break;
/*--------- Fin Funcion Cargar Select Departamento Despues de Cargar Ciudad -----------------------*/


case "MovimientoReservaIngresar":
{
    //echo "HOLA SALVAJE";
    $IdUsuario = $_SESSION['IdUsuario'];
    $ClienteTipo = $conexion->real_escape_string($_POST['TipoCliente']);
    $ClienteTipoDocumento = $conexion->real_escape_string($_POST['ClienteTipoDocumento']);
    $ClienteNit = $conexion->real_escape_string($_POST['ClienteNit']);
    $ClienteNombre = $conexion->real_escape_string($_POST['ClienteNombre']);
    $ClienteApellidos = $conexion->real_escape_string($_POST['ClienteApellidos']);
    $ClienteTelefono1 = $conexion->real_escape_string($_POST['ClienteTelefono1']);
    $ClienteCorreo = $conexion->real_escape_string($_POST['ClienteCorreoCliente']);
    // $MovimientoReservaTipo = $conexion->real_escape_string($_POST['MovimientoReservaTipo']);
    $MovimientoReservaEstado = $conexion->real_escape_string($_POST['MovimientoReservaEstado']);
    $MovimientoReservaTipoTarifa = $conexion->real_escape_string($_POST['MovimientoReservaTipoTarifa']);
    $MovimientoReservaFechaEntrada = $conexion->real_escape_string($_POST['MovimientoReservaFechaEntrada']);
    $MovimientoReservaFechaSalida = $conexion->real_escape_string($_POST['MovimientoReservaFechaSalida']);
    $MovimientoReservaMotivoViaje = $conexion->real_escape_string($_POST['MovimientoReservaMotivoViaje']);
    $MovimientoReservaTipoTransporte = $conexion->real_escape_string($_POST['MovimientoReservaTipoTransporte']);
    // $MovimientoReservaFormaPago = $conexion->real_escape_string($_POST['MovimientoReservaFormaPago']);
    // $MovimientoReservaAbonos = $conexion->real_escape_string($_POST['MovimientoReservaAbonos']);
    $MovimientoReservaNombreHabitacion = $conexion->real_escape_string($_POST['MovimientoReservaIdHabitacion']);
    $MovimientoReservaObservaciones = $conexion->real_escape_string($_POST['MovimientoReservaObservaciones']);

   
    $VolverAConsultarClienteExiste = "SELECT * FROM `cliente` WHERE NitCliente = '".$ClienteNit."'";

    $ResultadoVolverAConsultarClienteExiste = $conexion->query($VolverAConsultarClienteExiste);
 
    $SiExisteElCliente = "" ;
 
    while($AlmacenarConsultaCliente = mysqli_fetch_array($ResultadoVolverAConsultarClienteExiste))
    {
         $SiExisteElCliente = true ;
    }
 
    if($SiExisteElCliente == true)
    {
     
       $IngresarMovimientoReserva = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `FormaPagoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`,`MotivoViajeMovimiento`, `TipoTransporteMovimiento`, `IdTarifa`, `IdUsuario`, `IdCliente`) VALUES ('','".$MovimientoReservaEstado."','".$MovimientoReservaFormaPago."','".$MovimientoReservaAbonos."',(SELECT NOW()),'".$MovimientoReservaFechaEntrada."','".$MovimientoReservaFechaSalida."','".strtoupper($MovimientoReservaObservaciones)."','".$MovimientoReservaMotivoViaje."','".$MovimientoReservaTipoTransporte."','".$MovimientoReservaTipoTarifa."','".$IdUsuario."',(SELECT IdCliente FROM `cliente` WHERE NitCliente = '".$ClienteNit."' AND TipoCliente = '".$ClienteTipo."'))";
 
       $IngresarMovimientoHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`, `FechaSalidaMovimientoHabitacion`,`ObservacionesMovimientoHabitacion`,`IdMovimiento`, `IdHabitacion`, `ValorPenalizacionMovimientoHabitacion`, `EstadoPenalizacionMovimientoHabitacion`) VALUES ('".$MovimientoReservaFechaEntrada."','".$MovimientoReservaFechaSalida."','".strtoupper($MovimientoReservaObservaciones)."',(SELECT IdMovimiento FROM `movimiento` WHERE  IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente ='".$ClienteNit."' AND TipoCliente = '".$ClienteTipo."') ORDER by IdMovimiento DESC LIMIT 1),'".$MovimientoReservaNombreHabitacion."','0','SINPENALIZACION')";
       
       
        
       $ResultadoIngresarMovimientoReserva = $conexion->query($IngresarMovimientoReserva);
 
        $ResultadoIngresarMovimientoHabitacion = $conexion->query($IngresarMovimientoHabitacion);

        
 
        if($ResultadoIngresarMovimientoReserva == true && $ResultadoIngresarMovimientoHabitacion == true)
        {
            if($MovimientoReservaTipo == "RESERVAGARANTIZADA")
            {
                $ActualizarEstadoHabitacion = "UPDATE `habitacion` SET `EstadoHabitacion`= 'RESERVADA' WHERE NombreHabitacion = '".$MovimientoReservaNombreHabitacion."'";
                $ResultadoActualizarEstadoHabitacion = $conexion->query($ActualizarEstadoHabitacion);
                if($ResultadoActualizarEstadoHabitacion == true)
                {
                 echo "OK";
                }
            }
            else
            {
                echo"NOGARANTIZADA";
            }
        }
        else
        {
            echo "NO SE INGRESO";
        }

      
 
        //  echo $IngresarMovimientoReserva." 
       
       
        //     ".$IngresarMovimientoHabitacion;
  
    }
    else
    { 
        $IngresarCliente = "INSERT INTO `cliente`(`NombreCliente`, `ApellidoCliente`, `NitCliente`, `Telefono1Cliente`, `CorreoCliente`, `TipoCliente`,`TipoDocumentoCliente`) VALUES ('".strtoupper($ClienteNombre)."','".strtoupper($ClienteApellidos)."','".strtoupper($ClienteNit)."','".$ClienteTelefono1."','".strtoupper($ClienteCorreo)."','".strtoupper($ClienteTipo)."','".$ClienteTipoDocumento."')";

        $IngresarMovimientoReserva = "INSERT INTO `movimiento`(`TipoMovimiento`, `EstadoMovimiento`, `FormaPagoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`,`FechaEntradaMovimiento`,`FechaSalidaMovimiento`, `ObservacionesMovimiento`,`MotivoViajeMovimiento`, `TipoTransporteMovimiento`, `IdTarifa`, `IdUsuario`, `IdCliente`) VALUES ('".strtoupper($MovimientoReservaTipo)."','".strtoupper($MovimientoReservaEstado)."','".strtoupper($MovimientoReservaFormaPago)."','".$MovimientoReservaAbonos."',(SELECT NOW()),'".$MovimientoReservaFechaEntrada."','".$MovimientoReservaFechaSalida."','".strtoupper($MovimientoReservaObservaciones)."','".strtoupper($MovimientoReservaMotivoViaje)."','".strtoupper($MovimientoReservaTipoTransporte)."','".strtoupper($MovimientoReservaTipoTarifa)."','".$IdUsuario."',(SELECT IdCliente FROM `cliente` WHERE NitCliente = '".$ClienteNit."' AND TipoCliente = '".$ClienteTipo."'))";
   
        $IngresarMovimientoHabitacion = "INSERT INTO `movimientohabitacion`(`FechaEntradaMovimientoHabitacion`, `FechaSalidaMovimientoHabitacion`,`ObservacionesMovimientoHabitacion`,`IdMovimiento`, `IdHabitacion`, `ValorPenalizacionMovimientoHabitacion`, `EstadoPenalizacionMovimientoHabitacion`) VALUES ('".$MovimientoReservaFechaEntrada."','".$MovimientoReservaFechaSalida."','".strtoupper($MovimientoReservaObservaciones)."',(SELECT IdMovimiento FROM `movimiento` WHERE  IdCliente = (SELECT IdCliente FROM cliente WHERE NitCliente ='".$ClienteNit."' AND TipoCliente = '".$ClienteTipo."') ORDER by IdMovimiento DESC LIMIT 1),'".$MovimientoReservaIdHabitacion."','0','SINPENALIZACION')";
       
        // echo $IngresarCliente." 
        // ".$IngresarMovimientoReserva."
        // ".$IngresarMovimientoHabitacion;
         //$ResultadoIngresarCliente = $conexion->query($IngresarCliente);
   
         $ResultadoIngresarMovimientoReserva = $conexion->query($IngresarMovimientoReserva);
   
         $ResultadoIngresarMovimientoHabitacion = $conexion->query($IngresarMovimientoHabitacion);
         
            // if($MovimientoReservaAbonos != "0") 
            // {
            //     $IngresarComprobanteIngreso = "";
            // }
   
        if($ResultadoIngresarCliente == true && $ResultadoIngresarMovimientoReserva == true && $ResultadoIngresarMovimientoHabitacion == true)
        {
            if($MovimientoReservaTipo == "RESERVAGARANTIZADA")
            {
                $ActualizarEstadoHabitacion = "UPDATE `habitacion` SET `EstadoHabitacion`= 'RESERVADA' WHERE NombreHabitacion = '".$MovimientoReservaNombreHabitacion."'";
                $ResultadoActualizarEstadoHabitacion = $conexion->query($ActualizarEstadoHabitacion);
                if($ResultadoActualizarEstadoHabitacion == true)
                {
                 echo "GARANTIZADA";
                }
            }
            else
            {
                echo"NOGARANTIZADA";
            }
        }
        else
        {
            echo "NO SE INGRESO";
        }
    }

}
break;

 case 'MovimientoExisteHabitacion':
 {

     $NombreHabitacion = $_POST['MovimientoNombreHabitacion'];
     $Array = array();
      //echo var_dump($NombreHabitacion);
      for($i = 0 ; $i < count($NombreHabitacion) ; $i++)
      {
       $ExisteHabitacion = "SELECT COUNT(*) AS HabitacionesContadas FROM `habitacion` WHERE NombreHabitacion = '".$NombreHabitacion[$i]."'";
       $ResultadoExisteHabitacion = $conexion->query($ExisteHabitacion);
       while($AlmacenarSiHayHabitacion = mysqli_fetch_array($ResultadoExisteHabitacion))
        { 
         if($AlmacenarSiHayHabitacion != "0")
              {
                $Array[] = $AlmacenarSiHayHabitacion;
              }
           else
              {
                $Array[] = $AlmacenarSiHayHabitacion;
              }
        }
      }
      echo json_encode($Array);
 }
}
/*---------------------- jose luis ----------------------- */
?>
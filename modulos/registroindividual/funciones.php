<?php
require_once ('../conexion.php');
$NombreProceso = isset($_POST['NombreProceso']) ? trim($_POST['NombreProceso']) : $_GET['NombreProceso']; 
    switch ($NombreProceso ) {

        case "RegistroCliente":
            
                

                $ClienteNombre = $_POST['ClienteNombre'];
                $ClienteApellido = $_POST['ClienteApellido'];
                $ClienteTipoDocumento = $_POST['ClienteTipoDocumento'];
                $ClienteNumeroDocumento = $_POST['ClienteNumeroDocumento'];
                $ClienteTelefono1 = $_POST['ClienteTelefono1'];
                $ClienteTelefono2 = $_POST['ClienteTelefono2'];
                $ClienteDireccion = $_POST['ClienteDireccion'];
                $ClienteCorreo = $_POST['ClienteCorreo'];
                $ClienteActividadEconomica = $_POST['ClienteActividadEconomica'];
                $ClienteNumeroCuenta = $_POST['ClienteNumeroCuenta'];
                $NacionalidadClienteParticularRegistro = $_POST['NacionalidadClienteParticularRegistro'];
                $ClienteCiudadLista = $_POST['ClienteCiudadLista'];
                $ClienteTipoPersona = $_POST['ClienteTipoPersona'];
                $ClienteTipoContribuyente = $_POST['ClienteTipoContribuyente'];
                $ClienteCodigoMagico = $_POST['ClienteCodigoMagico'];
                $ClientePreferencias = $_POST['ClientePreferencias'];
                $ClienteObservaciones = $_POST['ClienteObservaciones'];
                $ClienteValorCredito = $_POST['ClienteValorCredito'];
                $p = $_POST['ClienteListadodeConvenios'];
                $ClienteComisionConvenio = $_POST['ClienteComisionConvenio'];
                $IdClienteTipo = $_POST['IdClienteTipo'];
                if($p=="-1"){
                    $ClienteListadodeConvenios = 'null';
                }else{
                    $ClienteListadodeConvenios = $p+0;
                }


                $ComandoSql="INSERT INTO `cliente`(`NitCliente`, `TipoDocumentoCliente`, `NombreCliente`, `ApellidoCliente`, `DireccionCliente`, `Telefono1Cliente`, `Telefono2Cliente`, `CorreoCliente`, `ObservacionesCliente`, `PreferenciasCliente`, `ComisionCliente`, `NumeroCuentaCliente`, `ActividadEconomicaCliente`, `ValorCreditoCliente`, `NacionalidadCliente`, `CodigoMagicoCliente`, `IdCiudad`, `IdClienteTipo`, `IdPersonaTipo`, `IdContribuyenteTipo`, `IdConvenio`) VALUES ('".strtoupper($ClienteNumeroDocumento)."','".strtoupper($ClienteTipoDocumento)."','".strtoupper($ClienteNombre)."','".strtoupper($ClienteApellido)."','".strtoupper($ClienteDireccion)."','".$ClienteTelefono1."','".$ClienteTelefono2."','".strtoupper($ClienteCorreo)."','".strtoupper($ClienteObservaciones)."','".strtoupper($ClientePreferencias)."','".$ClienteComisionConvenio."','".$ClienteNumeroCuenta."','".strtoupper($ClienteActividadEconomica)."','".$ClienteValorCredito."','".strtoupper($NacionalidadClienteParticularRegistro)."','".$ClienteCodigoMagico."','".strtoupper($ClienteCiudadLista)."','".$IdClienteTipo."','".$ClienteTipoPersona."','".$ClienteTipoContribuyente."',".$ClienteListadodeConvenios.")";
                /* echo $ComandoSql; */
                $Resultado=$conexion->query($ComandoSql);
                if($Resultado == true){
                    echo "REGISTRO";
                }else{
                    echo "NOREGISTRO";
                }
            
            break;
        
            case "ClienteActualizar":
            
                

        $ClienteCodigo = $_POST['ClienteCodigo'];
        $ClienteNumeroDocumentoActualizar = $_POST['ClienteNumeroDocumentoActualizar'];
        $ClienteTipoDocumentoActualizar = $_POST['ClienteTipoDocumentoActualizar'];
        $ClienteNombreActualizar = $_POST['ClienteNombreActualizar'];
        $ClienteApellidoActualizar = $_POST['ClienteApellidoActualizar'];
        $ClienteTelefono1Actualizar = $_POST['ClienteTelefono1Actualizar'];
        $ClienteTelefono2Actualizar = $_POST['ClienteTelefono2Actualizar'];
        $ClienteDireccionActualizar = $_POST['ClienteDireccionActualizar'];
        $ClienteCorreoActualizar = $_POST['ClienteCorreoActualizar'];
        $ClienteActividadEconomicaActualizar = $_POST['ClienteActividadEconomicaActualizar'];
        $ClienteNumeroCuentaActualizar = $_POST['ClienteNumeroCuentaActualizar'];
        $NacionalidadClienteParticularActualizar = $_POST['NacionalidadClienteParticularActualizar'];
        $ClienteCiudadListaActualizar = $_POST['ClienteCiudadListaActualizar'];
        $ClienteTipoPersonaActualizar = $_POST['ClienteTipoPersonaActualizar'];
        $ClienteTipoContribuyenteActualizar = $_POST['ClienteTipoContribuyenteActualizar'];
        $ClienteCodigoMagicoActualizar = $_POST['ClienteCodigoMagicoActualizar'];
        $ClientePreferenciasActualizar = $_POST['ClientePreferenciasActualizar'];
        $ClienteObservacionesActualizar = $_POST['ClienteObservacionesActualizar'];
        $ClienteValorCreditoActualizar = $_POST['ClienteValorCreditoActualizar'];
        $ClienteComisionConvenioActualizar = $_POST['ClienteComisionConvenioActualizar'];
        $RadioTipoClienteActualiza = $_POST['RadioTipoClienteActualiza']; /*este es el del localstorage*/ 
        
        
        
        $p = $_POST['ClienteListadodeConveniosActualizar'];
        if($p==""){
            $ClienteListadodeConvenios = 'null';
        }else{
            $ClienteListadodeConvenios = $p+0;
        }
        $ComandoSql = "UPDATE `cliente` SET   NitCliente = '".$ClienteNumeroDocumentoActualizar."', TipoDocumentoCliente = '".$ClienteTipoDocumentoActualizar."', NombreCliente = '".strtoupper($ClienteNombreActualizar)."', ApellidoCliente = '".strtoupper($ClienteApellidoActualizar)."', DireccionCliente = '".strtoupper($ClienteDireccionActualizar)."', Telefono1Cliente = '".$ClienteTelefono1Actualizar."', Telefono2Cliente = '".$ClienteTelefono2Actualizar."', CorreoCliente = '".strtoupper($ClienteCorreoActualizar)."', ObservacionesCliente = '".strtoupper($ClienteObservacionesActualizar)."', PreferenciasCliente = '".strtoupper($ClientePreferenciasActualizar)."', ComisionCliente = '".$ClienteComisionConvenioActualizar."', NumeroCuentaCliente = '".$ClienteNumeroCuentaActualizar."', ActividadEconomicaCliente = '".strtoupper($ClienteActividadEconomicaActualizar)."', ValorCreditoCliente = '".$ClienteValorCreditoActualizar."', NacionalidadCliente = '".strtoupper($NacionalidadClienteParticularActualizar)."', CodigoMagicoCliente = '".$ClienteCodigoMagicoActualizar."', IdCiudad = '".$ClienteCiudadListaActualizar."', IdClienteTipo = '".$RadioTipoClienteActualiza."', IdPersonaTipo = '".$ClienteTipoPersonaActualizar."', IdContribuyenteTipo = '".$ClienteTipoContribuyenteActualizar."', IdConvenio = ".$ClienteListadodeConvenios." WHERE  IdCliente = $ClienteCodigo ";
                   /* echo $ComandoSql;    */
                $Resultado=$conexion->query($ComandoSql);
                if($Resultado == true){
                    echo "ACTUALIZO";
                }else{
                    echo "NOACTUALIZO";
                }
            
            break;
        
        

            case "ConsultaCliente":

                $NumeroDocumento = $_POST['NumeroDocumento'];
                //echo $NumeroDocumento;
                $ComandoSql = "SELECT COUNT(*) AS 'TOTAL' FROM cliente c WHERE c.NitCliente = '".$NumeroDocumento."'";
                //echo $ComandoSql;
                $Resultado2=$conexion->query($ComandoSql);
                $total= $Resultado2->fetch_array();
                $dato =  $total["TOTAL"] + 0;
                if($dato == 0){
                    echo "CLIENTENOCONTRADO";
                }else{
                    echo "CLIENTEENCONTRADO";
                }
            break;

            case "ConsultaDepartamento":

                $Ciudad = $_POST['Ciudad'];

                $ComandoSql = "SELECT IdDepartamento FROM ciudad c WHERE c.IdCiudad = '".$Ciudad."' ORDER BY IdDepartamento LIMIT 1   ";
               
                $Resultado2=$conexion->query($ComandoSql);
                $total= $Resultado2->fetch_array();
                if($Resultado2 == true){
                    echo $total['IdDepartamento'];
                }else{
                    echo "ERROR EN ENCONTRAR DEPARTAMENTO";
                }
            break;


            
            case "ConsultaDatosCliente":

                $NumeroDocumento = $_POST['NumeroDocumento'];
                //echo $NumeroDocumento;
                $ComandoSql = "SELECT * FROM cliente c WHERE c.NitCliente = '".$NumeroDocumento."'";
                
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
    $ComandoSql='SELECT movimientohabitacion.IdHabitacion, habitacion.NombreHabitacion,movimientohabitacion.FechaEntradaMovimientoHabitacion,movimientohabitacion.FechaSalidaMovimientoHabitacion FROM `movimientohabitacion`,habitacion WHERE movimientohabitacion.EstadoMovimientoHabitacion="ACTIVO" and movimientohabitacion.TipoMovimientoHabitacion="RESERVA GARANTIZADA" OR movimientohabitacion.TipoMovimientoHabitacion="RESERVA NO GARANTIZADA" AND movimientohabitacion.IdHabitacion=habitacion.IdHabitacion GROUP by movimientohabitacion.IdHabitacion';
    if($Resultado=$conexion->query($ComandoSql))
    {
        $titulo="";
    while($row= $Resultado->fetch_array())
        {      
            $data[] = array(
                'id'   => $row["IdHabitacion"],
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
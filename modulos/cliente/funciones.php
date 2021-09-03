
<?php
include('../conexion.php');

$NombreProceso = isset($_POST['NombreProceso']) ? trim($_POST['NombreProceso']) : $_GET['NombreProceso'];  

switch ($NombreProceso ) {

    case 'RegistrarTipoContribuyente':

        $TipoContribuyenteNombre = $conexion->real_escape_string($_POST['TipoContribuyenteNombre']);
        $ComandoSql="INSERT INTO `tipocontribuyente`(`IdTipoContribuyente`, `NombreTipoContribuyente`) VALUES ('','".strtoupper($TipoContribuyenteNombre). "');";
        $resultado = $conexion->query($ComandoSql);
        if ($resultado == true) {
            echo 'REGISTRO';
        } else {
            echo 'ERROR';
        }
            break;

    case 'ConsultaTipoContribuyente':

        
        $TipoContribuyenteCodigo = $conexion->real_escape_string($_POST['TipoContribuyenteCodigo']);
        $ComandoSql="SELECT * FROM tipocontribuyente  WHERE  IdTipoContribuyente ='".$TipoContribuyenteCodigo."'";
        //echo $ComandoSql;
        $resultado = $conexion->query($ComandoSql);
        
        $datos = array();

        while ($fila = mysqli_fetch_array($resultado)) {
            $datos[] =    mb_convert_encoding( $fila, 'UTF-8', 'ISO-8859-1');
        }
        echo json_encode($datos);
            break;

    case 'ActualizarTipoContribuyente':
    
        $TipoContribuyenteCodigo = $conexion->real_escape_string($_POST['TipoContribuyenteCodigo']);
        $TipoContribuyenteNombre = $conexion->real_escape_string($_POST['TipoContribuyenteNombre']);

        $ComandoSql=" UPDATE tipocontribuyente SET NombreTipoContribuyente ='".strtoupper($TipoContribuyenteNombre)."' WHERE  IdTipoContribuyente ='".$TipoContribuyenteCodigo."'";
        $resultado = $conexion->query($ComandoSql);
        if ($resultado == true) {
            echo 'ACTUALIZAR';
        } else {
            echo 'ERROR';
        }
            break;
    
    case 'RegistrarVehiculo':

            $IdCliente = $conexion->real_escape_string($_POST['IdCliente']);
            $VehiculoPlaca = $conexion->real_escape_string($_POST['VehiculoPlaca']);
            $VehiculoFechaEntrada = $conexion->real_escape_string($_POST['VehiculoFechaEntrada']);
            $VehiculoFechaSalida = $conexion->real_escape_string($_POST['VehiculoFechaSalida']);
            $VehiculoObservacion = $conexion->real_escape_string($_POST['VehiculoObservacion']);
    
            $ComandoSql = "INSERT INTO `vehiculocliente` ( `PlacaVehiculoCliente`, `DescripcionVehiculoCliente`, `FechaInicialVehiculoCliente`, `FechaFinalVehiculoCliente`, `IdCliente`) VALUES('" .strtoupper($VehiculoPlaca)."','" . strtoupper($VehiculoObservacion) . "','" . strtoupper($VehiculoFechaEntrada) . "','" . strtoupper($VehiculoFechaSalida) . "','" . strtoupper($IdCliente)  ."')";
         
            $resultado = $conexion->query($ComandoSql);
            
            if ($resultado == true) {
                echo 'REGISTRO';
            } else {
                echo 'ERROR';
            }
    break;    
    
    case 'IsertarConvenio':

            $ConvenioCodigo = $conexion->real_escape_string($_POST['ConvenioCodigo']);
            $ConvenioEstado = $conexion->real_escape_string($_POST['ConvenioEstado']);
            $ConvenioNombre = $conexion->real_escape_string($_POST['ConvenioNombre']);
            $ConvenioFormaPago = $conexion->real_escape_string($_POST['ConvenioFormaPago']);
            $ConvenioFechaInicio = $conexion->real_escape_string($_POST['ConvenioFechaInicio']);
            $ConvenioFechaFinal = $conexion->real_escape_string($_POST['ConvenioFechaFinal']);
            
            
    
            $ComandoSql = "INSERT INTO `convenio` ( `CodigoConvenio`, `EstadoConvenio`, `NombreConvenio`, `FormaPagoConvenio`, `InicioFechaConvenio`, `FinFechaConvenio`) VALUES('".strtoupper($ConvenioCodigo)."','".strtoupper($ConvenioEstado)."','".strtoupper($ConvenioNombre)."','".strtoupper($ConvenioFormaPago)."','".strtoupper($ConvenioFechaInicio)."','".strtoupper($ConvenioFechaFinal)."')";
         
            $resultado = $conexion->query($ComandoSql);
            
            if ($resultado == true) {
                echo 'REGISTRO';
            } else {
                echo 'ERROR';
            }
    break;    
    
    case 'ActualizarConvenio':

            $Identificador = $conexion->real_escape_string($_POST['Identificador']);
            $ConvenioCodigo = $conexion->real_escape_string($_POST['ConvenioCodigo']);
            $ConvenioEstado = $conexion->real_escape_string($_POST['ConvenioEstado']);
            $ConvenioNombre = $conexion->real_escape_string($_POST['ConvenioNombre']);
            $ConvenioFormaPago = $conexion->real_escape_string($_POST['ConvenioFormaPago']);
            $ConvenioFechaInicio = $conexion->real_escape_string($_POST['ConvenioFechaInicio']);
            $ConvenioFechaFinal = $conexion->real_escape_string($_POST['ConvenioFechaFinal']);
        
            
            $ComandoSql = "UPDATE `convenio` SET `CodigoConvenio`='".strtoupper($ConvenioCodigo)."', `EstadoConvenio`='".strtoupper($ConvenioEstado)."', `NombreConvenio`='".strtoupper($ConvenioNombre)."', `FormaPagoConvenio`='".strtoupper($ConvenioFormaPago)."', `InicioFechaConvenio`='".strtoupper($ConvenioFechaInicio)."', `FinFechaConvenio`='".strtoupper($ConvenioFechaFinal)."'  WHERE `IdConvenio`='".$Identificador."'";
         
            $resultado = $conexion->query($ComandoSql);
            
            if ($resultado == true) {
                echo 'ACTUALIZO';
            } else {
                echo 'ERROR';
            }
    break;    

    case 'ConsultaCliente':

        $CedulaCliente = $conexion->real_escape_string($_POST['CedulaCliente']);

        $ComandoSql = "SELECT * FROM cliente  WHERE  `cliente`.`NitCliente`= '" . $CedulaCliente . "'";
        $resultado = $conexion->query($ComandoSql);
            $valor_conulta0 = "";
            $valor_conulta1 = "";
            $valor_conulta2 = "";
        while ( $d = mysqli_fetch_array($resultado)) {
            $valor_conulta0 = $d[0];
            $valor_conulta1 = $d[1];
            $valor_conulta2 = $d[2];
        }
        // $valor_conulta;


        if ($resultado == true) {
            $arreglo =  array('Id' => $valor_conulta0, 'Nombre'=>$valor_conulta1, 'Apellido'=>$valor_conulta2 );
            echo  json_encode($arreglo);
        } else {
            $arreglo = array('Id' => $valor_conulta0, 'Nombre' => $valor_conulta1, 'Apellido' => $valor_conulta2);
            echo json_encode($arreglo);
        }

    break;

    case 'ConsultarVehiculo':

        $IdVehiculo = $conexion->real_escape_string($_POST['IdVehiculo']);
        //echo $IdVehiculo;
        $ComandoSql = "SELECT * FROM `vehiculocliente` INNER JOIN cliente  ON vehiculocliente.IdCliente = cliente.IdCliente and vehiculocliente.IdVehiculoCliente = '" . $IdVehiculo . "'";
        //echo $ComandoSql;
        if ($Resultado = $conexion->query($ComandoSql))
        {
            $rows = array();
            while ($fila = $Resultado->fetch_array()) {
                $rows[] = $fila;
            }
            //echo "Trajo: ".$rows[];
            echo json_encode($rows);
        }
        
    break;

    case 'ActualizarVehiculo':

        $Codigo = $conexion->real_escape_string($_POST['Codigo']);
        $Vehiculo = $conexion->real_escape_string($_POST['Vehiculo']);
        $FechaInicial = $conexion->real_escape_string($_POST['FechaInicial']);
        $FechaFinal = $conexion->real_escape_string($_POST['FechaFinal']);
        $Documento = $conexion->real_escape_string($_POST['Documento']);
        $Observacion = $conexion->real_escape_string($_POST['Observacion']);
        
        $ComandoSql = "UPDATE `vehiculocliente` SET `PlacaVehiculoCliente`='".strtoupper($Vehiculo)."',`DescripcionVehiculoCliente`= '".strtoupper($Observacion)."',`FechaInicialVehiculoCliente`='".$FechaInicial."',`FechaFinalVehiculoCliente`='".$FechaFinal."',  `IdCliente`= (SELECT IdCliente from cliente WHERE NitCliente = '".$Documento."') WHERE `IdVehiculoCliente`= '".$Codigo."'  ";
       
        $resultado = $conexion->query($ComandoSql);
        
            if ($resultado == true) {
                echo 'ACTUALIZO';
            } else {
                echo 'ERROR';
            }
    break;

        

            default:
            echo "se jodio mijo";
             break;
    }









?>
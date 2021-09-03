<?php

$localhost = "localhost";
$Usuario = "root";
$Contrasena = "";
$BaseDatos = "dbhottur";

global $conexion;
$conexion = new mysqli($Servidor,$Usuario,$Contrasena,$BaseDatos);


/*
function HistorialProcesos($NombreTabla,$NombreId)
{
        $NombreProceso;
        $ComandoHistorial='SELECT * FROM '.$NombreTabla.' ORDER by  '.$NombreId.' DESC LIMIT 1';
        $Resultado=$conexion->query($ComandoSql);   
        $IdProceso;
        while($fila= $Resultado->fetch_array())
        {   
            $IdProceso=$fila[0];
        } 
        
        switch($IdProceso)
        {
            case "comprobanteegreso":
            $NombreProceso="DEVOLUCION";
            break;

            case "consumos":
            $NombreProceso="REGISTRO DE CONSUMOS";
            break;

            case "ingresocomprobante":
            $NombreProceso="ABONO";
            break;

            case "transferenciacomporbanteingreso":
            $NombreProceso="TRANSFERENCiA";
            break;
            
            case "transferenciafolio":
            $NombreProceso="TRANSFERENCIA A FOLIO";
            break;

            case "factura":
            $NombreProceso="FACTURA";
            break;

            case "facturaexterna":
            $NombreProceso="FACTURA EXTERNA";
            break;


            case "movimientohabitacion":
            $NombreProceso="REGISTRO";
            break;


            default:
            break;

        }
        
       
        $InsertHistorial='INSERT INTO `historialprocesousuario`(`IdProcesoRealizado`, `NombreProceso`, `FechaProceso`, `FechadelIngreso`, `IdUsuario`) VALUES ('.$IdProceso.',"'.$NombreProceso.'",CURRENT_DATE(),'.$FechaIngeso.','.$_SESSION['Usuario'].')';
}

if($conexion->connect_errno) {
    printf("Conexión fallida: %s\n", $mysqli->connect_error);
    exit();
}

if ($conexion->ping()) {
    printf ("¡La conexión está bien!\n");
} else {
    printf ("Error: %s\n", $mysqli->error);Id
}
*/
//echo "<h1> mostrar mensaje </h1>";
?>

<?php

require_once ('../conexion.php');
$NombreProceso = isset($_POST['NombreProceso']) ? trim($_POST['NombreProceso']) : $_GET['NombreProceso']; 
    switch ($NombreProceso) {

        case "CargarSelectDepartamentoDespuesDeCargarCiudad":
            
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

            default:
            echo "se jodio mijo";
             break;

     }
?>
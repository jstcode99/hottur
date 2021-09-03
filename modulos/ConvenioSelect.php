<?php
 $Servidor="localhost";
 $BaseDatos="dbhottur";
 $Usuario="root";
 $Contrasena="";
 global $conexion;
 $conexion = new mysqli($Servidor,$Usuario,$Contrasena,$BaseDatos);
   //require('../conexion.php');
$IdTipoCliente = $conexion->real_escape_string($_POST['TipoCliente']);
    // Con relaciones
    // $ComandoSql="SELECT cliente.IdCliente,convenio.CodigoConvenio,cliente.NombreCliente FROM cliente,convenio,clientetipo WHERE convenio.IdConvenio = cliente.IdConvenio AND clientetipo.IdClienteTipo = cliente.IdClienteTipo AND clientetipo.IdClienteTipo = '".$IdTipoCliente."'";
    // sin Relaciones 
    //$ComandoSql="SELECT cliente.IdCliente, cliente.NombreCliente, cliente.IdConvenio FROM cliente, clientetipo WHERE  clientetipo.IdClienteTipo = ".$IdTipoCliente." AND clientetipo.IdClienteTipo = cliente.IdClienteTipo AND cliente.IdConvenio !=''";


       $resultado=$conexion->query($ComandoSql);
       echo"<option value=''>Selecciones Convenio</option>";
         while($fila=$resultado->fetch_array())
         {
            // Con Relaciones
             echo"<option value='".$fila['IdCliente']."'>".$fila['CodigoConvenio']."-".$fila['NombreCliente']."</option>"; 
            //Sin Relaciones
            // $ComandoSql1 = "SELECT CodigoConvenio,NombreConvenio FROM convenio WHERE IdConvenio = ".$fila['IdConvenio'].";";
            // $resultado1=$conexion->query($ComandoSql1);
            // $fila1=$resultado1->fetch_array();
// 
            // echo"<option value='".$fila['IdCliente']."'>".$fila1['CodigoConvenio']."-".$fila['NombreCliente']."</option>"; 
        }
?>



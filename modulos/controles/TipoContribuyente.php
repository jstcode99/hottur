<?php
require_once('../conexion.php');
$ComandoSql="SELECT * from contribuyentetipo";
$resultado=$conexion->query($ComandoSql);
while($fila=$resultado->fetch_array())
{
   echo"<option value='".$fila['IdContribuyenteTipo']."'>".$fila['NombreContribuyenteTipo']."</option>"; 
}  
?>



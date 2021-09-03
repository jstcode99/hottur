<?php
require_once('../conexion.php');
$ComandoSql="SELECT * from personatipo";
$resultado=$conexion->query($ComandoSql);
while($fila=$resultado->fetch_array())
{
echo"<option value='".$fila['IdPersonaTipo']."'>".$fila['NombrePersonaTipo']."</option>"; 
}
?>



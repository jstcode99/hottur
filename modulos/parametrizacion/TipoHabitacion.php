<?php
require_once('../conexion.php');

$ComandoSql= "SELECT * from habitaciontipo";
$resultado=$conexion->query($ComandoSql);
while($fila=$resultado->fetch_array())
{
echo"<option value='".$fila['IdHabitacionTipo']."'>".$fila['NombreHabitacionTipo']."</option>";
}
?>
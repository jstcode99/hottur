<?php
include('../../../conexion.php');

$ComandoSql = "SELECT * FROM `ciudad`";
$resultado = $conexion->query($ComandoSql);
while ($fila = $resultado->fetch_array()) {
    echo "<option value ='".$fila['IdCiudad']."'>".utf8_encode($fila['NombreCiudad'])."</option> ";
}
?>



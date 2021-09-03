<?php
include('../conexion.php');

$IdDepartamento = $_POST['IdDepartamento'];

$ComandoSql = "SELECT * FROM `ciudad` WHERE `IdDepartamento`='".$IdDepartamento."'";
$Resultado = $conexion->query($ComandoSql);
while($fila= $Resultado->fetch_array()) {
    echo "<option value='".$fila["IdCiudad"]."'>".utf8_encode($fila["NombreCiudad"])."</option>";
}
?>



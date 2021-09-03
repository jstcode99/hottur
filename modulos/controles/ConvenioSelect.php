<?php
include('../conexion.php');
$ComandoSql = "SELECT * FROM `convenio` WHERE EstadoConvenio='ACTIVO'";
$resultado = $conexion->query($ComandoSql);
while ($fila = $resultado->fetch_array()) {
    echo " <option value = '" . $fila['IdConvenio'] . "' > " . $fila['CodigoConvenio'] . "    " . $fila['NombreConvenio'] . " </option> ";
}
?>
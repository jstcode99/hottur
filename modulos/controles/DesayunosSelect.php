<?php
   require_once('../conexion.php');

   $ComandoSql="SELECT NombreProductos,ValorProductos FROM `productos` WHERE NombreProductos LIKE '%DESAYUNO%'";


       $resultado=$conexion->query($ComandoSql);
       

         while($fila=$resultado->fetch_array())
         {
            echo"<option value='".$fila['NombreProductos']."-".$fila['ValorProductos']."'>".$fila['NombreProductos']."</option>"; 
        }
?>



<?php
   require_once('../conexion.php');

   $ComandoSql="SELECT * FROM clientetipo";

  // $Resultado=

       $resultado=$conexion->query($ComandoSql);
       
         while($fila=$resultado->fetch_array())
         {
            echo"<option value='".$fila['IdClienteTipo']."'>".$fila['NombreClienteTipo']."</option>"; 
        }
?>
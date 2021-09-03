<?php
   require_once('../conexion.php');

   $ComandoSql="SELECT * from tarifa";

  // $Resultado=

?>


   <?php
       $resultado=$conexion->query($ComandoSql);
       

         while($fila=$resultado->fetch_array())
         {
            echo"<option value='".$fila['IdTarifa']."'>".$fila['NombreTarifa']."</option>"; 
        }
    ?>



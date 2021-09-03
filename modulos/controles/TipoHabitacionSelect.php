<?php
   require_once('../conexion.php');

   $ComandoSql="SELECT NombreTipoHabitacion from Tipohabitacion";

  // $Resultado=

?>


   <?php
       $resultado=$conexion->query($ComandoSql);
       

         while($fila=$resultado->fetch_array())
         {
            echo"<option value='".$fila['NombreTipoHabitacion']."'>".$fila['NombreTipoHabitacion']."</option>"; 
        }
    ?>



<?php
   require_once('../conexion.php');

   $ComandoSql="SELECT * from departamento";

  // $Resultado=

?>
   <?php
       $resultado=$conexion->query($ComandoSql);
       

         while($fila=$resultado->fetch_array())
         {
            echo"<option  value='".$fila['IdDepartamento']."'>".$fila['NombreDepartamento']."</option>"; 
        }
    ?>



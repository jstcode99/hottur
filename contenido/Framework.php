
<?php
      include ('../modulos/conexion.php');

        session_start();

        if(isset($_SESSION['Usuario']))
        {
          
        }
        else
        {
            session_destroy();
            header('Location:sesion.php');
        }
?>  
<!DOCTYPE html>
<html lang="es">
<head>
<?php
require_once ('../contenido/cabecera.php');
require_once ('../contenido/librerias.php');

?>
<script type="text/javascript" src="../js/TraerFormularios.js"></script>
</head>
<body>
<div id="wrapper">
    <?php
    require_once ('../contenido/menu.php');
    require_once ('../contenido/menulateral.php');
    require_once ('../contenido/RackGrafico.php');
    ?>
    
    <div  id="Forms"> 
    
    
    </div>
   
<?php
    include('../contenido/pie.php');
?>
</div>   
</body>

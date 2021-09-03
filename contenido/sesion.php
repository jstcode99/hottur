<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico"-->

    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
  </head>

  <body>
  <div class="container">
      <div class="row">
          <div class="col-sm-6 col-md-4 col-md-offset-4">
              <h1 class="text-center login-title">Iniciar Sesión</h1>
              <div class="account-wall">
                  <img class="profile-img" src=""
                      alt="">
                      <form class="form-signin" action="sesion.php" target="_self" method="post">
                        <input type="email" name="Usuario" class="form-control" placeholder="Correo" required autofocus>
                        <br>
                        <input type="password" name="Contrasena" class="form-control" placeholder="Contraseña" required>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Inciar Sesión</button>
                      </form> 
          </div>
      </div>
  </div>
</body>
</html>

<?php

  if($_POST)
  {
    require_once ('../modulos/conexion.php');
    @$Usuario=strtoupper($_POST['Usuario']);
    @$Contrasena=sha1($_POST['Contrasena']);
   $Comando="SELECT CorreoUsuario,ContrasenaUsuario,RolUsuario,NombreUsuario,IdUsuario FROM `usuario` WHERE `CorreoUsuario`='".$Usuario."';";    
   if($Resultado=$conexion->query($Comando))
   {    
       while($fila=$Resultado->fetch_array())
       {
           if($Usuario == $fila[0]  && $Contrasena == $fila[1])
           {
              
               session_start();
                $_SESSION['Usuario']=$Usuario;
                $_SESSION['Clave']=$Contrasena;
                $_SESSION['Rol']=$fila[2];
                $_SESSION['Nombre']=$fila[3];
                $_SESSION['IdUsuario']=$fila[4];          
                header('Location:Framework.php');        
           }
           else
           {
              
            echo '<br><div class="alert alert-warning alert-dismissible" role="alert">
            <strong>Warning!</strong> El usuario o contraseña con incorrectos!.
            </div>';
            exit();
            }
       }
   }
  }
   
?>
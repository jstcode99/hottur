
<?php
/// descodifica las variables que contengan caracteres unicode ejemplo:nombre con tilde JOSË
// es para descodificar y poder mostrar los en las cajas
      function utf8_converter($array) 
      { 
          array_walk_recursive ($array,function(&$item,$key) { 
              if (!mb_detect_encoding($item,'utf-8',true)){ 
                      $item = utf8_encode($item); 
              } 
          } ) ;
      
          return  $array ; 
      }

    require_once ('../conexion.php');
    /**--------------------------------- Registrar Usuarios---------------------------------------------------- */
    $NombreProceso = isset($_POST['NombreProceso']) ? trim($_POST['NombreProceso']) : $_GET['NombreProceso']; 
    switch ($NombreProceso ) {
        case "RegistrarUsuario":
        {      
          $ComandoSql="SELECT `IdDatosEmpresa` FROM `datosempresa` WHERE 1 LIMIT 1";
          //  echo "el registro fue completado y el comando es -->".$comandoSql;
          $Resultado=$conexion->query($ComandoSql);
            while($fila= $Resultado->fetch_array())
              {
              $CodigoEmpresa=$fila[0];
            //echo "registro insertado";                 
              }  
              $RolUsuario=$_POST['RolUsuario'];
              $NombreUsuario=$conexion->real_escape_string($_POST['NombreUsuario']);
              $ApellidoUsuario=$conexion->real_escape_string($_POST['ApellidoUsuario']);
              $TelefonoUsuario=$conexion->real_escape_string($_POST['TelefonoUsuario']);
              $CorreoUsuario=$conexion->real_escape_string($_POST['CorreoUsuario']);
              $ContrasenaUsuario=$conexion->real_escape_string($_POST['ContrasenaUsuario']);



              /*VALIDACION SI EL CORREO INGRESADO YA EXISTE EN LA BASE DE DATOS NO PERMITA E REGISTRO */
              $ComandoSqlCorreo="SELECT `CorreoUsuario` FROM `usuario` WHERE `CorreoUsuario`='".strtoupper($CorreoUsuario)."';";
              ///echo "".$ComandoSqlCorreo;
              if($Resultado=$conexion->query($ComandoSqlCorreo))
              {
              /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
              /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                while($fila= $Resultado->fetch_array())
                  {
                    $CorreoRecibido=$fila[0];
                    if($CorreoRecibido==strtoupper($CorreoUsuario))
                    {
                      echo "ERROR";  
                      exit();  
                    }
                
                  }
              }


          $ComandoSql="INSERT INTO `usuario`(`IdUsuario`, `RolUsuario`, `NombreUsuario`, `ApellidoUsuario`, `TelefonoUsuario`, `CorreoUsuario`, `IdDatosEmpresa`, `ContrasenaUsuario`) VALUES ('','".strtoupper($RolUsuario)."','".strtoupper($NombreUsuario)."','".strtoupper($ApellidoUsuario)."','".$TelefonoUsuario."','".strtoupper($CorreoUsuario)."',".$CodigoEmpresa.",'".sha1($ContrasenaUsuario)."');";
          //echo "<br>".$ComandoSql;
          // echo "<script>alert('Sentencia: '+".$ComandoSql.");</script>";
          $resultado = $conexion->query($ComandoSql);
          if($resultado==true)
          {
            echo "REGISTRO";    
          }
          else
          {
            echo "NOREGISTRO";             
          }
      
  
        }
        break;
    /**--------------------------------- Registrar Usuarios---------------------------------------------------- */


  
    /**--------------------------------- Actualizar Usuarios---------------------------------------------------- */
    case "ActualizarDatosUsuario":
    {       
          
          $Where=" WHERE `IdUsuario`=".$_POST['IdUsuario'];
          $RolUsuario=$_POST['RolUsuario'];
          $AnWhere="`RolUsuario`='".$RolUsuario."'";
          $ComandoSqlUpdate="UPDATE `usuario` SET ";
          $NombreUsuario=$conexion->real_escape_string($_POST['NombreUsuario']);
          if($NombreUsuario!="")
          {
            //echo "en if";
            $ComandoSqlUpdate.="`NombreUsuario`='".strtoupper($NombreUsuario)."',";
          }

          $ApellidoUsuario=$conexion->real_escape_string($_POST['ApellidoUsuario']);
          if($ApellidoUsuario!="")
          {
            $ComandoSqlUpdate.="`ApellidoUsuario`='".strtoupper($ApellidoUsuario)."',";
          }

          $TelefonoUsuario=$conexion->real_escape_string($_POST['TelefonoUsuario']);
          if($TelefonoUsuario!="")
          {
            $ComandoSqlUpdate.="`TelefonoUsuario`='".$TelefonoUsuario."',";
          }

          $CorreoUsuario=$conexion->real_escape_string($_POST['CorreoUsuario']);
          if($CorreoUsuario!="")
          {
            $ComandoSqlUpdate.="`CorreoUsuario`='".strtoupper($CorreoUsuario)."',";
          }

          $ContrasenaUsuario=$conexion->real_escape_string($_POST['ContrasenaUsuario']);
          if($ContrasenaUsuario!="")
          {
            $ComandoSqlUpdate.="`ContrasenaUsuario`='".sha1($ContrasenaUsuario)."',";
          }
          $ComandoSqlUpdate=$ComandoSqlUpdate. $AnWhere.$Where;
           /*VALIDACION SI EL CORREO INGRESADO YA EXISTE EN LA BASE DE DATOS NO PERMITA E REGISTRO */
          $ComandoSqlCorreo="SELECT `CorreoUsuario` FROM `usuario` WHERE `CorreoUsuario`='".strtoupper($CorreoUsuario)."';";
          ///echo "".$ComandoSqlCorreo;
          if($Resultado=$conexion->query($ComandoSqlCorreo))
          {
           /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
           /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
            while($fila= $Resultado->fetch_array())
              {
                $CorreoRecibido=$fila[0];
                if($CorreoRecibido==strtoupper($CorreoUsuario))
                {
                  echo "ERROR";   
                  exit();  
                }
            
              }
          }
          /*
          echo '<div class="alert alert-danger" role="alert" id="Resultado">¡Sentencia! '.$ComandoSqlUpdate.' ';
          echo '<a class="close" data-dismiss="alert" aria-label="Close" onclick="TraerFormulario(8);">
          <span aria-hidden="true">&times;</span>
          </a>
          </div>';*/
          //echo "<br>".$ComandoSql;
          // echo "<script>alert('Sentencia: '+".$ComandoSql.");</script>";
          $resultado = $conexion->query($ComandoSqlUpdate);
          if($resultado==true)
          {
            echo 'ACTUALIZO';    
          }
          else
          {
            echo 'NOACTUALIZO';   
            
          }
      
  
        }
        break;
        /**--------------------------------- Actualizar Usuarios---------------------------------------------------- */


        /**--------------------------------- Traer Usuarios---------------------------------------------------- */
        case "TraerUsuario":
    {
      $IdUsuario=$_POST['IdUsuario'];
      $ComandoSql="SELECT * FROM `usuario` WHERE `IdUsuario`='".$IdUsuario."';";
    
      if($Resultado=$conexion->query($ComandoSql))
      {
        $rows=array();
        $rows=array();
      while($fila= $Resultado->fetch_array())
          {
            $rows[]=$fila;

          }
          $rows=utf8_converter($rows);
          echo json_encode($rows);
      }
    }
    break;
  /**--------------------------------- Traer Usuarios---------------------------------------------------- */
    
/**--------------------------------- RegistrarParametrizacionhotel ---------------------------------------------------- */
case "RegistrarParametrizacionhotel":
{      
  $ComandoSql="SELECT * FROM `parametros` WHERE 1";
  //  echo "el registro fue completado y el comando es -->".$comandoSql;
  $Resultado=$conexion->query($ComandoSql);
    while($fila= $Resultado->fetch_array())
      {
       $Verificar=$fila[0];
       if($Verificar!="")
       {
         echo "ERROR";
         exit();
       }
            
      }  
      $ParametrosHoraCheckIn=$_POST['ParametrosHoraCheckIn'];
      $ParametrosHoraCheckOut=$conexion->real_escape_string($_POST['ParametrosHoraCheckOut']);
      $ParametrosLimiteEdad=$conexion->real_escape_string($_POST['ParametrosLimiteEdad']);
      $ParametrosPorcentajePenalizacion=$conexion->real_escape_string($_POST['ParametrosPorcentajePenalizacion']);
      $ParametrosFechaVencimientoFactura=$conexion->real_escape_string($_POST['ParametrosFechaVencimientoFactura']);
      $ParametrosValorSeguro=$conexion->real_escape_string($_POST['ParametrosValorSeguro']);

      $ComandoSql="INSERT INTO `parametros`(`IdParametros`, `HoraCheckInParametros`, `HoraCheckOutParametros`, `LimiteEdadParametros`,`PorcentajePenalizacionParametros`, `FechaVencimientoFacturaParametros`,ValorSeguroParametros) VALUES ('','".$ParametrosHoraCheckIn."','".$ParametrosHoraCheckOut."','".$ParametrosLimiteEdad."','".$ParametrosPorcentajePenalizacion."','".$ParametrosFechaVencimientoFactura."',".$ParametrosValorSeguro.");";
      //echo "<br>".$ComandoSql;
      // echo "<script>alert('Sentencia: '+".$ComandoSql.");</script>";
      $resultado = $conexion->query($ComandoSql);
      if($resultado==true)
      {
        echo "REGISTRO";    
      }
      else
      {
        echo "NOREGISTRO";             
      }
  

    }
    break;


/**--------------------------------- RegistrarParametrizacionhotel ---------------------------------------------------- */


/**--------------------------------- RegistrarParametrizacionhotel ---------------------------------------------------- */

case "TraerParametrosHotel":
{

  $ComandoSql="SELECT * FROM `parametros` where IdParametros=1";
  if($Resultado=$conexion->query($ComandoSql))
  {
    $rows=array();
    $Verificador;
      while($fila= $Resultado->fetch_array())
      {
        $rows[] = $fila;
        $Verificador=$fila[0];
      }
       
       if(isset($Verificador)=="")
       {
         echo "NADA";
       }else{
        echo json_encode($rows);
       }
      
  }
}
break;
/**--------------------------------- RegistrarParametrizacionhotel ---------------------------------------------------- */

/**--------------------------------- RegistrarParametrizacionhotel ---------------------------------------------------- */

case "ActualizarParametrosHotel":
{
  $Where=" WHERE `IdParametros`=1";
  $ComandoSqlUpdate="UPDATE `parametros` SET ";

  $NuevaParametrosHoraCheckIn=$conexion->real_escape_string($_POST['NuevaParametrosHoraCheckIn']);
  if($NuevaParametrosHoraCheckIn!="")
  {
    $ComandoSqlUpdate.="`HoraCheckInParametros`='".$NuevaParametrosHoraCheckIn."',";
  }

  $NuevaParametrosHoraCheckOut=$conexion->real_escape_string($_POST['NuevaParametrosHoraCheckOut']);
  if($NuevaParametrosHoraCheckOut!="")
  {
    $ComandoSqlUpdate.="`HoraCheckOutParametros`='".$NuevaParametrosHoraCheckOut."',";
  }

  $NuevaParametrosLimiteEdad=$conexion->real_escape_string($_POST['NuevaParametrosLimiteEdad']);
  if($NuevaParametrosLimiteEdad!="")
  {
    $ComandoSqlUpdate.="`LimiteEdadParametros`='".$NuevaParametrosLimiteEdad."',";
  }

  $NuevaParametrosPorcentajePenalizacion=$conexion->real_escape_string($_POST['NuevaParametrosPorcentajePenalizacion']);
  if($NuevaParametrosPorcentajePenalizacion!="")
  {
    $ComandoSqlUpdate.="`PorcentajePenalizacionParametros`='".$NuevaParametrosPorcentajePenalizacion."',";
  }
  
  $NuevaParametrosFechaVencimientoFactura=$conexion->real_escape_string($_POST['NuevaParametrosFechaVencimientoFactura']);
  if($NuevaParametrosFechaVencimientoFactura!="")
  {
    $ComandoSqlUpdate.="`FechaVencimientoFacturaParametros`='".$NuevaParametrosFechaVencimientoFactura."',";
  }
  

  $NuevoParametrosValorSeguro=$conexion->real_escape_string($_POST['NuevoParametrosValorSeguro']);
  if($NuevoParametrosValorSeguro!="")
  {
    $ComandoSqlUpdate.="`ValorSeguroParametros`='".$NuevoParametrosValorSeguro."'";
  }
  $ComandoSqlUpdate=$ComandoSqlUpdate.$Where;

  $resultado = $conexion->query($ComandoSqlUpdate);
  if($resultado==true)
  {
    echo 'ACTUALIZO';    
  }
  else
  {
    echo 'NOACTUALIZO';   
    
  }
  
}
break;

/**--------------------------------- RegistrarParametrizacionhotel ---------------------------------------------------- */
  
/**** brayan */

 

        

        case 'RegistrarHabitacion':
            $HabitacionNombre = $conexion->real_escape_string($_POST['HabitacionNombre']);
            $HabitacionEstado = $conexion->real_escape_string($_POST['HabitacionEstado']);
            $HabitacionTipo = $conexion->real_escape_string($_POST['HabitacionTipo']);
            $HabitacionObservacion = $conexion->real_escape_string($_POST['HabitacionObservacion']);
            $ComandoSql="INSERT INTO `habitacion`(`IdHabitacion`, `NombreHabitacion`, `EstadoHabitacion`, `ObservacionesHabitacion`,IdHabitacionTipo) VALUES ('','".strtoupper($HabitacionNombre)."','".strtoupper($HabitacionEstado)."','".strtoupper($HabitacionObservacion). "','" . strtoupper($HabitacionTipo) . "');";
            $resultado = $conexion->query($ComandoSql);
            if ($resultado == true) {
                echo 'REGISTRO';
            } else {
                echo 'ERROR';
            }
                break;

        case 'ConsultarHabitacion':

            //echo "<h1> entro". $_POST['NombreProceso']."</h1>";
            $HabitacionId = $conexion->real_escape_string($_POST['HabitacionId']);
            $ComandoSql= "SELECT * FROM `habitacion` h , `habitaciontipo` th WHERE h.IdHabitacionTipo = th.IdHabitacionTipo and h.IdHabitacion = '".$HabitacionId."'";
            $resultado = $conexion->query($ComandoSql);
            $rows = array();
            while($r = mysqli_fetch_array($resultado)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
            
                break;

        case 'ConsultarTipoHabitacion':

            //echo "<h1> entro". $_POST['NombreProceso']."</h1>";
            $TipoHabitacionId = $conexion->real_escape_string($_POST['TipoHabitacionId']);
            $ComandoSql= "SELECT * FROM `habitaciontipo` WHERE  IdHabitacionTipo = '".$TipoHabitacionId."'";
            $resultado = $conexion->query($ComandoSql);
            $rows = array();
            while($r = mysqli_fetch_array($resultado)) {
                $rows[] = $r;
            }
            echo json_encode($rows);
            
                break;

        case 'ConsultarDatosEmpresa':

           $ComandoSql="SELECT * FROM `datosempresa` ORDER by IdDatosEmpresa ASC LIMIT 1";
           $resultado = $conexion->query($ComandoSql);
           $rows = array();
           while($r = mysqli_fetch_array($resultado)) {
                    $rows[] = $r;
            }
            echo json_encode($rows);

            break;


        case 'RegistrarDatosEmpresa':

        $DatosEmpresaNit = $conexion->real_escape_string($_GET['DatosEmpresaNit']);
        $DatosEmpresaNombre = $conexion->real_escape_string($_GET['DatosEmpresaNombre']);
        $DatosEmpresaTelefono = $conexion->real_escape_string($_GET['DatosEmpresaTelefono']);
        $DatosEmpresaCorreo = $conexion->real_escape_string($_GET['DatosEmpresaCorreo']);
        $DatosEmpresaDireccion = $conexion->real_escape_string($_GET['DatosEmpresaDireccion']);
        $DatosEmpresaWeb = $conexion->real_escape_string($_GET['DatosEmpresaWeb']);
        $DatosEmpresaLogo = date('Y-m-d').date('H-i-s').trim($_FILES['DatosEmpresaLogo']['name']);

         $ComandoSql="INSERT INTO `datosempresa` (`IdDatosEmpresa`, `NitDatosEmpresa`, `NombreDatosEmpresa`, `TelefonoDatosEmpresa`, `CorreoDatosEmpresa`, `DireccionDatosEmpresa`, `LogoDatosEmpresa`, `WebDatosEmpresa`) VALUES ('','".strtoupper($DatosEmpresaNit)."','".strtoupper($DatosEmpresaNombre)."','".strtoupper($DatosEmpresaTelefono)."','".strtoupper($DatosEmpresaCorreo)."','".strtoupper($DatosEmpresaDireccion)."','".$DatosEmpresaLogo."','".strtoupper($DatosEmpresaWeb)."');";
         $resultado = $conexion->query($ComandoSql);
        if($resultado==true)
        {
        move_uploaded_file($_FILES['DatosEmpresaLogo']['tmp_name'], 'ImagenLogo/'.$DatosEmpresaLogo);
         echo '<div class="alert alert-success" role="alert" id="Resultado">¡Registro Habitación realizado con Exito!! ';
         echo '<a class="close" data-dismiss="alert" aria-label="Close" >
         <span aria-hidden="true">&times;</span>
         </a>
         </div>';   
        }
        else
        {
         echo '<div class="alert alert-danger" role="alert" id="Resultado">¡NO SE REGISTRO Habitación !! ';
         echo '<a class="close" data-dismiss="alert" aria-label="Close" >
         <span aria-hidden="true">&times;</span>
         </a>
         </div>';
        }

            break;

        case 'ActualizarDatosEmpresaGET1':

        //SIN FOTO 
        $DatosEmpresaId = $conexion->real_escape_string($_GET['DatosEmpresaId']);
        $DatosEmpresaNit = $conexion->real_escape_string($_GET['DatosEmpresaNitActualizar']);
        $DatosEmpresaNombre = $conexion->real_escape_string($_GET['DatosEmpresaNombreActualizar']);
        $DatosEmpresaTelefono = $conexion->real_escape_string($_GET['DatosEmpresaTelefonoActualizar']);
        $DatosEmpresaCorreo = $conexion->real_escape_string($_GET['DatosEmpresaCorreoActualizar']);
        $DatosEmpresaDireccion = $conexion->real_escape_string($_GET['DatosEmpresaDireccionActualizar']);
        $DatosEmpresaWeb = $conexion->real_escape_string($_GET['DatosEmpresaWebActualizar']);


        $ComandoSql = "UPDATE `datosempresa` SET `NitDatosEmpresa` = '".strtoupper($DatosEmpresaNit) ."', `NombreDatosEmpresa` = '".strtoupper($DatosEmpresaNombre)."', `TelefonoDatosEmpresa` = '". strtoupper($DatosEmpresaTelefono) ."', `CorreoDatosEmpresa` = '". strtoupper($DatosEmpresaCorreo) ."', `DireccionDatosEmpresa` = '". strtoupper($DatosEmpresaDireccion) ."', `WebDatosEmpresa` = '".strtoupper($DatosEmpresaWeb)."' WHERE `datosempresa` . `IdDatosEmpresa` = '". $DatosEmpresaId."'";
        $resultado = $conexion->query($ComandoSql);
            if ($resultado == true) {
                echo '<div class="alert alert-success" role="alert" id="Resultado">Actualización Datos Hotel realizado con Exito!! ';
                echo '<a class="close" data-dismiss="alert" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                        </a>
                        </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert" id="Resultado">¡NO SE REGISTRO la Actualización Datos Hotel !! ';
                echo '<a class="close" data-dismiss="alert" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                        </a>
                        </div>';
            }

        break;    

        case 'ActualizarDatosEmpresaGET2':

        //CON FOTO 
        $DatosEmpresaId = $conexion->real_escape_string($_GET['DatosEmpresaId']);
        $DatosEmpresaNit = $conexion->real_escape_string($_GET['DatosEmpresaNitActualizar']);
        $DatosEmpresaNombre = $conexion->real_escape_string($_GET['DatosEmpresaNombreActualizar']);
        $DatosEmpresaTelefono = $conexion->real_escape_string($_GET['DatosEmpresaTelefonoActualizar']);
        $DatosEmpresaCorreo = $conexion->real_escape_string($_GET['DatosEmpresaCorreoActualizar']);
        $DatosEmpresaDireccion = $conexion->real_escape_string($_GET['DatosEmpresaDireccionActualizar']);
        $DatosEmpresaWeb = $conexion->real_escape_string($_GET['DatosEmpresaWebActualizar']);
        $DatosEmpresaLogoActualizar = date('Y-m-d') . date('H-i-s') . trim($_FILES['DatosEmpresaLogoActualizar']['name']);

        $ComandoSql = "SELECT * FROM `datosempresa`  where IdDatosEmpresa ='" . $DatosEmpresaId . "'";
        if ($Resultado = $conexion->query($ComandoSql)) {
            while ($fila = $Resultado->fetch_array()) {
                $foto = $fila['LogoDatosEmpresa'];
                echo "EL NOMBRE DE LA FOTO ES " . $foto;
                unlink('ImagenLogo/' . $foto);
            }
        }

        $ComandoSql = "UPDATE `datosempresa` SET `NitDatosEmpresa` = '".strtoupper($DatosEmpresaNit) ."', `NombreDatosEmpresa` = '".strtoupper($DatosEmpresaNombre)."', `TelefonoDatosEmpresa` = '". strtoupper($DatosEmpresaTelefono) ."', `CorreoDatosEmpresa` = '". strtoupper($DatosEmpresaCorreo) ."', `DireccionDatosEmpresa` = '". strtoupper($DatosEmpresaDireccion) ."', `WebDatosEmpresa` = '".strtoupper($DatosEmpresaWeb). "', `LogoDatosEmpresa` = '" . $DatosEmpresaLogoActualizar . "' WHERE `datosempresa` . `IdDatosEmpresa` = '". $DatosEmpresaId."'";
        $resultado = $conexion->query($ComandoSql);
            if ($resultado == true) {       
                move_uploaded_file($_FILES['DatosEmpresaLogoActualizar']['tmp_name'], 'ImagenLogo/' . $DatosEmpresaLogoActualizar);
                echo '<div class="alert alert-success" role="alert" id="Resultado">Actualización Datos Hotel realizado con Exito!! ';
                echo '<a class="close" data-dismiss="alert" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                        </a>
                        </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert" id="Resultado">¡NO SE REGISTRO la Actualización Datos Hotel !! ';
                echo '<a class="close" data-dismiss="alert" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                        </a>
                        </div>';
            }

        break;

        case 'RegistrarTipoHabitacion':
        $TipoHabitacionNombre = $conexion->real_escape_string($_POST['TipoHabitacionNombre']);
        $TipoHabitacionCantidadPax = $conexion->real_escape_string($_POST['TipoHabitacionCantidadPax']);
        $TipoHabitacionValorPax = $conexion->real_escape_string($_POST['TipoHabitacionValorPax']);
        $TipoHabitacionValorAdicional = $conexion->real_escape_string($_POST['TipoHabitacionValorAdicional']);
        
        $ComandoSql = "INSERT INTO `habitaciontipo` (`NombreHabitacionTipo`, `FechaCreacionHabitacionTipo`, `CantidadPaxHabitacionTipo`, `ValorPaxHabitacionTipo`, `ValorAdicionalHabitacionTipo`) VALUES('" . strtoupper($TipoHabitacionNombre) . "', CURDATE(), '" . strtoupper($TipoHabitacionCantidadPax) . "','" . strtoupper($TipoHabitacionValorPax) . "','" . strtoupper($TipoHabitacionValorAdicional) . "' );";
        $resultado = $conexion->query($ComandoSql);
        
        if ($resultado == true) {
            echo 'REGISTRO';
        } else {
            echo 'ERROR';
        }
        break;

        case 'ConsultarEmpresaRegistrada':
        
        $ComandoSql = "SELECT COUNT(IdDatosEmpresa) FROM `datosempresa`";
        $resultado = $conexion->query($ComandoSql);
        $CantidadEmpresas = 0;
           while($r = mysqli_fetch_array($resultado)) {
                    $CantidadEmpresas = $r;
            }
            if($CantidadEmpresas >= 1){
              echo "EMPRESAREGISTRADA";
            }else {
              echo "EMPRESANOREGISTRADA";
            }
        break;

        case 'ElminarTipoHabitacion':

        $TipoHabitacionId = $conexion->real_escape_string($_POST['TipoHabitacionId']);
        
        $ComandoSql = "DELETE FROM `habitaciontipo` WHERE IdHabitacionTipo ='". $TipoHabitacionId . "'";
        $resultado = $conexion->query($ComandoSql);
        //echo "RESULTADO ".$resultado;
        if ($resultado == true) {
            echo 'ELIMINO';
        } else {
            echo 'ERROR';
        }
        break;

        case 'ActualizarTipoHabitacion':

        $TipoHabitacionId = $conexion->real_escape_string($_POST['TipoHabitacionId']);
        $TipoHabitacionNombre = $conexion->real_escape_string($_POST['TipoHabitacionNombre']);
        $CantidadPax = $conexion->real_escape_string($_POST['CantidadPax']);
        $ValorPax = $conexion->real_escape_string($_POST['ValorPax']);
        $AdicionalPax = $conexion->real_escape_string($_POST['AdicionalPax']);

        $ComandoSql = "UPDATE `habitaciontipo` SET `NombreHabitacionTipo` ='" . strtoupper($TipoHabitacionNombre) . "', `CantidadPaxHabitacionTipo` ='" . strtoupper($CantidadPax) . "', `ValorPaxHabitacionTipo` ='" . strtoupper($ValorPax) . "', `ValorAdicionalHabitacionTipo` ='" . strtoupper($AdicionalPax) . "'  WHERE  `habitaciontipo`.`IdHabitacionTipo`= '" . $TipoHabitacionId . "'";
        $resultado = $conexion->query($ComandoSql);
        
        if ($resultado == true) {
            echo 'ACTUALIZO';
        } else {
            echo 'ERROR';
        }
        break;
        case 'ActualizarHabitacion':

        $HabitacionCodigoActualizar = $conexion->real_escape_string($_POST['HabitacionCodigoActualizar']);
        $HabitacionNombreAcutalizar = $conexion->real_escape_string($_POST['HabitacionNombreAcutalizar']);
        $HabitacionEstadoActualizar = $conexion->real_escape_string($_POST['HabitacionEstadoActualizar']);
        $HabitacionTipoActualizar = $conexion->real_escape_string($_POST['HabitacionTipoActualizar']);
        $HabitacionObservacionActualizar = $conexion->real_escape_string($_POST['HabitacionObservacionActualizar']);


        $ComandoSql = "UPDATE `habitacion` SET `NombreHabitacion`='".strtoupper($HabitacionNombreAcutalizar)."',`EstadoHabitacion`='".strtoupper($HabitacionEstadoActualizar)."',`ObservacionesHabitacion`='".strtoupper($HabitacionObservacionActualizar)."',`IdHabitacionTipo`='".strtoupper($HabitacionTipoActualizar)."' WHERE `IdHabitacion`='".$HabitacionCodigoActualizar."'";
        $resultado = $conexion->query($ComandoSql);
        
        if ($resultado == true) {
            echo 'ACTUALIZO';
        } else {
            echo 'ERROR';
        }
        break;    
     /**** brayan */
     
     /*---- jose -------*/


/* ------------------------------ Incio Funcion Ingresar Tarifa ------------------------------------------------- */

   case 'TarifaIngresar':

      $TarifaNombre = $conexion->real_escape_string($_POST['TarifaNombre']);
      $TarifaPorcentaje = $conexion->real_escape_string($_POST['TarifaProcentaje']);

      //echo "HOLA MUNDO";

      $ComandoSqlTarifaIngresar = "INSERT INTO `tarifa`( `NombreTarifa`, `PorcentajeTarifa`) VALUES ('".$TarifaNombre."','".$TarifaPorcentaje."')";

      $ResultadoTarifaIngresar = $conexion->query($ComandoSqlTarifaIngresar);

      if($ResultadoTarifaIngresar == true)
      {
      echo 'OK'; 
      }
      else
      {
        echo 'NO';
      }
 break;
 
/* ----------------------------- Fin Funcion Ingresar Tarifa ---------------------------------------------------- */

/* ---------------------------- Incio Funcion Cargar Datos Tarifa Actualizar ----------------------------------------------- */

    case 'TarifaCargarDatosActualizar':
    
      $TarifaId = $conexion->real_escape_string($_POST['IdTarifa']);

      $ComandoSqlTarifaCargarDatosActualizar = "SELECT * FROM `tarifa` WHERE IdTarifa ='".$TarifaId."'";

      $ResultadoTarifaCargarDatosActualizar = $conexion->query($ComandoSqlTarifaCargarDatosActualizar);

      $Array = array();

      while($AlmacenarDatos = mysqli_fetch_array($ResultadoTarifaCargarDatosActualizar))
      {
        $Array[] = $AlmacenarDatos ;
      }

      echo json_encode($Array);
    
    break;

/* ---------------------------- Fin Funcion Cargar Datos Tarifa Actualizar ------------------------------------------------ */

/*----------------------------- Incio Funcion Tarifa Actualizar ------------------------------------------------------------*/
case 'TarifaActualizar':
      
        $TarifaIdA = $conexion->real_escape_string($_POST['TarifaId']);
        $TarifaNombre = $conexion->real_escape_string($_POST['TarifaNombre']);
        $TarifaPorcentaje = $conexion->real_escape_string($_POST['TarifaPorcentaje']);

        $ComandoSqlTarifaActualizar = "UPDATE `tarifa` SET `NombreTarifa`='".$TarifaNombre."',`PorcentajeTarifa`='".$TarifaPorcentaje."' WHERE IdTarifa = '".$TarifaIdA."'";

        $ResultadoTarifaActualizar = $conexion->query($ComandoSqlTarifaActualizar);

        if($ResultadoTarifaActualizar == true)
        {
          echo 'OK'; 
        }
        else
        {
          echo 'NO';
        }
      
  break;
/*----------------------------- Fin Funcion Tarifa Actualizar -------------------------------------------------------------*/
        default:
               echo "se jodio mijo";
                break;
        }

?> 

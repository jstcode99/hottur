
<?php
    require_once ('../conexion.php');


    
/**--------------------------------- Registrar Tipo Producto ---------------------------------------------------- */
if($_POST['NombreProceso']=="RegistrarTipoProductos")
{        
      $TipoProductoNombre=$conexion->real_escape_string($_POST['TipoProductoNombre']);
      $TipoProductosObservaciones=$conexion->real_escape_string($_POST['TipoProductosObservaciones']);
      $TipoProductosImpuesto=$conexion->real_escape_string($_POST['TipoProductosImpuesto']);
      $TipoProductosCentroContable=$conexion->real_escape_string($_POST['TipoProductosCentroContable']);
      $TipoProductosCuentaContable=$conexion->real_escape_string($_POST['TipoProductosCuentaContable']);
      $TipoProductosConceptoContable=$conexion->real_escape_string($_POST['TipoProductosConceptoContable']);      
      $ComandoSql="SELECT NombreProductoTipo from productotipo where NombreProductoTipo='".strtoupper($TipoProductoNombre)."';";          
      //echo "Sentencia: ".$ComandoSql;
      if($Resultado=$conexion->query($ComandoSql))
      {                     
        while($fila= $Resultado->fetch_array())
          {                
            if(strtoupper($TipoProductoNombre)==$fila[0])
            {                
              echo 'ERROR';  
              exit();  
            }
        
          }
      }


      $ComandoSql="INSERT INTO `productotipo`(`IdProductoTipo`, `NombreProductoTipo`, `ObservacionesProductoTipo`, `ImpuestoProductoTipo`, `CentroContableProductoTipo`, `CuentaContableProductoTipo`, `ConceptoContableProductoTipo`) VALUES ('','".strtoupper($TipoProductoNombre)."','".strtoupper($TipoProductosObservaciones)."','".$TipoProductosImpuesto."','".strtoupper($TipoProductosCentroContable)."','".strtoupper($TipoProductosCuentaContable)."','".strtoupper($TipoProductosConceptoContable)."');";
      //echo "<br>".$ComandoSql;
      // echo "<script>alert('Sentencia: '+".$ComandoSql.");</script>";
      $resultado = $conexion->query($ComandoSql);
      if($resultado==true)
      {
        echo 'REGISTRO';    
      }
      else
      {
        echo 'NOREGISTRO'; 
        
      }
  

    }

        /**--------------------------------- Registrar Tipo Producto ---------------------------------------------------- */


        /**--------------------------------- Eliminar Tipo Producto ---------------------------------------------------- */
        if($_POST['NombreProceso']=="EliminarTipoProductos")
        {
          $IdTipoProducto=$conexion->real_escape_string($_POST['IdTipoProducto']);
          $ComandoExistentes="SELECT COUNT(`IdProductos`) FROM `productos` WHERE `IdTipoProducto`=".$IdTipoProducto.";";          
          
          $resultado = $conexion->query($ComandoExistentes);
          while($fila= $resultado->fetch_array())
          {                
            if($fila[0]>0)
            {                
              echo 'HAY';  
              exit();  
            }
        
          }                                  
          $ComandoSqlUpdate="DELETE FROM `tipoproducto` WHERE `IdTipoProducto`=".$IdTipoProducto.";";
              //echo "Sentencia: ".$ComandoSqlUpdate;            
              $resultado = $conexion->query($ComandoSqlUpdate);
              if($resultado==true)
              {
                echo 'ELIMINO';    
              }
              else
              {
                echo 'NOELIMINO'; 
                
              }
        }
/**--------------------------------- Eliminar Tipo Producto ---------------------------------------------------- */




/**--------------------------------- Traer Tipo Producto ---------------------------------------------------- */
if($_POST['NombreProceso']=="TraerTipoProductos")
{
  $IdTipoProducto=$_POST['IdTipoProducto'];
  $ComandoSql="SELECT * FROM `productotipo` WHERE `IdProductoTipo`='".$IdTipoProducto."';";
  if($Resultado=$conexion->query($ComandoSql))
  {
    $rows=array();
  while($fila= $Resultado->fetch_array())
      {
        $rows[] = $fila;
      }
      echo json_encode($rows);

  }
}
/**--------------------------------- Traer Tipo Producto ---------------------------------------------------- */



/**--------------------------------- Actualizar Tipo Producto ---------------------------------------------------- */
        if($_POST['NombreProceso']=="ActualizarDatosProductoTipos")
        {       

              //echo "aqui";    
              $Where=" WHERE `IdProductoTipo`=".$_POST['NuevoTipoProductoId'];
              $NuevoTipoProductosObservaciones=$_POST['NuevoTipoProductosObservaciones'];
              $AnWhere="`ObservacionesProductoTipo`='".$NuevoTipoProductosObservaciones."'";
              $ComandoSqlUpdate="UPDATE `productotipo`  SET ";
              $NuevoTipoProductoNombre=$conexion->real_escape_string($_POST['NuevoTipoProductoNombre']);
              if($NuevoTipoProductoNombre!="")
              {
                
                $ComandoSqlUpdate.="`NombreProductoTipo`='".strtoupper($NuevoTipoProductoNombre)."',";
              }
    
              $NuevoTipoProductosConceptoContable=$conexion->real_escape_string($_POST['NuevoTipoProductosConceptoContable']);
              if($NuevoTipoProductosConceptoContable!="")
              {
                $ComandoSqlUpdate.="`ConceptoContableProductoTipo`='".strtoupper($NuevoTipoProductosConceptoContable)."',";
              }
    
              $NuevoTipoProductosImpuesto=$conexion->real_escape_string($_POST['NuevoTipoProductosImpuesto']);
              if($NuevoTipoProductosImpuesto!="")
              {
                $ComandoSqlUpdate.="`ImpuestoProductoTipo`='".$NuevoTipoProductosImpuesto."',";
              }
    
              $NuevoTipoProductosCentroContable=$conexion->real_escape_string($_POST['NuevoTipoProductosCentroContable']);
              if($NuevoTipoProductosCentroContable!="")
              {
                $ComandoSqlUpdate.="`CentroContableProductoTipo`='".strtoupper($NuevoTipoProductosCentroContable)."',";
              }
    
              $NuevoTipoProductosCuentaContable=$conexion->real_escape_string($_POST['NuevoTipoProductosCuentaContable']);
              if($NuevoTipoProductosCuentaContable!="")
              {
                $ComandoSqlUpdate.="`CuentaContableProductoTipo`='".$NuevoTipoProductosCuentaContable."',";
              }
              $ComandoSqlUpdate=$ComandoSqlUpdate.$AnWhere.$Where;
              $ComandoSql="SELECT `NombreProductoTipo` FROM `productotipo` WHERE `NombreProductoTipo`='".strtoupper($NuevoTipoProductoNombre)."';";          
              //echo "Sentencia: ".$ComandoSql;
             
            // echo "Sentencia: ".$ComandoSqlUpdate;            
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

/**--------------------------------- Actualizar Tipo Producto ---------------------------------------------------- */



/**--------------------------------- Registrar Producto ---------------------------------------------------- */

            if($_POST['NombreProceso']=="RegistrarProductos")
          {        
          $ProductoNombre=$conexion->real_escape_string($_POST['ProductoNombre']);
          $ProductoMarca=$conexion->real_escape_string($_POST['ProductoMarca']);
          $ProductoValor=$conexion->real_escape_string($_POST['ProductoValor']);
          $ProductoObservaciones=$conexion->real_escape_string($_POST['ProductoObservaciones']);
          $ProductoDescripcion=$conexion->real_escape_string($_POST['ProductoDescripcion']);
          $ProductoIdProductoTipo=$conexion->real_escape_string($_POST['ProductoIdTipoProducto']);
          $ProductoIdProveedores=$conexion->real_escape_string($_POST['ProductoIdProveedores']);
          $ProductoCantidad=$conexion->real_escape_string($_POST['ProductoCantidad']);      
          $ProductoMedida=$conexion->real_escape_string($_POST['ProductoMedida']);      
          $ComandoSql="SELECT `NombreProductos`FROM `Productos` WHERE `NombreProductos`='".strtoupper($ProductoNombre)."';";          
          //echo "Sentencia: ".$ComandoSql;
          if($Resultado=$conexion->query($ComandoSql))
          {                     
            while($fila= $Resultado->fetch_array())
              {                
                if(strtoupper($ProductoNombre)==$fila[0])
                {                
                  echo 'ERROR';  
                  exit();  
                }
            
              }
          }


          $ComandoSql="INSERT INTO `productos`(`NombreProductos`, `ValorProductos`, `ObservacionesProductos`, `CantidadProductos`, `MedidaProductos`, `MarcaProductos`, `DescripcionProductos`, `IdProductoTipo`, `IdProveedores`)  VALUES ('".strtoupper($ProductoNombre)."',".$ProductoValor.",'".strtoupper($ProductoObservaciones)."',".$ProductoCantidad.",'".strtoupper($ProductoMedida)."','".strtoupper($ProductoMarca)."','".strtoupper($ProductoDescripcion)."',".$ProductoIdProductoTipo.",".$ProductoIdProveedores.");";
          $resultado = $conexion->query($ComandoSql);
          if($resultado==true)
          {
            echo 'REGISTRO';     
          }
          else
          {
            echo 'NOREGISTRO'; 
            
          }
      
  
        }
        /**--------------------------------- Registrar Producto ---------------------------------------------------- */


  /**--------------------------------- Traer Producto ---------------------------------------------------- */
        if($_POST['NombreProceso']=="TraerProductos")
        {
          $IdProducto=$_POST['IdProducto'];
          $ComandoSql="SELECT * FROM `productos` WHERE `IdProductos`='".$IdProducto."';";
          if($Resultado=$conexion->query($ComandoSql))
          {
            $rows=array();
          while($fila= $Resultado->fetch_array())
              {
                $rows[] = $fila;
              }
              echo json_encode($rows);

          }
        }
          /**--------------------------------- Traer Producto ---------------------------------------------------- */


        /**--------------------------------- Actualizar Producto ---------------------------------------------------- */
        if($_POST['NombreProceso']=="ActualizarDatosProductos")
        {
            
          $Where=" WHERE `IdProductos`=".$_POST['ProductoId'];
          $NuevoProductoObservaciones=$conexion->real_escape_string($_POST['NuevoProductoObservaciones']);
          $AnWhere="`ObservacionesProductos`='".$NuevoProductoObservaciones."'";
          $ComandoSqlUpdate="UPDATE `productos`  SET ";
          $NuevoProductoNombre=$conexion->real_escape_string($_POST['NuevoProductoNombre']);
          if($NuevoProductoNombre!="")
          {
            //echo "en if";
            $ComandoSqlUpdate.="`NombreProductos`='".strtoupper($NuevoProductoNombre)."',";
          }

          $NuevoProductoMarca=$conexion->real_escape_string($_POST['NuevoProductoMarca']);
          if($NuevoProductoMarca!="")
          {
            $ComandoSqlUpdate.="`MarcaProductos`='".strtoupper($NuevoProductoMarca)."',";
          }

          $NuevoProductoValor=$conexion->real_escape_string($_POST['NuevoProductoValor']);
          if($NuevoProductoValor!="")
          {
            $ComandoSqlUpdate.="`ValorProductos`='".$NuevoProductoValor."',";
          }

          $NuevoProductoIdTipoProducto=$conexion->real_escape_string($_POST['NuevoProductoIdTipoProducto']);
          if($NuevoProductoIdTipoProducto!="")
          {
            $ComandoSqlUpdate.="`IdProductoTipo`='".strtoupper($NuevoProductoIdTipoProducto)."',";
          }

          $NuevoProductoIdProveedores=$conexion->real_escape_string($_POST['NuevoProductoIdProveedores']);
          if($NuevoProductoIdProveedores!="")
          {
            $ComandoSqlUpdate.="`IdProveedores`='".$NuevoProductoIdProveedores."',";
          }
          $NuevoProductoCantidad=$conexion->real_escape_string($_POST['NuevoProductoCantidad']);
          if($NuevoProductoCantidad!="")
          {
            $ComandoSqlUpdate.="`CantidadProductos`='".$NuevoProductoCantidad."',";
          }
          $NuevoProductoMedida=$conexion->real_escape_string($_POST['NuevoProductoMedida']);
          if($NuevoProductoMedida!="")
          {
            $ComandoSqlUpdate.="`MedidaProductos`='".$NuevoProductoMedida."',";
          }

          $NuevoProductoDescripcion=$conexion->real_escape_string($_POST['NuevoProductoDescripcion']);
          if($NuevoProductoMedida!="")
          {
            $ComandoSqlUpdate.="`DescripcionProductos`='".$NuevoProductoDescripcion."',";
          }
          $ComandoSqlUpdate=$ComandoSqlUpdate.$AnWhere.$Where;
          //echo "Sentencia: ".$ComandoSqlUpdate;            
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
          /**--------------------------------- Actualizar Producto ---------------------------------------------------- */



         /**--------------------------------- Eliminar Tipo Bienes ---------------------------------------------------- */
        if($_POST['NombreProceso']=="EliminarTipoBienes")
        {
          $IdTipoBienes=$_POST['IdTipoBienes'];
          $ComandoSqlUpdate="DELETE FROM `tipobienes` WHERE `IdTipoBienes`=".$IdTipoBienes.";";
              //echo "Sentencia: ".$ComandoSqlUpdate;            
              $resultado = $conexion->query($ComandoSqlUpdate);
              if($resultado==true)
              {
                echo '<div class="alert alert-success" role="alert">¡La clasificacion ha sido eliminada con exito!</div>';    
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert">La clasificacion no fue eliminada verifique los campos!</div>'; 
                
              }
        }
         /**--------------------------------- Eliminar Tipo Bienes ---------------------------------------------------- */                          

        
        /**--------------------------------- Registrar Tipo Bienes  ---------------------------------------------------- */
        if($_POST['NombreProceso']=="RegistrarTipoBienes")
        {        
        $TipoBienesNombre=$conexion->real_escape_string($_POST['TipoBienesNombre']);     
        $ComandoSql="SELECT `NombreTipoBienes` FROM `tipobienes` WHERE `NombreTipoBienes`='".strtoupper($TipoBienesNombre)."';";          
        //echo "Sentencia: ".$ComandoSql;
        if($Resultado=$conexion->query($ComandoSql))
        {                     
          while($fila= $Resultado->fetch_array())
            {                
              if(strtoupper($TipoBienesNombre)==$fila[0])
              {                
                echo 'ERROR';  
                exit();  
              }
          
            }
        }
        $ComandoSql="INSERT INTO `tipobienes`(`NombreTipoBienes`) VALUES ('".strtoupper($TipoBienesNombre)."')";
        $resultado = $conexion->query($ComandoSql);
        if($resultado==true)
        {
          echo 'REGISTRO';    
        }
        else
        {
          echo 'NOREGISTRO'; 
          
        }
       }
       /**--------------------------------- Registrar Tipo Bienes  ---------------------------------------------------- */

       
       if($_POST['NombreProceso']=="ActualizarTipoBienes")
       {
          $NuevoTipoBienesNombre=$conexion->real_escape_string($_POST['NuevoTipoBienesNombre']);
          $ComandoSql="SELECT `NombreTipoBienes` FROM `tipobienes` WHERE `NombreTipoBienes`='".strtoupper($NuevoTipoBienesNombre)."';";          
          //echo "Sentencia: ".$ComandoSql;
          if($Resultado=$conexion->query($ComandoSql))
          {                     
            while($fila= $Resultado->fetch_array())
              {                
                if(strtoupper($NuevoTipoBienesNombre)==$fila[0])
                {                
                  echo 'ERROR'; 
                  exit();  
                }
            
              }
          }
        $TipoBienesId=$_POST['TipoBienesId'];          
         $ComandoSqlUpdate="UPDATE `tipobienes` SET `NombreTipoBienes`='".strtoupper($NuevoTipoBienesNombre)."' WHERE `IdTipoBienes`='".$TipoBienesId."';";          
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

       if($_POST['NombreProceso']=="TraerTipoBienes")
        {
          $IdTipoBienes=$_POST['IdTipoBienes'];
          $ComandoSql="SELECT * FROM `TipoBienes` WHERE `IdTipoBienes`='".$IdTipoBienes."';";
          if($Resultado=$conexion->query($ComandoSql))
          {
            $rows=array();
          while($fila= $Resultado->fetch_array())
              {
                $rows[] = $fila;
              }
              echo json_encode($rows);

          }
        }

        if($_POST['NombreProceso']=="RegistrarBienes")
        {        
          $BienesNombre=$conexion->real_escape_string($_POST['BienesNombre']);          
          $BienesIdTipoBienes=$conexion->real_escape_string($_POST['BienesIdTipoBienes']);          
          $BienesEstado=$conexion->real_escape_string($_POST['BienesEstado']);          
          $BienesValor=$conexion->real_escape_string($_POST['BienesValor']);
          $BienesObservaciones=$conexion->real_escape_string($_POST['BienesObservaciones']);     
          $ComandoSql="SELECT `NombreBienes`FROM `Bienes` WHERE `NombreBienes`='".strtoupper($BienesNombre)."';";          
          //echo "Sentencia: ".$ComandoSql;
          if($Resultado=$conexion->query($ComandoSql))
          {                     
            while($fila= $Resultado->fetch_array())
              {                
                if(strtoupper($BienesNombre)==$fila[0])
                {                
                  echo 'ERROR';  
                  exit();  
                }
            
              }
          }
          $ComandoSql="INSERT INTO `bienes`(`IdBienes`, `NombreBienes`, `ValorBienes`, `ObservacionBienes`, `IdTipoBienes`, `EstadoBienes`) VALUES ('','".strtoupper($BienesNombre)."','".$BienesValor."','".strtoupper($BienesObservaciones)."','".strtoupper($BienesIdTipoBienes)."','".strtoupper($BienesEstado)."');";
          //echo "<br>".$ComandoSql;
          // echo "<script>alert('Sentencia: '+".$ComandoSql.");</script>";
          $resultado = $conexion->query($ComandoSql);
          if($resultado==true)
          {
            echo 'REGISTRO';    
          }
          else
          {
            echo 'NOREGISTRO'; 
            
          }        
        }


        if($_POST['NombreProceso']=="TraerBienes")
        {
          $IdBienes=$_POST['IdBienes'];
          $ComandoSql="SELECT * FROM `bienes` WHERE `IdBienes`='".$IdBienes."';";
          if($Resultado=$conexion->query($ComandoSql))
          {
            $rows=array();
          while($fila= $Resultado->fetch_array())
              {
                $rows[] = $fila;
              }
              echo json_encode($rows);

          }
        }
        
        if($_POST['NombreProceso']=="ActualizarBienes")
       {
        $Where=" WHERE `IdBienes`=".$_POST['BienesId'];
        $NuevoBienesObservaciones=$conexion->real_escape_string($_POST['NuevoBienesObservaciones']);

        $AnWhere="`ObservacionBienes`='".strtoupper($NuevoBienesObservaciones)."'";

        $ComandoSqlUpdate="UPDATE `bienes`  SET ";
        $NuevoBienesNombre=$conexion->real_escape_string($_POST['NuevoBienesNombre']);
        if($NuevoBienesNombre!="")
        {
          //echo "en if";
          $ComandoSqlUpdate.="`NombreBienes`='".strtoupper($NuevoBienesNombre)."',";
        }

        $NuevoBienesValor=$conexion->real_escape_string($_POST['NuevoBienesValor']);
        if($NuevoBienesValor!="")
        {
          $ComandoSqlUpdate.="`ValorBienes`='".strtoupper($NuevoBienesValor)."',";
        }

        $NuevoBienesIdTipoBienes=$conexion->real_escape_string($_POST['NuevoBienesIdTipoBienes']);
        if($NuevoBienesIdTipoBienes!="")
        {
          $ComandoSqlUpdate.="`IdTipoBienes`='".strtoupper($NuevoBienesIdTipoBienes)."',";
        }

        $NuevoBienesEstado=$conexion->real_escape_string($_POST['NuevoBienesEstado']);
        if($NuevoBienesEstado!="")
        {
          $ComandoSqlUpdate.="`EstadoBienes`='".$NuevoBienesEstado."',";
        }
        $ComandoSqlUpdate=$ComandoSqlUpdate.$AnWhere.$Where;
        //echo "Sentencia: ".$ComandoSqlUpdate;            
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

       if($_POST['NombreProceso']=="RegistrarProveedores")
       {        
         $ProveedoresNombre=$conexion->real_escape_string($_POST['ProveedoresNombre']);          
         $ProveedoresNit=$conexion->real_escape_string($_POST['ProveedoresNit']);          
         $ProveedoresTelefono=$conexion->real_escape_string($_POST['ProveedoresTelefono']);
         $ProveedoresDireccion=$conexion->real_escape_string($_POST['ProveedoresDireccion']);     
         $ProveedoresCorreo=$conexion->real_escape_string($_POST['ProveedoresCorreo']);     
         $ProveedoresCelular=$conexion->real_escape_string($_POST['ProveedoresCelular']);     
         $ComandoSql="SELECT `NitProveedores`FROM `Proveedores` WHERE `NitProveedores'".strtoupper($ProveedoresNit)."';";          
         //echo "Sentencia: ".$ComandoSql;
         if($Resultado=$conexion->query($ComandoSql))
         {                     
           while($fila= $Resultado->fetch_array())
             {                
               if(strtoupper($ProveedoresNit)==$fila[0])
               {                
                 echo 'ERROR';  
                 exit();  
               }
           
             }
         }
         
         $ComandoSql="INSERT INTO `proveedores`(`IdProveedores`, `NitProveedores`, `NombreProveedores`, `TelefonoProveedores`, `DireccionProveedores`, `CorreoProveedores`, `CelularProveedores`) VALUES ('','".strtoupper($ProveedoresNit)."','".strtoupper($ProveedoresNombre)."','".$ProveedoresTelefono."','".strtoupper($ProveedoresDireccion)."','".strtoupper($ProveedoresCorreo)."','".strtoupper($ProveedoresCelular)."');";
         //echo "<br>".$ComandoSql;
         // echo "<script>alert('Sentencia: '+".$ComandoSql.");</script>";
         $resultado = $conexion->query($ComandoSql);
         if($resultado==true)
         {
           echo 'REGISTRO';    
         }
         else
         {
           echo 'NOREGISTRO'; 
           
         }
     
 
       }

       if($_POST['NombreProceso']=="TraerProveedores")
       {
        $IdProveedores=$_POST['IdProveedores'];
        $ComandoSql="SELECT * FROM `Proveedores` WHERE `IdProveedores`='".$IdProveedores."';";
        if($Resultado=$conexion->query($ComandoSql))
        {
          $rows=array();
        while($fila= $Resultado->fetch_array())
            {
              $rows[] = $fila;
            }
            echo json_encode($rows);

        }


       }

       if($_POST['NombreProceso']=="ActualizarProveedores")
       {
        $Where=" WHERE `IdProveedores`=".$conexion->real_escape_string($_POST['ProveedoresId']);      
        $ComandoSqlUpdate="UPDATE `Proveedores`  SET ";

        $NuevoProveedoresNit=$conexion->real_escape_string($_POST['NuevoProveedoresNit']);
        if($NuevoProveedoresNit!="")
        {
          //echo "en if";
          $ComandoSqlUpdate.="`NitProveedores`='".strtoupper($NuevoProveedoresNit)."',";
        }

        $NuevoProveedoresNombre=$conexion->real_escape_string($_POST['NuevoProveedoresNombre']);
        if($NuevoProveedoresNombre!="")
        {
          $ComandoSqlUpdate.="`NombreProveedores`='".strtoupper($NuevoProveedoresNombre)."',";
        }

        $NuevoProveedoresTelefono=$conexion->real_escape_string($_POST['NuevoProveedoresTelefono']);
        if($NuevoProveedoresTelefono!="")
        {
          $ComandoSqlUpdate.="`TelefonoProveedores`='".$NuevoProveedoresTelefono."',";
        }

        $NuevoProveedoresDireccion=$conexion->real_escape_string($_POST['NuevoProveedoresDireccion']);
        if($NuevoProveedoresDireccion!="")
        {
          $ComandoSqlUpdate.="`DireccionProveedores`='".strtoupper($NuevoProveedoresDireccion)."',";
        }

        $NuevoProveedoresCorreo=$conexion->real_escape_string(strtoupper($_POST['NuevoProveedoresCorreo']));
        if($NuevoProveedoresCorreo!="")
        {
          $ComandoSqlUpdate.="`CorreoProveedores`='".strtoupper($NuevoProveedoresCorreo)."',";
        }

        $NuevoProveedoresCelular=$conexion->real_escape_string($_POST['NuevoProveedoresCelular']);
        if($NuevoProveedoresCelular!="")
        {
          $ComandoSqlUpdate.="`CelularProveedores`='".$NuevoProveedoresCelular."',";
        }
        $ComandoSqlUpdate.="`CelularProveedores`='".$NuevoProveedoresCelular."'";

        $ComandoSqlUpdate=$ComandoSqlUpdate.$Where;
        //echo "Sentencia: ".$ComandoSqlUpdate;            
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
        
       if($_POST['NombreProceso']=="RegistrarServicios")
       {        
         $ServiciosNombre=$conexion->real_escape_string($_POST['ServiciosNombre']);          
         $ServiciosImpuesto=$conexion->real_escape_string($_POST['ServiciosImpuesto']);                   
         $ServiciosValor=$conexion->real_escape_string($_POST['ServiciosValor']);     
         $ServiciosObservaciones=$conexion->real_escape_string($_POST['ServiciosObservaciones']);     
         $ServiciosDescripcion=$conexion->real_escape_string($_POST['ServiciosDescripcion']);     
         $ServcioTipoServicio=$conexion->real_escape_string($_POST['ServcioTipoServicio']);  
         $ComandoSql="SELECT `NombreServicios`FROM `Servicios` WHERE `NombreServicios'='".strtoupper($ServiciosNombre)."';";          
         //echo "Sentencia: ".$ComandoSql;
         if($Resultado=$conexion->query($ComandoSql))
         {                     
           while($fila= $Resultado->fetch_array())
             {                
               if(strtoupper($ServiciosNombre)==$fila[0])
               {                
                 echo 'ERROR';  
                 exit();  
               }
           
             }
         }
         
         $ComandoSql="INSERT INTO `Servicios`(`IdServicios`,`NombreServicios`,`ImpuestoServicios`, `ValorServicios`, `ObservacionesServicios`, `DescripcionServicios`,`IdServicioTipo`) VALUES ('','".strtoupper($ServiciosNombre)."','".$ServiciosImpuesto."','".$ServiciosValor."','".strtoupper($ServiciosObservaciones)."','".strtoupper($ServiciosDescripcion)."',".$ServcioTipoServicio.");";
         //echo "<br>".$ComandoSql;
         // echo "<script>alert('Sentencia: '+".$ComandoSql.");</script>";
         $resultado = $conexion->query($ComandoSql);
         if($resultado==true)
         {
           echo 'REGISTRO';    
         }
         else
         {
           echo 'NOREGISTRO'; 
           
         }
     
 
       }
       if($_POST['NombreProceso']=="TraerServicios")
       {
        $IdServicios=$_POST['IdServicios'];
        $ComandoSql="SELECT * FROM `Servicios` WHERE `IdServicios`='".$IdServicios."';";
        if($Resultado=$conexion->query($ComandoSql))
        {
          $rows=array();
        while($fila= $Resultado->fetch_array())
            {
              $rows[] = $fila;
            }
            echo json_encode($rows);

        }
      }

      if($_POST['NombreProceso']=="ActualizarServicios")
      {
       $Where=" WHERE `IdServicios`=".$conexion->real_escape_string($_POST['ServiciosId']);      
       $ComandoSqlUpdate="UPDATE `Servicios`  SET ";

       $NuevoServiciosImpuesto=$conexion->real_escape_string($_POST['NuevoServiciosImpuesto']);
       if($NuevoServiciosImpuesto!="")
       {
         //echo "en if";
         $ComandoSqlUpdate.="`ImpuestoServicios`='".strtoupper($NuevoServiciosImpuesto)."',";
       }

       $NuevoServiciosNombre=$conexion->real_escape_string($_POST['NuevoServiciosNombre']);
       if($NuevoServiciosNombre!="")
       {
         $ComandoSqlUpdate.="`NombreServicios`='".strtoupper($NuevoServiciosNombre)."',";
       }

       $NuevoServiciosValor=$conexion->real_escape_string($_POST['NuevoServiciosValor']);
       if($NuevoServiciosValor!="")
       {
         $ComandoSqlUpdate.="`ValorServicios`='".$NuevoServiciosValor."',";
       }

       $NuevoServiciosObservaciones=$conexion->real_escape_string($_POST['NuevoServiciosObservaciones']);
       if($NuevoServiciosObservaciones!="")
       {
         $ComandoSqlUpdate.="`ObservacionesServicios`='".strtoupper($NuevoServiciosObservaciones)."',";
       }

       $NuevoServiciosDescripcion=$conexion->real_escape_string(strtoupper($_POST['NuevoServiciosDescripcion']));
       if($NuevoServiciosDescripcion!="")
       {
         $ComandoSqlUpdate.="`DescripcionServicios`='".strtoupper($NuevoServiciosDescripcion)."',";
       }
       $ComandoSqlUpdate.="`DescripcionServicios`='".$NuevoServiciosDescripcion."'";

       $ComandoSqlUpdate=$ComandoSqlUpdate.$Where;
       //echo "Sentencia: ".$ComandoSqlUpdate;            
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
       /*** */
      if($_POST['NombreProceso']=="RegistrarTipoServcios")
      {
        $TipoServiciosNombre=$conexion->real_escape_string($_POST['TipoServiciosNombre']);          
        $TipoServiciosImpuesto=$conexion->real_escape_string($_POST['TipoServiciosImpuesto']);                   
        $TipoServiciosCentroContable=$conexion->real_escape_string($_POST['TipoServiciosCentroContable']);     
        $TipoServiciosCuentaContable=$conexion->real_escape_string($_POST['TipoServiciosCuentaContable']);     
        $TipoServiciosConceptoContable=$conexion->real_escape_string($_POST['TipoServiciosConceptoContable']);     
        $TipoServiciosObservaciones=$conexion->real_escape_string($_POST['TipoServiciosObservaciones']);

        $ComandoSql="INSERT INTO `serviciotipo`(`NombreServicioTipo`, `ObservicioServicioTipo`, `ImpuestoServicioTipo`, `CentroContableServicioTipo`, `CuentaContableServicioTipo`, `ConceptoContableServicioTipo`) VALUES ('".$TipoServiciosNombre."','".$TipoServiciosObservaciones."',".$TipoServiciosImpuesto.",'".$TipoServiciosCentroContable."','".$TipoServiciosCuentaContable."','".$TipoServiciosConceptoContable."');";
        //echo "Sentencia: ".$ComandoSql;
        if($Resultado=$conexion->query($ComandoSql))
        {                     
         echo "REGISTRO";
        }else{
          echo "NOREGISTRO";
        } 
      }
       /*** */
?> 
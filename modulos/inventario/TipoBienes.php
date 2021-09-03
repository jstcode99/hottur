<?php
                        require_once ('../../modulos/conexion.php');
                        $ComandoSql="SELECT * FROM `tipobienes` WHERE 1";
                        if($Resultado=$conexion->query($ComandoSql))
                        {
                        /* echo"SE EJECUTO LA CONSULTA CORRECTAMENTE";       */ 
                        /* SE PODRIA PROBAR CON ->fetch_array(), para traerlo como objeto y no como array*/
                        while($fila= $Resultado->fetch_array())
                            {    
                                echo '<option value="'.mb_convert_encoding($fila['IdTipoBienes'], "UTF-8").'">'.mb_convert_encoding($fila['NombreTipoBienes'], "UTF-8").'</option>';                       
                            }
                        }
?>                  

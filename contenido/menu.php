        <!-- Navigation -->
<script src="../js/hora.js"></script>
<style>
i.glyphicon.glyphicon-time.IconoReloj, div#TituloHora, div#FechaReloj, div#HoraReloj {
  float: left;
  padding-left: 5px;
}
i.glyphicon.glyphicon-time.IconoReloj {
    padding-top: 1%;
}
</style>

        <nav class="navbar navbar-inverse bg-primary navbar-fixed-top " role="navigation" onload="MueveReloj();">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand -rigth"  href="">Hottur<i class="fa fa-fw fa-home"></i></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-center top-nav">
            <li>
                <a class="btn btn -center" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="fa fa-fw fa-home"></i>
                Menu<i class="fa fa-fw fa-caret-down"></i></a>
            </li>
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php  echo " ".$_SESSION['Nombre']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">                        
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-info"></i> Acerca de</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../contenido/sesion.php"><i class="fa fa-fw fa-power-off"></i>Cerrar Sesión</a>
                        </li>
                    </ul>
            </li>    
                <li>
                    <a class="btn btn -center" >
                    <i class="glyphicon glyphicon-time IconoReloj"></i>
                   <div id="TituloHora">Fecha:</div> <div id="FechaReloj">12/04/2017</div> <div id="TituloHora">Hora:</div> <div id="HoraReloj">12:00 pm</div>
                    </a>
                </li>               
                <li class="dropdown">
        </nav>
    </div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content distancia ">

        <!----------Inicio If ------------>
        <?php
            $Rol = $_SESSION['Rol'];
            if($Rol == 'ADMINISTRADOR'){

            
        ?>

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel">Menu</h4>
                                    </div> 
                                       <br>
                                       <br>
                                       <br>
                                    <div class="row">

                                        <div  class="col-md-4"  >
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-book fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Registro</div>

                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" onclick="TraerFormulario(2);">
                                                <div class="panel-footer">
                                                     <a href="javascript:;" data-toggle="collapse" data-target="#registro"><i class="fa fa-fw fa-book"></i>Registro Check in <i class="fa fa-fw fa-caret-down"></i></a>
                                                    <ul id="registro" class="collapse">
                                                        <li>
                                                            <a href="#Check-in" onclick="TraerFormulario(1);">Check in</a>
                                                        </li>
                                                        <li>
                                                            <a href="#Rack" onclick="TraerFormulario(2);">Rack</a>
                                                        </li>

                                                         <li>
                                                            <a href="#Registro-de-Vehiculos" onclick="TraerFormulario(3);">Registro de Vehiculo</a>
                                                        </li>
                                                        <!-- <li>
                                                            <a href="#Registro-de-adicionales" onclick="TraerFormulario(4);">Registro de Adicionales</a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                        <div  class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-user fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Clientes</div>

                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" onclick="TraerFormulario(8);">
                                                <div class="panel-footer">
                                                     <a href="javascript:;" data-toggle="collapse" data-target="#clientes"><i class="fa fa-fw fa-user"></i>Clientes <i class="fa fa-fw fa-caret-down"></i></a>
                                                    <ul id="clientes" class="collapse">
                                                        <li>
                                                            <a href="#Actualizacion-de-clientes-y-agencias" onclick="TraerFormulario(5);">Actualizacion de clientes y agencias</a>
                                                        </li>
                                                        <!------No se muestra al Recepcionista------>
                                                        <li>
                                                            <a href="#Convenios" onclick="TraerFormulario(6);">Convenios</a>
                                                        </li>                          
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>  
                                        <div class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-briefcase fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Folio</div>

                                                    </div>
                                                </div>
                                            </div>
                                                <div class="panel-footer">
                                                    <a href="javascript:;" data-toggle="collapse" data-target="#folio"><i class="fa fa-fw fa-briefcase"></i>Folio <i class="fa fa-fw fa-caret-down"></i></a>
                                                     <ul id="folio" class="collapse">
                                                         <li>
                                                             <a href="#Consultar-folios" onclick="TraerFormulario(7);">Consultar Folios</a>
                                                         </li>                                                                                                                                                                                                                                                                
                                                    </ul>
                                                </div>
                                        </div>                                  
                                    </div>

                                <div class="divider">
                                <br>
                                <br>
                                </div>
                                    <div class="row">
                                        <div  class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-gear fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Parametrización</div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-------------No se muestra a Recepcionista------------->
                                                <div class="panel-footer">
                                                     <a href="javascript:;" data-toggle="collapse" data-target="#parametrizacion"><i class="fa fa-fw fa-gear"></i>Parametrizacion <i class="fa fa-fw fa-caret-down"></i></a>
                                                        <ul id="parametrizacion" class="collapse">                                                    
                                                           <li>
                                                               <a href="#Usuarios" onclick="TraerFormulario(8);">Usuarios</a>
                                                           </li>                                             
                                                           <li>
                                                               <a href="#Parametros-de-Hotel" onclick="TraerFormulario(9);">Parametros de Hotel</a>
                                                           </li>
                                                           <li>
                                                               <a href="#Informacion-del-Hotel" onclick="TraerFormulario(10);">Información del Hotel y Habitaciones</a>
                                                            </li>
                                                        </ul>
                                                </div>
                                            <!-------------------------------------------------->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-list-alt fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Inventario</div>

                                                    </div>
                                                </div>
                                            </div>
                                                <div class="panel-footer">
                                                   <a href="javascript:;" data-toggle="collapse" data-target="#provedores"><i class="fa fa-fw fa-list-alt"></i>Inventario<i class="fa fa-fw fa-caret-down"></i></a>
                                                    <ul id="provedores" class="collapse">
                                                        <li>
                                                            <a href="#Productos" onclick="TraerFormulario(11);">Productos</a>
                                                        </li>
                                                        <li>
                                                            <a href="#Bienes" onclick="TraerFormulario(12);">Bienes</a>
                                                        </li>
                                                        <li>
                                                            <a href="#Servicios" onclick="TraerFormulario(14);">Servicios</a>
                                                        </li>                                                        
                                                        <li>
                                                            <a href="#Proveedores" onclick="TraerFormulario(13);">Proveedores</a>
                                                        </li>                          
                                                    </ul>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-money fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Facturción</div>

                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" onclick="TraerFormulario(2);">
                                                <div class="panel-footer">
                                                   <a href="javascript:;" data-toggle="collapse" data-target="#facturacion"><i class="fa fa-fw fa-money"></i>Facturación<i class="fa fa-fw fa-caret-down"></i></a>
                                                        <ul id="facturacion" class="collapse">
                                                            <li>
                                                                <a href="#Facturacion" onclick="TraerFormulario(15);">Facturacion</a>
                                                            </li>
                                                            <li>
                                                                <a href="#Cotizaciones" onclick="TraerFormulario(16);">Cotizaciones</a>
                                                            </li>
                                                            <li>
                                                                <a href="#Abonos-y-Depositos" onclick="TraerFormulario(17);">Abonos y Depositos</a>
                                                            </li>
                                                            <li>
                                                                <a href="#Devoluciones" onclick="TraerFormulario(18);">Devoluciones</a>
                                                            </li>       
                                                            <li>
                                                                <a href="#Tranferencias" onclick="TraerFormulario(19);">Tranferencias</a>
                                                            </li>
                                                            <li>
                                                                <a href="#Caja" onclick="TraerFormulario(20);">Caja</a>
                                                            </li>    
                                                            <!-- <li>
                                                                <a href="#Historial-de-abonos" onclick="TraerFormulario(21);">Historial de abonos</a>
                                                            </li> -->
                                                            <li>
                                                                <a href="#Consumos" onclick="TraerFormulario(22);">Consumos</a>
                                                            </li>                         

                                                        </ul>
                                                </div>
                                            </a>
                                        </div>                                                                                
                                    </div>  
            <?php
            }
            else{
                //echo "Hola No eres admin";
            ?> 

                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel">Menu</h4>
                                    </div> 
                                       <br>
                                       <br>
                                       <br>
                                    <div class="row">

                                        <div  class="col-md-4"  >
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-book fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Registro</div>

                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" onclick="TraerFormulario(2);">
                                                <div class="panel-footer">
                                                     <a href="javascript:;" data-toggle="collapse" data-target="#registro"><i class="fa fa-fw fa-book"></i>Registro Check in <i class="fa fa-fw fa-caret-down"></i></a>
                                                    <ul id="registro" class="collapse">
                                                        <li>
                                                            <a href="#Check-in" onclick="TraerFormulario(1);">Check in</a>
                                                        </li>
                                                        <li>
                                                            <a href="#Rack" onclick="TraerFormulario(2);">Rack</a>
                                                        </li>

                                                         <li>
                                                            <a href="#Registro-de-Vehiculos" onclick="TraerFormulario(3);">Registro de Vehiculo</a>
                                                        </li>
                                                        <!-- <li>
                                                            <a href="#Registro-de-adicionales" onclick="TraerFormulario(4);">Registro de Adicionales</a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                        <div  class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-user fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Clientes</div>

                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" onclick="TraerFormulario(8);">
                                                <div class="panel-footer">
                                                     <a href="javascript:;" data-toggle="collapse" data-target="#clientes"><i class="fa fa-fw fa-user"></i>Clientes <i class="fa fa-fw fa-caret-down"></i></a>
                                                    <ul id="clientes" class="collapse">
                                                        <li>
                                                            <a href="#Actualizacion-de-clientes-y-agencias" onclick="TraerFormulario(5);">Actualizacion de clientes y agencias</a>
                                                        </li>
                                                        <!------No se muestra al Recepcionista-----
                                                        <li>
                                                            <a href="#Convenios" onclick="TraerFormulario(6);">Convenios</a>
                                                        </li>
                                                        -------------------->                          
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>  
                                        <div class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-briefcase fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Folio</div>

                                                    </div>
                                                </div>
                                            </div>
                                                <div class="panel-footer">
                                                    <a href="javascript:;" data-toggle="collapse" data-target="#folio"><i class="fa fa-fw fa-briefcase"></i>Folio <i class="fa fa-fw fa-caret-down"></i></a>
                                                     <ul id="folio" class="collapse">
                                                         <li>
                                                             <a href="#Consultar-folios" onclick="TraerFormulario(7);">Consultar Folios</a>
                                                         </li>                                                                                                                                                                                                                                                                
                                                    </ul>
                                                </div>
                                        </div>                                  
                                    </div>

                                <div class="divider">
                                <br>
                                <br>
                                </div>
                                    <div class="row">
                                        <div  class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-gear fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Parametrización</div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-------------No se muestra a Recepcionista------------
                                                <div class="panel-footer">
                                                     <a href="javascript:;" data-toggle="collapse" data-target="#parametrizacion"><i class="fa fa-fw fa-gear"></i>Parametrizacion <i class="fa fa-fw fa-caret-down"></i></a>
                                                        <ul id="parametrizacion" class="collapse">                                                    
                                                           <li>
                                                               <a href="#Usuarios" onclick="TraerFormulario(8);">Usuarios</a>
                                                           </li>                                             
                                                           <li>
                                                               <a href="#Parametros-de-Hotel" onclick="TraerFormulario(9);">Parametros de Hotel</a>
                                                           </li>
                                                           <li>
                                                               <a href="#Informacion-del-Hotel" onclick="TraerFormulario(10);">Información del Hotel y Habitaciones</a>
                                                            </li>
                                                        </ul>
                                                </div>
                                            -------------------------------------------------->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-list-alt fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Inventario</div>

                                                    </div>
                                                </div>
                                            </div>
                                                <div class="panel-footer">
                                                   <a href="javascript:;" data-toggle="collapse" data-target="#provedores"><i class="fa fa-fw fa-list-alt"></i>Inventario<i class="fa fa-fw fa-caret-down"></i></a>
                                                    <ul id="provedores" class="collapse">
                                                        <li>
                                                            <a href="#Productos" onclick="TraerFormulario(11);">Productos</a>
                                                        </li>
                                                        <li>
                                                            <a href="#Bienes" onclick="TraerFormulario(12);">Bienes</a>
                                                        </li>
                                                        <li>
                                                            <a href="#Servicios" onclick="TraerFormulario(14);">Servicios</a>
                                                        </li>                                                        
                                                        <li>
                                                            <a href="#Proveedores" onclick="TraerFormulario(13);">Proveedores</a>
                                                        </li>                          
                                                    </ul>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="panel-body bg-primary">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-fw fa-money fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Facturción</div>

                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" onclick="TraerFormulario(2);">
                                                <div class="panel-footer">
                                                   <a href="javascript:;" data-toggle="collapse" data-target="#facturacion"><i class="fa fa-fw fa-money"></i>Facturación<i class="fa fa-fw fa-caret-down"></i></a>
                                                        <ul id="facturacion" class="collapse">
                                                            <li>
                                                                <a href="#Facturacion" onclick="TraerFormulario(15);">Facturacion</a>
                                                            </li>
                                                            <li>
                                                                <a href="#Cotizaciones" onclick="TraerFormulario(16);">Cotizaciones</a>
                                                            </li>
                                                            <li>
                                                                <a href="#Abonos-y-Depositos" onclick="TraerFormulario(17);">Abonos y Depositos</a>
                                                            </li>
                                                            <li>
                                                                <a href="#Devoluciones" onclick="TraerFormulario(18);">Devoluciones</a>
                                                            </li>       
                                                            <li>
                                                                <a href="#Tranferencias" onclick="TraerFormulario(19);">Tranferencias</a>
                                                            </li>
                                                            <li>
                                                                <a href="#Caja" onclick="TraerFormulario(20);">Caja</a>
                                                            </li>    
                                                            <!-- <li>
                                                                <a href="#Historial-de-abonos" onclick="TraerFormulario(21);">Historial de abonos</a>
                                                            </li> -->
                                                            <li>
                                                                <a href="#Consumos" onclick="TraerFormulario(22);">Consumos</a>
                                                            </li>                         

                                                        </ul>
                                                </div>
                                            </a>
                                        </div>                                                                                
                                    </div>  


            <?php
            }
            ?>                                                         
        </div>
    </div>
</div>
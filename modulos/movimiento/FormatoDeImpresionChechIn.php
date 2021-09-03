<div id="imprimirMamada">
<style>
    table#nueva{
    width: 850px;
    font-family: "Arial";
    }
    .Ajustar{
        text-align: center;
    }
    .borde{
        border: solid 1px;
    }
    .flotar-Izquiperda{
        float: left;
    }
    .flotar-Derecha{
        float: right;
    }
</style>
<?php
  include('../conexion.php');
  $TraerDatosEmpresa = "SELECT * FROM `datosempresa` LIMIT 1";
  $Resultado = $conexion->query($TraerDatosEmpresa);
  $filas=$Resultado->fetch_array()
  
?>
    <table class="borde"  id="FormatodeImpresionCheckIn">
        <tbody >
        
            <tr class="Ajustar borde">
                <td class="borde" colspan="1">
                    <img src="../modulos/parametrizacion/ImagenLogo/<?php echo $filas['LogoDatosEmpresa'];  ?>"  class="img-thumbnail" alt="Logo Empresa"  style="height:90px !important; width:150px !important;"></td>
                <td class="borde" colspan="7">
                <br>
                    <?php echo $filas['NombreDatosEmpresa']."<br><strong> NIT: </strong>".$filas['NitDatosEmpresa']."&nbsp;&nbsp;<strong> Telefono: </strong> ". $filas['TelefonoDatosEmpresa']."&nbsp;&nbsp;<strong> Correo: </strong> ". $filas['CorreoDatosEmpresa']; ?> <br>
                    <?php echo "<strong> Dirección: </strong> ". $filas['DireccionDatosEmpresa']; ?> <br>
                    <?php echo "<strong> Web: </strong> ". $filas['WebDatosEmpresa']; ?> 
                   
                <br>
                </td> 
            </tr>
            <tr>
                <td class="borde" colspan="2"><strong>Fecha:</strong><?php echo date("d-m-Y");?></td>
                <td class="borde" colspan="5"> <h2 class="ajustar" style="margin-top:5%;">Check In</h2></td>
                <td class="borde" colspan="1"><div class"flotar-Izquiperda"> <strong >Formulario: </strong></div> <div class="flotar-Izquiperda" id="IdMovimientoHabitacionImpreciónCheckIn"></div></td>
            </tr>
            <tr>
                <td class="borde" colspan="3"><strong class="flotar-Izquiperda">Numero Identificación: &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="NitClienteImprecionCheckIn"></div>     </td>
                <td class="borde" colspan="5"><strong class="flotar-Izquiperda">Nombre Cliente: &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="NombreClienteImprecionCheckIn"></div>     </td>
            </tr>
            <tr>
                <td class="borde" colspan="5"><strong class="flotar-Izquiperda">Correo: &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="CorreoClienteImprecionCheckIn"></div>     </td>
                <td class="borde" colspan="3"><strong class="flotar-Izquiperda">Teléfono: &nbsp;&nbsp;</strong> <div class="flotar-Izquiperda" id="TelefonoImprecionCheckIn"></div>     </td>
            </tr>
            <tr>
                <td class="borde" colspan="3"><strong class="flotar-Izquiperda">Nacionalidad: &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="NacionalidadClienteImprecionCheckIn"></div>     </td>
                <td class="borde" colspan="3"><strong class="flotar-Izquiperda">Departamento: &nbsp;&nbsp;</strong> <div class="flotar-Izquiperda" id="DepartamentoImprecionCheckIn"></div>     </td>
                <td class="borde" colspan="2"><strong class="flotar-Izquiperda">Ciudad: &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="CiudadClienteImprecionCheckIn"></div>     </td>
            </tr>
            <tr>
                <td class="borde" colspan="1"><strong class="flotar-Izquiperda">Reserva: &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="ReservaClienteImprecionCheckIn"></div>     </td>
                <td class="borde" colspan="2"><strong class="flotar-Izquiperda">Tarifa: &nbsp;&nbsp;</strong> <div class="flotar-Izquiperda" id="TarifaImprecionCheckIn"></div>     </td>
                <td class="borde" colspan="3"><strong class="flotar-Izquiperda">Tipo Transporte: &nbsp;&nbsp;</strong> <div class="flotar-Izquiperda" id="TipoTransporteImprecionCheckIn"></div>     </td>
                <td class="borde" colspan="2"><strong class="flotar-Izquiperda">Motivo Viaje: &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="MotivoViajeClienteImprecionCheckIn"></div>     </td>
            </tr>
            <tr>
                <td class="borde" colspan="4"><strong class="flotar-Izquiperda">Habitación &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="HabitacionImprecionCheckIn"></div>     </td>
                <td class="borde" colspan="2"><strong class="flotar-Izquiperda">Adultos: &nbsp;&nbsp;</strong> <div class="flotar-Izquiperda" id="CantidadAdultosImprecionCheckIn"></div>     </td>
                <td class="borde" colspan="2"><strong class="flotar-Izquiperda">Niños: &nbsp;&nbsp;</strong> <div class="flotar-Izquiperda" id="CantidadNinosImprecionCheckIn"></div>     </td>
            </tr>
            <tr>
                <td class="borde" colspan="5"><strong class="flotar-Izquiperda">Responsable Habitacion &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="NombreResponsableHabitacionImprecionCheckIn"><br></div></td>
                <td class="borde" colspan="3"><strong class="flotar-Izquiperda">Nit: &nbsp;&nbsp;</strong> <div class="flotar-Izquiperda" id="NitResponsableHabitacionImprecionCheckIn"><br></div>     </td>
            </tr>
            <!-- <tr>
                <td class="borde" colspan="6"><strong>Valor en letras Recibo: </strong>    </td>
            </tr> -->
            <tr>
                <td class="borde" colspan="8" ><strong class="Ajustar" style="padding-right: 150px;"><center> HUESPEDES </center>  </strong></td>
            </tr>
        </tbody>
        <tbody id="ContenedorImpreciónParaHuespedes"> 
        </tbody>
        <tbody>
            <tr>
                <td class="borde" colspan="8">
                    <table>
                        <tr>
                            <td style="padding-top:100px;"> ____________________________ <br>Firma de Responsable </td>    
                        </tr>
                        <tr>
                            <td style="padding-top:20px;">Cedula:.........................</td>       
                        </tr>
                    </table>
                </td>
            </tr>

        
        </tbody>
    </table>
</div>
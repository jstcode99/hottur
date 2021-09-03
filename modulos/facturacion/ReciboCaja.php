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
</style>
    <table class="borde"  id="nueva">
        <tbody >
        
            <tr class="Ajustar borde">
                <td class="borde" colspan="2">
                    <img src="../modulos/parametrizacion/ImagenLogo/<?php echo $filas['LogoDatosEmpresa'];  ?>"  class="img-thumbnail" alt="Logo Empresa"  style="height:150px !important; width:250px !important;"></td>
                <td class="borde" colspan="2">
                <br>
                    <?php echo $filas['NombreDatosEmpresa']; ?> <br>
                    <?php echo "<strong> NIT: </strong>".$filas['NitDatosEmpresa']; ?> <br>
                    <?php echo "<strong> Telefono: </strong> ". $filas['TelefonoDatosEmpresa']; ?> <br>
                    <?php echo "<strong> Correo: </strong> ". $filas['CorreoDatosEmpresa']; ?> <br>
                    <?php echo "<strong> Dirección: </strong> ". $filas['DireccionDatosEmpresa']; ?> <br>
                    <?php echo "<strong> Web: </strong> ". $filas['WebDatosEmpresa']; ?> 
                   
                <br>
                </td> 
                <td class="borde" colspan="2">
                    <h2 style="margin-top:15%;">Recibo de Caja</h2>
                </td>
            </tr>
            <tr>
                <td class="borde" colspan="3">   <strong>Numero de Recibo: </strong>   <?php echo  $valorIngresoComprobante['IdIngresoComprobante']; ?>     </td>
                <td class="borde" colspan="3"><strong>Fecha Recibo: </strong>  <?php echo date("d-m-Y");?></td>
            </tr>
            <tr>
                <td class="borde" colspan="1"><strong class="flotar-Izquiperda">Valor Recibo: &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="ReciboValorPagado"></div>     </td>
                <td class="borde" colspan="4"><strong class="flotar-Izquiperda">Valor en letras Recibo: &nbsp;&nbsp;</strong> <div class="flotar-Izquiperda" id="ReciboValorLetras"></div>     </td>
            </tr>
            <!-- <tr>
                <td class="borde" colspan="6"><strong>Valor en letras Recibo: </strong>    </td>
            </tr> -->
            <tr>
                <td class="borde" colspan="6"><strong class="flotar-Izquiperda" >Pagado A:  &nbsp;&nbsp;</strong>  <?php echo $filas['NombreDatosEmpresa']; ?>   </td>
            </tr>
            <tr>
                <td class="borde" colspan="6"><strong class="flotar-Izquiperda">Por Concepto de: &nbsp;&nbsp;    </strong> <div class="flotar-Izquiperda" id="ReciboConcepto"></div>   </td>
            </tr>
            <tr>
                <td class="borde" colspan="3">
                <table>
                        <tr>
                            <td style="padding-top:100px;"> Firma de Cajero: ____________________________ </td>    
                        </tr>
                        <tr>
                            <td style="padding-top:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cedula: ____________________________</td>       
                        </tr>
                </table>
                </td>
                <td class="borde" colspan="3">
                <table>
                        <tr>
                            <td style="padding-top:100px;"> Firma de Huesped: ____________________________ </td>    
                        </tr>
                        <tr>
                            <td style="padding-top:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cedula: ____________________________</td>       
                        </tr>
                </table>
                
                </td>
            </tr>

        
        </tbody>
    </table>

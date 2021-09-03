<div id="Cabereca" style="display:none">
<h3 style="text-align: center">Hottur</h3>
        <div>
                <?php 
                include('../conexion.php');
                $ConsultaEmpresa = "SELECT * FROM `datosempresa` order by IdDatosEmpresa ASC";
                $resultado = $conexion->query($ConsultaEmpresa);
                $filas = $resultado->fetch_array();
                ?>
<style type="text/css">
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
    <table cellspacing="0" style="margin-left: 40%;">
        <tr>
            <td style="width: 50%; color: #444444;">
            <img src=<?php echo '"../modulos/parametrizacion/ImagenLogo/'.$filas['LogoDatosEmpresa'].'"';  ?> class="img-thumbnail" alt="Logo Empresa" style="height:150px !important; width:250px !important;"><br>
                
            </td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="margin-left: 5%; text-align: left; font-size: 11pt;">
        <tr>
		        <td style="width:5%"><strong>Dirección:</strong><?php echo $filas['DireccionDatosEmpresa'];  ?></td>		
		        <td style="width:5%"><strong>Nit:</strong><?php echo $filas['NitDatosEmpresa'];  ?></td>		
                <td style="width:5%"><strong>Correo:</strong><?php echo $filas['CorreoDatosEmpresa'];   ?></td>          
                <td style="width:5%"><strong>Pàgina web:</strong><?php echo $filas['WebDatosEmpresa'];   ?></td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width:100%;text-align: left; font-size: 11pt;">
        <tr>
		<td style="width:50%; text-align: left;border-bottom:solid 1px;"><strong>Nombre:</strong><a href="" id="FormatoNombre"></a></td>		
		</tr>
        <br>
        <tr>
		<td style="width:50%; text-align: left;border-bottom:solid 1px;"><strong>Nit:</strong><a href="" id="FormatoNit"></a></td>		
        </tr>
        <br>
        <tr>            
                <td style="width:50%;text-align: left;border-bottom:solid 1px; "><strong>Teléfono:</strong><a href="" id="FormatoTelefono"></a></td>
        </tr>
        <br>
        <tr>            
                <td style="width:50%; text-align: left;border-bottom:solid 1px;"><strong>Dirección:</strong><a href="" id="FormatoDireccion"></a></td>
        </tr>
    </table>
    <br>
        <table cellspacing="0" style="width: 100%; text-align: left;font-size: 11pt">
    </table><br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <thead>
            <tr>
                <th style="width: 5%; text-align: center;border:solid 1px;">Folio</th>                           
                <th style="width: 5%; text-align: center;border:solid 1px;">Codigo</th>
                <th style="width: 40%; text-align: left;border:solid 1px;">Nombre</th>
                <th style="width: 10%; text-align: right;border:solid 1px;">Cantidad</th>
                <th style="width: 20%; text-align: right; border:solid 1px;">Impuesto / Iva</th>
                <th style="width: 20%; text-align: right;border:solid 1px;">Valor</th>                                    
            </tr>
        </thead>
        <tbody id="TablaMostrarImpresion">

        </tbody>            
    </table>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">SubTotal : </th>
            <th style="width: 13%; text-align: right;">&#36;<a href="" id="FormatoSubtotal"></a></th>
        </tr>
        <tr>
            <th style="width: 87%; text-align: right;">Iva : </th>
            <th style="width: 13%; text-align: right;">&#36;<a href="" id="FormatoIva"></a></th>
        </tr>
        <tr>
            <th style="width: 87%; text-align: right;">Total : </th>
            <th style="width: 13%; text-align: right;">&#36;<a href="" id="FormatoTotal"></a></th>
        </tr>
    </table>
    <br>
	*** Precios incluyen IVA ***
	<br>
        <br>
	<br>
          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
			<tr>
                <td style="width:50%;">Validez de la oferta: </td>
                <td style="width:50%; ">&nbsp;<? ?></td>
            </tr>
        </table>
        <br>
        <br>
        <br>
	    <table cellspacing="10" style="width: 100%; text-align: left; font-size: 11pt;">
            <tr>
               <td style="width:33%;text-align: center;border-top:solid 1px">Recepcionista</td>
               <td style="width:33%;text-align: center;border-top:solid 1px">Aceptado Cliente</td>
            </tr>
        </table>

</page>
<td></td>
<td></td>
<td></td>
<td></td>
<div id="Cabereca" style="display:none;">
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
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 50%; color: #444444;">
            <img src=<?php echo '"../modulos/parametrizacion/ImagenLogo/'.$filas['LogoDatosEmpresa'].'"';  ?> class="img-thumbnail" alt="Logo Empresa" style="height:150px !important; width:250px !important;"><br>
                
            </td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
		<tr>
		<td style="width:50%; "><strong>Dirección:</strong> <br><?php echo $filas['DireccionDatosEmpresa'];  ?></td>		
		</tr>
        </table><br><br>	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
		<td style="width:50%; "><strong>Nit:</strong><?php echo $filas['NitDatosEmpresa'];  ?></td>		
        </tr>
        <tr>            
                <td style="width:50%; "><strong>Correo:</strong><?php echo $filas['CorreoDatosEmpresa'];   ?></td>
        </tr>
        <tr>            
                <td style="width:50%; "><strong>Pàgina web:</strong><?php echo $filas['WebDatosEmpresa'];   ?></td>
        </tr>
    </table><br>
        <table cellspacing="0" style="width: 100%; text-align: left;font-size: 11pt">
        <tr>
             <td style="width:100%; ">A continuación Presentamos nuestra oferta que esperamos sea de su conformidad.</td>
        </tr>
    </table><br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <thead>
            <tr>                           
                <th style="width: 10%; text-align: center;border:solid 1px;">Codigo</th>
                <th style="width: 40%; text-align: left;border:solid 1px;">Nombre</th>
                <th style="width: 10%; text-align: right;border:solid 1px;">Cantidad</th>
                <th style="width: 20%; text-align: right; border:solid 1px;">Impuesto / Iva</th>
                <th style="width: 20%; text-align: right;border:solid 1px;">Valor</th>                                    
            </tr>
        </thead>
        <tbody id="TablaMostrarImpresion">

        </tbody>            
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

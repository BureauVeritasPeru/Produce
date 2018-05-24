<style>

tr{
	text-align: center;
	font-size: 10px;
}
.bord{
	border : 3px solid #000;

}
.color1{
	background-color: #B7DEE8;
	border : 3px solid #000;
}

.color2{
	background-color: #C4D79B;
	border : 3px solid #000;
}

.color3{
	background-color: #FFC000;
	border : 3px solid #000;
}

.color4{
	background-color: #BFBFBF;
	border : 3px solid #000;
}

.color5{
	background-color: #FFFF71;
	border : 3px solid #000;
}

.color6{
	background-color: #538DD5;
	border : 3px solid #000;
}

.color7{
	background-color: #92CDDC;
	border : 3px solid #000;
}

.soft{
	border-left : 1px dashed #000;
	border-right : 1px solid #000;
	border-top : 1px dashed #000;
}
.pendiente{
	background-color: #c6e0b4;
	border-left : 1px solid #000;
	border-right : 1px solid #000;
	border-top : 1px solid #000;
}

.pendientedash{
	background-color: #c6e0b4;
	border-left:1px solid #000;
	border-right:1px solid #000;
	border-top:3px solid #000;

}
.softdash{
	border-top:3px solid #000;
	border-left:1px solid #000;
	border-right:1px solid #000;
}
.softfinal{
	border-top:1px dashed #000;
	border-left:1px solid #000;
	border-right:1px solid #000;
	border-bottom:1px dashed #000;
}
.softfinaldash{
	border-top:1px solid #000;
	border-left:1px solid #000;
	border-right:1px solid #000;
	border-bottom:1px solid #000;
}

.softdashfinaldash{
	border-top:3px solid #000;
	border-left:1px solid #000;
	border-right:1px solid #000;
	border-bottom:1px solid #000;
}
.pendientefinal{
	background-color: #c6e0b4;
	border-top:1px dashed #000;
	border-left:1px solid #000;
	border-right:1px solid #000;
	border-bottom:1px dashed #000;
}
.pendientefinaldash{
	background-color: #c6e0b4;
	border-top:1px solid #000;
	border-left:1px solid #000;
	border-right:1px solid #000;
	border-bottom:1px solid #000;
}

</style>

<?php 
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");

// file name for download

$fileName = "consolidado_muelle" . date('Ymd') . ".xls";
function number_pad($number,$n) {
	return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$localID                    =OWASP::RequestString('localID');
$nombrePlanta               =OWASP::RequestString('nombrePlanta');
$startDate                  =OWASP::RequestString('startDate');
$tipoCHD                    =OWASP::RequestString('tipoCHD');    

if($localID == '0'){$localID = '';}

// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
	<tr>
		<th class="color1">Matr&iacute;cula</th>
		<th class="color1">Embarcacion Pesquera</th>
		<th class="color1">Tipo Embarcaci&oacute;n</th>
		<th class="color1">RUC / DNI </th>
		<th class="color1">Armador </th>
		<th class="color1">Estado Permiso</th>
		<th class="color1">Baliza</th>
		<th class="color1">Región</th>
		<th class="color1">Localidad</th>
		<th class="color1">Muelle / Desembarcadero </th>
		<th class="color1">Especie</th>
		<th class="color1">Total Descargado</th>
		<th class="color1">N&uacute;mero Cubetas</th>
		<th class="color1">Fecha Descarga</th>
		<th class="color1">Hora Inicio</th>
		<th class="color1">Hora T&eacute;rmino</th>
		<th class="color2">Regi&oacute;n Destino</th>
		<th class="color2">EIP Destino </th>
		<th class="color2">Tipo Descarga</th>
		<th class="color2">Tipo Unidad Transporte</th>
		<th class="color2">Placa Unidad Transporte</th>
		<th class="color2">N&uacute;mero Acta de Inspecci&oacute;n</th>
		<th class="color2">N&uacute;mero Parte Muestreo</th>
		<th class="color2">Moda</th>
		<th class="color2">Porcentaje Tallas Menores</th>
		<th class="color2">N&uacute;mero Reporte de Ocurrencias</th>
		<th class="color2">Observaciones</th>
		<th class="color2">FUENTE INFORMACION</th>
		<th class="color2">RUC DESTINO</th>
		<th class="color2">FECHA PERMISO</th>
		<th class="color2">DOCUMENTO RD</th>
	</tr>


	<?php 
	$count=0;
	$list=CrmChd::getList_Paging($localID,$nombrePlanta,$startDate,3);
	foreach ($list as $oItem){
		$date1 = new DateTime();
		$date2 = new DateTime();
		
		$valor ='softfinal';
		$oItemMuelle = CrmMuelle::getItemCHD($oItem->chdID);

		if(isset($oItemMuelle->embarcacionID)){$oItemEmbarcacion =  CrmEmbarcacion::getItem($oItemMuelle->embarcacionID);
		}
		$date1 = new DateTime($oItemMuelle->fechaDescarga);

		$oItemDMuelle = CrmDatosMuelle::getItemCHD($oItem->chdID);
		

		?>
		<tr>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CHATA ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oItemEmbarcacion)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemEmbarcacion->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php  }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->tipoEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->nroRucDni, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->armador, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->estadoPermiso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->baliza, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->region, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->localidad, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->muelleDesembarcadero, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->especie, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->totalDescargado, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->nroCubetas, ENT_QUOTES, "UTF-8"); ?> </td>

			<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->horaIngreso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->horaTermino, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php if(isset($oItemDMuelle)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->regionDestino, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->eipDestino, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->tipoDescarga, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->tipoUnidadTransporte, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->placaUnidadTransporte, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->nroActaInspeccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->moda, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->porTallaMenores, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->nroActaOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->observaciones, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->fuentePrimeraInformacion, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDMuelle->nroRuc, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?> 
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>

			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->fechaObtencionPermiso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuelle->nroDocumento, ENT_QUOTES, "UTF-8"); ?> </td>
			
			
			
		</tr>	

		<?php } ?>

	</table>
	<?php exit();?>
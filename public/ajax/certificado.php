<style>

	tr{
		text-align: center;
		font-size: 10px;
	}

	.bord{
		border : 3px solid #000;

	}
	.light_green{
		background-color: #9BBB59;
		border : 3px solid #000;
	}


	.soft{
		border-left : 1px solid #000;
		border-right : 1px solid #000;
		bborder-top : 1px solid #000;
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
		border-top:3px dashed #000;

	}
	.softdash{
		border-top:3px dashed #000;
		border-left:1px solid #000;
		border-right:1px solid #000;
	}
	.softfinal{
		border-top:1px solid #000;
		border-left:1px solid #000;
		border-right:1px solid #000;
		border-bottom:1px solid #000;
	}
	.softfinaldash{
		border-top:1px dashed #000;
		border-left:1px solid #000;
		border-right:1px solid #000;
		border-bottom:1px solid #000;
	}

	.pendientefinal{
		background-color: #c6e0b4;
		border-top:1px solid #000;
		border-left:1px solid #000;
		border-right:1px solid #000;
		border-bottom:1px solid #000;
	}
	.pendientefinaldash{
		background-color: #c6e0b4;
		border-top:1px dashed #000;
		border-left:1px solid #000;
		border-right:1px solid #000;
		border-bottom:1px solid #000;
	}

</style>

<?php 
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");

$cert =OWASP::RequestString('cert1');
$nroActaInspeccion   =OWASP::RequestString('nroActaInspeccion');

$oReporte = CrmReportes::getItemCertificacion($nroActaInspeccion);

$fileName = "certificado_".$nroActaInspeccion."_". date('Ymd') .".xls";

function number_pad($number,$n) {
	return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$dateAdd = new DateTime($oReporte->fechaInicial);
date_add($dateAdd, date_interval_create_from_date_string('1 days'));


$dateI = new DateTime($oReporte->fechaInicial);



header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");


?>




<table>
	<tr>    
		<td width="80px">&nbsp;</td>
		<td colspan="3" rowspan="6" ><img src="http://app.bureauveritas.com.pe/produce/userfiles/logo2.jpg" style="width:140px;height:150px;"></td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="133px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="62px">&nbsp;</td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>    
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="133px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="62px">&nbsp;</td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>    
		<td width="80px">&nbsp;</td>
		<td colspan="8" rowspan="6" ><img src="http://app.bureauveritas.com.pe/produce/userfiles/inacal.jpg" style="width:140px;height:150px;"></td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>    
		<td width="80px">&nbsp;</td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>    
		<td width="80px">&nbsp;</td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>    
		<td width="80px">&nbsp;</td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="28px">&nbsp;</td>
		<td width="84px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="28px">&nbsp;</td>
		<td width="84px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="28px">&nbsp;</td>
		<td width="84px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="28px">&nbsp;</td>
		<td width="84px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="133px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td width="62px">&nbsp;</td>
		<td width="24px">&nbsp;</td>
		<td width="48px">&nbsp;</td>
		<td width="50px">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="28px">&nbsp;</td>
		<td width="84px">&nbsp;</td>
		<td width="80px">&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan="4" rowspan="2" height="70px" style="text-align: center;font-weight: bold;font-size:16px;font-family: Arial; ">CERTIFICADO DE INSPECCI&Oacute;N <BR> (ISO 17020:2012)</td>
		<td>&nbsp;</td>
		<td colspan="2" style="text-align: left;font-weight: bold;font-size:10px;font-family: Arial;height:33px; ">Lugar de emisi&oacute;n<br>del certificado</td>
		<td colspan="4" class="softfinal" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle; "><?php echo $oReporte->puertoPlanta; ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan="2"  style="text-align: left;font-weight: bold;font-size:10px;font-family: Arial;height:37px; ">Fecha de emisi&oacute;n<br>del certificado</td>
		<td colspan="4" class="softfinal" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle; "><?php echo date_format($dateAdd, 'd/m/y'); ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan="3">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan="2">&nbsp;</td>
		<td colspan="4" style="text-align: center;font-weight: bold;font-size:11px;font-family: Arial; ">PVCAPAAN: <?php echo $oReporte->nroActa; ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" colspan="5"  style="text-align: left;font-size:15px;font-family: Calibri;height:61px;vertical-align:middle; "><strong>Cliente</strong> <br> MINISTERIO DE LA PRODUCCI&Oacute;N </td>
		<td class="softfinal" colspan="2"  style="text-align: left;font-size:15px;font-family: Calibri;height:61px;vertical-align:middle; "><strong>Region</strong> <br> <?php echo htmlentities($oReporte->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
		<td class="softfinal" colspan="2"  style="text-align: left;font-size:15px;font-family: Calibri;height:61px;vertical-align:middle; "><strong>Localidad</strong> <br> <?php echo htmlentities($oReporte->puertoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
		<td class="softfinal" colspan="4"  style="text-align: left;font-size:15px;font-family: Calibri;height:61px;vertical-align:middle; "><strong>Fecha de Inspecci&oacute;n</strong> <br> <?php echo date_format($dateI, 'd/m/Y'); ?> </td>
		<td class="softfinal" colspan="2"  style="text-align: center;font-size:15px;font-family: Calibri;height:61px;vertical-align:middle; "><strong>Pag.</strong> <br> &nbsp;1/1&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" colspan="5"  style="text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; "><strong>Planta de Procesamiento de Productos Pesquero</strong> <br><?php echo htmlentities($oReporte->nombrePlanta, ENT_QUOTES, "UTF-8"); ?></td>
		<td class="softfinal" colspan="4"  style="text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; "><strong>Embarcaci&oacute;n Pesquera  </strong> <br> <?php echo htmlentities($oReporte->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
		<td class="softfinal" colspan="2"  style="text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; "><strong>Matr&iacute;cula</strong> <br> <?php echo htmlentities($oReporte->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
		<td class="softfinal" colspan="4"  style="text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; "><strong>Toneladas descargadas (t)</strong> <br> <?php echo $oReporte->pesoTM; ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td  colspan="15"  style="text-align: left;font-size:12px;font-family: Arial;height:31px; "><strong>Organismo de Inspecci&oacute;n de BUREAU VERITAS DEL PERU S.A. - CERTIFICA:</strong></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:21px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="width:27px;">&nbsp;</td>
		<td colspan="5"  style="height:21px;text-align: center;font-size:15px;font-family: Calibri;font-weight: bold;width:457px; "> Chata / Muelle (Requisitos verificados) </td>
		<td colspan="6"  style="height:21px;text-align: center;font-size:15px;font-family: Calibri;font-weight: bold;width:462px; "> Normativa Legal de Referencia </td>
		<td style="width:24px;">&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;height:21px;width:48px;font-weight: bold; ">&nbsp; C  &nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;height:21px;width:48px;font-weight: bold; ">&nbsp; NC &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">1</td>
		<td colspan="5" class="softfinal" style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> Identificaci&oacute;n correcta de la Embarcaci&oacute;n Pesquera</td>
		<td colspan="6" class="softfinal" style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> R.D N&deg; 275-2004/DCG art. 4, 5 y 6 (modificado por RD 778-2004/DCG)</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php if($oReporte->cierrePuerto != 0){ echo 'N.A'; }else{if($cert != 2){ echo 'X';}else{if($oReporte->pregunta1 != 0){echo 'X';}}} ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php if($oReporte->cierrePuerto != 0){ echo 'N.A'; }else{if($cert != 1){ if($oReporte->pregunta1 != 1){ echo 'X'; } }} ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; ">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">2</td>
		<td colspan="5" class="softfinal" style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> Equipo SISESAT operativo y c&oacute;digo de identificaci&oacute;n correcto </td>
		<td colspan="6" class="softfinal" style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> R.M   N&deg; 197-2009-PRODUCE art. 1, 2 y Anexo 1</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php if($oReporte->cierrePuerto != 0){ echo 'N.A'; }else{ if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta2 != 0){echo 'X';} } }?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php if($oReporte->cierrePuerto != 0){ echo 'N.A'; }else{ if($cert != 1){ if($oReporte->pregunta2 != 1){ echo 'X'; } }} ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">3</td>
		<td colspan="5" class="softfinal" style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> Verificar la integridad del precinto de seguridad SISESAT y n&uacute;mero correcto</td>
		<td colspan="6" class="softfinal"  style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> R.M   N&deg; 197-2009-PRODUCE art. 6 </td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php if($oReporte->cierrePuerto != 0){ echo 'N.A'; }else{ if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta3 != 0){echo 'X';} } }?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php if($oReporte->cierrePuerto != 0){ echo 'N.A'; }else{ if($cert != 1){ if($oReporte->pregunta3 != 1){ echo 'X'; } } } ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">4</td>
		<td colspan="5" class="softfinal" style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "><?php if($cert != 1){echo 'Embarcaci&oacute;n Nominada';}else{echo 'Autorizaci&oacute;n para la especie.';} ?> </td>
		<td colspan="6" class="softfinal" style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> D.S N&deg; 015-2007-PRODUCE Art. 1 (Modifica Art. 20 del Reglamento de la Ley General de Pesca, aprobado por el DS N&deg; 012-2001-PE), Art. 2</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php  if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta4 != 0){echo 'X';} } ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php  if($cert != 1){ if($oReporte->pregunta4 != 1){ echo 'X'; } } ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">5</td>
		<td colspan="5" class="softfinal" style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> Permiso de pesca vigente</td>
		<td colspan="6" class="softfinal" style="height:28px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> D.S N&deg; 015-2007-PRODUCE Art. 1 (Modifica Art. 20 del Reglamento de la Ley General de Pesca, aprobado por el DS N&deg; 012-2001-PE).</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php  if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta5 != 0){echo 'X';} } ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:28px;font-weight: bold; "> <?php  if($cert != 1){ if($oReporte->pregunta5 != 1){ echo 'X'; } } ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan="5"  style="height:21px;text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">  Tolva (Requisitos verificados) </td>
		<td colspan="6" style="height:21px;text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;font-weight: bold; "> Normativa Legal de Referencia </td>
		<td>&nbsp;</td>
		<td >&nbsp; </td>
		<td >&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">6</td>
		<td colspan="5" class="softfinal" style="height:77px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> Imprimir correctamente en el Reporte de Pesaje los datos de: Raz&oacute;n Social,Ubicaci&oacute;n, Planta y modelo del Instrumento de Pesaje,  Especie, uso del recurso, nombre y matr&iacute;cula de la embarcaci&oacute;n pesquera,N&deg; Tolva Balanza, carga objetivo, fecha y hora de inicio y t&eacute;rmino; N&deg; de pesadas, peso(t) y hora de cada pesada y el peso acumulado (t).</td>
		<td colspan="6" class="softfinal"  style="height:77px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> R.M   358-2004-PRODUCE  art. 5</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:77px;font-weight: bold; "> <?php  if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta6 != 0){echo 'X';} } ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:77px;font-weight: bold; "> <?php  if($cert != 1){ if($oReporte->pregunta6 != 1){ echo 'X'; } } ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">7</td>
		<td colspan="5" class="softfinal" style="height:47px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; ">El tonelaje descargado no supera el exceso permitido para la capacidad de bodega de la embarcaci&oacute;n pesquera. </td>
		<td colspan="6" class="softfinal"  style="height:47px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> D.S N&deg; 027-2003-PRODUCE /  DS   N&deg; 015-2007-PRODUCE ,art. 1 (Modifica art. 134, numeral 75) del Reglamento de la Ley General de Pesca, aprobado por el D.S N&deg; 012- 2001-PE)</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:47px;font-weight: bold; "> <?php  if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta7 != 0){echo 'X';} } ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:47px;font-weight: bold; "> <?php  if($cert != 1){ if($oReporte->pregunta7 != 1){ echo 'X'; } } ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">8</td>
		<td colspan="5" class="softfinal" style="height:54px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; ">En el Reporte de Pesaje se imprime al inicio y al final de la descarga el n&uacute;mero de cuentas del conversor anal&oacute;gico SPAN, y del Cero (Z), el valor de peso de calibraci&oacute;n (Wval) y el coeficiente de calibraci&oacute;n (CC).</td>
		<td colspan="6" class="softfinal"  style="height:54px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; ">  R.M 768-2008-PRODUCE , art 1 , literal q)</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:54px;font-weight: bold; "> <?php  if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta8 != 0){echo 'X';} } ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:54px;font-weight: bold; "> <?php  if($cert != 1){ if($oReporte->pregunta8 != 1){ echo 'X'; } } ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">9</td>
		<td colspan="5" class="softfinal" style="height:66px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; ">Las compuertas de la pre-tolva se encuentran completamente cerradas al momento que las compuertas de la tolva de pesaje se abren despu&eacute;s de la estabilizaci&oacute;n y su pesaje, y se mantienen cerradas hasta que la tolva de pesaje termine de evacuar los recursos  hidrobiol&oacute;gicos a la poza de almacenamiento.</td>
		<td colspan="6" class="softfinal"  style="height:66px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> R.M N&deg; 502-2009-PRODUCE art. 2</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:66px;font-weight: bold; "> <?php  if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta9 != 0){echo 'X';} } ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:66px;font-weight: bold; "> <?php  if($cert != 1){ if($oReporte->pregunta9 != 1){ echo 'X'; } } ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">10</td>
		<td colspan="5" class="softfinal" style="height:33px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "><?php if($cert != 1){echo 'Ante los eventos Falla de Celda y/o compuertas Abiertas no se continuara utilizando las Tolvas';}else{echo 'Verificacion de los parametros de calibracion consignados en el Certificado Metrologico coincidan con los que figuran en el acta correspondiente';} ?></td>
		<td colspan="6" class="softfinal"  style="height:33px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> R.M 502-2009-PRODUCE, art. 3</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:33px;font-weight: bold; "> <?php  if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta10 != 0){echo 'X';} } ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:33px;font-weight: bold; "> <?php  if($cert != 1){ if($oReporte->pregunta10 != 1){ echo 'X'; } } ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan="5"  style="height:21px;text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">  Muestreo (Requisitos verificados) </td>
		<td colspan="6" style="height:21px;text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;font-weight: bold; "> Normativa Legal de Referencia </td>
		<td>&nbsp;</td>
		<td >&nbsp; </td>
		<td >&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">11</td>
		<td colspan="5" class="softfinal" style="height:21px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; ">Porcentaje de juveniles es menor o igual al m&aacute;ximo permitido.</td>
		<td colspan="6" class="softfinal"  style="height:21px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> RM N&deg; 209-2001-PE anexo 1.</td>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:21px;font-weight: bold; "> <?php echo 'N.A'; ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:21px;font-weight: bold; ">  <?php echo 'N.A'; ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:6px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;font-weight: bold; ">12</td>
		<td colspan="5" class="softfinal" style="height:50px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; ">Tomar tres (03) muestras teniendo en cuenta la pesca declarada, la primera toma se efectuar&aacute; dentro del 30% de iniciada la descarga y las otras dos (02) tomas dentro del 70% restante.</td>
		<td colspan="6" class="softfinal"  style="height:50px;text-align: left;font-size:11px;font-family: Arial;vertical-align:middle; "> RM 353-2015-PRODUCE,</td>
		<td>&nbsp;</td>
		// <td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:50px;font-weight: bold; "> <?php if($oReporte->numeroActaMuestreo == ""){ echo 'N.A';}else{if($cert != 2){ echo 'X';}else{ if($oReporte->pregunta12 != 0){echo 'X';} } }  ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:50px;font-weight: bold; "> <?php if($oReporte->numeroActaMuestreo == ""){ echo 'N.A';}else{if($cert != 1){ if($oReporte->pregunta12 != 1){ echo 'X'; } } }?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:14px; "> &nbsp;</td>
	</tr>
	<tr>
		<td colspan="14">&nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;height:14px;width:48px;font-weight: bold; ">&nbsp; C  &nbsp;</td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;height:14px;width:48px;font-weight: bold; ">&nbsp; NC &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="12" class="softfinal" style="height:31px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">De acuerdo a la evaluaci&oacute;n con las normas legales indicadas l&iacute;neas arriba <strong>&iquest; El resultado de la descarga de la embarcacion pesquera es ? </strong></td>
		<td>&nbsp;</td>
		<?php 
		if($oReporte->pregunta1 != '1' || $oReporte->pregunta2 != '1' || $oReporte->pregunta3 != '1' || $oReporte->pregunta4 != '1' || $oReporte->pregunta5 != '1' || $oReporte->pregunta6 != '1' || $oReporte->pregunta7 != '1' || $oReporte->pregunta8 != '1' || $oReporte->pregunta9 != '1' || $oReporte->pregunta10 != '1' || $oReporte->pregunta11 != '1' || $oReporte->pregunta12 != '1' ){
			$valor = true;
		}else{
			$valor =false;
		}
		?>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:31px;font-weight: bold; "> <?php  if($cert != 2){ echo 'X';}else{ if(!$valor){ echo 'X'; } } ?> </td>
		<td class="softfinal" style="text-align: center;font-size:11px;font-family: Calibri;vertical-align:middle;height:31px;font-weight: bold; "> <?php  if($cert != 1){ if($valor){ echo 'X'; } } ?> </td> <!--aqui es bastante -->
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:20px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2" style="text-align: center;font-size:11px;font-family: Calibri;height:20px;width:111px;">Observaci&oacute;n (es):   </td>
		<td colspan="13" style="border-bottom: 1px dotted #000;height:20px;"><?php if($oReporte->cierrePuerto != 0){ echo 'NA: No se realizo Inspeccione en chata por Cierre de Puerto y/o Fuerte Oleaje.'; }else{ echo '&nbsp;'; } ?></td>
	</tr>
	<?php if($oReporte->numeroActaMuestreo == ""){ ?>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15" style="border-bottom: 1px dotted #000;height:32px;"><?php if($oReporte->numeroActaMuestreo == ""){ echo ' La EP no fue muestreada por afluencia de descarga. '; }else{ echo '&nbsp;'; } ?></td>
	</tr>
	<?php }else{ ?>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15" style="border-bottom: 1px dotted #000;height:29px;"><?php if($oReporte->reporteCala != 0 && $oReporte->numeroActaMuestreo != ""){ echo 'Se presenta Reporte de Cala seg&uacute;n D.S 024-2016-PRODUCE. '; }else{ echo '&nbsp;'; } ?></td>
	</tr>	
	<?php } ?>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15" style="border-bottom: 1px dotted #000;height:32px;">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:21px; "> &nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
		<td class="softfinal" colspan="4" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:43px;font-weight: bold; "> Acta de Embarcaci&oacute;n Pesquera </td>
		<td class="softfinal" colspan="4" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:43px;font-weight: bold; "> Acta de Planta de Procesamiento de Productos Pesqueros </td>
		<td class="softfinal" colspan="5" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:43px;font-weight: bold; "> Acta de Muestreo </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2" class="softfinal" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;font-weight: bold; ">N&deg; ACTA</td>
		<td class="softfinal" colspan="4" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;"> <?php echo $oReporte->numeroActaDesembarque; ?> </td>
		<td class="softfinal" colspan="4" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;"> <?php echo $oReporte->nroActa; ?> </td>
		<td class="softfinal" colspan="5" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;"> <?php echo $oReporte->numeroActaMuestreo; ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2" class="softfinal" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;font-weight: bold; ">INSPECTOR</td>
		<td class="softfinal" colspan="4" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;"> <?php echo $oReporte->nombre1; ?></td>
		<td class="softfinal" colspan="4" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;"> <?php echo $oReporte->nombre2; ?> </td>
		<td class="softfinal" colspan="5" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;"> <?php echo $oReporte->nombre3; ?> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2" class="softfinal" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;font-weight: bold; ">CODIGO</td>
		<td class="softfinal" colspan="4" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;"> <?php echo $oReporte->codigo1; ?> </td>
		<td class="softfinal" colspan="4" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;"> <?php echo $oReporte->codigo2; ?> </td>
		<td class="softfinal" colspan="5" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:32px;"> <?php echo $oReporte->codigo3; ?>  </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:20px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="1" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:20px;font-weight: bold; ">C</td>
		<td colspan="2" style="text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle;height:20px; ">Conforme</td>
		<td colspan="12"  style="height:20px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="1" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:20px;font-weight: bold; ">NC</td>
		<td colspan="2" style="text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle;height:20px; ">No Conforme</td>
		<td colspan="12"  style="height:20px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="1" style="text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle;height:20px;font-weight: bold; ">O.I.</td>
		<td colspan="2" style="text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle;height:20px;">Organismo de Inspecci&oacute;n</td>
		<td colspan="12"  style="height:20px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="15"  style="height:21px; "> &nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9"  style="height:20px; "> &nbsp;</td>
		<td colspan="6"  style="height:20px;border-top:solid 1px #000;text-align: center;font-size:15px;font-family: Calibri;vertical-align:middle; ">Firma del Supervisor Bureau Veritas</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9"  style="height:20px; "> &nbsp;</td>
		<td colspan="4"  style="height:20px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">Nombre: JUAN PABLO ROJAS PAREDES</td>
		<td colspan="4"  style="height:20px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="8" rowspan="3" style="height:20px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">Cualquier variaci&oacute;n de dichas condiciones en el momento de la Evaluacion, no ser&aacute; de responsabilidad del Organismo de Inspecci&oacute;n Este certificado no puede reproducirse en forma parcial o total sin la aprobaci&oacute;n de BUREAU VERITAS DEL PERU S.A. </td> 
		<td style="height:20px; "> &nbsp;</td>
		<td colspan="2"  style="height:20px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">DNI: 18191669</td>
		<td colspan="4"  style="height:20px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="height:20px; "> &nbsp;</td>
		<td colspan="2"  style="height:20px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">C&oacute;digo: 1928</td>
		<td colspan="4"  style="height:20px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="height:19px; "> &nbsp;</td>
		<td colspan="8"  style="height:19px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">N&deg; Credencial: R.D.082-2016-PRODUCE/DGSF</td>
		<td colspan="4"  style="height:19px;text-align: left;font-size:15px;font-family: Calibri;vertical-align:middle; ">&nbsp;</td>
	</tr>
</table>

<?php exit();?>
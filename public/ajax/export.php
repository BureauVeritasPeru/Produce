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

$fileName = "consolidado_chi" . date('Ymd') . ".xls";
function number_pad($number,$n) {
	return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$localID                    =OWASP::RequestString('localID');
$nombrePlanta               =OWASP::RequestString('nombrePlanta');
$startDate                  =OWASP::RequestString('startDate');
$endDate                    =OWASP::RequestString('endDate');    

if($localID == '0'){$localID = '';}

// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
	<tr>
		<th colspan="17" class="color1">Datos Chata</th>
		<th colspan="21" class="color2">Datos Tolva</th>
		<th colspan="34" class="color3">Datos Muestreo</th>
		<th rowspan="2"  class="color4">N&#176; Reporte Cala</th>
		<th colspan="13"  class="color4">Cala 1</th>
		<th colspan="13"  class="color4">Cala 2</th>
		<th colspan="13"  class="color4">Cala 3</th>
		<th colspan="13"  class="color4">Cala 4</th>
		<th colspan="13"  class="color4">Cala 5</th>
		<th colspan="13"  class="color4">Cala 6</th>
		<th colspan="13"  class="color4">Cala 7</th>
		<th colspan="12"  class="color5">Infracciones Reporte de Ocurrencias 1</th>
		<th colspan="12"  class="color5">Infracciones Reporte de Ocurrencias 2</th>
		<th colspan="12"  class="color5">Infracciones Reporte de Ocurrencias 3</th>
		<th rowspan="2"  class="color6">Pendiente Descarga</th>
		<th class="color3">Datos Muestreo</th>
		<th colspan="3" class="color7">Observaciones Inusuales</th>
		<th rowspan="2" class="color4">Codigo de faena bitacora Web</th>

	</tr>
	<tr>
		<!--++++++++++++++++++++++++++++++++++++++++++++++ CHATA ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color1">C&oacute;digo Planta</th>
		<th class="color1">Nombre Planta</th>
		<th class="color1">Puerto</th>
		<th class="color1">Zona</th>
		<th class="color1">N&#176; Acta Desembarque E/P </th>
		<th class="color1">Pesca Declarada</th>

		<th class="color1">Mensaje Sisesat</th>
		<th class="color1">Hora Mensaje Sisesat</th>
		<th class="color1">Operatividad </th>
		<th class="color1">Mensaje Contestado</th>

		<th class="color1">LLamada Sisesat</th>
		<th class="color1">Hora LLamada Sisesat</th>
		<th class="color1">Operatividad</th>
		<th class="color1">LLamada Contestada</th>

		<th class="color1">Cierre Puerto</th>
		<th class="color1">C&oacute;digo Inspector</th>
		<th class="color1">Nombre Inspector</th>

		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

		<!--++++++++++++++++++++++++++++++++++++++++++++++ TOLVA ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color2">N&#176; Acta Inspecci&oacute;n</th>
		<th class="color2">Matr&iacute;cula E/P</th>
		<th class="color2">Embarcaci&oacute;n</th>
		<th class="color2">Tm Descargado</th>
		<th class="color2">Capacidad Bodega</th>
		<th class="color2">Exceso Bodega</th>
		<th class="color2">% Exceso Bodega</th>
		<th class="color2">RO</th>
		<th class="color2">Armador</th>
		<th class="color2">Fecha Inicio</th>
		<th class="color2">Hora Inicio</th>
		<th class="color2">Fecha T&eacute;rmino</th>
		<th class="color2">Hora T&eacute;rmino</th>
		<th class="color2">N&#176; Reporte Pesaje</th>
		<th class="color2">N&#176; Tolva</th>
		<th class="color2">Prueba Pesaje</th>
		<th class="color2">Conformidad Prueba Pesaje</th>
		<th class="color2">N&#176; Reporte Pesaje Prueba</th>
		<th class="color2">Hora Reporte Pesaje Prueba</th>
		<th class="color2">Codigo Inspector</th>
		<th class="color2">Nombre Inspector</th>

		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

		<!--++++++++++++++++++++++++++++++++++++++++++++++ MUESTREO ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color3">N&#176; Parte Muestreo</th>
		<th class="color3">Pesca Incidental Especie</th>
		<th class="color3">Pesca Incidental %</th>
		<th class="color3">Reporte Cala</th>
		<th class="color3">Estad&iacute;o</th>
		<th class="color3">Zona Pesca</th>
		<th class="color3">Frecuencia 8</th>
		<th class="color3">Frecuencia 8.5</th>
		<th class="color3">Frecuencia 9</th>
		<th class="color3">Frecuencia 9.5</th>
		<th class="color3">Frecuencia 10</th>
		<th class="color3">Frecuencia 10.5</th>
		<th class="color3">Frecuencia 11</th>
		<th class="color3">Frecuencia 11.5</th>
		<th class="color3">Frecuencia 12</th>
		<th class="color3">Frecuencia 12.5</th>
		<th class="color3">Frecuencia 13</th>
		<th class="color3">Frecuencia 13.5</th>
		<th class="color3">Frecuencia 14</th>
		<th class="color3">Frecuencia 14.5</th>
		<th class="color3">Frecuencia 15</th>
		<th class="color3">Frecuencia 15.5</th>
		<th class="color3">Frecuencia 16</th>
		<th class="color3">Frecuencia 16.5</th>
		<th class="color3">Frecuencia 17</th>
		<th class="color3">Frecuencia 17.5</th>
		<th class="color3">Frecuencia 18</th>
		<th class="color3">Total Ejemplares</th>
		<th class="color3">Moda</th>
		<th class="color3">Frecuencia Moda</th>
		<th class="color3">% Juveniles</th>
		<th class="color3">C&oacute;digo Inspector</th>
		<th class="color3">Nombre Inspector</th>
		<th class="color3">Acta Inspecci&oacute;n Muestreo</th>

		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

		<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 1 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color4">Latitud Grad.</th>
		<th class="color4">Latitud Min.</th>
		<th class="color4">Latitud Seg.</th>
		<th class="color4">Longitud Grad.</th>
		<th class="color4">Longitud Min.</th>
		<th class="color4">Longitud Seg.</th>
		<th class="color4">Fecha</th>
		<th class="color4">Hora</th>
		<th class="color4">Tm Declarada</th>
		<th class="color4">Juveniles > 10%</th>
		<th class="color4">% Juveniles</th>
		<th class="color4">Especie Incidental</th>
		<th class="color4">% Pesca Incidental</th>
		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
		<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 2 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color4">Latitud Grad.</th>
		<th class="color4">Latitud Min.</th>
		<th class="color4">Latitud Seg.</th>
		<th class="color4">Longitud Grad.</th>
		<th class="color4">Longitud Min.</th>
		<th class="color4">Longitud Seg.</th>
		<th class="color4">Fecha</th>
		<th class="color4">Hora</th>
		<th class="color4">Tm Declarada</th>
		<th class="color4">Juveniles > 10%</th>
		<th class="color4">% Juveniles</th>
		<th class="color4">Especie Incidental</th>
		<th class="color4">% Pesca Incidental</th>
		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
		<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 3 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color4">Latitud Grad.</th>
		<th class="color4">Latitud Min.</th>
		<th class="color4">Latitud Seg.</th>
		<th class="color4">Longitud Grad.</th>
		<th class="color4">Longitud Min.</th>
		<th class="color4">Longitud Seg.</th>
		<th class="color4">Fecha</th>
		<th class="color4">Hora</th>
		<th class="color4">Tm Declarada</th>
		<th class="color4">Juveniles > 10%</th>
		<th class="color4">% Juveniles</th>
		<th class="color4">Especie Incidental</th>
		<th class="color4">% Pesca Incidental</th>
		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
		<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 4 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color4">Latitud Grad.</th>
		<th class="color4">Latitud Min.</th>
		<th class="color4">Latitud Seg.</th>
		<th class="color4">Longitud Grad.</th>
		<th class="color4">Longitud Min.</th>
		<th class="color4">Longitud Seg.</th>
		<th class="color4">Fecha</th>
		<th class="color4">Hora</th>
		<th class="color4">Tm Declarada</th>
		<th class="color4">Juveniles > 10%</th>
		<th class="color4">% Juveniles</th>
		<th class="color4">Especie Incidental</th>
		<th class="color4">% Pesca Incidental</th>
		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
		<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 5 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color4">Latitud Grad.</th>
		<th class="color4">Latitud Min.</th>
		<th class="color4">Latitud Seg.</th>
		<th class="color4">Longitud Grad.</th>
		<th class="color4">Longitud Min.</th>
		<th class="color4">Longitud Seg.</th>
		<th class="color4">Fecha</th>
		<th class="color4">Hora</th>
		<th class="color4">Tm Declarada</th>
		<th class="color4">Juveniles > 10%</th>
		<th class="color4">% Juveniles</th>
		<th class="color4">Especie Incidental</th>
		<th class="color4">% Pesca Incidental</th>
		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
		<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 6 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color4">Latitud Grad.</th>
		<th class="color4">Latitud Min.</th>
		<th class="color4">Latitud Seg.</th>
		<th class="color4">Longitud Grad.</th>
		<th class="color4">Longitud Min.</th>
		<th class="color4">Longitud Seg.</th>
		<th class="color4">Fecha</th>
		<th class="color4">Hora</th>
		<th class="color4">Tm Declarada</th>
		<th class="color4">Juveniles > 10%</th>
		<th class="color4">% Juveniles</th>
		<th class="color4">Especie Incidental</th>
		<th class="color4">% Pesca Incidental</th>
		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
		<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 7 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color4">Latitud Grad.</th>
		<th class="color4">Latitud Min.</th>
		<th class="color4">Latitud Seg.</th>
		<th class="color4">Longitud Grad.</th>
		<th class="color4">Longitud Min.</th>
		<th class="color4">Longitud Seg.</th>
		<th class="color4">Fecha</th>
		<th class="color4">Hora</th>
		<th class="color4">Tm Declarada</th>
		<th class="color4">Juveniles > 10%</th>
		<th class="color4">% Juveniles</th>
		<th class="color4">Especie Incidental</th>
		<th class="color4">% Pesca Incidental</th>
		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

		<!--++++++++++++++++++++++++++++++++++++++++++++++ Infracciones 1 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color5">N&#176; RO</th>
		<th class="color5">Infracci&oacute;n 1</th>
		<th class="color5">Infracci&oacute;n 2</th>
		<th class="color5">Infracci&oacute;n 3</th>
		<th class="color5">N&#176; acta Decomiso</th>
		<th class="color5">Tm Decomisado</th>
		<th class="color5">% Decomisado</th>
		<th class="color5">N&#176; acta Retenci&oacute;n</th>
		<th class="color5">C&oacute;digo Inspector</th>
		<th class="color5">Nombre Inspector</th>
		<th class="color5">Sub - C&oacute;digo Numeral Decomiso</th>
		<th class="color5">Infractor</th>

		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
		<!--++++++++++++++++++++++++++++++++++++++++++++++ Infracciones 2 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color5">N&#176; RO</th>
		<th class="color5">Infracci&oacute;n 1</th>
		<th class="color5">Infracci&oacute;n 2</th>
		<th class="color5">Infracci&oacute;n 3</th>
		<th class="color5">N&#176; acta Decomiso</th>
		<th class="color5">Tm Decomisado</th>
		<th class="color5">% Decomisado</th>
		<th class="color5">N&#176; acta Retenci&oacute;n</th>
		<th class="color5">C&oacute;digo Inspector</th>
		<th class="color5">Nombre Inspector</th>
		<th class="color5">Sub - C&oacute;digo Numeral Decomiso</th>
		<th class="color5">Infractor</th>

		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
		<!--++++++++++++++++++++++++++++++++++++++++++++++ Infracciones 3 ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color5">N&#176; RO</th>
		<th class="color5">Infracci&oacute;n 1</th>
		<th class="color5">Infracci&oacute;n 2</th>
		<th class="color5">Infracci&oacute;n 3</th>
		<th class="color5">N&#176; acta Decomiso</th>
		<th class="color5">Tm Decomisado</th>
		<th class="color5">% Decomisado</th>
		<th class="color5">N&#176; acta Retenci&oacute;n</th>
		<th class="color5">C&oacute;digo Inspector</th>
		<th class="color5">Nombre Inspector</th>
		<th class="color5">Sub - C&oacute;digo Numeral Decomiso</th>
		<th class="color5">Infractor</th>

		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color3">Observaciones</th>
		<th class="color7">Chata</th>
		<th class="color7">Tolva</th>
		<th class="color7">Muestreo</th>

	</tr>


	<?php 
	$count=0;
	$list=CrmChi::getList_Paging2($localID,$nombrePlanta,$startDate,$endDate);
	foreach ($list as $oItem){
		$oItemEmbarcacion = new eCrmEmbarcacion();
		$oItemInspector3 = new eCrmInspector();
		$oItemInspector2 = new eCrmInspector();
		$date1 = new DateTime();
		$date2 = new DateTime();
		
		$valor ='softfinal';
		$oItemChata = CrmChata::getItemCHI($oItem->chiID);
		$oItemPlanta = CrmPlanta::getItem($oItemChata->plantaID);
		$oItemInspector = CrmInspector::getItem($oItemChata->inspectorID);
		$oItemSiseSat1 = CrmSisesat::getItemxTipo($oItemChata->chataID,1);
		$oItemSiseSat2 = CrmSisesat::getItemxTipo($oItemChata->chataID,2);

		$oItemTolva = CrmTolva::getItemCHI($oItem->chiID);
		$oItemEmbarcacion =  CrmEmbarcacion::getItem($oItemTolva->embarcacionID);
		$date1 = new DateTime($oItemTolva->fechaInicial);
		$date2 = new DateTime($oItemTolva->fechaFinal);
		$oItemInspector2 = CrmInspector::getItem($oItemTolva->inspectorID);

		$oItemMuestreo = CrmMuestreo::getItemCHI($oItem->chiID);
		$vowels = array(",,", ",,,", ",,,,");
		$vowels2 = array(",0,0", ",0,0,0", ",0,0,0,0");
		$oItemInspector3 = CrmInspector::getItem($oItemMuestreo->inspectorID);

		$oItemCala = CrmCala::getItemCHI($oItem->chiID);
		$oDetalleCala1 = CrmDetalleCala::getItemCorre($oItem->chiID,1);
		$oDetalleCala2 = CrmDetalleCala::getItemCorre($oItem->chiID,2);
		$oDetalleCala3 = CrmDetalleCala::getItemCorre($oItem->chiID,3);
		$oDetalleCala4 = CrmDetalleCala::getItemCorre($oItem->chiID,4);
		$oDetalleCala5 = CrmDetalleCala::getItemCorre($oItem->chiID,5);
		$oDetalleCala6 = CrmDetalleCala::getItemCorre($oItem->chiID,6);
		$oDetalleCala7 = CrmDetalleCala::getItemCorre($oItem->chiID,7);

		$oReporteOcurrencia1 = CrmReporteOcurrencia::getItemCHI($oItem->chiID,1);
		$oReporteOcurrencia2 = CrmReporteOcurrencia::getItemCHI($oItem->chiID,2);
		$oReporteOcurrencia3 = CrmReporteOcurrencia::getItemCHI($oItem->chiID,3);

		if(isset($oReporteOcurrencia1)){
			$oItemInspector4 = CrmInspector::getItem($oReporteOcurrencia1->inspectorID);
			$infraccion1_1 = CrmInfraccion::getItemCHI($oReporteOcurrencia1->reporteOcurrenciaID,1);
			$infraccion1_2 = CrmInfraccion::getItemCHI($oReporteOcurrencia1->reporteOcurrenciaID,2);
			$infraccion1_3 = CrmInfraccion::getItemCHI($oReporteOcurrencia1->reporteOcurrenciaID,3);
		}
		if(isset($oReporteOcurrencia2)){
			$oItemInspector5 = CrmInspector::getItem($oReporteOcurrencia2->inspectorID);
			$infraccion2_1 = CrmInfraccion::getItemCHI($oReporteOcurrencia2->reporteOcurrenciaID,1);
			$infraccion2_2 = CrmInfraccion::getItemCHI($oReporteOcurrencia2->reporteOcurrenciaID,2);
			$infraccion2_3 = CrmInfraccion::getItemCHI($oReporteOcurrencia2->reporteOcurrenciaID,3);
		}
		if(isset($oReporteOcurrencia3)){
			$oItemInspector6 = CrmInspector::getItem($oReporteOcurrencia3->inspectorID);
			$infraccion3_1 = CrmInfraccion::getItemCHI($oReporteOcurrencia3->reporteOcurrenciaID,1);
			$infraccion3_2 = CrmInfraccion::getItemCHI($oReporteOcurrencia3->reporteOcurrenciaID,2);
			$infraccion3_3 = CrmInfraccion::getItemCHI($oReporteOcurrencia3->reporteOcurrenciaID,3);
		}


		?>
		<tr>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CHATA ++++++++++++++++++++++++++++++++++++++++++-->
			<td class="<?php echo $valor; ?>"><?php echo $oItemPlanta->codigoPlanta; ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemChata->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemChata->puertoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemChata->zonaPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemChata->numeroActaDesembarque, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemChata->pescaDeclarada, ENT_QUOTES, "UTF-8"); ?> </td>
			<!-- Sisesat 1 -->
			<?php if(isset($oItemSiseSat1)){ ?>
			<td class="<?php echo $valor; ?>"><?php if($oItemSiseSat1->tipoSisesat == '1'){echo 'Si';}elseif($oItemSiseSat1->tipoSisesat == '2'){echo 'No';}else{ echo '';} ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemSiseSat1->horaSisesat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php if($oItemSiseSat1->operatividadSisesat == '1'){ echo 'Si';}else{ echo 'No';}  ?> </td>
			<td class="<?php echo $valor; ?>"><?php if($oItemSiseSat1->contestadoSisesat == '1'){ echo 'Si';}else{ echo 'No';} ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">No</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<!-- Sisesat 2 -->
			<?php if(isset($oItemSiseSat2)){ ?>
			<td class="<?php echo $valor; ?>"><?php if($oItemSiseSat2->tipoSisesat == '1'){echo 'No';}elseif($oItemSiseSat2->tipoSisesat == '2'){echo 'Si';}else{ echo '';} ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemSiseSat2->horaSisesat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php if($oItemSiseSat2->operatividadSisesat == '1'){ echo 'Si';}else{ echo 'No';}  ?> </td>
			<td class="<?php echo $valor; ?>"><?php if($oItemSiseSat2->contestadoSisesat == '1'){ echo 'Si';}else{ echo 'No';} ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">No</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php if($oItemChata->cierrePuerto == '1'){ echo 'Si';}else{ echo 'No';} ?> </td>
			<?php if(isset($oItemInspector)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemInspector->codigoInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">N/A</td>
			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemChata->nombreInspector, ENT_QUOTES, "UTF-8"); ?> </td>

			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

			<!--++++++++++++++++++++++++++++++++++++++++++++++ TOLVA ++++++++++++++++++++++++++++++++++++++++++-->
			<td class="<?php echo $valor; ?>"><?php echo $oItemTolva->numActaInspeccion; ?> </td>
			<?php if(isset($oItemEmbarcacion)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemEmbarcacion->matriculaEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php  }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->tmDescargado, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->capacidadBodega, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->excesoBodega, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->porcentajeExceso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->ro, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php if(isset($oItemEmbarcacion)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemEmbarcacion->armador, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php  }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo $oItemTolva->horaInicio; ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo $oItemTolva->horaTermino; ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->nroReportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->nroTolva, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php if($oItemTolva->pruebaPesaje == '1'){ echo 'Si';}else{ echo 'No';}  ?> </td>
			<td class="<?php echo $valor; ?>"><?php if($oItemTolva->conforme == '1'){ echo 'Si';}else{ echo 'No';}  ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->numReportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->horaReportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php if(isset($oItemInspector2)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemInspector2->codigoInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">N/A</td>
			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->nombreInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

			<!--++++++++++++++++++++++++++++++++++++++++++++++ MUESTREO ++++++++++++++++++++++++++++++++++++++++++-->
			<td class="<?php echo $valor; ?>"><?php echo $oItemMuestreo->nroParteMuestreo; ?> </td>
			<td class="<?php echo $valor; ?>"><?php if($oItemMuestreo->porcEspecie == '0,0,0,0,0'){echo '-';}else{echo str_replace($vowels2, "", $oItemMuestreo->porcEspecie);} ?> </td>
			<td class="<?php echo $valor; ?>"><?php if($oItemMuestreo->especie == ',,,,'){echo '-';}else{echo htmlentities(str_replace($vowels, "",$oItemMuestreo->especie), ENT_QUOTES, "UTF-8");} ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->reporteCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->estadio, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->zonaPesca, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia8, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia8_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia9, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia9_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia10, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia10_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia11, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia11_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia12, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia12_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia13, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia13_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia14, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia14_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia15, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia15_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia16, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia16_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia17, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia17_5, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia18, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->totalEjemplares, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->frecuencia, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->moda, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->porcJuveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php if(isset($oItemInspector3)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemInspector3->codigoInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">N/A</td>
			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->nombreInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->numeroActaMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

			<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA ++++++++++++++++++++++++++++++++++++++++++-->
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemCala->numReporteCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 1 ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oDetalleCala1)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->latitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->minLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->segLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->longitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->minLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->segLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->fechaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->horaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->tmDeclaradas, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->juveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->porcJuveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->especie, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala1->porcEspecie, ENT_QUOTES, "UTF-8"); ?> </td>
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
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 2 ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oDetalleCala2)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->latitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->minLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->segLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->longitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->minLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->segLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->fechaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->horaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->tmDeclaradas, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->juveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->porcJuveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->especie, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala2->porcEspecie, ENT_QUOTES, "UTF-8"); ?> </td>
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
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 3 ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oDetalleCala3)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->latitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->minLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->segLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->longitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->minLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->segLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->fechaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->horaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->tmDeclaradas, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->juveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->porcJuveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->especie, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala3->porcEspecie, ENT_QUOTES, "UTF-8"); ?> </td>
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
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 4 ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oDetalleCala4)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->latitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->minLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->segLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->longitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->minLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->segLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->fechaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->horaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->tmDeclaradas, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->juveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->porcJuveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->especie, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala4->porcEspecie, ENT_QUOTES, "UTF-8"); ?> </td>
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
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 5 ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oDetalleCala5)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->latitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->minLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->segLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->longitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->minLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->segLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->fechaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->horaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->tmDeclaradas, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->juveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->porcJuveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->especie, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala5->porcEspecie, ENT_QUOTES, "UTF-8"); ?> </td>
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
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 6 ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oDetalleCala6)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->latitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->minLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->segLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->longitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->minLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->segLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->fechaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->horaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->tmDeclaradas, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->juveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->porcJuveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->especie, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala6->porcEspecie, ENT_QUOTES, "UTF-8"); ?> </td>
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
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CALA 7 ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oDetalleCala7)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->latitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->minLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->segLat, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->longitud, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->minLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->segLong, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->fechaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->horaCala, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->tmDeclaradas, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->juveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->porcJuveniles, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->especie, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleCala7->porcEspecie, ENT_QUOTES, "UTF-8"); ?> </td>
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
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

			<!--++++++++++++++++++++++++++++++++++++++++++++++ REPORTE OCURRENCIA 1 ++++++++++++++++++++++++++++++++++++++++++-->

			<?php if(isset($oReporteOcurrencia1)){ ?>

			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->numReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>

			<!-- Infraccion 1 -->
			<?php if(isset($infraccion1_1)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion1_1->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<?php if(isset($infraccion1_2)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion1_2->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<?php if(isset($infraccion1_3)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion1_3->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<!-- ///////// -->

			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemInspector4->codigoInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->nombreInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->subCodigoNumeroDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->infractor, ENT_QUOTES, "UTF-8"); ?> </td>
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

			<?php } ?>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

			<!--++++++++++++++++++++++++++++++++++++++++++++++ REPORTE OCURRENCIA 2 ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oReporteOcurrencia2)){ ?>

			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->numReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>

			<!-- Infraccion 2 -->
			<?php if(isset($infraccion2_1)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion2_1->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<?php if(isset($infraccion2_2)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion2_2->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<?php if(isset($infraccion2_3)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion2_3->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<!-- ///////// -->


			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemInspector5->codigoInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->nombreInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->subCodigoNumeroDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->infractor, ENT_QUOTES, "UTF-8"); ?> </td>

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

			<?php } ?>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

			<!--++++++++++++++++++++++++++++++++++++++++++++++ REPORTE OCURRENCIA 3 ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if(isset($oReporteOcurrencia3)){ ?>

			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia3->numReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>

			<!-- Infraccion 3 -->
			<?php if(isset($infraccion3_1)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion3_1->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<?php if(isset($infraccion3_2)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion3_2->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<?php if(isset($infraccion3_3)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion3_3->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<!-- ///////// -->


			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia3->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia3->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia3->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia3->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemInspector6->codigoInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia3->nombreInspector, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia3->subCodigoNumeroDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia3->infractor, ENT_QUOTES, "UTF-8"); ?> </td>
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

			<?php } ?>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
			<td class="<?php echo $valor; ?>"><?php if($oItem->pendiente == '1'){ echo 'Si';}else{ echo 'No';}  ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->observaciones, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemChata->obsInusual, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemTolva->obsInusual, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMuestreo->obsInusual, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemCala->codigoFaenaWeb, ENT_QUOTES, "UTF-8"); ?> </td>
		</tr>	

		<?php } ?>

	</table>
	<?php exit();?>
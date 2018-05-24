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

$fileName = "consolidado_descartes_residuos" . date('Ymd') . ".xls";
function number_pad($number,$n) {
	return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$localID                    =OWASP::RequestString('localID');
$nombrePlanta               =OWASP::RequestString('nombrePlanta');
$startDate                  =OWASP::RequestString('startDate');
$endDate                    =OWASP::RequestString('endDate');
$tipoCHD                    =OWASP::RequestString('tipoCHD');    

if($localID == '0'){$localID = '';}

// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
	<tr>
		<!--++++++++++++++++++++++++++++++++++++++++++++++ CHATA ++++++++++++++++++++++++++++++++++++++++++-->
		<th class="color1">C&oacute;digo Planta</th>
		<th class="color1">Planta Pesquera</th>
		<th class="color1">Localidad</th>
		<th class="color1">Provincia</th>
		<th class="color1">Region</th>
		<th class="color1">N&uacute;mero Acta Descartes</th>
		<th class="color1">Especie 1</th>
		<th class="color1">Fecha Ingreso</th>
		<th class="color1">Hora Ingreso</th>
		<th class="color1">Fecha T&eacute;rmino</th>
		<th class="color1">Hora T&eacute;rmino</th>
		<th class="color1">RP 1</th>
		<th class="color1">Guia 1</th>
		<th class="color1">Tipo Transporte</th>
		<th class="color1">Placa Transporte</th>

		<th class="color1">Tipo Descarte o Residuo</th>
		<th class="color1">TM Total </th>
		<th class="color1">TM No Apto</th>
		<th class="color1">Tipo EIP</th>
		<th class="color1">Número Acta Sensorial</th>
		<th class="color1">% Apto</th>
		<th class="color2">Acta Parte Muestreo</th>
		<th class="color2">% Juvenil</th>
		<th class="color2">% Incidental</th>
		<th class="color2">Acta Reporte Ocurrencia</th>
		<th class="color2">C&oacute;digo Infracci&oacute;n</th>
		<th class="color2">Tipo Infractor</th>
		<th class="color2">Acta Decomiso</th>
		<th class="color2">Cantidad Decomisada TM</th>
		<th class="color2">Porcentaje Decomisado</th>
		<th class="color2">Acta Reteci&oacute;n Pago</th>
		<th class="color2">Inspector</th>
		<th class="color2">Tipo</th>
		<th class="color2">Estado Residuos</th>
		<th class="color2">Tipo Procedencia 2</th>
		<th class="color2">Tipo Envase</th>
		<th class="color2">Observaciones</th>

		<th class="color2">Código Planta Pesquera Destino</th>
		<th class="color2">Planta Pesquera Destino</th>
		<th class="color2">Región Planta Pesquera Destino</th>
		<th class="color2">Provincia Planta Pesquera Destino</th>
		<th class="color3">Codigo Inspector</th>
		<th class="color3">Codigo Infracci&oacute;n 2</th>
		<th class="color3">Codigo Infracci&oacute;n 3</th>
		<th class="color3">TM1</th>
		<th class="color3">Especie 2</th>
		<th class="color3">TM2</th>
		<th class="color3">Especie 3</th>
		<th class="color3">TM3</th>
		<th class="color3">Especie 4</th>
		<th class="color3">TM4</th>
		<th class="color3">Destino Procedencia</th>
		<th class="color3">Descartes Propios Procesados</th>
		<th class="color3">Descartes Propios No Procesados</th>
		<th class="color3">Descartes Recibidos de Terceros Procesados</th>
		<th class="color3">Residuos Propios Procesados</th>
		<th class="color3">Residuos Propios No Procesados</th>
		<th class="color3">Residuos Recibidos de Terceros Procesados</th>
		<th class="color3">TIPO PROCEDENCIA</th>
		<th class="color3">NOMBRE PROCEDENCIA</th>
		<th class="color3">RUC</th>
		<th class="color3">%  NO APTO</th>
		<th class="color3">CODIGO PLANTA ORIGEN</th>
		<th class="color3">PLANTA ORIGEN</th>
		<th class="color3">REGION ORIGEN</th>
		<th class="color3">PROVINCIA ORIGEN</th>
		<th class="color3">RO2</th>
		<th class="color3">Codigo Infraccion 1-2</th>
		<th class="color3">Codigo Infraccion 2-2</th>
		<th class="color3">Codigo Infraccion 3-2</th>
		<th class="color3">Tipo Infractor 2</th>
		<th class="color3">Acta decomiso 2</th>
		<th class="color3">Cantidad Decomisada 2</th>
		<th class="color3">Porcentaje Decomisado 2</th>
		<th class="color3">Acta retencion Pago 2</th>
		<th class="color3">RP 2</th>
		<th class="color3">Guia 2</th>
		<th class="color3">RP 3</th>
		<th class="color3">Guia 3</th>
		<th class="color3">RP 4</th>
		<th class="color3">Guia 4</th>
	</tr>


	<?php 
	$count=0;
	$list=CrmChd::getList_Paging($localID,$nombrePlanta,$startDate,$endDate,2);
	foreach ($list as $oItem){
		$oItemPlanta = new eCrmPlantaChd();
		$oItemPlantaO = new eCrmPlantaChd();
		$oItemPlantaD = new eCrmPlantaChd();
		$oItemInspector = new eCrmInspector();
		$oReporteOcurrencia1 = new eCrmReporteOcurrenciaDR();
		$oReporteOcurrencia2 = new eCrmReporteOcurrenciaDR();
		$infraccion1_1  = new eCrmInfraccionDR();
		$infraccion1_2 = new eCrmInfraccionDR();
		$infraccion1_3 = new eCrmInfraccionDR();

		$infraccion2_1 = new eCrmInfraccionDR();
		$infraccion2_2 = new eCrmInfraccionDR();
		$infraccion2_3 = new eCrmInfraccionDR();
		$date1 = new DateTime();
		$date2 = new DateTime();
		$oEspecie= new CmsParameterLang();
		$oEspecie2= new CmsParameterLang();
		$oEspecie3= new CmsParameterLang();
		$oEspecie4= new CmsParameterLang();
		$oTipoTransporte= new CmsParameterLang();
		$oTipoEIP= new CmsParameterLang();
		$oTipoDR = new CmsParameterLang();
		$oEstadoResiduos = new CmsParameterLang();
		$oTipoProcedencia = new CmsParameterLang();
		$oTipoInfractor = new CmsParameterLang();
		$oTipoProcedenciaTM = new CmsParameterLang();
		$oNombreProcedencia = new CmsParameterLang();
		$oTipoEnvase = new CmsParameterLang();
		$valor ='softfinal';
		$oItemDescartesResiduos = CrmDescartesResiduos::getItemCHD($oItem->chdID);
		$oItemPlanta = CrmPlantaChd::getItem($oItemDescartesResiduos->plantaID);
		$infraccion1_1 = new eCrmInfraccionMP();
		$infraccion1_2 = new eCrmInfraccionMP();
		$infraccion1_3 = new eCrmInfraccionMP();
		$infraccion2_1 = new eCrmInfraccionMP();
		$infraccion2_2 = new eCrmInfraccionMP();
		$infraccion2_3 = new eCrmInfraccionMP();

		

		$date1 = new DateTime($oItemDescartesResiduos->fechaIngreso);
		$date2 = new DateTime($oItemDescartesResiduos->fechaTermino);

		$oItemDR = CrmDatosDR::getItemCHD($oItem->chdID);
		if(isset($oItemDR)){
			$oItemInspector = CrmInspector::getItem($oItemDR->inspectorID);
			$oItemPlantaO = CrmPlantaChd::getItem($oItemDR->plantaOID);
			$oItemPlantaD = CrmPlantaChd::getItem($oItemDR->plantaDID);
		}

		$oReporteOcurrencia1 = CrmReporteOcurrenciaDR::getItemCHD($oItem->chdID,1);
		$oReporteOcurrencia2 = CrmReporteOcurrenciaDR::getItemCHD($oItem->chdID,2);
		if(isset($oReporteOcurrencia1)){
			$infraccion1_1 = CrmInfraccionDR::getItemCHD($oReporteOcurrencia1->reporteOcurrenciaDRID,1);
			$infraccion1_2 = CrmInfraccionDR::getItemCHD($oReporteOcurrencia1->reporteOcurrenciaDRID,2);
			$infraccion1_3 = CrmInfraccionDR::getItemCHD($oReporteOcurrencia1->reporteOcurrenciaDRID,3);
		}
		if(isset($oReporteOcurrencia2)){
			$infraccion2_1 = CrmInfraccionDR::getItemCHD($oReporteOcurrencia2->reporteOcurrenciaDRID,1);
			$infraccion2_2 = CrmInfraccionDR::getItemCHD($oReporteOcurrencia2->reporteOcurrenciaDRID,2);
			$infraccion2_3 = CrmInfraccionDR::getItemCHD($oReporteOcurrencia2->reporteOcurrenciaDRID,3);
		}
		
		if($oItemDescartesResiduos->especie1 != 0){
			$oEspecie= CmsParameterLang::getItem($oItemDescartesResiduos->especie1, 1);
		}else{
			$oEspecie->parameterName = '-';
		}
		if($oItemDescartesResiduos->especie2 != 0){
			$oEspecie2= CmsParameterLang::getItem($oItemDescartesResiduos->especie2, 1);
		}else{
			$oEspecie2->parameterName = '-';
		}
		if($oItemDescartesResiduos->especie3 != 0){
			$oEspecie3= CmsParameterLang::getItem($oItemDescartesResiduos->especie3, 1);
		}else{
			$oEspecie3->parameterName = '-';
		}
		if($oItemDescartesResiduos->especie4 != 0){
			$oEspecie4= CmsParameterLang::getItem($oItemDescartesResiduos->especie4, 1);
		}else{
			$oEspecie4->parameterName = '-';
		}
		if($oItemDescartesResiduos->tipoUnidadTransporte != 0){
			$oTipoTransporte= CmsParameterLang::getItem($oItemDescartesResiduos->tipoUnidadTransporte, 1);
		}else{
			$oTipoTransporte->parameterName = '-';
		}

		if($oItemDescartesResiduos->tipoEIP != 0){
			$oTipoEIP= CmsParameterLang::getItem($oItemDescartesResiduos->tipoEIP, 1);
			switch ($oTipoEIP->parameterName) {
				case 'EIP CHD-CHI':
				$oTipoEIP->parameterName = '1';
				break;
				case 'Plantas de Reaprovechamiento de Descartes Residuos (RRS)':
				$oTipoEIP->parameterName = '2';
				break;
				case 'EIP CHD-PHR':
				$oTipoEIP->parameterName = '3';
				break;
			}
		}else{
			$oTipoEIP->parameterName = '-';
		}

		if($oItemDescartesResiduos->tipoTM != 0){ 
			$oTipo= CmsParameterLang::getItem($oItemDescartesResiduos->tipoTM, 1);
		}else{
			$oTipo->parameterName = '-';
		}

		if($oItemDescartesResiduos->tipoProcedencia != 0){ 
			$oTipoProcedenciaTM= CmsParameterLang::getItem($oItemDescartesResiduos->tipoProcedencia, 1);
		}else{
			$oTipoProcedenciaTM->parameterName = '-';
		}

		if($oItemDescartesResiduos->nombreProcedencia != 0){ 
			$oNombreProcedencia= CmsParameterLang::getItem($oItemDescartesResiduos->nombreProcedencia, 1);
			if($oNombreProcedencia == NULL){ $oNombreProcedencia->parameterName = $oItemDescartesResiduos->nombreProcedencia; }
		}else{
			$oNombreProcedencia->parameterName = '-';
		}

		?>
		<tr>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CHATA ++++++++++++++++++++++++++++++++++++++++++-->
			<?php if($oItemPlanta != NULL){ ?>
			<td class="<?php echo $valor; ?>"><?php echo $oItemPlanta->codigoPlanta; ?> </td>
			<?php }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->provinciaPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->regionPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaDR, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->horaIngreso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->horaTermino, ENT_QUOTES, "UTF-8"); ?> </td>

			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->rp1, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->guia1, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoTransporte->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->placaUnidadTransporte, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities(str_replace("TM", "", $oTipo->parameterName), ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tmNoApto, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoEIP->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaSensorial, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->porcNoApto, ENT_QUOTES, "UTF-8"); ?> </td>	
			<?php if(isset($oItemDR)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->porcJuvenil, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->porcIncidental, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php  }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<?php if(isset($oReporteOcurrencia1)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php  }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<?php if(isset($infraccion1_1)){ $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_1->codigoInfraccion != 0){$oInfraccion1= CmsParameterLang::getItem($infraccion1_1->codigoInfraccion, 1); }else{$oInfraccion1->parameterName = '-'; } ?>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
				<?php  }else{ ?>
				<td class="<?php echo $valor; ?>">-</td>
				<?php } ?>
				<?php if(isset($oReporteOcurrencia1)){ if($oReporteOcurrencia1->tipoInfractor!= 0){$oTipoInfractor= CmsParameterLang::getItem($oReporteOcurrencia1->tipoInfractor, 1);}else{$oTipoInfractor->parameterName = '-';}  ?>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor->parameterName , ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia1->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
					<?php  }else{ ?>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<?php } ?>
					<?php if(isset($oItemDR)){ if($oItemDR->tipo != 0){$oTipoDR= CmsParameterLang::getItem($oItemDR->tipo, 1);}else{$oTipoDR->parameterName = '-';}
					if($oItemDR->estadoResiduos != 0){$oEstadoResiduos= CmsParameterLang::getItem($oItemDR->estadoResiduos, 1);}else{$oEstadoResiduos->parameterName = '-';}
						if($oItemDR->tipoProcedencia != 0){$oTipoProcedencia= CmsParameterLang::getItem($oItemDR->tipoProcedencia, 1);}else{$oTipoProcedencia->parameterName = '-';}
							if($oItemDR->tipoEnvase != 0){$otipoEnvase= CmsParameterLang::getItem($oItemDR->tipoEnvase, 1);}else{$otipoEnvase->parameterName = '-';}?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->nombreInspector, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoDR->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEstadoResiduos->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($otipoEnvase->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->observaciones, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>

							<?php if(isset($oItemDR)){ ?>
							<?php if(isset($oItemPlantaD)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaD->codigoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->nombrePlantaD, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->regionPlantaD, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->provinciaPlantaD, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>

							<?php if(isset($oItemInspector)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemInspector->codigoInspector, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($infraccion1_2)){ $oInfraccion2 = new eCmsParameterLang(); $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_2->codigoInfraccion != 0){$oInfraccion2= CmsParameterLang::getItem($infraccion1_2->codigoInfraccion, 1); }else{$oInfraccion2->parameterName = '-'; }?>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion2->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
								<?php  }else{ ?>
								<td class="<?php echo $valor; ?>">-</td>
								<?php } ?>
								<?php if(isset($infraccion1_3)){ $oInfraccion3 = new eCmsParameterLang(); $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_3->codigoInfraccion != 0){$oInfraccion3= CmsParameterLang::getItem($infraccion1_3->codigoInfraccion, 1); }else{$oInfraccion3->parameterName = '-'; }?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion3->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
									<?php  }else{ ?>
									<td class="<?php echo $valor; ?>">-</td>
									<?php } ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm1, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie2->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm2, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie3->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm3, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie4->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm4, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->destinoProcedencia, ENT_QUOTES, "UTF-8"); ?> </td>
									<!-- esta por terminarse -->
									<?php if($oItemDescartesResiduos->tipoTM == '157'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
									<?php if($oItemDescartesResiduos->tipoTM == '158'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
									<?php if($oItemDescartesResiduos->tipoTM == '159'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
									<?php if($oItemDescartesResiduos->tipoTM == '160'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
									<?php if($oItemDescartesResiduos->tipoTM == '161'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
									<?php if($oItemDescartesResiduos->tipoTM == '162'){echo '<td class="'.$valor.'">'.$oItemDescartesResiduos->tm.'</td>';}else{echo '<td class="'.$valor.'">-</td>';} ?>
									<!-- falta -->
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedenciaTM->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oNombreProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->ruc, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->porcNoApto, ENT_QUOTES, "UTF-8"); ?> </td>

									<?php if(isset($oItemDR)){ ?>
									<?php if(isset($oItemPlantaO)){ ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemPlantaO->codigoPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
									<?php  }else{ ?>
									<td class="<?php echo $valor; ?>">-</td>
									<?php } ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->nombrePlantaO, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->regionPlantaO, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDR->provinciaPlantaO, ENT_QUOTES, "UTF-8"); ?> </td>
									<?php  }else{ ?>
									<td class="<?php echo $valor; ?>">-</td>
									<td class="<?php echo $valor; ?>">-</td>
									<td class="<?php echo $valor; ?>">-</td>
									<td class="<?php echo $valor; ?>">-</td>
									<?php } ?>

									<?php if(isset($oReporteOcurrencia2)){ ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
									<?php  }else{ ?>
									<td class="<?php echo $valor; ?>">-</td>
									<?php } ?>
									<?php if(isset($infraccion2_1)){ ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion2_1->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
									<?php  }else{ ?>
									<td class="<?php echo $valor; ?>">-</td>
									<?php } ?>
									<?php if(isset($infraccion2_2)){ ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion2_2->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
									<?php  }else{ ?>
									<td class="<?php echo $valor; ?>">-</td>
									<?php } ?>
									<?php if(isset($infraccion2_3)){ ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion2_3->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
									<?php  }else{ ?>
									<td class="<?php echo $valor; ?>">-</td>
									<?php } ?>
									<?php if(isset($oReporteOcurrencia2)){ ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->tipoInfractor, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
									<?php  }else{ ?>
									<td class="<?php echo $valor; ?>">-</td>
									<td class="<?php echo $valor; ?>">-</td>
									<td class="<?php echo $valor; ?>">-</td>
									<td class="<?php echo $valor; ?>">-</td>
									<td class="<?php echo $valor; ?>">-</td>
									<?php } ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->rp2, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->guia2, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->rp3, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->guia3, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->rp4, ENT_QUOTES, "UTF-8"); ?> </td>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->guia4, ENT_QUOTES, "UTF-8"); ?> </td>

								</tr>	

								<?php } ?>

							</table>
							<?php exit();?>
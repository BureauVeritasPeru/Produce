<style>

tr{
	text-align: center;
	font-size: 10px;
}
.bord{
	border : 3px solid #000;

}
.gray{
	background-color: #C0C0C0;
	border : 3px solid #000;
}

.red{
	background-color: #E6B8B7;
	border : 3px solid #000;
}

.green{
	background-color: #C4D79B;
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

$fileName = "plantas_reaprovechamiento_harina_residual_" . date('Ymd') . ".xls";
function number_pad($number,$n) {
	return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}


$fechaInicioCHD3                =OWASP::RequestString('fechaInicioCHD3');
$fechaFinalCHD3                 =OWASP::RequestString('fechaFinalCHD3');
$local3                         =OWASP::RequestInt('local3');    


// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table>
	<tr>
		<th class="gray">NRO</th>
		<th class="gray">CODIGO DE PLANTA</th>
		<th class="gray">PLANTA</th>
		<th class="gray">LOCALIDAD</th>
		<th class="gray">EMPRESA SUPERVISORA </th>
		<th class="gray">NUMERO ACTA </th>
		<th class="gray">ESPECIE</th>
		<th class="gray">DESTINO</th>
		<th class="gray">FECHA INGRESO</th>
		<th class="gray">FECHA TERMINO</th>
		<th class="gray">NUMERO REPORTE DE PESAJE</th>
		<th class="gray">NUMERO GUIA</th>
		<th class="gray">TIPO PROCEDENCIA</th>
		<th class="gray">NOMBRE DE LA PROCEDENCIA</th>
		<th class="gray">RUC Y/O MATRICULA DE LA PROCEDENCIA</th>
		<th class="gray">TIPO DE LA UNIDAD DE TRANSPORTE</th>
		<th class="gray">PLACA DE LA UNIDAD DE TRANSPORTE</th>
		<th class="gray">TM DE MATERIA(fresco)</th>
		<th class="gray">TM SELECCION</th>
		<th class="gray">TM RESIDUO</th>
		<th class="gray">ACTA SENSORIAL</th>
		<th class="gray">% NO APTO</th>
		<th class="gray">PARTE DE MUESTREO</th>
		<th class="gray">% JUVENIL</th>
		<th class="gray">% INCIDENTAL</th>
		<th class="gray">NRO REPORTE DE OCURRENCIA</th>
		<th class="gray">INFRACCIONES (Sub Codigo del numeral)</th>
		<th class="gray">TIPO INFRACTOR</th>
		<th class="gray">ACTA DE DECOMISO</th>
		<th class="gray">CANTIDAD DECOMISADA</th>
		<th class="gray">PORCENTAJE DECOMISADO</th>
		<th class="gray">ACTA RETENCION PAGO</th>
	</tr>
	<?php 
	$count=0;
	$list=CrmChd::getListxReporte2($fechaInicioCHD3,$fechaFinalCHD3,$local3);
	foreach ($list as $oItem){

		if($oItem->tipoCHD == 2){
			$count=0;
			$oEspecie1 = new eCmsParameterLang();
			$oEspecie2 = new eCmsParameterLang();
			$oEspecie3 = new eCmsParameterLang();
			$oEspecie4 = new eCmsParameterLang();
			$oReporteOcurrencia = new eCrmReporteOcurrenciaDR();
			$oNombreProcedencia = new eCmsParameterLang();
			$oTipoProcedencia = new eCmsParameterLang();
			$date1 = new DateTime();$date2 = new DateTime();
			$oItemDescartesResiduos = CrmDescartesResiduos::getItemCHD($oItem->chdID);
			$plantaDR = CrmPlantaChd::getItem($oItemDescartesResiduos->plantaID);
			$datosDR = CrmDatosDR::getItemCHD($oItem->chdID);
			$date1 = new DateTime($oItemDescartesResiduos->fechaIngreso);
			$date2 = new DateTime($oItemDescartesResiduos->fechaTermino);
			$oReporteOcurrencia = CrmReporteOcurrenciaDR::getItemCHD($oItem->chdID,1);
			if(isset($oReporteOcurrencia)){
				$infraccion1_1 = CrmInfraccionDR::getItemCHD($oReporteOcurrencia->reporteOcurrenciaDRID,1);
				$infraccion1_2 = CrmInfraccionDR::getItemCHD($oReporteOcurrencia->reporteOcurrenciaDRID,2);
				$infraccion1_3 = CrmInfraccionDR::getItemCHD($oReporteOcurrencia->reporteOcurrenciaDRID,3);
			}

			if($oItemDescartesResiduos->especie1 != 0){
				$oEspecie1= CmsParameterLang::getItem($oItemDescartesResiduos->especie1, 1);
			}else{
				$oEspecie1->parameterName = '-';
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

			if($oItemDescartesResiduos->tipoProcedencia != 0){
				$oTipoProcedencia= CmsParameterLang::getItem($oItemDescartesResiduos->tipoProcedencia, 1);
			}else{
				$oTipoProcedencia->parameterName = '-';
			}
			if($oItemDescartesResiduos->nombreProcedencia != 0 || $oItemDescartesResiduos->nombreProcedencia != '' ){
				$oNombreProcedencia= CmsParameterLang::getItem($oItemDescartesResiduos->nombreProcedencia, 1);
				if($oNombreProcedencia == NULL) { $oNombreProcedencia = new eCmsParameterLang(); $oNombreProcedencia->parameterName = $oItemDescartesResiduos->nombreProcedencia;}
			}else{
				$oNombreProcedencia->parameterName = '-';
			}
			if($oItemDescartesResiduos->tipoUnidadTransporte != 0){
				$oTipoUnidad= CmsParameterLang::getItem($oItemDescartesResiduos->tipoUnidadTransporte, 1);
			}else{
				$oTipoUnidad->parameterName = '-';
			}


			?>
			<?php if($oItemDescartesResiduos->especie1 != '0'){ $count++; ?>
			<tr>
				<td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
				<?php if($plantaDR != NULL){ ?>
				<td class="<?php echo $valor; ?>">&nbsp;<?php echo $plantaDR->codigoPlanta; ?> </td>
				<?php }else{ ?>
				<td class="<?php echo $valor; ?>">-</td>
				<?php } ?>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>">BUREAU VERITAS DEL PERU S.A.</td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaDR, ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>">Harina Residual </td>
				<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
				<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?>  </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->rp1, ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->guia1,ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oNombreProcedencia->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->ruc,ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->placaUnidadTransporte,ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>">-</td>
				<?php if($oItemDescartesResiduos->tipoTM == 157 || $oItemDescartesResiduos->tipoTM == 159 ){ ?>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm1, ENT_QUOTES, "UTF-8"); ?> </td>     
				<td class="<?php echo $valor; ?>">-</td>     
				<?php }else{ ?>
				<td class="<?php echo $valor; ?>">-</td>   
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm1, ENT_QUOTES, "UTF-8"); ?> </td>     
				<?php } ?>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaSensorial, ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->porcNoApto,ENT_QUOTES, "UTF-8"); ?> </td>
				<?php if($datosDR != NULL){ ?>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->porcJuvenil,ENT_QUOTES, "UTF-8"); ?> </td>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->porcIncidental,ENT_QUOTES, "UTF-8"); ?> </td>
				<?php }else{ ?>
				<td class="<?php echo $valor; ?>">-</td>  
				<td class="<?php echo $valor; ?>">-</td>  
				<td class="<?php echo $valor; ?>">-</td>  
				<?php } ?>
				<?php if($oReporteOcurrencia != NULL){ $oTipoInfractor = new eCmsParameterLang(); if($oReporteOcurrencia->tipoInfractor != 0){$oTipoInfractor= CmsParameterLang::getItem($oReporteOcurrencia->tipoInfractor, 1);}else{$oTipoInfractor->parameterName = '-';} ?>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
					<?php if(isset($infraccion1_1)){ $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_1->codigoInfraccion != 0){$oInfraccion1= CmsParameterLang::getItem($infraccion1_1->codigoInfraccion, 1); }else{$oInfraccion1->parameterName = '-'; } ?>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
						<?php  }else{ ?>
						<td class="<?php echo $valor; ?>">-</td>
						<?php } ?>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
						<?php }else{ ?>
						<td class="<?php echo $valor; ?>">-</td>  
						<td class="<?php echo $valor; ?>">-</td>  
						<td class="<?php echo $valor; ?>">-</td>  
						<td class="<?php echo $valor; ?>">-</td>  
						<td class="<?php echo $valor; ?>">-</td>  
						<td class="<?php echo $valor; ?>">-</td>
						<td class="<?php echo $valor; ?>">-</td>
						<?php } ?>
					</tr>
					<?php } ?>
					<?php if($oItemDescartesResiduos->especie2 != '0'){ $count++; ?>
					<tr>
						<td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
						<?php if($plantaDR != NULL){ ?>
						<td class="<?php echo $valor; ?>">&nbsp;<?php echo $plantaDR->codigoPlanta; ?> </td>
						<?php }else{ ?>
						<td class="<?php echo $valor; ?>">-</td>
						<?php } ?>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>">BUREAU VERITAS DEL PERU S.A.</td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaDR, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie2->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>">Harina Residual </td>
						<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
						<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?>  </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->rp2, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->guia2,ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oNombreProcedencia->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->ruc,ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->placaUnidadTransporte,ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>">-</td>
						<?php if($oItemDescartesResiduos->tipoTM == 157 || $oItemDescartesResiduos->tipoTM == 159 ){ ?>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm2, ENT_QUOTES, "UTF-8"); ?> </td>     
						<td class="<?php echo $valor; ?>">-</td>     
						<?php }else{ ?>
						<td class="<?php echo $valor; ?>">-</td>   
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm2, ENT_QUOTES, "UTF-8"); ?> </td>     
						<?php } ?>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaSensorial, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->porcNoApto,ENT_QUOTES, "UTF-8"); ?> </td>
						<?php if($datosDR != NULL){ ?>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->porcJuvenil,ENT_QUOTES, "UTF-8"); ?> </td>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->porcIncidental,ENT_QUOTES, "UTF-8"); ?> </td>
						<?php }else{ ?>
						<td class="<?php echo $valor; ?>">-</td>  
						<td class="<?php echo $valor; ?>">-</td>  
						<td class="<?php echo $valor; ?>">-</td>  
						<?php } ?>
						<?php if($oReporteOcurrencia != NULL){ $oTipoInfractor = new eCmsParameterLang(); if($oReporteOcurrencia->tipoInfractor != 0){$oTipoInfractor= CmsParameterLang::getItem($oReporteOcurrencia->tipoInfractor, 1);}else{$oTipoInfractor->parameterName = '-';} ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php if(isset($infraccion1_1)){ $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_1->codigoInfraccion != 0){$oInfraccion1= CmsParameterLang::getItem($infraccion1_1->codigoInfraccion, 1); }else{$oInfraccion1->parameterName = '-'; } ?>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
								<?php  }else{ ?>
								<td class="<?php echo $valor; ?>">-</td>
								<?php } ?>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
								<?php }else{ ?>
								<td class="<?php echo $valor; ?>">-</td>  
								<td class="<?php echo $valor; ?>">-</td>  
								<td class="<?php echo $valor; ?>">-</td>  
								<td class="<?php echo $valor; ?>">-</td>  
								<td class="<?php echo $valor; ?>">-</td>  
								<td class="<?php echo $valor; ?>">-</td>
								<td class="<?php echo $valor; ?>">-</td>
								<?php } ?>
							</tr>
							<?php } ?>
							<?php if($oItemDescartesResiduos->especie3 != '0'){ $count++; ?>
							<tr>
								<td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
								<?php if($plantaDR != NULL){ ?>
								<td class="<?php echo $valor; ?>">&nbsp;<?php echo $plantaDR->codigoPlanta; ?> </td>
								<?php }else{ ?>
								<td class="<?php echo $valor; ?>">-</td>
								<?php } ?>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>">BUREAU VERITAS DEL PERU S.A.</td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaDR, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie3->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>">Harina Residual </td>
								<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
								<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?>  </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->rp3, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->guia3,ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oNombreProcedencia->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->ruc,ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->placaUnidadTransporte,ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>">-</td>
								<?php if($oItemDescartesResiduos->tipoTM == 157 || $oItemDescartesResiduos->tipoTM == 159 ){ ?>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm3, ENT_QUOTES, "UTF-8"); ?> </td>     
								<td class="<?php echo $valor; ?>">-</td>     
								<?php }else{ ?>
								<td class="<?php echo $valor; ?>">-</td>   
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm3, ENT_QUOTES, "UTF-8"); ?> </td>     
								<?php } ?>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaSensorial, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->porcNoApto,ENT_QUOTES, "UTF-8"); ?> </td>
								<?php if($datosDR != NULL){ ?>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->porcJuvenil,ENT_QUOTES, "UTF-8"); ?> </td>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->porcIncidental,ENT_QUOTES, "UTF-8"); ?> </td>
								<?php }else{ ?>
								<td class="<?php echo $valor; ?>">-</td>  
								<td class="<?php echo $valor; ?>">-</td>  
								<td class="<?php echo $valor; ?>">-</td>  
								<?php } ?>
								<?php if($oReporteOcurrencia != NULL){ $oTipoInfractor = new eCmsParameterLang(); if($oReporteOcurrencia->tipoInfractor != 0){$oTipoInfractor= CmsParameterLang::getItem($oReporteOcurrencia->tipoInfractor, 1);}else{$oTipoInfractor->parameterName = '-';} ?>
									<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
									<?php if(isset($infraccion1_1)){ $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_1->codigoInfraccion != 0){$oInfraccion1= CmsParameterLang::getItem($infraccion1_1->codigoInfraccion, 1); }else{$oInfraccion1->parameterName = '-'; } ?>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
										<?php  }else{ ?>
										<td class="<?php echo $valor; ?>">-</td>
										<?php } ?>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
										<?php }else{ ?>
										<td class="<?php echo $valor; ?>">-</td>  
										<td class="<?php echo $valor; ?>">-</td>  
										<td class="<?php echo $valor; ?>">-</td>  
										<td class="<?php echo $valor; ?>">-</td>  
										<td class="<?php echo $valor; ?>">-</td>  
										<td class="<?php echo $valor; ?>">-</td>
										<td class="<?php echo $valor; ?>">-</td>
										<?php } ?>
									</tr>
									<?php } ?>
									<?php if($oItemDescartesResiduos->especie4 != '0'){ $count++; ?>
									<tr>
										<td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
										<?php if($plantaDR != NULL){ ?>
										<td class="<?php echo $valor; ?>">&nbsp;<?php echo $plantaDR->codigoPlanta; ?> </td>
										<?php }else{ ?>
										<td class="<?php echo $valor; ?>">-</td>
										<?php } ?>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>">BUREAU VERITAS DEL PERU S.A.</td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaDR, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie4->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>">Harina Residual </td>
										<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
										<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?>  </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->rp4, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->guia4,ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oNombreProcedencia->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->ruc,ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->placaUnidadTransporte,ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>">-</td>
										<?php if($oItemDescartesResiduos->tipoTM == 157 || $oItemDescartesResiduos->tipoTM == 159 ){ ?>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm4, ENT_QUOTES, "UTF-8"); ?> </td>     
										<td class="<?php echo $valor; ?>">-</td>     
										<?php }else{ ?>
										<td class="<?php echo $valor; ?>">-</td>   
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->tm4, ENT_QUOTES, "UTF-8"); ?> </td>     
										<?php } ?>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->nroActaSensorial, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDescartesResiduos->porcNoApto,ENT_QUOTES, "UTF-8"); ?> </td>
										<?php if($datosDR != NULL){ ?>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->porcJuvenil,ENT_QUOTES, "UTF-8"); ?> </td>
										<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosDR->porcIncidental,ENT_QUOTES, "UTF-8"); ?> </td>
										<?php }else{ ?>
										<td class="<?php echo $valor; ?>">-</td>  
										<td class="<?php echo $valor; ?>">-</td>  
										<td class="<?php echo $valor; ?>">-</td>  
										<?php } ?>
										<?php if($oReporteOcurrencia != NULL){ $oTipoInfractor = new eCmsParameterLang(); if($oReporteOcurrencia->tipoInfractor != 0){$oTipoInfractor= CmsParameterLang::getItem($oReporteOcurrencia->tipoInfractor, 1);}else{$oTipoInfractor->parameterName = '-';} ?>
											<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
											<?php if(isset($infraccion1_1)){ $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_1->codigoInfraccion != 0){$oInfraccion1= CmsParameterLang::getItem($infraccion1_1->codigoInfraccion, 1); }else{$oInfraccion1->parameterName = '-'; } ?>
												<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
												<?php  }else{ ?>
												<td class="<?php echo $valor; ?>">-</td>
												<?php } ?>
												<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
												<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
												<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
												<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
												<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
												<?php }else{ ?>
												<td class="<?php echo $valor; ?>">-</td>  
												<td class="<?php echo $valor; ?>">-</td>  
												<td class="<?php echo $valor; ?>">-</td>  
												<td class="<?php echo $valor; ?>">-</td>  
												<td class="<?php echo $valor; ?>">-</td>  
												<td class="<?php echo $valor; ?>">-</td>
												<td class="<?php echo $valor; ?>">-</td>
												<?php } ?>
											</tr>
											<?php } ?>

											<?php }else{ 
												$count=0;
												$oEspecie1 = new eCmsParameterLang();
												$oEspecie2 = new eCmsParameterLang();
												$oEspecie3 = new eCmsParameterLang();
												$oTipoProcedencia = new eCmsParameterLang();
												$oNombreProcedencia = new eCmsParameterLang();
												$oReporteOcurrencia = new eCrmReporteOcurrenciaMP();
												$oTipoUnidad = new eCmsParameterLang();
												$oDestino = new eCmsParameterLang();
												$date1 = new DateTime();$date2 = new DateTime();
												$oItemMateriaPrima = CrmMateriaPrima::getItemCHD($oItem->chdID);
												$oListEmbarcacion = CrmEmbarcacionCHD::getListReporte($oItem->chdID);
												$plantaMP = CrmPlantaChd::getItem($oItemMateriaPrima->plantaID);
												$datosMP = CrmDatosMP::getItemCHD($oItem->chdID);
												$date1 = new DateTime($oItemMateriaPrima->fechaIngreso);
												$date2 = new DateTime($oItemMateriaPrima->fechaTermino);
												$oReporteOcurrencia = CrmReporteOcurrenciaMP::getItemCHD($oItem->chdID,1);
												if(isset($oReporteOcurrencia)){
													$infraccion1_1 = CrmInfraccionMP::getItemCHD($oReporteOcurrencia->reporteOcurrenciaMPID,1);
													$infraccion1_2 = CrmInfraccionMP::getItemCHD($oReporteOcurrencia->reporteOcurrenciaMPID,2);
													$infraccion1_3 = CrmInfraccionMP::getItemCHD($oReporteOcurrencia->reporteOcurrenciaMPID,3);
												}

												if($oItemMateriaPrima->tipoProcedencia != 0){
													$oTipoProcedencia= CmsParameterLang::getItem($oItemMateriaPrima->tipoProcedencia, 1);
												}else{
													$oTipoProcedencia->parameterName = '-';
												}
												if($oItemMateriaPrima->nombreProcedencia != 0 || $oItemMateriaPrima->nombreProcedencia != ''){
													$oNombreProcedencia= CmsParameterLang::getItem($oItemMateriaPrima->nombreProcedencia, 1);
													if($oNombreProcedencia == NULL) {$oNombreProcedencia = new eCmsParameterLang();  $oNombreProcedencia->parameterName = $oItemMateriaPrima->nombreProcedencia;}
												}else{
													$oNombreProcedencia->parameterName = '-';
												}
												?>
												<?php foreach ($oListEmbarcacion as $oEmbarcacion) { ?>
												<?php $oListDetalleEmbarcacion = CrmDetalleEmbarcacion::getList($oEmbarcacion->chdID);  ?>
												<?php foreach ($oListDetalleEmbarcacion as $oDetalleEmbarcacion) { ?>
												<?php if($oDetalleEmbarcacion->especie1 != '0'){ $count++; ?>

												<?php if($oDetalleEmbarcacion->especie1 != 0){
													$oEspecie1= CmsParameterLang::getItem($oDetalleEmbarcacion->especie1, 1);
												}else{
													$oEspecie1->parameterName = '-';
												}
												if($oDetalleEmbarcacion->especie2 != 0){
													$oEspecie2= CmsParameterLang::getItem($oDetalleEmbarcacion->especie2, 1);
												}else{
													$oEspecie2->parameterName = '-';
												}
												if($oDetalleEmbarcacion->especie3 != 0){
													$oEspecie3= CmsParameterLang::getItem($oDetalleEmbarcacion->especie3, 1);
												}else{
													$oEspecie3->parameterName = '-';
												} 

												if($datosMP->destino != 0){
													$oDestino= CmsParameterLang::getItem($datosMP->destino, 1);
												}else{
													$oDestino->parameterName = '-';
												} 

												if($oItemMateriaPrima->tipoUnidad != 0){
													$oTipoUnidad= CmsParameterLang::getItem($oItemMateriaPrima->tipoUnidad, 1);
												}else{
													$oTipoUnidad->parameterName = '-';
												}

												?>


												<tr>
													<td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
													<?php if($plantaMP != NULL){ ?>
													<td class="<?php echo $valor; ?>">&nbsp;<?php echo $plantaMP->codigoPlanta; ?> </td>
													<?php }else{ ?>
													<td class="<?php echo $valor; ?>">-</td>  
													<?php } ?>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>">BUREAU VERITAS DEL PERU S.A.</td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->numeroActaMateria, ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDestino->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
													<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?>  </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->reportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->numeroGuia,ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oNombreProcedencia->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
													<?php if($oTipoProcedencia->parameterName != 'Muelle'){ ?>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->rucMatricula,ENT_QUOTES, "UTF-8"); ?> </td>
													<?php }else{ ?>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->nombreEmbarcacion.' / '.$oDetalleEmbarcacion->matricula,ENT_QUOTES, "UTF-8"); ?> </td>
													<?php } ?>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->placaUnidadTransporte,ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->nroCubetas1,ENT_QUOTES, "UTF-8"); ?></td>
													<td class="<?php echo $valor; ?>">-</td>  
													<td class="<?php echo $valor; ?>">-</td>  	
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->nroActaSensorial, ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->porcNoApto,ENT_QUOTES, "UTF-8"); ?> </td>
													<?php if($datosMP != NULL){ ?>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosMP->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosMP->porcJuvenil,ENT_QUOTES, "UTF-8"); ?> </td>
													<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosMP->porcIncidental,ENT_QUOTES, "UTF-8"); ?> </td>
													<?php }else{ ?>
													<td class="<?php echo $valor; ?>">-</td>  
													<td class="<?php echo $valor; ?>">-</td>  
													<td class="<?php echo $valor; ?>">-</td>  
													<?php } ?>
													<?php if($oReporteOcurrencia != NULL){  $oTipoInfractor = new eCmsParameterLang(); if($oReporteOcurrencia->tipoInfractor != 0){$oTipoInfractor= CmsParameterLang::getItem($oReporteOcurrencia->tipoInfractor, 1);}else{$oTipoInfractor->parameterName = '-';} ?>
														<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
														<?php if(isset($infraccion1_1)){ $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_1->codigoInfraccion != 0){$oInfraccion1= CmsParameterLang::getItem($infraccion1_1->codigoInfraccion, 1); }else{$oInfraccion1->parameterName = '-'; } ?>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
															<?php  }else{ ?>
															<td class="<?php echo $valor; ?>">-</td>
															<?php } ?>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
															<?php }else{ ?>
															<td class="<?php echo $valor; ?>">-</td>  
															<td class="<?php echo $valor; ?>">-</td>  
															<td class="<?php echo $valor; ?>">-</td>  
															<td class="<?php echo $valor; ?>">-</td>  
															<td class="<?php echo $valor; ?>">-</td>  
															<td class="<?php echo $valor; ?>">-</td>
															<td class="<?php echo $valor; ?>">-</td>
															<?php } ?>
														</tr>
														<?php } ?>
														<?php if($oDetalleEmbarcacion->especie2 != '0'){ $count++; ?>
														<tr>
															<td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
															<?php if($plantaMP != NULL){ ?>
															<td class="<?php echo $valor; ?>">&nbsp;<?php echo $plantaMP->codigoPlanta; ?> </td>
															<?php }else{ ?>
															<td class="<?php echo $valor; ?>">-</td>  
															<?php } ?>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>">BUREAU VERITAS DEL PERU S.A.</td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->numeroActaMateria, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie2->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDestino->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
															<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?>  </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->reportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->numeroGuia,ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oNombreProcedencia->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->rucMatricula,ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->placaUnidadTransporte,ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->nroCubetas2,ENT_QUOTES, "UTF-8"); ?></td>
															<td class="<?php echo $valor; ?>">-</td>  
															<td class="<?php echo $valor; ?>">-</td>  	
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->nroActaSensorial, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->porcNoApto,ENT_QUOTES, "UTF-8"); ?> </td>
															<?php if($datosMP != NULL){ ?>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosMP->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosMP->porcJuvenil,ENT_QUOTES, "UTF-8"); ?> </td>
															<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosMP->porcIncidental,ENT_QUOTES, "UTF-8"); ?> </td>
															<?php }else{ ?>
															<td class="<?php echo $valor; ?>">-</td>  
															<td class="<?php echo $valor; ?>">-</td>  
															<td class="<?php echo $valor; ?>">-</td>  
															<?php } ?>
															<?php if($oReporteOcurrencia != NULL){  $oTipoInfractor = new eCmsParameterLang();if($oReporteOcurrencia->tipoInfractor != 0){$oTipoInfractor= CmsParameterLang::getItem($oReporteOcurrencia->tipoInfractor, 1);}else{$oTipoInfractor->parameterName = '-';} ?>
																<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
																<?php if(isset($infraccion1_1)){ $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_1->codigoInfraccion != 0){$oInfraccion1= CmsParameterLang::getItem($infraccion1_1->codigoInfraccion, 1); }else{$oInfraccion1->parameterName = '-'; } ?>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
																	<?php  }else{ ?>
																	<td class="<?php echo $valor; ?>">-</td>
																	<?php } ?>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
																	<?php }else{ ?>
																	<td class="<?php echo $valor; ?>">-</td>  
																	<td class="<?php echo $valor; ?>">-</td>  
																	<td class="<?php echo $valor; ?>">-</td>  
																	<td class="<?php echo $valor; ?>">-</td>  
																	<td class="<?php echo $valor; ?>">-</td>  
																	<td class="<?php echo $valor; ?>">-</td>
																	<td class="<?php echo $valor; ?>">-</td>
																	<?php } ?>
																</tr>
																<?php } ?>
																<?php if($oDetalleEmbarcacion->especie3 != '0'){ $count++; ?>
																<tr>
																	<td class="<?php echo $valor; ?>">&nbsp;<?php echo $count; ?> </td>
																	<?php if($plantaMP != NULL){ ?>
																	<td class="<?php echo $valor; ?>">&nbsp;<?php echo $plantaMP->codigoPlanta; ?> </td>
																	<?php }else{ ?>
																	<td class="<?php echo $valor; ?>">-</td>  
																	<?php } ?>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>">BUREAU VERITAS DEL PERU S.A.</td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->numeroActaMateria, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie3->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDestino->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?>  </td>
																	<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?>  </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->reportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->numeroGuia,ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oNombreProcedencia->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->rucMatricula,ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoUnidad->parameterName,ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->placaUnidadTransporte,ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDetalleEmbarcacion->nroCubetas3,ENT_QUOTES, "UTF-8"); ?></td>
																	<td class="<?php echo $valor; ?>">-</td>  
																	<td class="<?php echo $valor; ?>">-</td>  	
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->nroActaSensorial, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->porcNoApto,ENT_QUOTES, "UTF-8"); ?> </td>
																	<?php if($datosMP != NULL){ ?>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosMP->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosMP->porcJuvenil,ENT_QUOTES, "UTF-8"); ?> </td>
																	<td class="<?php echo $valor; ?>"><?php echo htmlentities($datosMP->porcIncidental,ENT_QUOTES, "UTF-8"); ?> </td>
																	<?php }else{ ?>
																	<td class="<?php echo $valor; ?>">-</td>  
																	<td class="<?php echo $valor; ?>">-</td>  
																	<td class="<?php echo $valor; ?>">-</td>  
																	<?php } ?>
																	<?php if($oReporteOcurrencia != NULL){  $oTipoInfractor = new eCmsParameterLang();if($oReporteOcurrencia->tipoInfractor != 0){$oTipoInfractor= CmsParameterLang::getItem($oReporteOcurrencia->tipoInfractor, 1);}else{$oTipoInfractor->parameterName = '-';} ?>
																		<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
																		<?php if(isset($infraccion1_1)){ $oInfraccion1 = new eCmsParameterLang(); if($infraccion1_1->codigoInfraccion != 0){$oInfraccion1= CmsParameterLang::getItem($infraccion1_1->codigoInfraccion, 1); }else{$oInfraccion1->parameterName = '-'; } ?>
																			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oInfraccion1->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
																			<?php  }else{ ?>
																			<td class="<?php echo $valor; ?>">-</td>
																			<?php } ?>
																			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
																			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaDecomiso, ENT_QUOTES, "UTF-8"); ?> </td>
																			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->tmDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
																			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->porcDecomisado, ENT_QUOTES, "UTF-8"); ?> </td>
																			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia->actaRetencionPago, ENT_QUOTES, "UTF-8"); ?> </td>
																			<?php }else{ ?>
																			<td class="<?php echo $valor; ?>">-</td>  
																			<td class="<?php echo $valor; ?>">-</td>  
																			<td class="<?php echo $valor; ?>">-</td>  
																			<td class="<?php echo $valor; ?>">-</td>  
																			<td class="<?php echo $valor; ?>">-</td>  
																			<td class="<?php echo $valor; ?>">-</td>
																			<td class="<?php echo $valor; ?>">-</td>
																			<?php } ?>
																		</tr>
																		<?php } ?>
																		<?php } ?>
																		<?php } ?>

																		<?php
																	}
																} ?>
															</table>
															<?php exit();?>
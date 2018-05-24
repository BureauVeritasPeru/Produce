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

$fileName = "consolidado_materia_prima" . date('Ymd') . ".xls";
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
		<th class="color1">Nombre Planta</th>
		<th class="color1">Localidad</th>
		<th class="color1">N&uacute;mero Acta Materia Prima</th>
		<th class="color1">Especie </th>
		<th class="color1">Fecha Ingreso</th>
		<th class="color1">Hora Ingreso</th>
		<th class="color1">Fecha T&eacute;rmino</th>
		<th class="color1">Hora T&eacute;rmino</th>
		<th class="color1">N&uacute;mero Guia</th>
		<th class="color1">TIPO TRANSPORTE</th>
		<th class="color1">Matr&iacute;cula Embarcaci&oacute;n</th>
		<th class="color1">Nombre Embarcaci&oacute;n</th>
		<th class="color1">TM Materia Prima (fresco)</th>
		<th class="color1">N&uacute;mero Acta Sensorial</th>
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
		<th class="color2">Destino</th>
		<th class="color2">Presentaci&oacute;n</th>
		<th class="color2">Acta Inspecci&oacute;n Produce</th>
		<th class="color2">Acta Muestreo Produce</th>
		<th class="color2">Inspector</th>
		<th class="color2">Observaciones</th>

		<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->

		<th class="color3">Placa Tipo Transporte</th>
		<th class="color3">C&oacute;digo Inspector</th>
		<th class="color3">Destino2</th>
		<th class="color3">EP2</th>
		<th class="color3">Matricula 2</th>
		<th class="color3">EP3</th>
		<th class="color3">Matricula 3</th>
		<th class="color3">Codigo Infracci&oacute;n 2</th>
		<th class="color3">Codigo Infracci&oacute;n 3</th>
		<th class="color3">EP4</th>
		<th class="color3">Matricula 4</th>
		<th class="color3">Cubetas Embarcacion 1</th>
		<th class="color3">Cubetas Embarcacion 1 - Especie 1</th>
		<th class="color3">Cubetas Embarcacion 1 - Especie 2</th>
		<th class="color3">Cubetas Embarcacion 1 - Especie 3</th>
		<th class="color3">Cubetas Embarcacion 2</th>
		<th class="color3">Cubetas Embarcacion 2 - Especie 1</th>
		<th class="color3">Cubetas Embarcacion 2 - Especie 2</th>
		<th class="color3">Cubetas Embarcacion 2 - Especie 3</th>
		<th class="color3">Cubetas Embarcacion 3</th>
		<th class="color3">Cubetas Embarcacion 3 - Especie 1</th>
		<th class="color3">Cubetas Embarcacion 3 - Especie 2</th>
		<th class="color3">Cubetas Embarcacion 3 - Especie 3</th>
		<th class="color3">Cubetas Embarcacion 4</th>
		<th class="color3">Cubetas Embarcacion 4 - Especie 1</th>
		<th class="color3">Cubetas Embarcacion 4 - Especie 2</th>
		<th class="color3">Cubetas Embarcacion 4 - Especie 3</th>
		<th class="color3">RP1</th>
		<th class="color3">RP2</th>
		<th class="color3">RP3</th>
		<th class="color3">RP4</th>
		<th class="color3">GUIA1</th>
		<th class="color3">GUIA2</th>
		<th class="color3">GUIA3</th>
		<th class="color3">GUIA4</th>
		<th class="color3">TIPO PROCEDENCIA 2</th>
		<th class="color3">Unidad Medida</th>
		<th class="color3">Camara Especie 1</th>
		<th class="color3">Camara Especie 2</th>
		<th class="color3">Camara Especie 3</th>
		<th class="color3">Camara Especie TM1</th>
		<th class="color3">Camara Especie TM2</th>
		<th class="color3">Camara Especie TM3</th>
		<th class="color3">RUC</th>
		<th class="color3">RO2</th>
		<th class="color3">Codigo Infraccion 1-2</th>
		<th class="color3">Codigo Infraccion 2-2</th>
		<th class="color3">Codigo Infraccion 3-2</th>
		<th class="color3">Tipo Infractor 2</th>
		<th class="color3">Acta decomiso 2</th>
		<th class="color3">Cantidad Decomisada 2</th>
		<th class="color3">Porcentaje Decomisado 2</th>
		<th class="color3">Acta retencion Pago 2</th>
	</tr>


	<?php 
	$count=0;
	$list=CrmChd::getList_Paging($localID,$nombrePlanta,$startDate,$endDate,1);
	foreach ($list as $oItem){
		$oItemEmbarcacion = new eCrmEmbarcacionCHD();
		$oItemPlanta = new eCrmPlantaChd();
		$oItemInspector = new eCrmInspector();
		$oReporteOcurrencia1 = new eCrmReporteOcurrenciaMP();
		$oReporteOcurrencia2 = new eCrmReporteOcurrenciaMP();
		$date1 = new DateTime();
		$date2 = new DateTime();
		$oEspecie = new eCmsParameterLang();
		$oDestino = new eCmsParameterLang();
		$oEspecie2 = new eCmsParameterLang();
		$oEspecie3 = new eCmsParameterLang();
		$oTipoTransporte = new eCmsParameterLang();
		$oUnidadMedida = new eCmsParameterLang();
		$oTipoInfractor = new eCmsParameterLang();
		$oTipoInfractor2 = new eCmsParameterLang();
		$oTipoProcedencia = new eCmsParameterLang();
		$infraccion1_1 = new eCrmInfraccionMP();
		$infraccion1_2 = new eCrmInfraccionMP();
		$infraccion1_3 = new eCrmInfraccionMP();
		$infraccion2_1 = new eCrmInfraccionMP();
		$infraccion2_2 = new eCrmInfraccionMP();
		$infraccion2_3 = new eCrmInfraccionMP();
		$oItemInspector = new eCrmInspector();
		
		$valor ='softfinal';
		$oItemMateriaPrima = CrmMateriaPrima::getItemCHD($oItem->chdID);
		$oItemPlanta = CrmPlantaChd::getItem($oItemMateriaPrima->plantaID);

		$oItemEmbarcacion =  CrmEmbarcacionCHD::getItemCHD($oItem->chdID);
		$date1 = new DateTime($oItemMateriaPrima->fechaIngreso);
		$date2 = new DateTime($oItemMateriaPrima->fechaTermino);

		$oItemDS = CrmDatosMP::getItemCHD($oItem->chdID);
		if(isset($oItemDS)){
			$oItemInspector = CrmInspector::getItem($oItemDS->inspectorID);
		}
		$oItemEmbarcacion = CrmEmbarcacionCHD::getItemCHD($oItem->chdID);
		$oItemDetalleEmbarcacion1 = CrmDetalleEmbarcacion::getItemCorre($oItem->chdID,1);
		$oItemDetalleEmbarcacion2 = CrmDetalleEmbarcacion::getItemCorre($oItem->chdID,2);
		$oItemDetalleEmbarcacion3 = CrmDetalleEmbarcacion::getItemCorre($oItem->chdID,3);
		$oItemDetalleEmbarcacion4 = CrmDetalleEmbarcacion::getItemCorre($oItem->chdID,4);
		$oItemDetalleEmbarcacion5 = CrmDetalleEmbarcacion::getItemCorre($oItem->chdID,5);
		$oItemDetalleEmbarcacion6 = CrmDetalleEmbarcacion::getItemCorre($oItem->chdID,6);

		$oReporteOcurrencia1 = CrmReporteOcurrenciaMP::getItemCHD($oItem->chdID,1);
		$oReporteOcurrencia2 = CrmReporteOcurrenciaMP::getItemCHD($oItem->chdID,2);
		if(isset($oReporteOcurrencia1)){
			$infraccion1_1 = CrmInfraccionMP::getItemCHD($oReporteOcurrencia1->reporteOcurrenciaMPID,1);
			$infraccion1_2 = CrmInfraccionMP::getItemCHD($oReporteOcurrencia1->reporteOcurrenciaMPID,2);
			$infraccion1_3 = CrmInfraccionMP::getItemCHD($oReporteOcurrencia1->reporteOcurrenciaMPID,3);
		}
		if(isset($oReporteOcurrencia2)){
			$infraccion2_1 = CrmInfraccionMP::getItemCHD($oReporteOcurrencia2->reporteOcurrenciaMPID,1);
			$infraccion2_2 = CrmInfraccionMP::getItemCHD($oReporteOcurrencia2->reporteOcurrenciaMPID,2);
			$infraccion2_3 = CrmInfraccionMP::getItemCHD($oReporteOcurrencia2->reporteOcurrenciaMPID,3);
		}
		
		if($oItemMateriaPrima->especie1 != 0){
			$oEspecie= CmsParameterLang::getItem($oItemMateriaPrima->especie1, 1);
		}else{
			$oEspecie->parameterName = '-';
		}
		if($oItemMateriaPrima->especie2 != 0){
			$oEspecie2= CmsParameterLang::getItem($oItemMateriaPrima->especie2, 1);
		}else{
			$oEspecie2->parameterName = '-';
		}
		if($oItemMateriaPrima->especie3 != 0){
			$oEspecie3= CmsParameterLang::getItem($oItemMateriaPrima->especie3, 1);
		}else{
			$oEspecie3->parameterName = '-';
		}

		if($oItemMateriaPrima->tipoUnidad != 0){
			$oTipoTransporte= CmsParameterLang::getItem($oItemMateriaPrima->tipoUnidad, 1);
		}else{
			$oTipoTransporte->parameterName = '-';
		}

		if($oItemMateriaPrima->tipoProcedencia != 0){
			$oTipoProcedencia= CmsParameterLang::getItem($oItemMateriaPrima->tipoProcedencia, 1);
		}else{
			$oTipoProcedencia->parameterName = '-';
		}

		?>
		<tr>
			<!--++++++++++++++++++++++++++++++++++++++++++++++ CHATA ++++++++++++++++++++++++++++++++++++++++++-->
			<td class="<?php echo $valor; ?>"><?php echo $oItemPlanta->codigoPlanta; ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->nombrePlanta, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->localidadPlanta, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->numeroActaMateria, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo date_format($date1, 'd/m/y'); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->horaIngreso, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo date_format($date2, 'd/m/y'); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->horaTermino, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->numeroGuia, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoTransporte->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php if(isset($oItemDetalleEmbarcacion1)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion1->matricula, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion1->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php  }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->tmMateriaPrima, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->nroActaSensorial, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->porcNoApto, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php if(isset($oItemDS)){ ?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDS->nroParteMuestreo, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDS->porcJuvenil, ENT_QUOTES, "UTF-8"); ?> </td>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDS->porcIncidental, ENT_QUOTES, "UTF-8"); ?> </td>
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
			<?php if($infraccion1_1 != NULL){ $oCodigoInfraccion = new eCmsParameterLang();if($infraccion1_1->codigoInfraccion!= 0){$oCodigoInfraccion= CmsParameterLang::getItem($infraccion1_1->codigoInfraccion, 1);}else{$oCodigoInfraccion->parameterName = '-';}
			?>
			<td class="<?php echo $valor; ?>"><?php echo htmlentities($oCodigoInfraccion->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
			<?php  }else{ ?>
			<td class="<?php echo $valor; ?>">-</td>
			<?php } ?>
			<?php if(isset($oReporteOcurrencia1)){ if($oReporteOcurrencia1->tipoInfractor!= 0){$oTipoInfractor= CmsParameterLang::getItem($oReporteOcurrencia1->tipoInfractor, 1);}else{$oTipoInfractor->parameterName = '-';}?>
				<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
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
				<?php if(isset($oItemDS)){ if($oItemDS->destino != 0){$oDestino= CmsParameterLang::getItem($oItemDS->destino, 1);}else{$oDestino->parameterName = '-';} if($oItemDS->presentacion != 0){$oPresentacion= CmsParameterLang::getItem($oItemDS->presentacion, 1);}else{$oPresentacion->parameterName = '-';}?>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oDestino->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oPresentacion->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDS->actaInspeccionProduce, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDS->actaMuestreoProduce, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDS->nombreInspector, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDS->observaciones, ENT_QUOTES, "UTF-8"); ?> </td>
					<?php  }else{ ?>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<?php } ?>


					<!--+++++++++++++++++++++++++++++++++++++++++++++ //////////////////////////// ++++++++++++++++++++++++++++++++++++++++++-->
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->placaUnidadTransporte, ENT_QUOTES, "UTF-8"); ?> </td>
					<?php if($oItemInspector != null){ ?>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemInspector->codigoInspector, ENT_QUOTES, "UTF-8"); ?> </td>
					<?php }else{ ?>
					<td class="<?php echo $valor; ?>">-</td>
					<?php } ?>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->destinoProcedencia, ENT_QUOTES, "UTF-8"); ?> </td>
					<?php if(isset($oItemDetalleEmbarcacion2)){ ?>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion2->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion2->matricula, ENT_QUOTES, "UTF-8"); ?> </td>
					<?php  }else{ ?>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<?php } ?>
					<?php if(isset($oItemDetalleEmbarcacion3)){ ?>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion3->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
					<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion3->matricula, ENT_QUOTES, "UTF-8"); ?> </td>
					<?php  }else{ ?>
					<td class="<?php echo $valor; ?>">-</td>
					<td class="<?php echo $valor; ?>">-</td>
					<?php } ?>
					<?php if($infraccion1_2 != NULL){ $oCodigoInfraccion2 = new eCmsParameterLang();if($infraccion1_2->codigoInfraccion!= 0){$oCodigoInfraccion2= CmsParameterLang::getItem($infraccion1_2->codigoInfraccion, 1);}else{$oCodigoInfraccion2->parameterName = '-';}?>
						<td class="<?php echo $valor; ?>"><?php echo htmlentities($oCodigoInfraccion2->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
						<?php  }else{ ?>
						<td class="<?php echo $valor; ?>">-</td>
						<?php } ?>
						<?php if($infraccion1_3 != NULL){ $oCodigoInfraccion3 = new eCmsParameterLang();if($infraccion1_3->codigoInfraccion!= 0){$oCodigoInfraccion3= CmsParameterLang::getItem($infraccion1_3->codigoInfraccion, 1);}else{$oCodigoInfraccion3->parameterName = '-';} ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oCodigoInfraccion3->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion4)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion4->nombreEmbarcacion, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion4->matricula, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion1)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion1->nroCubetas, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion1->nroCubetas1.' - '.($oItemDetalleEmbarcacion1->especie1 == '0')? '':$oItemDetalleEmbarcacion1->especie1, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion1->nroCubetas2.' - '.($oItemDetalleEmbarcacion1->especie2 == '0')? '':$oItemDetalleEmbarcacion1->especie2, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion1->nroCubetas3.' - '.($oItemDetalleEmbarcacion1->especie3 == '0')? '':$oItemDetalleEmbarcacion1->especie3, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion2)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion2->nroCubetas, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion2->nroCubetas1.' - '.($oItemDetalleEmbarcacion2->especie1 == '0')? '':$oItemDetalleEmbarcacion2->especie1, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion2->nroCubetas2.' - '.($oItemDetalleEmbarcacion2->especie2 == '0')? '':$oItemDetalleEmbarcacion2->especie2, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion2->nroCubetas3.' - '.($oItemDetalleEmbarcacion2->especie3 == '0')? '':$oItemDetalleEmbarcacion2->especie3, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion3)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion3->nroCubetas, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion3->nroCubetas1.' - '.($oItemDetalleEmbarcacion3->especie1 == '0')? '':$oItemDetalleEmbarcacion3->especie1, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion3->nroCubetas2.' - '.($oItemDetalleEmbarcacion3->especie2 == '0')? '':$oItemDetalleEmbarcacion3->especie2, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion3->nroCubetas3.' - '.($oItemDetalleEmbarcacion3->especie3 == '0')? '':$oItemDetalleEmbarcacion3->especie3, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion4)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion4->nroCubetas, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion4->nroCubetas1.' - '.($oItemDetalleEmbarcacion4->especie1 == '0')? '':$oItemDetalleEmbarcacion4->especie1, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion4->nroCubetas2.' - '.($oItemDetalleEmbarcacion4->especie2 == '0')? '':$oItemDetalleEmbarcacion4->especie2, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion4->nroCubetas3.' - '.($oItemDetalleEmbarcacion4->especie3 == '0')? '':$oItemDetalleEmbarcacion4->especie3, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion1)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion1->reportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion2)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion2->reportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion3)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion3->reportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion4)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion4->reportePesaje, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion1)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion1->numeroGuia, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion2)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion2->numeroGuia, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion3)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion3->numeroGuia, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oItemDetalleEmbarcacion4)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemDetalleEmbarcacion4->numeroGuia, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoProcedencia->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php if(isset($oItemEmbarcacion)){ if($oItemEmbarcacion->unidadMedida == 0 ){ $var = 'TM'; }else{ $var = 'Cubetas';}  ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($var, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>

							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie2->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oEspecie3->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->tm1, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->tm2, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->tm3, ENT_QUOTES, "UTF-8"); ?> </td>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oItemMateriaPrima->rucMatricula, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php if(isset($oReporteOcurrencia2)){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($oReporteOcurrencia2->actaReporteOcurrencia, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if($infraccion2_1 != NULL){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion2_1->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if($infraccion2_2 != NULL){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion2_2->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if($infraccion2_3 != NULL){ ?>
							<td class="<?php echo $valor; ?>"><?php echo htmlentities($infraccion2_3->codigoInfraccion, ENT_QUOTES, "UTF-8"); ?> </td>
							<?php  }else{ ?>
							<td class="<?php echo $valor; ?>">-</td>
							<?php } ?>
							<?php if(isset($oReporteOcurrencia2)){ if($oReporteOcurrencia2->tipoInfractor!= 0){$oTipoInfractor2= CmsParameterLang::getItem($oReporteOcurrencia2->tipoInfractor, 1);}else{$oTipoInfractor2->parameterName = '-';} ?>
								<td class="<?php echo $valor; ?>"><?php echo htmlentities($oTipoInfractor2->parameterName, ENT_QUOTES, "UTF-8"); ?> </td>
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


							</tr>	

							<?php } ?>

						</table>
						<?php exit();?>
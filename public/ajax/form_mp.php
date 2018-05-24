<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");//ISOOO!!

$cmd  	 = OWASP::RequestString('cmd');
$valor   = 1;

RegisterRO($cmd);


function RegisterRO($cmd){
	$oRegMP = new eCrmDatosMP();

	$oRegMP->chdID 							=OWASP::RequestString('ID');
	$oRegMP->nroParteMuestreo 	 			=OWASP::RequestString('nroParteMuestreo');
	$oRegMP->porcJuvenil 	 				=OWASP::RequestString('porcJuvenil');
	$oRegMP->porcIncidental		 			=OWASP::RequestString('porcIncidental');
	$oRegMP->destino							=OWASP::RequestString('destino');
	$oRegMP->presentacion		 			=OWASP::RequestString('presentacion');
	$oRegMP->actaInspeccionProduce 			=OWASP::RequestString('actaInspeccionProduce');
	$oRegMP->actaMuestreoProduce 	 		=OWASP::RequestString('actaMuestreoProduce');
	$oRegMP->observaciones 	 				=OWASP::RequestString('observaciones');
	//Buscando Inspector 
	$oInspector = CrmInspector::getItemCodigo(OWASP::RequestString('codigoInspector'));
	if($oInspector != NULL){$oRegMP->inspectorID = $oInspector->inspectorID;}else{$oRegMP->inspectorID = '';}
	$oRegMP->nombreInspector 	 			=OWASP::RequestString('nombreInspector');


	for ($i=1; $i < 3 ; $i++) { 
		${'oRegRO'.$i} = new eCrmReporteOcurrenciaMP();
		${'oRegRO'.$i}->chdID =OWASP::RequestString('ID');
		${'oRegRO'.$i}->correlativo = $i;
		${'oRegRO'.$i}->actaReporteOcurrencia =OWASP::RequestString('actaReporteOcurrencia'.$i);
		${'oRegRO'.$i}->actaDecomiso =OWASP::RequestString('actaDecomiso'.$i);
		${'oRegRO'.$i}->tmDecomisado =OWASP::RequestString('tmDecomisado'.$i);
		${'oRegRO'.$i}->porcDecomisado =OWASP::RequestString('porcDecomisado'.$i);
		${'oRegRO'.$i}->actaRetencionPago =OWASP::RequestString('actaRetencionPago'.$i);
		${'oRegRO'.$i}->tipoInfractor =OWASP::RequestString('tipoInfractor'.$i);

		for ($j=1; $j < 4 ; $j++) { 
			${'oInfraccion'.$i.'_'.$j} = new eCrmInfraccionMP();
			${'oInfraccion'.$i.'_'.$j}->correlativo = $j;
			${'oInfraccion'.$i.'_'.$j}->codigoInfraccion =OWASP::RequestString('codigoInfraccion'.$i.'_'.$j);
			${'oInfraccion'.$i.'_'.$j}->detalleInfraccion =OWASP::RequestString('detalleInfraccion'.$i.'_'.$j);
		}
	}
	
	switch($cmd){
		case 'insert' : 	
		if(CrmDatosMP::AddNew($oRegMP)){
			for ($i=1; $i < 3 ; $i++) { 
				if(${'oRegRO'.$i}->actaReporteOcurrencia != ""){
					if(CrmReporteOcurrenciaMP::AddNew(${'oRegRO'.$i})){
						for ($j=1; $j < 4 ; $j++) { 
							if(${'oInfraccion'.$i.'_'.$j}->codigoInfraccion != "0" && ${'oInfraccion'.$i.'_'.$j}->detalleInfraccion != ""){
								${'oInfraccion'.$i.'_'.$j}->reporteOcurrenciaMPID = ${'oRegRO'.$i}->reporteOcurrenciaMPID; 
								CrmInfraccionMP::AddNew(${'oInfraccion'.$i.'_'.$j});
							}else
							{
								
							}
						}

					}else{
						RaiseError(CrmReporteOcurrenciaMP::GetErrorMsg());
						return;
					}
				}	

			}	
		}
		Response('Data Secundaria - Registrado Correctamente.',$oRegMP->chdID);
		break;

		case 'update' : 
		if(CrmDatosMP::Update($oRegMP)){
			for ($i=1; $i < 3; $i++) { 
				if(${'oRegRO'.$i}->actaReporteOcurrencia != ""){
					if(CrmReporteOcurrenciaMP::Update(${'oRegRO'.$i})){
						for ($j=1; $j < 4 ; $j++) { 
							if(${'oInfraccion'.$i.'_'.$j}->codigoInfraccion != "0" && ${'oInfraccion'.$i.'_'.$j}->detalleInfraccion != ""){
								$oRespRO = CrmInfraccionMP::getItemCorre(${'oRegRO'.$i}->chdID,${'oInfraccion'.$i.'_'.$j}->correlativo);
								if($oRespRO != NULL){
									${'oInfraccion'.$i.'_'.$j}->chdID = ${'oRegRO'.$i}->chdID;
									CrmInfraccionMP::Update(${'oInfraccion'.$i.'_'.$j});	
								}else{
									$respIns = CrmReporteOcurrenciaMP::getItemCHISinCorrelativo(${'oRegRO'.$i}->chdID);  
									${'oInfraccion'.$i.'_'.$j}->reporteOcurrenciaMPID = $respIns->reporteOcurrenciaMPID;  
									CrmInfraccionMP::AddNew(${'oInfraccion'.$i.'_'.$j});
								}
							}
						}

					}else{
						RaiseError(CrmReporteOcurrenciaMP::GetErrorMsg());
						return;
					}

				}
			}
		}
		Response('Data Secundaria - Actualizado Correctamente.',$oRegMP->chdID);
		break;
	}

	
	
}

function Response($msg,$chdID){
	echo json_encode(array('retval'=>'1', 'message'=>$msg,'chdID'=>$chdID));
	exit;
	return;
}

function RaiseError($msg){
	echo json_encode(array('retval'=>'0', 'message'=>$msg));
	exit;
	return;
}




?>
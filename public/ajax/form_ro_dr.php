<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");//ISOOO!!

$cmd  	 = OWASP::RequestString('cmd');
$valor   = 1;

RegisterRO($cmd);


function RegisterRO($cmd){

	for ($i=1; $i < 3 ; $i++) { 
		${'oRegRO'.$i} = new eCrmReporteOcurrenciaDR();
		${'oRegRO'.$i}->chdID =OWASP::RequestString('ID');
		${'oRegRO'.$i}->correlativo = $i;
		${'oRegRO'.$i}->actaReporteOcurrencia =OWASP::RequestString('actaReporteOcurrencia'.$i);
		${'oRegRO'.$i}->actaDecomiso =OWASP::RequestString('actaDecomiso'.$i);
		${'oRegRO'.$i}->tmDecomisado =OWASP::RequestString('tmDecomisado'.$i);
		${'oRegRO'.$i}->porcDecomisado =OWASP::RequestString('porcDecomisado'.$i);
		${'oRegRO'.$i}->actaRetencionPago =OWASP::RequestString('actaRetencionPago'.$i);
		${'oRegRO'.$i}->tipoInfractor =OWASP::RequestString('tipoInfractor'.$i);

		for ($j=1; $j < 4 ; $j++) { 
			${'oInfraccion'.$i.'_'.$j} = new eCrmInfraccionDR();
			${'oInfraccion'.$i.'_'.$j}->correlativo = $j;
			${'oInfraccion'.$i.'_'.$j}->codigoInfraccion =OWASP::RequestString('codigoInfraccion'.$i.'_'.$j);
			${'oInfraccion'.$i.'_'.$j}->detalleInfraccion =OWASP::RequestString('detalleInfraccion'.$i.'_'.$j);
		}
	}
	
	switch($cmd){
		case 'insert' : 
		for ($i=1; $i < 3 ; $i++) { 
			if(${'oRegRO'.$i}->actaReporteOcurrencia != ""){
				if(CrmReporteOcurrenciaDR::AddNew(${'oRegRO'.$i})){
					for ($j=1; $j < 4 ; $j++) { 
						if(${'oInfraccion'.$i.'_'.$j}->codigoInfraccion != "0" && ${'oInfraccion'.$i.'_'.$j}->detalleInfraccion != ""){
							${'oInfraccion'.$i.'_'.$j}->reporteOcurrenciaDRID = ${'oRegRO'.$i}->reporteOcurrenciaDRID; 
							CrmInfraccionDR::AddNew(${'oInfraccion'.$i.'_'.$j});
						}else
						{
							
						}
					}

				}else{
					RaiseError(CrmReporteOcurrenciaDR::GetErrorMsg());
					return;
				}
			}	

		}	
		
		Response('Reporte de Ocurrencia - Registrado Correctamente.','1');
		break;

		case 'update' : 
		for ($i=1; $i < 3; $i++) { 
			if(${'oRegRO'.$i}->actaReporteOcurrencia != ""){
				if(CrmReporteOcurrenciaDR::Update(${'oRegRO'.$i})){
					for ($j=1; $j < 4 ; $j++) { 
						if(${'oInfraccion'.$i.'_'.$j}->codigoInfraccion != "0" && ${'oInfraccion'.$i.'_'.$j}->detalleInfraccion != ""){
							$oRespRO = CrmInfraccionDR::getItemCorre(${'oRegRO'.$i}->chdID,${'oInfraccion'.$i.'_'.$j}->correlativo);
							if($oRespRO != NULL){
								${'oInfraccion'.$i.'_'.$j}->chdID = ${'oRegRO'.$i}->chdID;
								CrmInfraccionDR::Update(${'oInfraccion'.$i.'_'.$j});	
							}else{
								$respIns = CrmReporteOcurrenciaDR::getItemCHISinCorrelativo(${'oRegRO'.$i}->chdID);  
								${'oInfraccion'.$i.'_'.$j}->reporteOcurrenciaDRID = $respIns->reporteOcurrenciaDRID;  
								CrmInfraccionDR::AddNew(${'oInfraccion'.$i.'_'.$j});
							}
						}
					}

				}else{
					RaiseError(CrmReporteOcurrenciaDR::GetErrorMsg());
					return;
				}

			}
		}
		Response('Reporte de Ocurrencia - Actualizado Correctamente.','1');
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
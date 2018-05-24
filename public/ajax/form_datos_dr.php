<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");//ISOOO!!

$cmd  	 = OWASP::RequestString('cmd');
$valor   = 1;

RegisterDR($cmd);


function RegisterDR($cmd){
	$oRegDR = new eCrmDatosDR();

	$oRegDR->chdID 							=OWASP::RequestString('ID');
	$oRegDR->nroParteMuestreo				=OWASP::RequestString('nroParteMuestreo');
	$oRegDR->porcJuvenil					=OWASP::RequestString('porcJuvenil');
	$oRegDR->porcIncidental					=OWASP::RequestString('porcIncidental');
	$oRegDR->tipoProcedencia				=OWASP::RequestString('tipoProcedencia');
	$oRegDR->estadoResiduos					=OWASP::RequestString('estadoResiduos');
	$oRegDR->tipo							=OWASP::RequestString('tipo');
	$oRegDR->tipoEnvase						=OWASP::RequestString('tipoEnvase');
	//Buscando Inspector 
	$oInspector = CrmInspector::getItemCodigo(OWASP::RequestString('codigoInspector'));
	if($oInspector != NULL){$oRegDR->inspectorID = $oInspector->inspectorID;}else{$oRegDR->inspectorID = '';}
	$oRegDR->nombreInspector				=OWASP::RequestString('nombreInspector');
	$oRegDR->observaciones					=OWASP::RequestString('observaciones');
	//Buscando Planta 
	$oPlantaO = CrmPlantaChd::getItemCodigo(OWASP::RequestString('codigoPlantaO'));
	if($oPlantaO != NULL){$oRegDR->plantaOID = $oPlantaO->plantaID;}else{$oRegDR->plantaOID = OWASP::RequestString('codigoPlantaO');}
		$oRegDR->nombrePlantaO					=OWASP::RequestString('nombrePlantaO');
		$oRegDR->regionPlantaO					=OWASP::RequestString('regionPlantaO');
		$oRegDR->provinciaPlantaO				=OWASP::RequestString('provinciaPlantaO');
	//Buscando Planta 
		$oPlantaD = CrmPlantaChd::getItemCodigo(OWASP::RequestString('codigoPlantaD'));
		if($oPlantaD != NULL){$oRegDR->plantaDID = $oPlantaD->plantaID;}else{$oRegDR->plantaDID = OWASP::RequestString('codigoPlantaD');}
			$oRegDR->nombrePlantaD					=OWASP::RequestString('nombrePlantaD');
			$oRegDR->regionPlantaD					=OWASP::RequestString('regionPlantaD');
			$oRegDR->provinciaPlantaD				=OWASP::RequestString('provinciaPlantaD');


			switch($cmd){
				case 'insert' : 
				if(CrmDatosDR::AddNew($oRegDR)){
					Response('Data Secundaria - Registrado Correctamente.',$oRegDR->chdID);
				}
				break;

				case 'update' : 
				if(CrmDatosDR::Update($oRegDR)){
					Response('Data Secundaria - Actualizado Correctamente.',$oRegDR->chdID);
				}{}
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
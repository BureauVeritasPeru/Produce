<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");//ISOOO!!

$cmd  	 = OWASP::RequestString('cmd');
$valor   = 1;

RegisterDescartesResiduosyChd($cmd);


function RegisterDescartesResiduosyChd($cmd){
	$oRegCHD = new eCrmChd();
	$oRegDescartesResiduos = new eCrmDescartesResiduos();

	//Common Fields
	$oRegCHD->userID 			 		=OWASP::RequestInt('userID');
	$oRegCHD->localID 			 		=OWASP::RequestInt('localID');
	$oRegCHD->estado					=1;
	$oRegCHD->tipoCHD					=2;

	//Buscando Planta 
	$oPlanta = CrmPlantaChd::getItemCodigo(OWASP::RequestString('codigoPlanta'));
	if($oPlanta != NULL){$oRegDescartesResiduos->plantaID = $oPlanta->plantaID;}else{$oRegDescartesResiduos->plantaID = '';}
	$oRegDescartesResiduos->nombrePlanta			= OWASP::RequestString('nombrePlanta');
	$oRegDescartesResiduos->regionPlanta			= OWASP::RequestString('regionPlanta');
	$oRegDescartesResiduos->provinciaPlanta			= OWASP::RequestString('provinciaPlanta');
	$oRegDescartesResiduos->localidadPlanta			= OWASP::RequestString('localidadPlanta');
	$oRegDescartesResiduos->nroActaDR				= OWASP::RequestString('nroActaDR');
	$oRegDescartesResiduos->fechaIngreso			= OWASP::RequestString('fechaIngreso');
	$oRegDescartesResiduos->horaIngreso				= OWASP::RequestString('horaIngreso');
	$oRegDescartesResiduos->fechaTermino			= OWASP::RequestString('fechaTermino');
	$oRegDescartesResiduos->horaTermino				= OWASP::RequestString('horaTermino');
	$oRegDescartesResiduos->tipoProcedencia			= OWASP::RequestString('tipoProcedencia');
	$oRegDescartesResiduos->nombreProcedencia		= OWASP::RequestString('nombreProcedencia');
	$oRegDescartesResiduos->ruc						= OWASP::RequestString('ruc');
	$oRegDescartesResiduos->tipoUnidadTransporte	= OWASP::RequestString('tipoUnidadTransporte');
	$oRegDescartesResiduos->placaUnidadTransporte	= OWASP::RequestString('placaUnidadTransporte');
	$oRegDescartesResiduos->tipoEIP					= OWASP::RequestString('tipoEIP');
	$oRegDescartesResiduos->tipoTM					= OWASP::RequestString('tipoTM');
	$oRegDescartesResiduos->tm						= OWASP::RequestString('tm');
	$oRegDescartesResiduos->tmNoApto				= OWASP::RequestString('tmNoApto');
	$oRegDescartesResiduos->porcNoApto				= OWASP::RequestString('porcNoApto');
	$oRegDescartesResiduos->nroActaSensorial		= OWASP::RequestString('nroActaSensorial');
	$oRegDescartesResiduos->destinoProcedencia		= OWASP::RequestString('destinoProcedencia');
	$oRegDescartesResiduos->especie1				= OWASP::RequestString('especie1');
	$oRegDescartesResiduos->tm1						= OWASP::RequestString('tm1');
	$oRegDescartesResiduos->guia1					= OWASP::RequestString('guia1');
	$oRegDescartesResiduos->rp1						= OWASP::RequestString('rp1');
	$oRegDescartesResiduos->especie2				= OWASP::RequestString('especie2');
	$oRegDescartesResiduos->tm2						= OWASP::RequestString('tm2');
	$oRegDescartesResiduos->guia2					= OWASP::RequestString('guia2');
	$oRegDescartesResiduos->rp2						= OWASP::RequestString('rp2');
	$oRegDescartesResiduos->especie3				= OWASP::RequestString('especie3');
	$oRegDescartesResiduos->tm3						= OWASP::RequestString('tm3');
	$oRegDescartesResiduos->guia3					= OWASP::RequestString('guia3');
	$oRegDescartesResiduos->rp3						= OWASP::RequestString('rp3');
	$oRegDescartesResiduos->especie4				= OWASP::RequestString('especie4');
	$oRegDescartesResiduos->tm4						= OWASP::RequestString('tm4');
	$oRegDescartesResiduos->guia4					= OWASP::RequestString('guia4');
	$oRegDescartesResiduos->rp4						= OWASP::RequestString('rp4');

	switch($cmd){
		case 'insert' : if(CrmChd::AddNew($oRegCHD)){
			CrmDescartesResiduos::AddNew($oRegDescartesResiduos);
			Response('Descartes y Residuos - Registrado Correctamente.',$oRegDescartesResiduos->chdID);
		}else{
			RaiseError(CrmChd::GetErrorMsg());
			return;
		}
		break;

		case 'update' : 
		$oRegCHD->chdID =OWASP::RequestInt('ID');
		$oRegDescartesResiduos->chdID =$oRegCHD->chdID;
		if(CrmChd::Update($oRegCHD)){
			CrmDescartesResiduos::Update($oRegDescartesResiduos);
			Response('Descartes y Residuos - Actualizado Correctamente.',$oRegCHD->chdID);
		}else{
			RaiseError(CrmChd::GetErrorMsg());
			return;
		}
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



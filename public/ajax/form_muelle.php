<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");//ISOOO!!

$cmd  	 = OWASP::RequestString('cmd');
$valor   = 1;

RegisterMuelleyChd($cmd);


function RegisterMuelleyChd($cmd){
	$oRegCHD = new eCrmChd();
	$oRegMuelle = new eCrmMuelle();

	//Common Fields
	$oRegCHD->userID 			 		=OWASP::RequestInt('userID');
	$oRegCHD->localID 			 		=OWASP::RequestInt('localID');
	$oRegCHD->estado					=1;
	$oRegCHD->tipoCHD					=3;

	$oEmbarcacion = CrmEmbarcacion::getItemCodigo(OWASP::RequestString('matriculaEmbarcacion'));
	if($oEmbarcacion != NULL){$oRegMuelle->embarcacionID = $oEmbarcacion->embarcacionID;}else{$oRegMuelle->embarcacionID = '';}
	$oRegMuelle->nombreEmbarcacion				=	OWASP::RequestString('nombreEmbarcacion');
	$oRegMuelle->tipoEmbarcacion				=	OWASP::RequestString('tipoEmbarcacion');
	$oRegMuelle->nroRucDni						=	OWASP::RequestString('nroRucDni');
	$oRegMuelle->armador						=	OWASP::RequestString('armador');
	$oRegMuelle->estadoPermiso					=	OWASP::RequestString('estadoPermiso');
	$oRegMuelle->baliza							=	OWASP::RequestString('baliza');
	$oRegMuelle->muelleDesembarcadero			=	OWASP::RequestString('muelleDesembarcadero');
	$oRegMuelle->region							=	OWASP::RequestString('region');
	$oRegMuelle->localidad						=	OWASP::RequestString('localidad');
	$oRegMuelle->especie						=	OWASP::RequestString('especie');
	$oRegMuelle->totalDescargado				=	OWASP::RequestString('totalDescargado');
	$oRegMuelle->nroCubetas						=	OWASP::RequestString('nroCubetas');
	$oRegMuelle->fechaDescarga					=	OWASP::RequestString('fechaDescarga');
	$oRegMuelle->horaIngreso					=	OWASP::RequestString('horaIngreso');
	$oRegMuelle->horaTermino					=	OWASP::RequestString('horaTermino');
	$oRegMuelle->fuentePrimeraInformacion		=	OWASP::RequestString('fuentePrimeraInformacion');
	$oRegMuelle->nroDocumento					=	OWASP::RequestString('nroDocumento');
	$oRegMuelle->fechaObtencionPermiso			=	OWASP::RequestString('fechaObtencionPermiso');








	switch($cmd){
		case 'insert' : if(CrmChd::AddNew($oRegCHD)){
			CrmMuelle::AddNew($oRegMuelle);
			Response('Muelle - Registrado Correctamente.',$oRegMuelle->chdID);
		}else{
			RaiseError(CrmChd::GetErrorMsg());
			return;
		}
		break;

		case 'update' : 
		$oRegCHD->chdID =OWASP::RequestInt('ID');
		$oRegMuelle->chdID =$oRegCHD->chdID;
		if(CrmChd::Update($oRegCHD)){
			CrmMuelle::Update($oRegMuelle);
			Response('Muelle - Actualizado Correctamente.',$oRegCHD->chdID);
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
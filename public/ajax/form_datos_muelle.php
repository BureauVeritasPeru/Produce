<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");//ISOOO!!

$cmd  	 = OWASP::RequestString('cmd');
$valor   = 1;

RegisterMuelle($cmd);


function RegisterMuelle($cmd){
	$oRegMuelle = new eCrmDatosMuelle();

	$oRegMuelle->chdID 							=OWASP::RequestString('ID');
	$oRegMuelle->regionDestino					=	OWASP::RequestString('regionDestino');
	$oRegMuelle->eipDestino						=	OWASP::RequestString('eipDestino');
	$oRegMuelle->nroRuc							=	OWASP::RequestString('nroRuc');
	$oRegMuelle->tipoUnidadTransporte			=	OWASP::RequestString('tipoUnidadTransporte');
	$oRegMuelle->placaUnidadTransporte			=	OWASP::RequestString('placaUnidadTransporte');
	$oRegMuelle->nroActaInspeccion				=	OWASP::RequestString('nroActaInspeccion');
	$oRegMuelle->tipoDescarga					=	OWASP::RequestString('tipoDescarga');
	$oRegMuelle->nroParteMuestreo				=	OWASP::RequestString('nroParteMuestreo');
	$oRegMuelle->moda							=	OWASP::RequestString('moda');
	$oRegMuelle->porTallaMenores				=	OWASP::RequestString('porTallaMenores');
	$oRegMuelle->nroActaOcurrencia				=	OWASP::RequestString('nroActaOcurrencia');
	$oRegMuelle->observaciones					=	OWASP::RequestString('observaciones');




	switch($cmd){
		case 'insert' : 
		if(CrmDatosMuelle::AddNew($oRegMuelle)){
			Response('Data Secundaria - Registrado Correctamente.',$oRegMuelle->chdID);
		}
		break;

		case 'update' : 
		if(CrmDatosMuelle::Update($oRegMuelle)){
			Response('Data Secundaria - Actualizado Correctamente.',$oRegMuelle->chdID);
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



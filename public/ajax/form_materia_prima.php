<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");//ISOOO!!

$cmd  	 = OWASP::RequestString('cmd');
$valor   = 1;

RegisterMateriaPrimayChd($cmd);


function RegisterMateriaPrimayChd($cmd){
	$oRegCHD = new eCrmChd();
	$oRegMateriaPrima = new eCrmMateriaPrima();

	//Common Fields
	$oRegCHD->userID 			 		=OWASP::RequestInt('userID');
	$oRegCHD->localID 			 		=OWASP::RequestInt('localID');
	$oRegCHD->estado					=1;
	$oRegCHD->tipoCHD					=1;

	//Buscando Planta 
	$oPlanta = CrmPlantaChd::getItemCodigo(OWASP::RequestString('codigoPlanta'));
	if($oPlanta != NULL){$oRegMateriaPrima->plantaID = $oPlanta->plantaID;}else{$oRegMateriaPrima->plantaID = '';}
	$oRegMateriaPrima->nombrePlanta 	 		=OWASP::RequestString('nombrePlanta');
	$oRegMateriaPrima->localidadPlanta 	 		=OWASP::RequestString('localidadPlanta');
	$oRegMateriaPrima->numeroActaMateria		=OWASP::RequestString('numeroActaMateria');
	$oRegMateriaPrima->fechaIngreso		    	=OWASP::RequestString('fechaIngreso');
	$oRegMateriaPrima->horaIngreso		 		=OWASP::RequestString('horaIngreso');
	$oRegMateriaPrima->fechaTermino 			=OWASP::RequestString('fechaTermino');
	$oRegMateriaPrima->horaTermino		 		=OWASP::RequestString('horaTermino');
	$oRegMateriaPrima->codificacionUbicacion	=OWASP::RequestString('codificacionUbicacion');
	$oRegMateriaPrima->tipoUnidad		 		=OWASP::RequestString('tipoUnidad');
	$oRegMateriaPrima->placaUnidadTransporte 	=OWASP::RequestString('placaUnidadTransporte');
	$oRegMateriaPrima->porcNoApto 				=OWASP::RequestString('porcNoApto');
	$oRegMateriaPrima->nroActaSensorial		 	=OWASP::RequestString('nroActaSensorial');
	$oRegMateriaPrima->tipoProcedencia 			=OWASP::RequestString('tipoProcedencia');
	$oRegMateriaPrima->nombreProcedencia		=OWASP::RequestString('nombreProcedencia');
	$oRegMateriaPrima->rucMatricula				=OWASP::RequestString('rucMatricula');
	$oRegMateriaPrima->especie1		 			=OWASP::RequestString('especie1');
	$oRegMateriaPrima->tm1 						=OWASP::RequestString('tm1');
	$oRegMateriaPrima->destinoProcedencia 		=OWASP::RequestString('destinoProcedencia');
	$oRegMateriaPrima->especie2		 			=OWASP::RequestString('especie2');
	$oRegMateriaPrima->tm2 						=OWASP::RequestString('tm2');
	$oRegMateriaPrima->tmMateriaPrima			=OWASP::RequestString('tmMateriaPrima');
	$oRegMateriaPrima->especie3					=OWASP::RequestString('especie3');
	$oRegMateriaPrima->tm3		 				=OWASP::RequestString('tm3');
	$oRegMateriaPrima->numeroGuia 				=OWASP::RequestString('numeroGuia');

	switch($cmd){
		case 'insert' : if(CrmChd::AddNew($oRegCHD)){
			CrmMateriaPrima::AddNew($oRegMateriaPrima);
			Response('Materia Prima - Registrado Correctamente.',$oRegMateriaPrima->chdID);
		}else{
			RaiseError(CrmChd::GetErrorMsg());
			return;
		}
		break;

		case 'update' : 
		$oRegCHD->chdID =OWASP::RequestInt('ID');
		$oRegMateriaPrima->chdID =$oRegCHD->chdID;
		if(CrmChd::Update($oRegCHD)){
			CrmMateriaPrima::Update($oRegMateriaPrima);
			Response('Materia Prima - Actualizado Correctamente.',$oRegCHD->chdID);
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
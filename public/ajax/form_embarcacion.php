<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");//ISOOO!!

$cmd  	 = OWASP::RequestString('cmd');
$valor   = 1;

RegisterEmbarcacion($cmd);


function RegisterEmbarcacion($cmd){
	$oRegEmbarcacion = new eCrmEmbarcacionCHD();
	$oRegEmbarcacion->chdID 	 						=OWASP::RequestString('ID');
	$oRegEmbarcacion->unidadMedida 	 					=OWASP::RequestString('unidadMedida');

	$oDetEmbarcacion1 = new eCrmDetalleEmbarcacion();
	$oDetEmbarcacion2 = new eCrmDetalleEmbarcacion();
	$oDetEmbarcacion3 = new eCrmDetalleEmbarcacion();
	$oDetEmbarcacion4 = new eCrmDetalleEmbarcacion();
	$oDetEmbarcacion5 = new eCrmDetalleEmbarcacion();
	$oDetEmbarcacion6 = new eCrmDetalleEmbarcacion();



	$oDetEmbarcacion1->correlativo	 			='1';
	$oDetEmbarcacion1->matricula				=OWASP::RequestString('matricula1');
	$oDetEmbarcacion1->nombreEmbarcacion		=OWASP::RequestString('nombreEmbarcacion1');
	$oDetEmbarcacion1->nroCubetas				=OWASP::RequestString('nroCubetas1');
	$oDetEmbarcacion1->especie1					=OWASP::RequestString('especie1_1');
	$oDetEmbarcacion1->nroCubetas1				=OWASP::RequestString('nroCubetas1_1');
	$oDetEmbarcacion1->especie2					=OWASP::RequestString('especie2_1');
	$oDetEmbarcacion1->nroCubetas2				=OWASP::RequestString('nroCubetas2_1');
	$oDetEmbarcacion1->especie3					=OWASP::RequestString('especie3_1');
	$oDetEmbarcacion1->nroCubetas3				=OWASP::RequestString('nroCubetas3_1');
	$oDetEmbarcacion1->reportePesaje			=OWASP::RequestString('reportePesaje1');
	$oDetEmbarcacion1->numeroGuia				=OWASP::RequestString('numeroGuia1');


	$oDetEmbarcacion2->correlativo	 			='2';
	$oDetEmbarcacion2->matricula				=OWASP::RequestString('matricula2');
	$oDetEmbarcacion2->nombreEmbarcacion		=OWASP::RequestString('nombreEmbarcacion2');
	$oDetEmbarcacion2->nroCubetas				=OWASP::RequestString('nroCubetas2');
	$oDetEmbarcacion2->especie1					=OWASP::RequestString('especie1_2');
	$oDetEmbarcacion2->nroCubetas1				=OWASP::RequestString('nroCubetas1_2');
	$oDetEmbarcacion2->especie2					=OWASP::RequestString('especie2_2');
	$oDetEmbarcacion2->nroCubetas2				=OWASP::RequestString('nroCubetas2_2');
	$oDetEmbarcacion2->especie3					=OWASP::RequestString('especie3_2');
	$oDetEmbarcacion2->nroCubetas3				=OWASP::RequestString('nroCubetas3_2');
	$oDetEmbarcacion2->reportePesaje			=OWASP::RequestString('reportePesaje2');
	$oDetEmbarcacion2->numeroGuia				=OWASP::RequestString('numeroGuia2');


	$oDetEmbarcacion3->correlativo	 			='3';
	$oDetEmbarcacion3->matricula				=OWASP::RequestString('matricula3');
	$oDetEmbarcacion3->nombreEmbarcacion		=OWASP::RequestString('nombreEmbarcacion3');
	$oDetEmbarcacion3->nroCubetas				=OWASP::RequestString('nroCubetas3');
	$oDetEmbarcacion3->especie1					=OWASP::RequestString('especie1_3');
	$oDetEmbarcacion3->nroCubetas1				=OWASP::RequestString('nroCubetas1_3');
	$oDetEmbarcacion3->especie2					=OWASP::RequestString('especie2_3');
	$oDetEmbarcacion3->nroCubetas2				=OWASP::RequestString('nroCubetas2_3');
	$oDetEmbarcacion3->especie3					=OWASP::RequestString('especie3_3');
	$oDetEmbarcacion3->nroCubetas3				=OWASP::RequestString('nroCubetas3_3');
	$oDetEmbarcacion3->reportePesaje			=OWASP::RequestString('reportePesaje3');
	$oDetEmbarcacion3->numeroGuia				=OWASP::RequestString('numeroGuia3');

	$oDetEmbarcacion4->correlativo	 			='4';
	$oDetEmbarcacion4->matricula				=OWASP::RequestString('matricula4');
	$oDetEmbarcacion4->nombreEmbarcacion		=OWASP::RequestString('nombreEmbarcacion4');
	$oDetEmbarcacion4->nroCubetas				=OWASP::RequestString('nroCubetas4');
	$oDetEmbarcacion4->especie1					=OWASP::RequestString('especie1_4');
	$oDetEmbarcacion4->nroCubetas1				=OWASP::RequestString('nroCubetas1_4');
	$oDetEmbarcacion4->especie2					=OWASP::RequestString('especie2_4');
	$oDetEmbarcacion4->nroCubetas2				=OWASP::RequestString('nroCubetas2_4');
	$oDetEmbarcacion4->especie3					=OWASP::RequestString('especie3_4');
	$oDetEmbarcacion4->nroCubetas3				=OWASP::RequestString('nroCubetas3_4');
	$oDetEmbarcacion4->reportePesaje			=OWASP::RequestString('reportePesaje4');
	$oDetEmbarcacion4->numeroGuia				=OWASP::RequestString('numeroGuia4');

	$oDetEmbarcacion5->correlativo	 			='5';
	$oDetEmbarcacion5->matricula				=OWASP::RequestString('matricula5');
	$oDetEmbarcacion5->nombreEmbarcacion		=OWASP::RequestString('nombreEmbarcacion5');
	$oDetEmbarcacion5->nroCubetas				=OWASP::RequestString('nroCubetas5');
	$oDetEmbarcacion5->especie1					=OWASP::RequestString('especie1_5');
	$oDetEmbarcacion5->nroCubetas1				=OWASP::RequestString('nroCubetas1_5');
	$oDetEmbarcacion5->especie2					=OWASP::RequestString('especie2_5');
	$oDetEmbarcacion5->nroCubetas2				=OWASP::RequestString('nroCubetas2_5');
	$oDetEmbarcacion5->especie3					=OWASP::RequestString('especie3_5');
	$oDetEmbarcacion5->nroCubetas3				=OWASP::RequestString('nroCubetas3_5');
	$oDetEmbarcacion5->reportePesaje			=OWASP::RequestString('reportePesaje5');
	$oDetEmbarcacion5->numeroGuia				=OWASP::RequestString('numeroGuia5');

	$oDetEmbarcacion6->correlativo	 			='6';
	$oDetEmbarcacion6->matricula				=OWASP::RequestString('matricula6');
	$oDetEmbarcacion6->nombreEmbarcacion		=OWASP::RequestString('nombreEmbarcacion6');
	$oDetEmbarcacion6->nroCubetas				=OWASP::RequestString('nroCubetas6');
	$oDetEmbarcacion6->especie1					=OWASP::RequestString('especie1_6');
	$oDetEmbarcacion6->nroCubetas1				=OWASP::RequestString('nroCubetas1_6');
	$oDetEmbarcacion6->especie2					=OWASP::RequestString('especie2_6');
	$oDetEmbarcacion6->nroCubetas2				=OWASP::RequestString('nroCubetas2_6');
	$oDetEmbarcacion6->especie3					=OWASP::RequestString('especie3_6');
	$oDetEmbarcacion6->nroCubetas3				=OWASP::RequestString('nroCubetas3_6');
	$oDetEmbarcacion6->reportePesaje			=OWASP::RequestString('reportePesaje6');
	$oDetEmbarcacion6->numeroGuia				=OWASP::RequestString('numeroGuia6');


	switch($cmd){
		case 'insert' : 
		if(CrmEmbarcacionCHD::AddNew($oRegEmbarcacion)){
			if($oDetEmbarcacion1->matricula != "" && $oDetEmbarcacion1->nombreEmbarcacion != "" ){$oDetEmbarcacion1->embarcacionID = $oRegEmbarcacion->embarcacionID; CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion1);}
				if($oDetEmbarcacion2->matricula != "" && $oDetEmbarcacion2->nombreEmbarcacion != "" ){$oDetEmbarcacion2->embarcacionID = $oRegEmbarcacion->embarcacionID; CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion2);}
					if($oDetEmbarcacion3->matricula != "" && $oDetEmbarcacion3->nombreEmbarcacion != "" ){$oDetEmbarcacion3->embarcacionID = $oRegEmbarcacion->embarcacionID; CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion3);}
						if($oDetEmbarcacion4->matricula != "" && $oDetEmbarcacion4->nombreEmbarcacion != "" ){$oDetEmbarcacion4->embarcacionID = $oRegEmbarcacion->embarcacionID; CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion4);}
							if($oDetEmbarcacion5->matricula != "" && $oDetEmbarcacion5->nombreEmbarcacion != "" ){$oDetEmbarcacion5->embarcacionID = $oRegEmbarcacion->embarcacionID; CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion5);}
								if($oDetEmbarcacion6->matricula != "" && $oDetEmbarcacion6->nombreEmbarcacion != "" ){$oDetEmbarcacion6->embarcacionID = $oRegEmbarcacion->embarcacionID; CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion6);}
									Response('Embarcacion - Registrado Correctamente.',$oRegEmbarcacion->chdID );
								}else{
									RaiseError(CrmEmbarcacionCHD::GetErrorMsg());
									return;
								}
								break;

								case 'update' : 
								if(CrmEmbarcacionCHD::Update($oRegEmbarcacion)){ 	
									if($oDetEmbarcacion1->matricula != "" && $oDetEmbarcacion1->nombreEmbarcacion != "" ){$orespEmbarcacion = CrmDetalleEmbarcacion::getItemCorre($oRegEmbarcacion->chdID,$oDetEmbarcacion1->correlativo);if($orespEmbarcacion != NULL){ $oDetEmbarcacion1->chdID = $oRegEmbarcacion->chdID;  CrmDetalleEmbarcacion::Update($oDetEmbarcacion1);}else{ $respIns = CrmEmbarcacionCHD::getItemCHI($oRegEmbarcacion->chdID);  $oDetEmbarcacion1->embarcacionID = $respIns->embarcacionID;  CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion1);}}
										if($oDetEmbarcacion2->matricula != "" && $oDetEmbarcacion2->nombreEmbarcacion != "" ){$orespEmbarcacion = CrmDetalleEmbarcacion::getItemCorre($oRegEmbarcacion->chdID,$oDetEmbarcacion2->correlativo);if($orespEmbarcacion != NULL){ $oDetEmbarcacion2->chdID = $oRegEmbarcacion->chdID;  CrmDetalleEmbarcacion::Update($oDetEmbarcacion2);}else{ $respIns = CrmEmbarcacionCHD::getItemCHI($oRegEmbarcacion->chdID);  $oDetEmbarcacion2->embarcacionID = $respIns->embarcacionID;  CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion2);}}
											if($oDetEmbarcacion3->matricula != "" && $oDetEmbarcacion3->nombreEmbarcacion != "" ){$orespEmbarcacion = CrmDetalleEmbarcacion::getItemCorre($oRegEmbarcacion->chdID,$oDetEmbarcacion3->correlativo);if($orespEmbarcacion != NULL){ $oDetEmbarcacion3->chdID = $oRegEmbarcacion->chdID;  CrmDetalleEmbarcacion::Update($oDetEmbarcacion3);}else{ $respIns = CrmEmbarcacionCHD::getItemCHI($oRegEmbarcacion->chdID);  $oDetEmbarcacion3->embarcacionID = $respIns->embarcacionID;  CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion3);}}
												if($oDetEmbarcacion4->matricula != "" && $oDetEmbarcacion4->nombreEmbarcacion != "" ){$orespEmbarcacion = CrmDetalleEmbarcacion::getItemCorre($oRegEmbarcacion->chdID,$oDetEmbarcacion4->correlativo);if($orespEmbarcacion != NULL){ $oDetEmbarcacion4->chdID = $oRegEmbarcacion->chdID;  CrmDetalleEmbarcacion::Update($oDetEmbarcacion4);}else{ $respIns = CrmEmbarcacionCHD::getItemCHI($oRegEmbarcacion->chdID);  $oDetEmbarcacion4->embarcacionID = $respIns->embarcacionID;  CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion4);}}
													if($oDetEmbarcacion5->matricula != "" && $oDetEmbarcacion5->nombreEmbarcacion != "" ){$orespEmbarcacion = CrmDetalleEmbarcacion::getItemCorre($oRegEmbarcacion->chdID,$oDetEmbarcacion5->correlativo);if($orespEmbarcacion != NULL){ $oDetEmbarcacion5->chdID = $oRegEmbarcacion->chdID;  CrmDetalleEmbarcacion::Update($oDetEmbarcacion5);}else{ $respIns = CrmEmbarcacionCHD::getItemCHI($oRegEmbarcacion->chdID);  $oDetEmbarcacion5->embarcacionID = $respIns->embarcacionID;  CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion5);}}
														if($oDetEmbarcacion6->matricula != "" && $oDetEmbarcacion6->nombreEmbarcacion != "" ){$orespEmbarcacion = CrmDetalleEmbarcacion::getItemCorre($oRegEmbarcacion->chdID,$oDetEmbarcacion6->correlativo);if($orespEmbarcacion != NULL){ $oDetEmbarcacion6->chdID = $oRegEmbarcacion->chdID;  CrmDetalleEmbarcacion::Update($oDetEmbarcacion6);}else{ $respIns = CrmEmbarcacionCHD::getItemCHI($oRegEmbarcacion->chdID);  $oDetEmbarcacion6->embarcacionID = $respIns->embarcacionID;  CrmDetalleEmbarcacion::AddNew($oDetEmbarcacion6);}}
															Response('Embarcacion - Actualizado Correctamente.',$oRegEmbarcacion->chdID );
														}else{
															RaiseError(CrmEmbarcacionCHD::GetErrorMsg());
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
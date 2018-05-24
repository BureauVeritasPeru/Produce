<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");


Consulta();

function Consulta(){

    $mat =OWASP::RequestString('mat');
    $oValor = CrmEmbarcacion::getItemNumeral($mat);

    if($oValor!=NULL){
      Response($oValor->matriculaEmbarcacion , $oValor->nombreEmbarcacion , $oValor->regimen , $oValor->armador , $oValor->permisoPesca);
  }
  else 
  {
      RaiseError('Matricula de Embarcacion no registrada , Solicitelo al administrador');
      return;
  }
}

function Response($val1,$val2,$val3,$val4,$val5){
    echo json_encode(array('retval'=>'1','matricula'=>$val1, 'nombre'=>$val2 , 'regimen' =>$val3 , 'armador' =>$val4 , 'permisoPesca' =>$val5));
    exit;
    return;
}

function RaiseError($msg){
    echo json_encode(array('retval'=>'0', 'message'=>$msg));
    exit;
    return;
}
?>
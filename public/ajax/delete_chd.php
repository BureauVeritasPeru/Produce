<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");


Consulta();

function Consulta(){

  $cod =OWASP::RequestString('ID');

  if(CrmChd::Delete($cod)){
    Response('CHD eliminado Correctamente');
  }
  else 
  { 
    RaiseError('CHD no Eliminado , comuniquese con el administrador');
    return;
  }
}

function Response($msg){
  echo json_encode(array('retval'=>'1','message'=>$msg));
  exit;
  return;
}

function RaiseError($msg){
  echo json_encode(array('retval'=>'0', 'message'=>$msg));
  exit;
  return;
}
?>
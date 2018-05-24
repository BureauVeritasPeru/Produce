<?php
$oItem = new eCrmPlantaChd();

$oItem->plantaID        =$kID;
$oItem->codigoPlanta    =OWASP::RequestString('codigoPlanta');
$oItem->nombrePlanta    =OWASP::RequestString('nombrePlanta');
$oItem->localidadPlanta =OWASP::RequestString('localidadPlanta');
$oItem->regionPlanta    =OWASP::RequestString('regionPlanta');
$oItem->provinciaPlanta =OWASP::RequestString('provinciaPlanta');
$oItem->tipoCHD         =OWASP::RequestString('tipoCHD');
$oItem->localID         =OWASP::RequestString('localID');
$oItem->state           =OWASP::RequestString('state');

$MODULE->processFormAction(new CrmPlantaChd(), $oItem);

if($MODULE->FormView=="edit"){
    $obj=CrmPlantaChd::getItem($kID);
    if($obj!=null){
        if (empty($oItem->codigoPlanta)) 	  $oItem->codigoPlanta        =$obj->codigoPlanta;
        if (empty($oItem->nombrePlanta)) 	  $oItem->nombrePlanta        =$obj->nombrePlanta;
        if (empty($oItem->localidadPlanta))   $oItem->localidadPlanta     =$obj->localidadPlanta;
        if (empty($oItem->regionPlanta)) 	  $oItem->regionPlanta        =$obj->regionPlanta;
        if (empty($oItem->provinciaPlanta))   $oItem->provinciaPlanta     =$obj->provinciaPlanta;
        if (empty($oItem->tipoCHD))           $oItem->tipoCHD             =$obj->tipoCHD;
        if (empty($oItem->localID))           $oItem->localID             =$obj->localID;
        if (empty($oItem->state))             $oItem->state               =$obj->state;
    }
    else
        $MODULE->addError(CrmPlantaChd::GetErrorMsg());

    $MODULE->ItemTitle=$oItem->nombrePlanta;
}

$MODULE->FormTitle="Planta CHD";
?>

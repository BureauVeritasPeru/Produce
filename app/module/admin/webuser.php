<?php
$oItem = new eCrmUser();

$oItem->userID      =$kID;
$oItem->firstName   =OWASP::RequestString('firstName');
$oItem->lastName    =OWASP::RequestString('lastName');
$oItem->userName    =OWASP::RequestString('userName');
$oItem->password    =OWASP::RequestString('password');
$oItem->email       =OWASP::RequestString('email');
$oItem->state       =OWASP::RequestString('state');
$oItem->level       =OWASP::RequestString('level');
$oItem->chi         =OWASP::RequestBoolean('chi');
$oItem->chd         =OWASP::RequestBoolean('chd');
$oItem->reportes    =OWASP::RequestBoolean('reportes');
$oItem->localID     =OWASP::RequestString('localID');

$MODULE->processFormAction(new CrmUser(), $oItem);

if($MODULE->FormView=="edit"){
    $obj=CrmUser::getItem($kID);
    if($obj!=null){
        if (empty($oItem->firstName))   $oItem->firstName   =$obj->firstName;
        if (empty($oItem->lastName))    $oItem->lastName    =$obj->lastName;
        if (empty($oItem->userName))    $oItem->userName    =$obj->userName;
        if (empty($oItem->password))    $oItem->password    =$obj->password;
        if (empty($oItem->email))      $oItem->email       =$obj->email;
        if (empty($oItem->state))      $oItem->state       =$obj->state;
        if (empty($oItem->level))       $oItem->level    =$obj->level;
        if (empty($oItem->chi))    $oItem->chi    =$obj->chi;
        if (empty($oItem->chd))      $oItem->chd       =$obj->chd;
        if (empty($oItem->reportes))      $oItem->reportes       =$obj->reportes;
        if (empty($oItem->localID))       $oItem->localID        =$obj->localID;
    }
    else
        $MODULE->addError(CrmUser::GetErrorMsg());

    $MODULE->ItemTitle=$oItem->firstName." ".$oItem->lastName;
}

$MODULE->FormTitle="Usuario";
?>

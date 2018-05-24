<?php
session_start();
require_once("../../config/main.php");
require_once("../../app/include/admin/header_ajax.php");

define('DOMINIO', 'laz.bvcorp.corp');
define('DN', 'dc=laz,dc=bvcorp,dc=corp');

function mailboxpowerloginrd($user,$pass){
  $ldaprdn = trim($user).'@'.DOMINIO; 
  $ldappass = trim($pass); 
  $ds = DOMINIO; 
  $dn = DN;  
  $puertoldap = 389; 
  $ldapconn = ldap_connect($ds,$puertoldap);
  ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION,3); 
  ldap_set_option($ldapconn, LDAP_OPT_REFERRALS,0); 
  $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass); 
  if ($ldapbind){
    $filter="(|(SAMAccountName=".trim($user)."))";
    $fields = array("SAMAccountName"); 
    $justthese = array("ou");
    //$sr = @ldap_search($ldapconn, $dn, $filter, $fields); 
    $sr = @ldap_search($ldapconn, $dn, $filter); 
    //$sr = @ldap_list($ldapconn,$dn,'ou=*',$justthese);
    $info = @ldap_get_entries($ldapconn, $sr); 
     //$array = $info[0]["samaccountname"][0];
    $array = $info;
  }else{ 
    $array=0;
  } 
  ldap_close($ldapconn); 
  return $array;
} 

LoginForm();

function LoginForm(){
    //Common Fields
  $password =OWASP::RequestString('pass');
  $email    =OWASP::RequestString('user');

  if( empty($email) || empty($password) ){
    RaiseError('Porfavor ingrese todos los datos.'.$email.' '.$password);
    return;
  }

  if(AdmUser::getItem_Login($email)!=NULL){ 
    $usuario = mailboxpowerloginrd($email,$password);
    if($usuario == "0" || $usuario == ''){
      $_SERVER = array();
      $_SESSION = array();
      RaiseError('Ingrese una cuenta válida y previamente registrada.');
    }else{
      session_start();
      $_SESSION["user"] = $usuario;
      $_SESSION["autentica"] = "SIP";
      Response('Thanks for logon.');
    } 
  }
  else {
    RaiseError('Ingrese una cuenta válida y previamente registrada.');
    return;
  }
}

function Response($msg){
  echo json_encode(array('retval'=>'1', 'message'=>$msg));
  exit;
  return;
}

function RaiseError($msg){
  echo json_encode(array('retval'=>'0', 'message'=>$msg));
  exit;
  return;
}
?>
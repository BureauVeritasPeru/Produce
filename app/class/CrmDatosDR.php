<?php
require_once("base/Database.php");

class CrmDatosDR extends Database
{

	public static function  getItem($datosDRID){
		$query = "SELECT * FROM crm_datos_dr 
		WHERE
		datosDRID='$datosDRID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID){
		$query = "SELECT * FROM crm_datos_dr 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
		//echo $query;
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_datos_dr
		ORDER BY nroParteMuestreo";
		return parent::GetCollection(parent::GetResult($query));
	}


	public static function  getWebList(){
		$query = "SELECT * FROM crm_datos_dr
		ORDER BY nroParteMuestreo";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oDatosDR){
		//Search the max Id
		$query = "SELECT MAX(datosDRID) FROM crm_datos_dr";
		$result = parent::GetResult($query);
		$oDatosDR->datosDRID = parent::fetchScalar($result)+1;

		//Insert data to table
		$query = "INSERT INTO crm_datos_dr(datosDRID,chdID,nroParteMuestreo,porcJuvenil,porcIncidental,tipoProcedencia,estadoResiduos,tipo,tipoEnvase,inspectorID,nombreInspector,observaciones,plantaOID,nombrePlantaO,regionPlantaO,provinciaPlantaO,plantaDID,nombrePlantaD,regionPlantaD,provinciaPlantaD,fechaRegistro,fechaActualizar)
		VALUES('$oDatosDR->datosDRID','$oDatosDR->chdID','$oDatosDR->nroParteMuestreo','$oDatosDR->porcJuvenil','$oDatosDR->porcIncidental','$oDatosDR->tipoProcedencia','$oDatosDR->estadoResiduos','$oDatosDR->tipo','$oDatosDR->tipoEnvase','$oDatosDR->inspectorID','$oDatosDR->nombreInspector','$oDatosDR->observaciones','$oDatosDR->plantaOID','$oDatosDR->nombrePlantaO','$oDatosDR->regionPlantaO','$oDatosDR->provinciaPlantaO','$oDatosDR->plantaDID','$oDatosDR->nombrePlantaD','$oDatosDR->regionPlantaD','$oDatosDR->provinciaPlantaD',NOW(),NOW())";
		return parent::Execute($query);
		//echo $query;
	}

	public static function  Update($oDatosDR){
		//Update data to table
		$query = "UPDATE crm_datos_dr SET 
		nroParteMuestreo		=	'$oDatosDR->nroParteMuestreo',
		porcJuvenil				=	'$oDatosDR->porcJuvenil',
		porcIncidental			=	'$oDatosDR->porcIncidental',
		tipoProcedencia			=	'$oDatosDR->tipoProcedencia',
		estadoResiduos			=	'$oDatosDR->estadoResiduos',
		tipo					=	'$oDatosDR->tipo',
		tipoEnvase				=	'$oDatosDR->tipoEnvase',
		inspectorID				=	'$oDatosDR->inspectorID',
		nombreInspector			=	'$oDatosDR->nombreInspector',
		observaciones			=	'$oDatosDR->observaciones',
		plantaOID				=	'$oDatosDR->plantaOID',
		nombrePlantaO			=	'$oDatosDR->nombrePlantaO',
		regionPlantaO			=	'$oDatosDR->regionPlantaO',
		provinciaPlantaO		=	'$oDatosDR->provinciaPlantaO',
		plantaDID				=	'$oDatosDR->plantaDID',
		nombrePlantaD			=	'$oDatosDR->nombrePlantaD',
		regionPlantaD			=	'$oDatosDR->regionPlantaD',
		provinciaPlantaD		=	'$oDatosDR->provinciaPlantaD',
		fechaActualizar			=	NOW()
		WHERE 
		chdID	=$oDatosDR->chdID";
		return parent::Execute($query);
	}

	public static function  Delete($datosDRID){
		$query = "DELETE FROM crm_datos_dr WHERE datosDRID='$datosDRID'";
		return parent::Execute($query);
	}

	public static function  getState($state){
		switch($state){
			case 1: 	return "Activo"; break;
			case 2: 	return "Bloqueado"; break;
			case 0: 	return "Inactivo"; break;
		}
		return "";
	}

}

?>




























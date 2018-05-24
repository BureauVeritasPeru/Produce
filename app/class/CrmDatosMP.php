<?php
require_once("base/Database.php");

class CrmDatosMP extends Database
{

	public static function  getItem($datosMPID){
		$query = "SELECT * FROM crm_datos_mp 
		WHERE
		datosMPID='$datosMPID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID){
		$query = "SELECT * FROM crm_datos_mp 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_datos_mp
		ORDER BY nroParteMuestreo";
		return parent::GetCollection(parent::GetResult($query));
	}


	public static function  getWebList(){
		$query = "SELECT * FROM crm_datos_mp
		ORDER BY nroParteMuestreo";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oDatosMP){
		//Search the max Id
		$query = "SELECT MAX(datosMPID) FROM crm_datos_mp";
		$result = parent::GetResult($query);
		$oDatosMP->datosMPID = parent::fetchScalar($result)+1;

		//Insert data to table
		$query = "INSERT INTO crm_datos_mp(datosMPID,chdID,nroParteMuestreo,porcJuvenil,porcIncidental,destino,presentacion,actaInspeccionProduce,actaMuestreoProduce,inspectorID,nombreInspector,observaciones,fechaRegistro,fechaActualizar)
		VALUES('$oDatosMP->datosMPID','$oDatosMP->chdID','$oDatosMP->nroParteMuestreo','$oDatosMP->porcJuvenil','$oDatosMP->porcIncidental','$oDatosMP->destino','$oDatosMP->presentacion','$oDatosMP->actaInspeccionProduce','$oDatosMP->actaMuestreoProduce','$oDatosMP->inspectorID','$oDatosMP->nombreInspector','$oDatosMP->observaciones',NOW(),NOW())";
		return parent::Execute($query);
		//echo $query;
	}

	public static function  Update($oDatosMP){
		//Update data to table
		$query = "UPDATE crm_datos_mp SET 
		nroParteMuestreo		=	'$oDatosMP->nroParteMuestreo',
		porcJuvenil				=	'$oDatosMP->porcJuvenil',
		porcIncidental			=	'$oDatosMP->porcIncidental',
		destino					=	'$oDatosMP->destino',
		presentacion			=	'$oDatosMP->presentacion',
		actaInspeccionProduce	=	'$oDatosMP->actaInspeccionProduce',
		actaMuestreoProduce		=	'$oDatosMP->actaMuestreoProduce',
		inspectorID				=	'$oDatosMP->inspectorID',
		nombreInspector			=	'$oDatosMP->nombreInspector',
		observaciones			=	'$oDatosMP->observaciones',
		fechaActualizar			=	NOW()
		WHERE 
		chdID	=$oDatosMP->chdID";
		return parent::Execute($query);
	}

	public static function  Delete($datosMPID){
		$query = "DELETE FROM crm_datos_mp WHERE datosMPID='$datosMPID'";
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

































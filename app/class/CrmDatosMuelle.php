<?php
require_once("base/Database.php");

class CrmDatosMuelle extends Database
{

	public static function  getItem($datosMuelleID){
		$query = "SELECT * FROM crm_datos_muelle 
		WHERE
		datosMuelleID='$datosMuelleID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID){
		$query = "SELECT * FROM crm_datos_muelle 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_datos_muelle
		ORDER BY nroRuc";
		return parent::GetCollection(parent::GetResult($query));
	}


	public static function  getWebList(){
		$query = "SELECT * FROM crm_datos_muelle
		ORDER BY nroRuc";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oDatosMuelle){
		//Search the max Id
		$query = "SELECT MAX(datosMuelleID) FROM crm_datos_muelle";
		$result = parent::GetResult($query);
		$oDatosMuelle->datosMuelleID = parent::fetchScalar($result)+1;

		//Insert data to table
		$query = "INSERT INTO crm_datos_muelle(datosMuelleID,chdID,regionDestino,eipDestino,nroRuc,tipoUnidadTransporte,placaUnidadTransporte,nroActaInspeccion,tipoDescarga,nroParteMuestreo,moda,porTallaMenores,nroActaOcurrencia,observaciones,fechaRegistro,fechaActualizar)
		VALUES('$oDatosMuelle->datosMuelleID','$oDatosMuelle->chdID','$oDatosMuelle->regionDestino','$oDatosMuelle->eipDestino','$oDatosMuelle->nroRuc','$oDatosMuelle->tipoUnidadTransporte','$oDatosMuelle->placaUnidadTransporte','$oDatosMuelle->nroActaInspeccion','$oDatosMuelle->tipoDescarga','$oDatosMuelle->nroParteMuestreo','$oDatosMuelle->moda','$oDatosMuelle->porTallaMenores','$oDatosMuelle->nroActaOcurrencia','$oDatosMuelle->observaciones',NOW(),NOW())";
		return parent::Execute($query);
		//echo $query;
	}

	public static function  Update($oDatosMuelle){
		//Update data to table
		$query = "UPDATE crm_datos_muelle SET 
		regionDestino				= 	'$oDatosMuelle->regionDestino',
		eipDestino					= 	'$oDatosMuelle->eipDestino',
		nroRuc						= 	'$oDatosMuelle->nroRuc',
		tipoUnidadTransporte		= 	'$oDatosMuelle->tipoUnidadTransporte',
		placaUnidadTransporte		= 	'$oDatosMuelle->placaUnidadTransporte',
		nroActaInspeccion			= 	'$oDatosMuelle->nroActaInspeccion',
		tipoDescarga				= 	'$oDatosMuelle->tipoDescarga',
		nroParteMuestreo			= 	'$oDatosMuelle->nroParteMuestreo',
		moda						= 	'$oDatosMuelle->moda',
		porTallaMenores				= 	'$oDatosMuelle->porTallaMenores',
		nroActaOcurrencia			= 	'$oDatosMuelle->nroActaOcurrencia',
		observaciones				=	'$oDatosMuelle->observaciones',
		fechaActualizar				= 	NOW()
		WHERE 
		chdID	=$oDatosMuelle->chdID";
		return parent::Execute($query);
		//echo $query;
	}

	public static function  Delete($datosMuelleID){
		$query = "DELETE FROM crm_datos_muelle WHERE datosMuelleID='$datosMuelleID'";
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





















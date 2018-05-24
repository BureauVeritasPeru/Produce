<?php
require_once("base/Database.php");

class CrmMuelle extends Database
{

	public static function  getItem($muelleID){
		$query = "SELECT * FROM crm_muelle 
		WHERE
		muelleID='$muelleID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID){
		$query = "SELECT * FROM crm_muelle 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getActa($acta){
		$query = "SELECT * FROM crm_muelle 
		WHERE
		nombreEmbarcacion='$acta'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getActaxID($ID){
		$query = "SELECT * FROM crm_muelle 
		WHERE
		ChdID='$ID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_muelle
		ORDER BY nombreEmbarcacion,tipoEmbarcacion";
		return parent::GetCollection(parent::GetResult($query));
	}

	// public static function  getList_Paging( ){
	// 	$query ="SELECT muelleID,chiID,plantaID,nombrePlanta, puertoPlanta, zonaPlanta, numeroActaDesembarque, pescaDeclarada, cierrePuerto,inspectorID,nombreInspector,obsInusual,fechaRegistro
	// 	FROM crm_muelle";
	
	// 	return parent::GetCollection(parent::GetResultPaging($query));
	// }

	public static function  getWebList(){
		$query = "SELECT * FROM crm_muelle
		ORDER BY nombreEmbarcacion,tipoEmbarcacion";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oMuelle){
		//Search the max Id
		$query = "SELECT MAX(muelleID) FROM crm_muelle";
		$result = parent::GetResult($query);
		$oMuelle->muelleID = parent::fetchScalar($result)+1;


		$query2 = "SELECT MAX(chdID) FROM crm_chd";
		$result2 = parent::GetResult($query2);
		$oMuelle->chdID = parent::fetchScalar($result2);

		//Insert data to table
		$query = "INSERT INTO crm_muelle(muelleID,chdID,embarcacionID,nombreEmbarcacion,tipoEmbarcacion,nroRucDni,armador,estadoPermiso,baliza,muelleDesembarcadero,region,localidad,especie,totalDescargado,nroCubetas,fechaDescarga,horaIngreso,horaTermino,fuentePrimeraInformacion,nroDocumento,fechaObtencionPermiso,fechaRegistro,fechaActualizar)
		VALUES('$oMuelle->muelleID','$oMuelle->chdID','$oMuelle->embarcacionID','$oMuelle->nombreEmbarcacion','$oMuelle->tipoEmbarcacion','$oMuelle->nroRucDni','$oMuelle->armador','$oMuelle->estadoPermiso','$oMuelle->baliza','$oMuelle->muelleDesembarcadero','$oMuelle->region','$oMuelle->localidad','$oMuelle->especie','$oMuelle->totalDescargado','$oMuelle->nroCubetas','$oMuelle->fechaDescarga','$oMuelle->horaIngreso','$oMuelle->horaTermino','$oMuelle->fuentePrimeraInformacion','$oMuelle->nroDocumento','$oMuelle->fechaObtencionPermiso',NOW(),NOW())";
		return parent::Execute($query);
		//echo $query;
	}

	public static function  Update($oMuelle){
		//Update data to table
		$query = "UPDATE crm_muelle SET 
		embarcacionID				=	'$oMuelle->embarcacionID',
		nombreEmbarcacion			=	'$oMuelle->nombreEmbarcacion',
		tipoEmbarcacion				=	'$oMuelle->tipoEmbarcacion',
		nroRucDni					=	'$oMuelle->nroRucDni',
		armador						=	'$oMuelle->armador',
		estadoPermiso				=	'$oMuelle->estadoPermiso',
		baliza						=	'$oMuelle->baliza',
		muelleDesembarcadero		=	'$oMuelle->muelleDesembarcadero',
		region						=	'$oMuelle->region',
		localidad					=	'$oMuelle->localidad',
		especie						=	'$oMuelle->especie',
		totalDescargado				=	'$oMuelle->totalDescargado',
		nroCubetas					=	'$oMuelle->nroCubetas',
		fechaDescarga				=	'$oMuelle->fechaDescarga',
		horaIngreso					=	'$oMuelle->horaIngreso',
		horaTermino					=	'$oMuelle->horaTermino',
		fuentePrimeraInformacion	=	'$oMuelle->fuentePrimeraInformacion',
		nroDocumento				=	'$oMuelle->nroDocumento',
		fechaObtencionPermiso		=	'$oMuelle->fechaObtencionPermiso',
		fechaActualizar				=	NOW()
		WHERE 
		chdID	=				$oMuelle->chdID";
		return parent::Execute($query);
	}

	public static function  Delete($muelleID){
		$query = "DELETE FROM crm_muelle WHERE muelleID='$muelleID'";
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



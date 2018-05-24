<?php
require_once("base/Database.php");

class CrmDescartesResiduos extends Database
{

	public static function  getItem($descartesResiduosID){
		$query = "SELECT * FROM crm_descartes_residuos 
		WHERE
		descartesResiduosID='$descartesResiduosID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID){
		$query = "SELECT * FROM crm_descartes_residuos 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getActa($acta){
		$query = "SELECT * FROM crm_descartes_residuos 
		WHERE
		nroActaDR='$acta'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getActaxID($ID){
		$query = "SELECT * FROM crm_descartes_residuos 
		WHERE
		chdID='$ID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_descartes_residuos
		ORDER BY nombrePlanta,localidadPlanta";
		return parent::GetCollection(parent::GetResult($query));
	}

	// public static function  getList_Paging( ){
	// 	$query ="SELECT descartesResiduosID,chiID,plantaID,nombrePlanta, puertoPlanta, zonaPlanta, numeroActaDesembarque, pescaDeclarada, cierrePuerto,inspectorID,nombreInspector,obsInusual,fechaRegistro
	// 	FROM crm_descartes_residuos";
	
	// 	return parent::GetCollection(parent::GetResultPaging($query));
	// }

	public static function  getWebList(){
		$query = "SELECT * FROM crm_descartes_residuos
		ORDER BY nombrePlanta,localidadPlanta";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oDescartesResiduos){
		//Search the max Id
		$query = "SELECT MAX(descartesResiduosID) FROM crm_descartes_residuos";
		$result = parent::GetResult($query);
		$oDescartesResiduos->descartesResiduosID = parent::fetchScalar($result)+1;


		$query2 = "SELECT MAX(chdID) FROM crm_chd";
		$result2 = parent::GetResult($query2);
		$oDescartesResiduos->chdID = parent::fetchScalar($result2);

		//Insert data to table
		$query = "INSERT INTO crm_descartes_residuos(descartesResiduosID,chdID,plantaID,nombrePlanta,regionPlanta,provinciaPlanta,localidadPlanta,nroActaDR,fechaIngreso,horaIngreso,fechaTermino,horaTermino,tipoProcedencia,nombreProcedencia,ruc,tipoUnidadTransporte,placaUnidadTransporte,tipoEIP,tipoTM,tm,tmNoApto,porcNoApto,nroActaSensorial,destinoProcedencia,especie1,tm1,guia1,rp1,especie2,tm2,guia2,rp2,especie3,tm3,guia3,rp3,especie4,tm4,guia4,rp4,fechaRegistro,fechaActualizar)
		VALUES('$oDescartesResiduos->descartesResiduosID','$oDescartesResiduos->chdID','$oDescartesResiduos->plantaID','$oDescartesResiduos->nombrePlanta','$oDescartesResiduos->regionPlanta','$oDescartesResiduos->provinciaPlanta','$oDescartesResiduos->localidadPlanta','$oDescartesResiduos->nroActaDR','$oDescartesResiduos->fechaIngreso','$oDescartesResiduos->horaIngreso','$oDescartesResiduos->fechaTermino','$oDescartesResiduos->horaTermino','$oDescartesResiduos->tipoProcedencia','$oDescartesResiduos->nombreProcedencia','$oDescartesResiduos->ruc','$oDescartesResiduos->tipoUnidadTransporte','$oDescartesResiduos->placaUnidadTransporte','$oDescartesResiduos->tipoEIP','$oDescartesResiduos->tipoTM','$oDescartesResiduos->tm','$oDescartesResiduos->tmNoApto','$oDescartesResiduos->porcNoApto','$oDescartesResiduos->nroActaSensorial','$oDescartesResiduos->destinoProcedencia','$oDescartesResiduos->especie1','$oDescartesResiduos->tm1','$oDescartesResiduos->guia1','$oDescartesResiduos->rp1','$oDescartesResiduos->especie2','$oDescartesResiduos->tm2','$oDescartesResiduos->guia2','$oDescartesResiduos->rp2','$oDescartesResiduos->especie3','$oDescartesResiduos->tm3','$oDescartesResiduos->guia3','$oDescartesResiduos->rp3','$oDescartesResiduos->especie4','$oDescartesResiduos->tm4','$oDescartesResiduos->guia4','$oDescartesResiduos->rp4',NOW(),NOW())";
		return parent::Execute($query);
		//echo $query;
	}

	public static function  Update($oDescartesResiduos){
		//Update data to table
		$query = "UPDATE crm_descartes_residuos SET 
		plantaID				=	'$oDescartesResiduos->plantaID',
		nombrePlanta			=	'$oDescartesResiduos->nombrePlanta',
		regionPlanta			=	'$oDescartesResiduos->regionPlanta',
		provinciaPlanta			=	'$oDescartesResiduos->provinciaPlanta',
		localidadPlanta			=	'$oDescartesResiduos->localidadPlanta',
		nroActaDR				=	'$oDescartesResiduos->nroActaDR',
		fechaIngreso			=	'$oDescartesResiduos->fechaIngreso',
		horaIngreso				=	'$oDescartesResiduos->horaIngreso',
		fechaTermino			=	'$oDescartesResiduos->fechaTermino',
		horaTermino				=	'$oDescartesResiduos->horaTermino',
		tipoProcedencia			=	'$oDescartesResiduos->tipoProcedencia',
		nombreProcedencia		=	'$oDescartesResiduos->nombreProcedencia',
		ruc						=	'$oDescartesResiduos->ruc',
		tipoUnidadTransporte	=	'$oDescartesResiduos->tipoUnidadTransporte',
		placaUnidadTransporte	=	'$oDescartesResiduos->placaUnidadTransporte',
		tipoEIP					=	'$oDescartesResiduos->tipoEIP',
		tipoTM					=	'$oDescartesResiduos->tipoTM',
		tm						=	'$oDescartesResiduos->tm',
		tmNoApto				=	'$oDescartesResiduos->tmNoApto',
		porcNoApto				=	'$oDescartesResiduos->porcNoApto',
		nroActaSensorial		=	'$oDescartesResiduos->nroActaSensorial',
		destinoProcedencia		=	'$oDescartesResiduos->destinoProcedencia',
		especie1				=	'$oDescartesResiduos->especie1',
		tm1						=	'$oDescartesResiduos->tm1',
		guia1					=	'$oDescartesResiduos->guia1',
		rp1						=	'$oDescartesResiduos->rp1',
		especie2				=	'$oDescartesResiduos->especie2',
		tm2						=	'$oDescartesResiduos->tm2',
		guia2					=	'$oDescartesResiduos->guia2',
		rp2						=	'$oDescartesResiduos->rp2',
		especie3				=	'$oDescartesResiduos->especie3',
		tm3						=	'$oDescartesResiduos->tm3',
		guia3					=	'$oDescartesResiduos->guia3',
		rp3						=	'$oDescartesResiduos->rp3',
		especie4				=	'$oDescartesResiduos->especie4',
		tm4						=	'$oDescartesResiduos->tm4',
		guia4					=	'$oDescartesResiduos->guia4',
		rp4						=	'$oDescartesResiduos->rp4',
		fechaActualizar			= NOW()
		WHERE 
		chdID	=$oDescartesResiduos->chdID";
		return parent::Execute($query);
	}

	public static function  Delete($descartesResiduosID){
		$query = "DELETE FROM crm_descartes_residuos WHERE descartesResiduosID='$descartesResiduosID'";
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



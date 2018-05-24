<?php
require_once("base/Database.php");

class CrmMateriaPrima extends Database
{

	public static function  getItem($materiaPrimaID){
		$query = "SELECT * FROM crm_materia_prima 
		WHERE
		materiaPrimaID='$materiaPrimaID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID){
		$query = "SELECT * FROM crm_materia_prima 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getActa($acta){
		$query = "SELECT * FROM crm_materia_prima 
		WHERE
		numeroActaMateria='$acta'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getActaxID($ID){
		$query = "SELECT * FROM crm_materia_prima 
		WHERE
		ChdID='$ID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getList(){
		$query = "SELECT * FROM crm_materia_prima
		ORDER BY nombrePlanta,localidadPlanta";
		return parent::GetCollection(parent::GetResult($query));
	}

	// public static function  getList_Paging( ){
	// 	$query ="SELECT materiaPrimaID,chiID,plantaID,nombrePlanta, puertoPlanta, zonaPlanta, numeroActaDesembarque, pescaDeclarada, cierrePuerto,inspectorID,nombreInspector,obsInusual,fechaRegistro
	// 	FROM crm_materia_prima";
	
	// 	return parent::GetCollection(parent::GetResultPaging($query));
	// }

	public static function  getWebList(){
		$query = "SELECT * FROM crm_materia_prima
		ORDER BY nombrePlanta,localidadPlanta";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oMateriaPrima){
		//Search the max Id
		$query = "SELECT MAX(materiaPrimaID) FROM crm_materia_prima";
		$result = parent::GetResult($query);
		$oMateriaPrima->materiaPrimaID = parent::fetchScalar($result)+1;


		$query2 = "SELECT MAX(chdID) FROM crm_chd";
		$result2 = parent::GetResult($query2);
		$oMateriaPrima->chdID = parent::fetchScalar($result2);

		//Insert data to table
		$query = "INSERT INTO crm_materia_prima(materiaPrimaID,chdID,plantaID,nombrePlanta,localidadPlanta,numeroActaMateria,fechaIngreso,horaIngreso,fechaTermino,horaTermino,codificacionUbicacion,tipoUnidad,placaUnidadTransporte,porcNoApto,nroActaSensorial,tipoProcedencia,nombreProcedencia,rucMatricula,especie1,tm1,destinoProcedencia,especie2,tm2,tmMateriaPrima,especie3,tm3,numeroGuia,fechaRegistro,fechaActualizar)
		VALUES('$oMateriaPrima->materiaPrimaID','$oMateriaPrima->chdID','$oMateriaPrima->plantaID','$oMateriaPrima->nombrePlanta','$oMateriaPrima->localidadPlanta','$oMateriaPrima->numeroActaMateria','$oMateriaPrima->fechaIngreso','$oMateriaPrima->horaIngreso','$oMateriaPrima->fechaTermino','$oMateriaPrima->horaTermino','$oMateriaPrima->codificacionUbicacion','$oMateriaPrima->tipoUnidad','$oMateriaPrima->placaUnidadTransporte','$oMateriaPrima->porcNoApto','$oMateriaPrima->nroActaSensorial','$oMateriaPrima->tipoProcedencia','$oMateriaPrima->nombreProcedencia','$oMateriaPrima->rucMatricula','$oMateriaPrima->especie1','$oMateriaPrima->tm1','$oMateriaPrima->destinoProcedencia','$oMateriaPrima->especie2','$oMateriaPrima->tm2','$oMateriaPrima->tmMateriaPrima','$oMateriaPrima->especie3','$oMateriaPrima->tm3','$oMateriaPrima->numeroGuia',NOW(),NOW())";
		return parent::Execute($query);
		//echo $query;
	}

	public static function  Update($oMateriaPrima){
		//Update data to table
		$query = "UPDATE crm_materia_prima SET 
		plantaID				=  '$oMateriaPrima->plantaID',
		nombrePlanta			=  '$oMateriaPrima->nombrePlanta',
		localidadPlanta			=  '$oMateriaPrima->localidadPlanta',
		numeroActaMateria		=  '$oMateriaPrima->numeroActaMateria',
		fechaIngreso			=  '$oMateriaPrima->fechaIngreso',
		horaIngreso				=  '$oMateriaPrima->horaIngreso',
		fechaTermino			=  '$oMateriaPrima->fechaTermino',
		horaTermino				=  '$oMateriaPrima->horaTermino',
		codificacionUbicacion	=  '$oMateriaPrima->codificacionUbicacion',
		tipoUnidad				=  '$oMateriaPrima->tipoUnidad',
		placaUnidadTransporte	=  '$oMateriaPrima->placaUnidadTransporte',
		porcNoApto				=  '$oMateriaPrima->porcNoApto',
		nroActaSensorial		=  '$oMateriaPrima->nroActaSensorial',
		tipoProcedencia			=  '$oMateriaPrima->tipoProcedencia',
		nombreProcedencia		=  '$oMateriaPrima->nombreProcedencia',
		rucMatricula			=  '$oMateriaPrima->rucMatricula',
		especie1				=  '$oMateriaPrima->especie1',
		tm1						=  '$oMateriaPrima->tm1',
		destinoProcedencia		=  '$oMateriaPrima->destinoProcedencia',
		especie2				=  '$oMateriaPrima->especie2',
		tm2						=  '$oMateriaPrima->tm2',
		tmMateriaPrima			=  '$oMateriaPrima->tmMateriaPrima',
		especie3				=  '$oMateriaPrima->especie3',
		tm3						=  '$oMateriaPrima->tm3',
		numeroGuia				=  '$oMateriaPrima->numeroGuia',
		fechaActualizar			=  NOW()
		WHERE 
		chdID	=$oMateriaPrima->chdID";
		return parent::Execute($query);
	}

	public static function  Delete($materiaPrimaID){
		$query = "DELETE FROM crm_materia_prima WHERE materiaPrimaID='$materiaPrimaID'";
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



<?php
require_once("base/Database.php");

class CrmPlantaChd extends Database
{

	public static function  getItem($plantaID){
		$query = "SELECT * FROM crm_planta_chd 
		WHERE
		plantaID='$plantaID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCodigo($codigoPlanta){
		$query = "SELECT * FROM crm_planta_chd 
		WHERE
		codigoPlanta='$codigoPlanta'";
		return parent::GetObject(parent::GetResult($query));
	}


	public static function  getList(){
		$query = "SELECT * FROM crm_planta_chd
		ORDER BY codigoPlanta, nombrePlanta";
		return parent::GetCollection(parent::GetResult($query));
	}
	public static function  getListAgrupado(){
		$query = "SELECT * FROM crm_planta_chd
		GROUP BY nombrePlanta
		ORDER BY codigoPlanta, nombrePlanta";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getListxTipo($tipoCHD,$localID){
		$query = "SELECT * FROM crm_planta_chd
		WHERE
		tipoCHD='$tipoCHD'";
		if($localID != 0) $query .= "AND localID='$localID'";
		$query .= "ORDER BY codigoPlanta, nombrePlanta";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getList_Paging( ){
		$query ="SELECT plantaID, codigoPlanta , nombrePlanta, localidadPlanta, regionPlanta,provinciaPlanta, state
		FROM crm_planta_chd
		";
		
		return parent::GetCollection(parent::GetResultPaging($query));
	}

	public static function  getWebList(){
		$query = "SELECT * FROM crm_planta_chd
		ORDER BY codigoPlanta, nombrePlanta";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oPlanta){
		//Search the max Id
		$query = "SELECT MAX(plantaID) FROM crm_planta_chd";
		$result = parent::GetResult($query);
		$oPlanta->plantaID = parent::fetchScalar($result)+1;
		//Insert data to table
		$query = "INSERT INTO crm_planta_chd(plantaID, codigoPlanta , nombrePlanta, localidadPlanta, regionPlanta,provinciaPlanta,tipoCHD,localID, state)
		VALUES('$oPlanta->plantaID', '$oPlanta->codigoPlanta', '$oPlanta->nombrePlanta', '$oPlanta->localidadPlanta', '$oPlanta->regionPlanta', '$oPlanta->provinciaPlanta', '$oPlanta->tipoCHD' ,'$oPlanta->localID','$oPlanta->state')";
		return parent::Execute($query);
	}

	public static function  Update($oPlanta){
		//Update data to table
		$query = "UPDATE crm_planta_chd SET 
		codigoPlanta	='$oPlanta->codigoPlanta',
		nombrePlanta	='$oPlanta->nombrePlanta',
		localidadPlanta	='$oPlanta->localidadPlanta',
		regionPlanta	='$oPlanta->regionPlanta',
		provinciaPlanta ='$oPlanta->provinciaPlanta',
		tipoCHD			='$oPlanta->tipoCHD',
		localID			='$oPlanta->localID',
		state			='$oPlanta->state'
		WHERE 
		plantaID	=$oPlanta->plantaID";
		return parent::Execute($query);
	}

	public static function  Delete($oPlanta){
		$query = "DELETE FROM crm_planta_chd WHERE plantaID='$oPlanta->plantaID'";
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
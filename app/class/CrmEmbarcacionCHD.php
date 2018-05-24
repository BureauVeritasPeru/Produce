<?php
require_once("base/Database.php");

class CrmEmbarcacionCHD extends Database
{

	public static function  getItem($embarcacionID){
		$query = "SELECT * FROM crm_embarcacion_chd 
		WHERE
		embarcacionID='$embarcacionID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHD($chdID){
		$query = "SELECT * FROM crm_embarcacion_chd 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	}

	public static function  getItemCHI($chdID){
		$query = "SELECT * FROM crm_embarcacion_chd 
		WHERE
		chdID='$chdID'";
		return parent::GetObject(parent::GetResult($query));
	} 

	public static function  getList(){
		$query = "SELECT * FROM crm_embarcacion_chd
		ORDER BY embarcacionID";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getListAll(){
		$query = "SELECT * FROM crm_embarcacion_chd
		ORDER BY embarcacionID";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getListReporte($chdID){
		$query = "SELECT * FROM crm_embarcacion_chd 
		WHERE
		chdID='$chdID'";
		return parent::GetCollection(parent::GetResult($query));
	}

	public static function  getWebList(){
		$query = "SELECT * FROM crm_embarcacion_chd
		ORDER BY embarcacionID";
		return parent::GetCollection(parent::GetResult($query));
	}
	
	public static function  AddNew($oEmbarcacion){
		//Search the max Id
		$query = "SELECT MAX(embarcacionID) FROM crm_embarcacion_chd";
		$result = parent::GetResult($query);
		$oEmbarcacion->embarcacionID = parent::fetchScalar($result)+1;

		//Insert data to table
		$query = "INSERT INTO crm_embarcacion_chd(embarcacionID,chdID,unidadMedida,fechaRegistro)
		VALUES('$oEmbarcacion->embarcacionID','$oEmbarcacion->chdID','$oEmbarcacion->unidadMedida',NOW())";
		return parent::Execute($query);
		//echo $query;
	}


	
	public static function  Update($oEmbarcacion){
		//Update data to table
		$query = "UPDATE crm_embarcacion_chd SET 
		unidadMedida 		=			'$oEmbarcacion->unidadMedida'
		WHERE 
		chdID	=$oEmbarcacion->chdID";
		return parent::Execute($query);
	}



	public static function  Delete($embarcacionID){
		$query = "DELETE FROM crm_embarcacion_chd WHERE embarcacionID='$embarcacionID'";
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






































